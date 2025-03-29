<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Kondisi Apabila Belum Login
    if(empty($SessionIdAksesPelanggan)){
        echo '<span class="text-danger">Anda Belum Login, Silahkan Login Atau Daftar Terlebih Dulu</span>';
    }else{
        //Validasi id_produk Tidak Boleh Kosong!
        if(empty($_POST['id_produk'])){
            echo '<span class="text-danger">ID Produk Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['qty'])){
                echo '<span class="text-danger">Jumlah Item Produk Tidak Boleh Kosong!</span>';
            }else{
                //Buat Variabel
                $id_akses=$SessionIdAksesPelanggan;
                $id_produk=$_POST['id_produk'];
                $qty=$_POST['qty'];
                //Validasi Variant Jika Ada
                $JumlahGroupVariant = mysqli_num_rows(mysqli_query($Conn, "SELECT DISTINCT grup_variant FROM produk_varian WHERE id_produk='$id_produk'"));
                if(!empty($JumlahGroupVariant)){
                    //Validasi Setiap Group Variant Harus Terisi 1
                    $Keterangan = array();
                    $no=1;
                    $GroupVarianTerisi=0;
                    $QryVariant = mysqli_query($Conn, "SELECT DISTINCT grup_variant FROM produk_varian WHERE id_produk='$id_produk'");
                    while ($DataVariant = mysqli_fetch_array($QryVariant)) {
                        $grup_variant= $DataVariant['grup_variant'];
                        if(empty($_POST['GrupVariant'.$no.''])){
                            $GroupVarianTerisi=$GroupVarianTerisi+0;
                        }else{
                            $value_variant=$_POST['GrupVariant'.$no.''];
                            $h['grup_variant'] = $grup_variant;
                            $h['value_variant'] = $value_variant;
                            array_push($Keterangan, $h);
                            $GroupVarianTerisi=$GroupVarianTerisi+1;
                        }
                    }
                    if($GroupVarianTerisi==$JumlahGroupVariant){
                        $JsonKeterangan = json_encode($Keterangan);
                        $validasi_variant="Valid";
                    }else{
                        $validasi_variant="Tidak Valid";
                        $JsonKeterangan ="";
                    }
                }else{
                    $validasi_variant="Valid";
                    $JsonKeterangan ="";
                }
                if($validasi_variant!=="Valid"){
                    echo '<span class="text-danger">Pilih salah variant tidak lengkap!</span>';
                }else{
                    //Buka Detail Produk
                    $QryProduk = mysqli_query($Conn,"SELECT * FROM produk WHERE id_produk='$id_produk'")or die(mysqli_error($Conn));
                    $DataProduk = mysqli_fetch_array($QryProduk);
                    $stok= $DataProduk['stok'];
                    $harga= $DataProduk['harga'];
                    //Apabila stok tidak memenuhi
                    if($stok<$qty){
                        echo '<span class="text-danger">stok tidak memenuhi!</span>';
                    }else{
                        //Membuka data diskon
                        $Sekarang=date('Y-m-d');
                        $QryDiskon = mysqli_query($Conn,"SELECT * FROM diskon WHERE id_produk='$id_produk' AND periode_awal<='$Sekarang' AND periode_akhir>='$Sekarang'")or die(mysqli_error($Conn));
                        $DataDiskon = mysqli_fetch_array($QryDiskon);
                        if(!empty($DataDiskon['id_diskon'])){
                            $diskon=$DataDiskon['diskon'];
                            $NilaiDiskon=($diskon/100)*$harga;
                        }else{
                            $diskon="";
                            $NilaiDiskon=0;
                        }
                        $HargaSetelahDiskon=$harga-$NilaiDiskon;
                        //Jumlah
                        $jumlah=$HargaSetelahDiskon*$qty;
                        //Simpan Data
                        $id_transaksi="0";
                        $EntryKeranjang="INSERT INTO rincian (
                            id_transaksi,
                            id_akses,
                            id_produk,
                            harga,
                            qty,
                            jumlah,
                            keterangan
                        ) VALUES (
                            '$id_transaksi',
                            '$id_akses',
                            '$id_produk',
                            '$HargaSetelahDiskon',
                            '$qty',
                            '$jumlah',
                            '$JsonKeterangan'
                        )";
                        $InputKeranjang=mysqli_query($Conn, $EntryKeranjang);
                        if($InputKeranjang){
                            $_SESSION ["NotifikasiSwal"]="Tambah Item Keranjang Berhasil";
                            echo '<span class="text-success" id="NotifikasiTambahKeKeranjangBerhasil">Success</span>';
                        }else{
                            echo '<span class="text-center">';
                            echo '  Terjadi kesalahan pada saat menyimpan data ke keranjang';
                            echo '</span>';
                        }
                    }
                }
            }
        }
    }
?>