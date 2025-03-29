<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_testimoni'])){
        echo '<span class="text-danger">ID Testimoni tidak dapat ditangkap oleh sistem</span>';
    }else{
        $id_testimoni=$_POST['id_testimoni'];
        //Proses hapus data
        $query = mysqli_query($Conn, "DELETE FROM testimoni WHERE id_testimoni='$id_testimoni'") or die(mysqli_error($Conn));
        if ($query) {
            echo '<span class="text-success" id="NotifikasiHapusTestimoniBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Data Gagal</span>';
        }
    }
?>