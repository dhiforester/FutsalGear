<?php
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    if(empty($_POST['GetIdLayanan'])){
        echo 'Pilih Layanan Terlebih Dulu!';
    }else{
        $GetIdLayanan=$_POST['GetIdLayanan'];
        //Buka Detail Hairstylist
        $Qry = mysqli_query($Conn,"SELECT * FROM mitra_layanan WHERE id_mitra_layanan='$GetIdLayanan'")or die(mysqli_error($Conn));
        $Data = mysqli_fetch_array($Qry);
        if(empty($Data['id_mitra_layanan'])){
            echo "ID Hairstylist Tidak Valid";
        }else{
            $id_mitra_layanan= $Data['id_mitra_layanan'];
            $keterangan=$Data['keterangan'];
            echo '<span id="NotifikasiPilihLayananBerhasil">Success</span>';
            echo '<span id="OptionLayanan"><option selected value="'.$id_mitra_layanan.'">'.$keterangan.'</option></span>';
            echo '';
        }
    }

?>