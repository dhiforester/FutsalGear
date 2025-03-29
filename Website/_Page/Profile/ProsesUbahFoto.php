<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/SettingGeneral.php";
    //Buka Detail Pelanggan
    $QuerySessionAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$SessionIdAksesPelanggan'")or die(mysqli_error($Conn));
    $DataSessionAkses = mysqli_fetch_array($QuerySessionAkses);
    //URL Foto
    $UrlFotoLama="../../../Admin/assets/img/User/$SessionGambar";
    //Time Zone
    date_default_timezone_set("Asia/Jakarta");
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    if(!empty($_FILES['foto']['name'])){
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
        $path = "../../../Admin/assets/img/User/".$namabaru;
        if($tipe_gambar == "image/jpeg"||$tipe_gambar == "image/jpg"||$tipe_gambar == "image/gif"||$tipe_gambar == "image/png"){
            if($ukuran_gambar<2000000){
                if(move_uploaded_file($tmp_gambar, $path)){
                    $ValidasiGambar="Valid";
                }else{
                    $ValidasiGambar="Upload File Foto Gagal";
                }
            }else{
                $ValidasiGambar="File Foto tidak boleh lebih dari 2 Mb";
            }
        }else{
            $ValidasiGambar="Format File Foto Hanya Boleh JPG, JPEG, PNG and GIF";
        }
    }else{
        $ValidasiGambar="Pilih File Foto Profile Terlebih Dulu";
        $namabaru="";
    }
    //Apabila validasi upload valid maka simpan di database
    if($ValidasiGambar!=="Valid"){
        echo '<small class="text-danger">'.$ValidasiGambar.'</small>';
    }else{
        $UpdateFoto = mysqli_query($Conn,"UPDATE akses SET 
            foto='$namabaru'
        WHERE id_akses='$SessionIdAksesPelanggan'") or die(mysqli_error($Conn)); 
        if($UpdateFoto){
            if(!empty($DataSessionAkses['foto'])){
                if(file_exists($UrlFotoLama)){
                    unlink($UrlFotoLama);
                }
            }
            $_SESSION ["NotifikasiSwal"]="Ubah Foto Profile Berhasil";
            echo '<small class="text-success" id="NotifikasiUbahFotoBerhasil">Success</small>';
        }else{
            echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data akses</small>';
        }
    }
?>