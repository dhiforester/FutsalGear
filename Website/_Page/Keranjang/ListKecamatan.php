<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['kabupaten'])){
        echo '<option value="">Pilih</option>';
    }else{
        $kabupaten=$_POST['kabupaten'];
        echo '<option value="">Pilih</option>';
        $query = mysqli_query($Conn, "SELECT DISTINCT kecamatan FROM ongkir WHERE kabupaten='$kabupaten' ORDER BY kecamatan ASC");
        while ($data = mysqli_fetch_array($query)) {
            $kecamatan= $data['kecamatan'];
            echo '<option value="'.$kecamatan.'">'.$kecamatan.'</option>';
        }
    }
?>