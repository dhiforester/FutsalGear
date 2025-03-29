<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['id_mitra'])){
        $id_mitra="";
    }else{
        $id_mitra=$_POST['id_mitra'];
    }
    echo '<option value="">Pilih</option>';
    //Array Data akses
    $QryAkses = mysqli_query($Conn, "SELECT * FROM akses WHERE akses='Member' AND id_mitra='$id_mitra' ORDER BY nama_akses ASC");
    while ($DataAkses = mysqli_fetch_array($QryAkses)) {
        $id_akses= $DataAkses['id_akses'];
        $nama_akses= $DataAkses['nama_akses'];
        echo '<option value="'.$id_akses.'">'.$nama_akses.'</option>';
    }
?>