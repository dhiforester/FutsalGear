<?php
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    if(empty($_POST['provinsi'])){
        echo '<span class="text-danger">Provinsi belum diisi</span>';
    }else{
        if(empty($_POST['kabupaten'])){
            echo '<span class="text-danger">Kabupaten belum diisi</span>';
        }else{
            if(empty($_POST['kecamatan'])){
                echo '<span class="text-danger">Kecamatan belum diisi</span>';
            }else{
                if(empty($_POST['desa'])){
                    echo '<span class="text-danger">Desa belum diisi</span>';
                }else{
                    if(empty($_POST['kurir'])){
                        echo '<span class="text-danger">Kurir belum diisi</span>';
                    }else{
                        if(empty($_POST['JumlahTotal'])){
                            echo '<span class="text-danger">Jumlah Total belum diisi</span>';
                        }else{
                            if(empty($_POST['bank'])){
                                echo '<span class="text-danger">Informasi Bank belum diisi</span>';
                            }else{
                                if(empty($_POST['alamat'])){
                                    echo '<span class="text-danger">Alamat belum diisi</span>';
                                }else{
                                    $provinsi=$_POST['provinsi'];
                                    $kabupaten=$_POST['kabupaten'];
                                    $kecamatan=$_POST['kecamatan'];
                                    $desa=$_POST['desa'];
                                    $kurir=$_POST['kurir'];
                                    $subtotal=$_POST['JumlahTotal'];
                                    $bank=$_POST['bank'];
                                    $alamat=$_POST['alamat'];
                                    $tanggal=date('Y-m-d H:i:s');
                                    //Mencari nilai ongkir
                                    $QryOngkir = mysqli_query($Conn,"SELECT * FROM ongkir WHERE provinsi='$provinsi' AND kabupaten='$kabupaten' AND kecamatan='$kecamatan' AND desa='$desa' AND kurir='$kurir'")or die(mysqli_error($Conn));
                                    $DataOngkir = mysqli_fetch_array($QryOngkir);
                                    $id_ongkir= $DataOngkir['id_ongkir'];
                                    $ongkir= $DataOngkir['ongkir'];
                                    $JumlahTotalSetelahOngkir=$subtotal+$ongkir;
                                    //Tambahkan Transaksi
                                    $entry="INSERT INTO transaksi (
                                        id_akses,
                                        id_ongkir,
                                        tanggal,
                                        nama_pelanggan,
                                        alamat,
                                        metode_pembayaran,
                                        kurir,
                                        subtotal,
                                        ongkir,
                                        jumlah,
                                        status_pembayaran,
                                        status_pengiriman
                                    ) VALUES (
                                        '$SessionIdAksesPelanggan',
                                        '$id_ongkir',
                                        '$tanggal',
                                        '$SessionNama',
                                        '$alamat',
                                        '$bank',
                                        '$kurir',
                                        '$subtotal',
                                        '$ongkir',
                                        '$JumlahTotalSetelahOngkir',
                                        'Pending',
                                        'Pending'
                                    )";
                                    $Input=mysqli_query($Conn, $entry);
                                    if($Input){
                                        //Cari ID Transaksi
                                        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_akses='$SessionIdAksesPelanggan' AND tanggal='$tanggal'")or die(mysqli_error($Conn));
                                        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
                                        $id_transaksi= $DataTransaksi['id_transaksi'];
                                        //Update Semua Rincian
                                        $UpdateRincian = mysqli_query($Conn,"UPDATE rincian SET 
                                            id_transaksi='$id_transaksi'
                                        WHERE id_transaksi='0' AND id_akses='$SessionIdAksesPelanggan'") or die(mysqli_error($Conn)); 
                                        if($UpdateRincian){
                                            //Update Stok Barang
                                            $QryRincianTransaksi = mysqli_query($Conn, "SELECT * FROM rincian WHERE id_transaksi='$id_transaksi'");
                                            while ($DataRincianTransaksi = mysqli_fetch_array($QryRincianTransaksi)) {
                                                $id_produk= $DataRincianTransaksi['id_produk'];
                                                $qty= $DataRincianTransaksi['qty'];
                                                //Buka Data Produk
                                                $QryProduk = mysqli_query($Conn,"SELECT * FROM produk WHERE id_produk='$id_produk'")or die(mysqli_error($Conn));
                                                $DataProduk = mysqli_fetch_array($QryProduk);
                                                $stok= $DataProduk['stok'];
                                                //Stok baru
                                                $StokBaru=$stok-$qty;
                                                //Update Stok Produk
                                                $UpdateStok = mysqli_query($Conn,"UPDATE produk SET 
                                                    stok='$StokBaru'
                                                WHERE id_produk='$id_produk'") or die(mysqli_error($Conn)); 
                                            }
                                            echo '<small class="text-success" id="NotifikasiSimpanKeranjangBerhasil">Success</small>';
                                            echo '<input type="hidden" id="IdTransaksi" value="'.$id_transaksi.'">';
                                        }else{
                                            echo '<small class="text-danger">Terjadi kesalahan pada saat update data rincian</small>';
                                        }
                                    }else{
                                        echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data '.$JumlahTotalSetelahOngkir.'</small>';
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>