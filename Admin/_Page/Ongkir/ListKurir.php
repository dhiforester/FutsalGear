<?php
    include "../../_Config/Connection.php";
    if(!empty($_POST['kurir'])){
        $keyword=$_POST['kurir'];
        $QryKurir = mysqli_query($Conn, "SELECT DISTINCT kurir FROM ongkir WHERE kurir like '%$keyword%' ORDER BY kurir ASC");
        while ($DataKurir = mysqli_fetch_array($QryKurir)) {
            $kurir_list= $DataKurir['kurir'];
            echo '<option value="'.$kurir_list.'">';
        }
    }else{
        $keyword=$_POST['kurir'];
        $QryKurir = mysqli_query($Conn, "SELECT DISTINCT kurir FROM ongkir WHERE kurir like '%$keyword%' ORDER BY kurir ASC");
        while ($DataKurir = mysqli_fetch_array($QryKurir)) {
            $kurir_list= $DataKurir['kurir'];
            echo '<option value="'.$kurir_list.'">';
        }
    }
?>