<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set("Asia/Jakarta");
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    //Validasi keberadaan nama
    if(empty($_POST["password1"])){
        echo '<small class="text-danger">Password Baru Tidak Boleh Kosong</small>';
    }else{
        if(empty($_POST["password2"])){
            echo '<small class="text-danger">Password Tidak Sama</small>';
        }else{
            if($_POST["password1"]!==$_POST["password2"]){
                echo '<small class="text-danger">Password Tidak Sama</small>';
            }else{
                $sekarang=date('Y-m-d H:i:s');
                $password1=$_POST["password1"];
                $password2=$_POST["password2"];
                $passwordMd5=md5($password1);
                //QUERY MENYIMPAN DATA PELANGGAN
                $UpdateProfile = mysqli_query($Conn,"UPDATE akses SET 
                    password='$passwordMd5'
                WHERE id_akses='$SessionIdAksesPelanggan'") or die(mysqli_error($Conn)); 
                if($UpdateProfile){
                    $_SESSION ["NotifikasiSwal"]="Edit Password Berhasil";
                    echo '<small class="text-success" id="NotifikasiUbahPasswordBerhasil">Success</small>';
                }else{
                    echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data pelanggan</small>';
                }
            }
        }
    }
?>
