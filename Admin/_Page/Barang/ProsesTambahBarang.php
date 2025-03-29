<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/Function.php";
    //Get Data
    if(empty($_POST['nama_produk'])){
        echo '<span class="text-danger">nama Produk Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['id_brand'])){
            echo '<span class="text-danger">ID Brand Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['kategori'])){
                echo '<span class="text-danger">Kategori produk Tidak Boleh Kosong!</span>';
            }else{
                if(empty($_POST['deskripsi'])){
                    echo '<span class="text-danger">Deskripsi produk Tidak Boleh Kosong!</span>';
                }else{
                    if(empty($_FILES['foto']['name'])){
                        echo '<span class="text-danger">Foto Produk Tidak Boleh Kosong!</span>';
                    }else{
                        $nama_produk=$_POST['nama_produk'];
                        $id_brand=$_POST['id_brand'];
                        $kategori=$_POST['kategori'];
                        $deskripsi=$_POST['deskripsi'];
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
                        //Validasi data duplikat
                        $ValidasiDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM produk WHERE nama_produk='$nama_produk'"));
                        if(!empty($ValidasiDuplikat)){
                            echo '<small class="text-danger">produk Tersebut sudah ada</small>';
                        }else{
                            $JumlahKarakter=strlen($_POST['nama_produk']);
                            if($JumlahKarakter>30){
                                echo '<small class="text-danger">Jumlah karakter nama produk tidak boleh lebih dari 30</small>';
                            }else{
                                $JumlahKarakter=strlen($_POST['kategori']);
                                if($JumlahKarakter>30){
                                    echo '<small class="text-danger">Jumlah karakter satuan tidak boleh lebih dari 30</small>';
                                }else{
                                    if(!preg_match("/^[0-9]*$/", $stok)){
                                        echo '<small class="text-danger">Stok hanya boleh angka</small>';
                                    }else{
                                        if(!preg_match("/^[0-9]*$/", $harga)){
                                            echo '<small class="text-danger">Harga hanya boleh angka</small>';
                                        }else{
                                            //Melakukan upload foto
                                            //nama gambar
                                            $nama_gambar=$_FILES['foto']['name'];
                                            //ukuran gambar
                                            $ukuran_gambar = $_FILES['foto']['size']; 
                                            //tipe
                                            $tipe_gambar = $_FILES['foto']['type']; 
                                            //sumber gambar
                                            $tmp_gambar = $_FILES['foto']['tmp_name'];
                                            $timestamp = strval(time()-strtotime('1970-01-01 00:00:00'));
                                            $key=implode('', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
                                            $FileNameRand=$key;
                                            $Pecah = explode("." , $nama_gambar);
                                            $BiasanyaNama=$Pecah[0];
                                            $Ext=$Pecah[1];
                                            $namabaru = "$FileNameRand.$Ext";
                                            $path = "../../assets/img/Barang/".$namabaru;
                                            if($tipe_gambar == "image/jpeg"||$tipe_gambar == "image/jpg"||$tipe_gambar == "image/gif"||$tipe_gambar == "image/png"){
                                                if($ukuran_gambar<2000000){
                                                    if(move_uploaded_file($tmp_gambar, $path)){
                                                        $ValidasiGambar="Valid";
                                                    }else{
                                                        $ValidasiGambar="Upload file gambar gagal";
                                                    }
                                                }else{
                                                    $ValidasiGambar="File gambar tidak boleh lebih dari 2 mb";
                                                }
                                            }else{
                                                $ValidasiGambar="tipe file hanya boleh JPG, JPEG, PNG and GIF";
                                            }
                                            //Apabila validasi upload valid maka simpan di database
                                            if($ValidasiGambar!=="Valid"){
                                                echo '<small class="text-danger">'.$ValidasiGambar.'</small>';
                                            }else{
                                                $nama_brand=getDataDetail($Conn,'brand','id_brand',$id_brand,'nama_brand');
                                                //Simpan data
                                                $entry="INSERT INTO produk (
                                                    id_brand,
                                                    nama_produk,
                                                    brand,
                                                    kategori,
                                                    deskripsi,
                                                    harga,
                                                    stok,
                                                    foto
                                                ) VALUES (
                                                    '$id_brand',
                                                    '$nama_produk',
                                                    '$nama_brand',
                                                    '$kategori',
                                                    '$deskripsi',
                                                    '$harga',
                                                    '$stok',
                                                    '$namabaru'
                                                )";
                                                $Input=mysqli_query($Conn, $entry);
                                                if($Input){
                                                    echo '<small class="text-success" id="NotifikasiTambahBarangBerhasil">Success</small>';
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
    }
?>