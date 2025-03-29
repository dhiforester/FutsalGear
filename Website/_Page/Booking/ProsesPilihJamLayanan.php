<?php
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    if(empty($_POST['GetIdJadwal'])){
        echo 'Pilih Jam Booking Terlebih Dulu!';
    }else{
        $GetIdJadwal=$_POST['GetIdJadwal'];
        //Buka Detail Jadwal
        $Qry = mysqli_query($Conn,"SELECT * FROM hairstylist_jadwal WHERE id_hairstylist_jadwal='$GetIdJadwal'")or die(mysqli_error($Conn));
        $Data = mysqli_fetch_array($Qry);
        if(empty($Data['id_hairstylist_jadwal'])){
            echo "ID Jadwal Tidak Valid";
        }else{
            $id_hairstylist_jadwal= $Data['id_hairstylist_jadwal'];
            $jam= $Data['jam'];
            $jam=date('H:i',$jam);
            echo '<span id="NotifikasiPilihJamLayananBerhasil">Success</span>';
            echo '<span id="OptionJamLayanan"><option selected value="'.$id_hairstylist_jadwal.'">'.$jam.'</option></span>';
            echo '';
        }
    }

?>