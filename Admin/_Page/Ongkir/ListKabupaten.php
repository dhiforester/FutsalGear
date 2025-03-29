<?php
    include "../../_Config/Connection.php";
    if(!empty($_POST['provinsi'])){
        if(!empty($_POST['kabupaten'])){
            $provinsi=$_POST['provinsi'];
            $keyword=$_POST['kabupaten'];
            $Qry = mysqli_query($Conn, "SELECT DISTINCT kabupaten FROM ongkir WHERE provinsi='$provinsi' AND kabupaten like '%$keyword%' ORDER BY kabupaten ASC");
            while ($Data = mysqli_fetch_array($Qry)) {
                $kabupaten_list= $Data['kabupaten'];
                echo '<option value="'.$kabupaten_list.'">';
            }
        }else{
            $provinsi=$_POST['provinsi'];
            $Qry = mysqli_query($Conn, "SELECT DISTINCT kabupaten FROM ongkir WHERE provinsi='$provinsi' ORDER BY kabupaten ASC");
            while ($Data = mysqli_fetch_array($Qry)) {
                $kabupaten_list= $Data['kabupaten'];
                echo '<option value="'.$kabupaten_list.'">';
            }
        }
    }else{
        $keyword=$_POST['kabupaten'];
        $Qry = mysqli_query($Conn, "SELECT DISTINCT kabupaten FROM ongkir WHERE kabupaten like '%$keyword%' ORDER BY kabupaten ASC");
        while ($Data = mysqli_fetch_array($Qry)) {
            $kabupaten_list= $Data['kabupaten'];
            echo '<option value="'.$kabupaten_list.'">';
        }
    }
?>