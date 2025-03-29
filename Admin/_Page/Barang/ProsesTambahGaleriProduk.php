<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/Function.php";
    //Get Data
    if(empty($_POST['id_produk'])){
        echo '<span class="text-danger">ID Produk Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_FILES['galeri']['name'])){
            echo '<span class="text-danger">File galeri Tidak Boleh Kosong!</span>';
        }else{
            $id_produk=$_POST['id_produk'];
            //nama gambar
            $nama_gambar=$_FILES['galeri']['name'];
            //ukuran gambar
            $ukuran_gambar = $_FILES['galeri']['size']; 
            //tipe
            $tipe_gambar = $_FILES['galeri']['type']; 
            //sumber gambar
            $tmp_gambar = $_FILES['galeri']['tmp_name'];
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
                //Simpan data
                $entry="INSERT INTO produk_galeri (
                    id_produk,
                    galeri
                ) VALUES (
                    '$id_produk',
                    '$namabaru'
                )";
                $Input=mysqli_query($Conn, $entry);
                if($Input){
                    echo '<span id="NotifikasiTambahGaleriBerhasil">Success</span>';
                }else{
                    echo '<span>Error</span>';
                }
            }
        }
    }
?>