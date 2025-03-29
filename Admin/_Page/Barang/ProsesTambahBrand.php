<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Get Data
    if(empty($_POST['nama_brand'])){
        echo '<span class="text-danger">Nama Brand Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['deskripsi'])){
            echo '<span class="text-danger">Deskripsi Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_FILES['logo']['name'])){
                echo '<span class="text-danger">Logo Brand Tidak Boleh Kosong!</span>';
            }else{
                $nama_brand=$_POST['nama_brand'];
                $deskripsi=$_POST['deskripsi'];
                $nama_gambar=$_FILES['logo']['name'];
                //ukuran gambar
                $ukuran_gambar = $_FILES['logo']['size']; 
                //tipe
                $tipe_gambar = $_FILES['logo']['type']; 
                //sumber gambar
                $tmp_gambar = $_FILES['logo']['tmp_name'];
                $timestamp = strval(time()-strtotime('1970-01-01 00:00:00'));
                $key=implode('', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
                $FileNameRand=$key;
                $Pecah = explode("." , $nama_gambar);
                $BiasanyaNama=$Pecah[0];
                $Ext=$Pecah[1];
                $namabaru = "$FileNameRand.$Ext";
                $path = "../../assets/img/Brand/".$namabaru;
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
                    //Simpan data
                    $entry="INSERT INTO brand (
                        nama_brand,
                        deskripsi,
                        logo
                    ) VALUES (
                        '$nama_brand',
                        '$deskripsi',
                        '$namabaru'
                    )";
                    $Input=mysqli_query($Conn, $entry);
                    if($Input){
                        echo '<small class="text-success" id="NotifikasiTambahBrandBerhasil">Success</small>';
                    }else{
                        echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                    }
                }
            }
        }
    }
?>