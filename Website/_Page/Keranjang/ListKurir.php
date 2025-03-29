<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['desa'])){
        echo '<option value="">Pilih</option>';
    }else{
        $desa=$_POST['desa'];
        echo '<option value="">Pilih</option>';
        $query = mysqli_query($Conn, "SELECT DISTINCT kurir FROM ongkir WHERE desa='$desa' ORDER BY kurir ASC");
        while ($data = mysqli_fetch_array($query)) {
            $kurir= $data['kurir'];
            echo '<option value="'.$kurir.'">'.$kurir.'</option>';
        }
    }
?>