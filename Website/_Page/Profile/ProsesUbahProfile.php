<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set("Asia/Jakarta");
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    //Validasi keberadaan nama
    if(empty($_POST["nama"])){
        echo '<small class="text-danger">Nama Pelanggan Tidak Boleh Kosong</small>';
    }else{
        if(empty($_POST["kontak"])){
            echo '<small class="text-danger">Kontak Pelanggan Tidak Boleh Kosong</small>';
        }else{
            if(empty($_POST["email"])){
                echo '<small class="text-danger">Email Pelanggan Tidak Boleh Kosong</small>';
            }else{
                $sekarang=date('Y-m-d H:i:s');
                $nama=$_POST["nama"];
                $kontak=$_POST["kontak"];
                $email=$_POST["email"];
                //QUERY MENYIMPAN DATA PELANGGAN
                $UpdateProfile = mysqli_query($Conn,"UPDATE akses SET 
                    nama='$nama',
                    kontak='$kontak',
                    email='$email'
                WHERE id_akses='$SessionIdAksesPelanggan'") or die(mysqli_error($Conn)); 
                if($UpdateProfile){
                    $_SESSION ["NotifikasiSwal"]="Edit Profile Berhasil";
                    echo '<small class="text-success" id="NotifikasiUbahProfileBerhasil">Success</small>';
                }else{
                    echo '<small class="text-danger">Update profile gagal</small>';
                }
            }
        }
    }
?>
