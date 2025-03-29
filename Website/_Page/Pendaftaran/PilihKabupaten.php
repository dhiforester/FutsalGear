<?php
    include "../../_Config/Connection.php";
    echo '<option value="">Pilih</option>';
    if(!empty($_POST['provinsi'])){
        $provinsi=$_POST['provinsi'];
        $Qry = mysqli_query($Conn, "SELECT DISTINCT kabupaten FROM ongkir WHERE provinsi='$provinsi'");
        while ($Data = mysqli_fetch_array($Qry)) {
            $kabupaten= $Data['kabupaten'];
            echo '<option value="'.$kabupaten.'">'.$kabupaten.'</option>';
        }
    }
?>