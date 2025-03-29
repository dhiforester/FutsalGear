<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    date_default_timezone_set('Asia/Jakarta');
    //Time Now Tmp
    $now=date('Y-m-d H:i');
    if(empty($_POST['id_barang'])){
        echo '<div class="row">';
        echo '  <div class="col-md-12 text-center text-danger">';
        echo '      ID Barang Tidak Boleh Kosong!';
        echo '  </div>';
        echo '</div>';
    }else{
        if(empty($SessionIdPelanggan)){
            echo '<div class="row">';
            echo '  <div class="col-md-12 text-center text-danger">';
            echo '      Lakukan <a href="index.php?Page=Login">Login </a> terlebih dulu untuk menyimpan item barang ke keranjang.';
            echo '  </div>';
            echo '</div>';
        }else{
            $id_barang=$_POST['id_barang'];
            //Buka item barang
            $QryProduuk = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
            $DataProduk = mysqli_fetch_array($QryProduuk);
            if(empty($DataProduk['id_barang'])){
                echo '<div class="row">';
                echo '  <div class="col-md-12 text-center text-danger">';
                echo '      ID Barang Yang Anda Pilih Tidak Valid!';
                echo '  </div>';
                echo '</div>';
            }else{
                $id_barang= $DataProduk['id_barang'];
                $id_mitra= $DataProduk['id_mitra'];
                $nama= $DataProduk['nama'];
                $kategori= $DataProduk['kategori'];
                $satuan= $DataProduk['satuan'];
                $harga= $DataProduk['harga'];
                $stok= $DataProduk['stok'];
                $foto= $DataProduk['foto'];
                //Cek Data Keranjang
                $JumlahKeranjang= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_barang='$id_barang' AND id_pelanggan='$SessionIdPelanggan' AND id_transaksi='0'"));
                //Apabila Stok tidak mencukupi
                if($stok<1){
                    echo '<div class="row">';
                    echo '  <div class="col-md-12 text-center text-danger">';
                    echo '      Stok barang yang anda pilih sudah habis!';
                    echo '  </div>';
                    echo '</div>';
                }else{
                    if(!empty($JumlahKeranjang)){
                        echo '<div class="row">';
                        echo '  <div class="col-md-12 text-center text-danger">';
                        echo '      Anda sudah memiliki item barang ini dalam <a href="index.php?Page=Keranjang">keranjang</a> belanja.';
                        echo '  </div>';
                        echo '</div>';
                    }else{
                        //Tambahkan ke data rincian
                        $EntryRincian="INSERT INTO transaksi_rincian (
                            id_transaksi,
                            id_pelanggan,
                            id_barang,
                            id_kunjungan,
                            id_mitra,
                            id_mitra_layanan,
                            nama_barang,
                            nama_layanan,
                            harga,
                            qty,
                            jumlah,
                            updatetime
                        ) VALUES (
                            '0',
                            '$SessionIdPelanggan',
                            '$id_barang',
                            '0',
                            '$id_mitra',
                            '0',
                            '$nama',
                            '',
                            '$harga',
                            '1',
                            '$harga',
                            '$now'
                        )";
                        $InputRincian=mysqli_query($Conn, $EntryRincian);
                        if($InputRincian){
                            echo '<div class="row">';
                            echo '  <div class="col-md-12 text-center text-success">';
                            echo '      <h1><i class="bi bi-check-circle"></i></h1>';
                            echo '      Tambah item barang ke dalam keranjang berhasil!<br>';
                            echo '      Silahkan cek pada <a href="index.php?Page=Keranjang">keranjang</a> belanja.';
                            echo '  </div>';
                            echo '</div>';
                        }else{
                            echo '<div class="row">';
                            echo '  <div class="col-md-12 text-center text-danger">';
                            echo '      Terjadi kesalahan pada saat menyimpan item barang ke dalam keranjang!';
                            echo '  </div>';
                            echo '</div>';
                        }
                    }
                }
            }
        }
    }

?>