<?php
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    if(empty($_POST['GetIdHairstylist'])){
        echo 'Pilih Hairstylist Terlebih Dulu!';
    }else{
        $GetIdHairstylist=$_POST['GetIdHairstylist'];
        //Buka Detail Hairstylist
        $Qry = mysqli_query($Conn,"SELECT * FROM hairstylist WHERE id_hairstylist='$GetIdHairstylist'")or die(mysqli_error($Conn));
        $Data = mysqli_fetch_array($Qry);
        if(empty($Data['id_hairstylist'])){
            echo "ID Hairstylist Tidak Valid";
        }else{
            $id_hairstylist= $Data['id_hairstylist'];
            $Nama= $Data['nama'];
            echo '<span id="NotifikasiPilihHairstylistBerhasil">Success</span>';
            echo '<span id="OptionHairstylist"><option selected value="'.$id_hairstylist.'">'.$Nama.'</option></span>';
            echo '';
        }
    }
?>