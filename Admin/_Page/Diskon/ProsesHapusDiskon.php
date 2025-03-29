<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_diskon'])){
        echo '<span class="text-danger">ID Diskon Tidak Boleh Kosong</span>';
    }else{
        $id_diskon=$_POST['id_diskon'];
        //Proses hapus data
        $HapusDiskon= mysqli_query($Conn, "DELETE FROM diskon WHERE id_diskon='$id_diskon'") or die(mysqli_error($Conn));
        if ($HapusDiskon) {
            echo '<span class="text-success" id="NotifikasiHapusDiskonBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Diskon Gagal</span>';
        }
    }
?>