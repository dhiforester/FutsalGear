<?php
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/SettingGeneral.php";
    include "../../_Config/SettingPayment.php";
    include "../../_Config/Function.php";
    if(!empty($_POST['id_setting_bank'])){
        $id_setting_bank=$_POST['id_setting_bank'];
        $nama_bank=getDataDetail($Conn,'setting_bank','id_setting_bank',$id_setting_bank,'nama_bank');
        $rekening=getDataDetail($Conn,'setting_bank','id_setting_bank',$id_setting_bank,'rekening');
        $atas_nama=getDataDetail($Conn,'setting_bank','id_setting_bank',$id_setting_bank,'atas_nama');
        $logo=getDataDetail($Conn,'setting_bank','id_setting_bank',$id_setting_bank,'logo');
        $UrlLogo="$base_url_admin/assets/img/Bank/$logo";
        echo '<img src="'.$UrlLogo.'" width="100px"><br>';
        echo "<i>$nama_bank</i><br>";
        echo "<i>No.Rek $rekening</i>";
        echo "<i>A/N $atas_nama</i>";
    }
?>