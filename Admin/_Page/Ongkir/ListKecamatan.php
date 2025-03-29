<?php
    include "../../_Config/Connection.php";
    if(!empty($_POST['kabupaten'])){
        if(!empty($_POST['kecamatan'])){
            $kabupaten=$_POST['kabupaten'];
            $keyword=$_POST['kecamatan'];
            $Qry = mysqli_query($Conn, "SELECT DISTINCT kecamatan FROM ongkir WHERE kabupaten='$kabupaten' AND kecamatan like '%$keyword%' ORDER BY kecamatan ASC");
            while ($Data = mysqli_fetch_array($Qry)) {
                $kecamatan_list= $Data['kecamatan'];
                echo '<option value="'.$kecamatan_list.'">';
            }
        }else{
            $kabupaten=$_POST['kabupaten'];
            $Qry = mysqli_query($Conn, "SELECT DISTINCT kecamatan FROM ongkir WHERE kabupaten='$kabupaten' ORDER BY kecamatan ASC");
            while ($Data = mysqli_fetch_array($Qry)) {
                $kecamatan_list= $Data['kecamatan'];
                echo '<option value="'.$kecamatan_list.'">';
            }
        }
    }else{
        $keyword=$_POST['kecamatan'];
        $Qry = mysqli_query($Conn, "SELECT DISTINCT kecamatan FROM ongkir WHERE kecamatan like '%$keyword%' ORDER BY kecamatan ASC");
        while ($Data = mysqli_fetch_array($Qry)) {
            $kecamatan_list= $Data['kecamatan'];
            echo '<option value="'.$kecamatan_list.'">';
        }
    }
?>