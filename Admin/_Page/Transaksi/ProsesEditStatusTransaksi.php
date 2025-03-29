<?php
    //Koneksi
    session_start();
    include "../../_Config/Connection.php";
    if(empty($_POST['id_transaksi'])){
        echo '<span class="text-danger">ID Transaksi Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['StatusTransaksi'])){
            echo '<span class="text-danger">Metode Transaksi Tidak Boleh Kosong!</span>';
        }else{
            $id_transaksi=$_POST['id_transaksi'];
            $StatusTransaksi=$_POST['StatusTransaksi'];
            //proses Update
            $Update = mysqli_query($Conn,"UPDATE transaksi SET 
                status='$StatusTransaksi'
            WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn)); 
            if($Update){
                $_SESSION ["NotifikasiSwal"]="Edit Status Transaksi Berhasil";
                echo '<span class="text-success" id="NotifikasiEditStatusTransaksiBerhasil">Success</span>';
            }else{
                echo '<span class="text-danger">Update Metode Transaksi Gagal!</span>';
            }
        }
    }
?>