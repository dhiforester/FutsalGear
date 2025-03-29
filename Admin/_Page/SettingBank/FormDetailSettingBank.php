<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_setting_bank
    if(empty($_POST['id_setting_bank'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Akun Bank Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_setting_bank=$_POST['id_setting_bank'];
        //Buka data layanan
        $QrySettingBank = mysqli_query($Conn,"SELECT * FROM bank WHERE id_setting_bank='$id_setting_bank'")or die(mysqli_error($Conn));
        $DataSettingBank = mysqli_fetch_array($QrySettingBank);
        $id_setting_bank= $DataSettingBank['id_setting_bank'];
        $nama_bank= $DataSettingBank['nama_bank'];
        $rekening= $DataSettingBank['rekening'];
        $atas_nama= $DataSettingBank['atas_nama'];
        $logo= $DataSettingBank['logo'];
?>
    <div class="row">
        <div class="col-md-12 mt-3 text-center">
            <img src="assets/img/Bank/<?php echo "$logo"; ?>" alt="" width="80%">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <b>Nama Bank</b>
        </div>
        <div class="col-md-6">
            <?php echo "$nama_bank";?>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <b>Rekening</b>
        </div>
        <div class="col-md-6">
            <?php echo "$rekening";?>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <b>Atas Nama</b>
        </div>
        <div class="col-md-6">
            <?php echo "$atas_nama";?>
        </div>
    </div>
<?php } ?>