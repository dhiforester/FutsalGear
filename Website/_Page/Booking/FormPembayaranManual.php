<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/SettingGeneral.php";
    if(empty($_POST['id_kunjungan'])){
        echo '<div class="row">';
        echo '  <div class="col-md-12 text-center text-danger mb-3">';
        echo '      ID Booking Tidak Boleh Kosong!';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_kunjungan=$_POST['id_kunjungan'];
?>
    <input type="hidden" id="id_kunjungan" name="id_kunjungan" value="<?php echo "$id_kunjungan"; ?>">
    <div class="row">
        <div class="col-md-12 mb-4">
            <label for="nama_bank"><b>Nama Bank</b></label>
            <input type="text" name="nama_bank" id="nama_bank" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-4">
            <label for="norek"><b>Nomor Rekening</b></label>
            <input type="text" name="norek" id="norek" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-4">
            <label for="atas_nama"><b>Nama Pemilik Rekening</b></label>
            <input type="text" name="atas_nama" id="atas_nama" class="form-control">
        </div>
    </div>
<?php } ?>