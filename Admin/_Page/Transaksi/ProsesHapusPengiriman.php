<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_pengiriman'])){
        echo '<span class="text-danger">ID Pengiriman Tidak Boleh Kosong!</span>';
    }else{
        $id_pengiriman=$_POST['id_pengiriman'];
        //Proses Hapus Transaksi
        $HapusPengiriman = mysqli_query($Conn, "DELETE FROM pengiriman WHERE id_pengiriman='$id_pengiriman'") or die(mysqli_error($Conn));
        if($HapusPengiriman){
            echo '<span class="text-success" id="NotifikasiHapusPengirimanBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Pengiriman Gagal</span>';
        }
    }
?>