<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/Function.php";
    //Get Data
    if(empty($_POST['id_produk'])){
        echo '<span class="text-danger">ID Produk Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_FILES['foto']['name'])){
            echo '<span class="text-danger">Logo Brand Tidak Boleh Kosong!</span>';
        }else{
            $id_produk=$_POST['id_produk'];
            $nama_gambar = $_FILES['foto']['name']; 
            $FotoLama=getDataDetail($Conn,'produk','id_produk',$id_produk,'foto');
            $PathFotoLama = "../../assets/img/Barang/".$FotoLama;
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
                        unlink($PathFotoLama);
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
                //Simpan Brand
                $UpdateFoto = mysqli_query($Conn,"UPDATE produk SET 
                    foto='$namabaru'
                WHERE id_produk='$id_produk'") or die(mysqli_error($Conn)); 
                if($UpdateFoto){
                    echo '<small class="text-success" id="NotifikasiUbahFotoProdukBerhasil">Success</small>';
                }else{
                    echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                }
            }
        }
    }
?>