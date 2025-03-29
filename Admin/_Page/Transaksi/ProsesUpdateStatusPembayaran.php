<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap variabel
    if(empty($_POST['id_transaksi'])){
        echo '<div class="text-danger">ID Transaksi Tidak Boleh Kosong!</div>';
    }else{
        if(empty($_POST['status_pembayaran'])){
            echo '<div class="text-danger">Status Pembayaran Tidak Boleh Kosong!</div>';
        }else{
            $id_transaksi=$_POST['id_transaksi'];
            $status_pembayaran=$_POST['status_pembayaran'];
            $UpdatePembayaran = mysqli_query($Conn,"UPDATE pembayaran SET 
                status='$status_pembayaran'
            WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn));
            if($UpdatePembayaran){
                //Update Transaksi
                $UpdateTransaksi = mysqli_query($Conn,"UPDATE transaksi SET 
                    status_pembayaran='$status_pembayaran'
                WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn));
                if($UpdatePembayaran){
                    $_SESSION ["NotifikasiSwal"]="Update Status Pembayaran Berhasil";
                    echo '<small class="text-success" id="NotifikasiUpdateStatusPembayaranBerhasil">Success</small>';
                }else{
                    echo '<small class="text-danger">Terjadi kesalahan pada saat update transaksi</small>';
                }
            }else{
                echo '<div class="text-danger">Terjadi kesalahan pada saat melakukan update data pembayaran!</div>';
            }
        }
    }
?>