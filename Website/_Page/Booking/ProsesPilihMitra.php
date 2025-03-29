<?php
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    if(empty($_POST['GetIdMitra'])){
        echo 'Pilih Mitra Terlebih Dulu!';
    }else{
        $GetIdMitra=$_POST['GetIdMitra'];
        //Buka Detail Mitra
        $Qry = mysqli_query($Conn,"SELECT * FROM mitra WHERE id_mitra='$GetIdMitra'")or die(mysqli_error($Conn));
        $Data = mysqli_fetch_array($Qry);
        if(empty($Data['nama_mitra'])){
            echo "ID Mitra Tidak Valid";
        }else{
            $nama_mitra= $Data['nama_mitra'];
            echo '<span id="NotifikasiPilihMitraBerhasil">Success</span>';
            echo '<span id="OptionMitra"><option selected value="'.$GetIdMitra.'">'.$nama_mitra.'</option></span>';
            echo '';
        }
    }

?>