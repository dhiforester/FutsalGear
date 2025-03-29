<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set('Asia/Jakarta');
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    //Validasi pesan tidak boleh kosong
    if(empty($_POST['pesan'])){
        echo 'Pesan Kosong';
    }else{
        //Validasi id_akses tidak boleh kosong
        if(empty($_POST['id_akses'])){
            echo 'Pelanggan Kosong';
        }else{
            $pesan=$_POST['pesan'];
            $id_akses=$_POST['id_akses'];
            $entry="INSERT INTO chat (
                id_akses,
                tanggal,
                pesan,
                kategori,
                status
            ) VALUES (
                '$id_akses',
                '$now',
                '$pesan',
                'From Admin',
                'Terkirim'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                echo 'Terkirim';
            }else{
                echo 'Gagal';
            }
        }
    }
?>