<?php
    include "../../_Config/Connection.php";
    if(!empty($_POST['kecamatan'])){
        if(!empty($_POST['desa'])){
            $kecamatan=$_POST['kecamatan'];
            $desa=$_POST['desa'];
            $Qry = mysqli_query($Conn, "SELECT DISTINCT desa FROM ongkir WHERE kecamatan='$kecamatan' AND desa like '%$keyword%' ORDER BY desa ASC");
            while ($Data = mysqli_fetch_array($Qry)) {
                $desa_list= $Data['desa'];
                echo '<option value="'.$desa_list.'">';
            }
        }else{
            $kecamatan=$_POST['kecamatan'];
            $Qry = mysqli_query($Conn, "SELECT DISTINCT desa FROM ongkir WHERE kecamatan='$kecamatan' ORDER BY kecamatan ASC");
            while ($Data = mysqli_fetch_array($Qry)) {
                $desa_list= $Data['desa'];
                echo '<option value="'.$desa_list.'">';
            }
        }
    }else{
        $keyword=$_POST['desa'];
        $Qry = mysqli_query($Conn, "SELECT DISTINCT desa FROM ongkir WHERE desa like '%$keyword%' ORDER BY desa ASC");
        while ($Data = mysqli_fetch_array($Qry)) {
            $desa_list= $Data['desa'];
            echo '<option value="'.$desa_list.'">';
        }
    }
?>