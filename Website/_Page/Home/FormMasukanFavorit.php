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
            echo '      Lakukan <a href="index.php?Page=Login">Login </a> terlebih dulu untuk menyimpan item barang ke daftar favorit anda.';
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
                //Cek Data Favorit
                $Jumlah= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_favorit WHERE id_barang='$id_barang' AND id_pelanggan='$SessionIdPelanggan'"));
                if(!empty($Jumlah)){
                    echo '<div class="row">';
                    echo '  <div class="col-md-12 text-center text-danger">';
                    echo '      Anda sudah memiliki item barang ini dalam list favorit.';
                    echo '  </div>';
                    echo '</div>';
                }else{
                    //Tambahkan ke data Favorit
                    $EntryFavorit="INSERT INTO barang_favorit (
                        id_pelanggan,
                        id_barang,
                        nama_barang
                    ) VALUES (
                        '$SessionIdPelanggan',
                        '$id_barang',
                        '$nama'
                    )";
                    $InputFavorit=mysqli_query($Conn, $EntryFavorit);
                    if($InputFavorit){
                        echo '<div class="row">';
                        echo '  <div class="col-md-12 text-center text-success">';
                        echo '      <h1><i class="bi bi-check-circle"></i></h1>';
                        echo '      Tambah item barang ke dalam daftar favorit berhasil!<br>';
                        echo '      Silahkan cek pada <a href="index.php?Page=Profile">Profile</a> anda.';
                        echo '  </div>';
                        echo '</div>';
                    }else{
                        echo '<div class="row">';
                        echo '  <div class="col-md-12 text-center text-danger">';
                        echo '      Terjadi kesalahan pada saat menyimpan item barang ke dalam daftar favorit!';
                        echo '  </div>';
                        echo '</div>';
                    }
                }
            }
        }
    }
?>