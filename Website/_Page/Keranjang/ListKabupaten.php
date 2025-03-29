<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['provinsi'])){
        echo '<option value="">Pilih</option>';
    }else{
        $provinsi=$_POST['provinsi'];
        echo '<option value="">Pilih</option>';
        $query = mysqli_query($Conn, "SELECT DISTINCT kabupaten FROM ongkir WHERE provinsi='$provinsi' ORDER BY kabupaten ASC");
        while ($data = mysqli_fetch_array($query)) {
            $kabupaten= $data['kabupaten'];
            echo '<option value="'.$kabupaten.'">'.$kabupaten.'</option>';
        }
    }
?>