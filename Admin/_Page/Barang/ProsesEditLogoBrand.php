<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/Function.php";
    //Get Data
    if(empty($_POST['id_brand'])){
        echo '<span class="text-danger">ID Brand Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_FILES['logo_brand_edit']['name'])){
            echo '<span class="text-danger">Logo Brand Tidak Boleh Kosong!</span>';
        }else{
            $id_brand=$_POST['id_brand'];
            $nama_gambar = $_FILES['logo_brand_edit']['name']; 
            $LogoLama=getDataDetail($Conn,'brand','id_brand',$id_brand,'logo');
            $PathLogolama = "../../assets/img/Brand/".$LogoLama;
            //ukuran gambar
            $ukuran_gambar = $_FILES['logo_brand_edit']['size']; 
            //tipe
            $tipe_gambar = $_FILES['logo_brand_edit']['type']; 
            //sumber gambar
            $tmp_gambar = $_FILES['logo_brand_edit']['tmp_name'];
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
                        unlink($PathLogolama);
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
                $UpdateBrand = mysqli_query($Conn,"UPDATE brand SET 
                    logo='$namabaru'
                WHERE id_brand='$id_brand'") or die(mysqli_error($Conn)); 
                if($UpdateBrand){
                    echo '<small class="text-success" id="NotifikasiEditLogoBrandBerhasil">Success</small>';
                }else{
                    echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                }
            }
        }
    }
?>