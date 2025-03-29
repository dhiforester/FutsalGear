<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_mitra
    if(empty($_POST['id_setting_bank'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Akun Bank Tidak Boleh Kosong!.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_setting_bank=$_POST['id_setting_bank'];
        //Buka data Setting Bank
        $QrySettingBank = mysqli_query($Conn,"SELECT * FROM bank WHERE id_setting_bank='$id_setting_bank'")or die(mysqli_error($Conn));
        $DataSettingBank = mysqli_fetch_array($QrySettingBank);
        $id_setting_bank= $DataSettingBank['id_setting_bank'];
        $nama_bank= $DataSettingBank['nama_bank'];
        $rekening= $DataSettingBank['rekening'];
        $atas_nama= $DataSettingBank['atas_nama'];
        $logo= $DataSettingBank['logo'];
?>
    <input type="hidden" name="id_setting_bank" id="id_setting_bank" value="<?php echo $id_setting_bank;?>">
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="nama_bank">Nama Bank</label>
            <input type="text" name="nama_bank" id="nama_bank" class="form-control" value="<?php echo $nama_bank;?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="rekening">Nomor Rekening</label>
            <input type="text" name="rekening" id="rekening" class="form-control" value="<?php echo $rekening;?>">
            Maksimal 20 karakter numerik
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="atas_nama">Atas Nama/Pemilik rekening</label>
            <input type="text" name="atas_nama" id="atas_nama" class="form-control" value="<?php echo $atas_nama;?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="logo">Logo Bank</label>
            <input type="file" name="logo" id="logo" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="NotifikasiEditSettingBank">
            <span class="text-primary">Pastikan bahwa informasi data bank yang anda masukan sudah benar</span>
        </div>
    </div>
<?php } ?>