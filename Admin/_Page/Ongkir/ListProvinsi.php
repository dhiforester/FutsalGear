<?php
    include "../../_Config/Connection.php";
    if(!empty($_POST['provinsi'])){
        $keyword=$_POST['provinsi'];
        $QryProvinsi = mysqli_query($Conn, "SELECT DISTINCT provinsi FROM ongkir WHERE provinsi like '%$keyword%' ORDER BY provinsi ASC");
        while ($DataProvinsi = mysqli_fetch_array($QryProvinsi)) {
            $provinsi_list= $DataProvinsi['provinsi'];
            echo '<option value="'.$provinsi_list.'">';
        }
    }else{
        $keyword=$_POST['provinsi'];
        $QryProvinsi = mysqli_query($Conn, "SELECT DISTINCT provinsi FROM ongkir WHERE provinsi like '%$keyword%' ORDER BY provinsi ASC");
        while ($DataProvinsi = mysqli_fetch_array($QryProvinsi)) {
            $provinsi_list= $DataProvinsi['provinsi'];
            echo '<option value="'.$provinsi_list.'">';
        }
    }
?>