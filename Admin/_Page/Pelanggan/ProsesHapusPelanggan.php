<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_akses'])){
        echo '<span class="text-danger">ID Akses Tidak dapat ditangkap pada saat proses hapus data</span>';
    }else{
        $id_akses=$_POST['id_akses'];
        //Buka Foto Akses
        $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
        $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
        //Proses hapus data
        $HapusAkses = mysqli_query($Conn, "DELETE FROM akses WHERE id_akses='$id_akses'") or die(mysqli_error($Conn));
        if ($HapusAkses) {
            $HapusPelanggan = mysqli_query($Conn, "DELETE FROM pelanggan WHERE id_akses='$id_akses'") or die(mysqli_error($Conn));
            if($HapusPelanggan){
                if(!empty($DataDetailAkses['foto'])){
                    $gambar=$DataDetailAkses['foto'];
                    $FotoLama = "../../assets/img/User/".$gambar;
                    unlink($FotoLama);
                }
                echo '<span class="text-success" id="NotifikasiHapusPelangganBerhasil">Success</span>';
            }else{
                echo '<span class="text-danger">Terjadi kesalahan pada saat menghapus data pelanggan</span>';
            }
        }else{
            echo '<span class="text-danger">Terjadi kesalahan pada saat menghapus data akses</span>';
        }
    }
?>