<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_akses'])){
        echo '<span class="text-danger">ID Akses tidak dapat ditangkap oleh sistem</span>';
    }else{
        $id_akses=$_POST['id_akses'];
        //Buka Akses
        $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
        $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
        //Proses hapus data
        $HapusAkses = mysqli_query($Conn, "DELETE FROM akses WHERE id_akses='$id_akses'") or die(mysqli_error($Conn));
        if ($HapusAkses) {
            if(!empty($DataDetailAkses['foto'])){
                $gambar=$DataDetailAkses['foto'];
                $FotoLama = "../../assets/img/User/".$gambar;
                unlink($FotoLama);
            }
            echo '<span class="text-success" id="NotifikasiHapusAksesBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Data Gagal</span>';
        }
    }
?>