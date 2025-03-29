<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/Function.php";
    //Get Data
    if(empty($_POST['id_produk'])){
        echo '<span class="text-danger">ID Produk Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['nama_produk'])){
            echo '<span class="text-danger">Nama Produk Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['id_brand'])){
                echo '<span class="text-danger">ID Brand Tidak Boleh Kosong!</span>';
            }else{
                if(empty($_POST['kategori'])){
                    echo '<span class="text-danger">Kategori Produk Tidak Boleh Kosong!</span>';
                }else{
                    if(empty($_POST['deskripsi'])){
                        echo '<span class="text-danger">Deskripsi Produk Tidak Boleh Kosong!</span>';
                    }else{
                        $id_produk=$_POST['id_produk'];
                        $nama_produk=$_POST['nama_produk'];
                        $id_brand=$_POST['id_brand'];
                        $kategori=$_POST['kategori'];
                        $deskripsi=$_POST['deskripsi'];
                        $NamaProdukLama=getDataDetail($Conn,'produk','id_produk',$id_produk,'nama_produk');
                        $nama_brand=getDataDetail($Conn,'brand','id_brand',$id_brand,'nama_brand');
                        if(empty($_POST['stok'])){
                            $stok="0";
                        }else{
                            $stok=$_POST['stok'];
                        }
                        if(empty($_POST['harga'])){
                            $harga=0;
                        }else{
                            $harga=$_POST['harga'];
                        }
                        //Bersihkan karakter titik
                        $stok= str_replace(".", "", $stok);
                        $harga= str_replace(".", "", $harga);
                        //Validasi data duplikat
                        if($NamaProdukLama!==$nama_produk){
                            $ValidasiDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM produk WHERE nama_produk='$nama_produk'"));
                        }else{
                            $ValidasiDuplikat=0;
                        }
                        if(!empty($ValidasiDuplikat)){
                            echo '<small class="text-danger">Data Tersebut sudah ada</small>';
                        }else{
                            $JumlahKarakter=strlen($_POST['nama_produk']);
                            if($JumlahKarakter>30){
                                echo '<small class="text-danger">Jumlah karakter nama produk tidak boleh lebih dari 30</small>';
                            }else{
                                $JumlahKarakter=strlen($_POST['kategori']);
                                if($JumlahKarakter>30){
                                    echo '<small class="text-danger">Kategori Produk tidak boleh lebih dari 30</small>';
                                }else{
                                    if(!preg_match("/^[0-9]*$/", $stok)){
                                        echo '<small class="text-danger">Stok hanya boleh angka</small>';
                                    }else{
                                        if(!preg_match("/^[0-9]*$/", $harga)){
                                            echo '<small class="text-danger">Harga hanya boleh angka</small>';
                                        }else{
                                            $UpdateProduk = mysqli_query($Conn,"UPDATE produk SET 
                                                id_brand='$id_brand',
                                                nama_produk='$nama_produk',
                                                kategori='$kategori',
                                                brand='$nama_brand',
                                                deskripsi='$deskripsi',
                                                harga='$harga',
                                                stok='$stok'
                                            WHERE id_produk='$id_produk'") or die(mysqli_error($Conn)); 
                                            if($UpdateProduk){
                                                echo '<small class="text-success" id="NotifikasiEditProdukBerhasil">Success</small>';
                                            }else{
                                                echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                                            }
                                        }
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