<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_ongkir'])){
        echo '<span class="text-danger">ID Ongkir tidak dapat ditangkap oleh sistem</span>';
    }else{
        $id_ongkir=$_POST['id_ongkir'];
        //Proses hapus data
        $HapusOngkir = mysqli_query($Conn, "DELETE FROM ongkir WHERE id_ongkir='$id_ongkir'") or die(mysqli_error($Conn));
        if ($HapusOngkir) {
            echo '<span class="text-success" id="NotifikasiHapusOngkirBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Data Gagal</span>';
        }
    }
?>