<?php
    include "../../_Config/Connection.php";
    echo '<option value="">Pilih</option>';
    if(!empty($_POST['kabupaten'])){
        $kabupaten=$_POST['kabupaten'];
        $Qry = mysqli_query($Conn, "SELECT DISTINCT kecamatan FROM ongkir WHERE kabupaten='$kabupaten'");
        while ($Data = mysqli_fetch_array($Qry)) {
            $kecamatan= $Data['kecamatan'];
            echo '<option value="'.$kecamatan.'">'.$kecamatan.'</option>';
        }
    }
?>