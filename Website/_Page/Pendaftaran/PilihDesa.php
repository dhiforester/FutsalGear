<?php
    include "../../_Config/Connection.php";
    echo '<option value="">Pilih</option>';
    if(!empty($_POST['kecamatan'])){
        $kecamatan=$_POST['kecamatan'];
        $Qry = mysqli_query($Conn, "SELECT DISTINCT desa FROM ongkir WHERE kecamatan='$kecamatan'");
        while ($Data = mysqli_fetch_array($Qry)) {
            $desa= $Data['desa'];
            echo '<option value="'.$desa.'">'.$desa.'</option>';
        }
    }
?>