<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_pelanggan
    if(empty($_POST['id_pelanggan'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          Access ID Data Undefined.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_pelanggan=$_POST['id_pelanggan'];
?>
    <input type="hidden" name="id_pelanggan" id="id_pelanggan_edit" value="<?php echo "$id_pelanggan"; ?>">
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="password1">Password Baru</label>
            <input type="password" name="password1" id="password1" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="password2">Ulangi Password</label>
            <input type="password" name="password2" id="password2" class="form-control">
            <small class="credit">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Tampilkan" id="TampilkanPassword2" name="TampilkanPassword2">
                <label class="form-check-label" for="TampilkanPassword2">
                    Tampilkan Password
                </label>
            </div>
        </small>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3" id="NotifikasiEditPassword">
            <small class="text-danger">pastikan password yang anda masukan sesuai</small>
        </div>
    </div>
<?php } ?>