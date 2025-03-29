<?php
    session_start();
    include "../../_Config/Connection.php";
    date_default_timezone_set("Asia/Jakarta");
    $now=date('Y-m-d H:i:s');
    //Validasi keberadaan email dan password
    if(empty($_POST["email"])){
        echo '<span class="text-danger">Email tidak boleh kosong!</span>';
    }else{
        if(empty($_POST["password"])){
            echo '<span class="text-danger">Password tidak boleh kosong!</span>';
        }else{
            $email=$_POST["email"];
            $password=$_POST["password"];
            $passwordMd5=md5($password);
            //QUERY MEMANGGIL DATA DARI DATABASE Akses
            $Qry=mysqli_query($Conn,"SELECT*FROM akses WHERE email='$email' AND password='$passwordMd5' AND akses='Pelanggan'")or die(mysqli_error($Conn));
            $DataAkses = mysqli_fetch_array($Qry);
            if(!empty($DataAkses["id_akses"])){
                $id_akses=$DataAkses["id_akses"];
                echo '<span id="NotifikasiProsesLoginBerhasil">Success</span>';
                $_SESSION ["IdAksesPelanggan"]=$DataAkses["id_akses"];
                $_SESSION ["NotifikasiSwal"]="Login Berhasil";
            }else{
                echo '<span class="text-danger">Email dan Password yang anda gunakan tidak valid!</span>';
            }
        }
    }	
?>