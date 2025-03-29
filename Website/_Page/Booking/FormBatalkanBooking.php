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
        <div class="col-md-12 mb-4 text-center text-danger">
            <h1>
                <i class="bi bi-question-circle"></i>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-4 text-center text-danger" id="NotifikasiBatalkanBooking">
            <span>Apakah anda yakin akan membatalkan booking ini?</span>
        </div>
    </div>
<?php } ?>