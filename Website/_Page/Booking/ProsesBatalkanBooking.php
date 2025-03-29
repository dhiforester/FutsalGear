<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_kunjungan'])){
        echo '<span class="text-danger">ID Akses tidak dapat ditangkap oleh sistem</span>';
    }else{
        $id_kunjungan=$_POST['id_kunjungan'];
        //Proses hapus data
        $HapusBooking = mysqli_query($Conn, "DELETE FROM booking WHERE id_kunjungan='$id_kunjungan'") or die(mysqli_error($Conn));
        if ($HapusBooking) {
            $_SESSION ["NotifikasiSwal"]="Hapus Booking Berhasil";
            echo '<span class="text-success" id="NotifikasiBatalkanBookingBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Data Gagal</span>';
        }
    }
?>