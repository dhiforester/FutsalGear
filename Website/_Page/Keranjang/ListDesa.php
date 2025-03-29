<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['kecamatan'])){
        echo '<option value="">Pilih</option>';
    }else{
        $kecamatan=$_POST['kecamatan'];
        echo '<option value="">Pilih</option>';
        $query = mysqli_query($Conn, "SELECT DISTINCT desa FROM ongkir WHERE kecamatan='$kecamatan' ORDER BY desa ASC");
        while ($data = mysqli_fetch_array($query)) {
            $desa= $data['desa'];
            echo '<option value="'.$desa.'">'.$desa.'</option>';
        }
    }
?>