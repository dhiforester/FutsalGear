<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_setting_bank'])){
        echo '<span class="text-danger">ID Setting Bank Tidak Boleh Kosong</span>';
    }else{
        $id_setting_bank=$_POST['id_setting_bank'];
        //Buka data logo
        $QrySettingBank = mysqli_query($Conn,"SELECT * FROM bank WHERE id_setting_bank='$id_setting_bank'")or die(mysqli_error($Conn));
        $DataSettingBank = mysqli_fetch_array($QrySettingBank);
        $logo= $DataSettingBank['logo'];
        //Proses hapus bank
        $HapusSettingBank= mysqli_query($Conn, "DELETE FROM bank WHERE id_setting_bank='$id_setting_bank'") or die(mysqli_error($Conn));
        if($HapusSettingBank) {
            $UrlLogo="../../assets/img/Bank/$logo";
            if(file_exists("$UrlLogo")){
                unlink($UrlLogo);
            }
            echo '<span class="text-success" id="NotifikasiHapusSettingBankBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Setting Bank Date Gagal</span>';
        }
    }
?>