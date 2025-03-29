<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_akses
    if(empty($_POST['id_akses'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          Access ID Data Undefined.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_akses=$_POST['id_akses'];
        //Buka data askes
        $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
        $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
        $nama= $DataDetailAkses['nama'];
        $kontak= $DataDetailAkses['kontak'];
        $email = $DataDetailAkses['email'];
        $Akses= $DataDetailAkses['akses'];
?>
    <input type="hidden" name="id_akses" value="<?php echo "$id_akses"; ?>">
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="nama_akses">Nama Lengkap</label> 
        </div>
        <div class="col-md-8 mb-3">
            <input type="text" name="nama" id="nama_akses_edit" class="form-control" value="<?php echo "$nama"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="kontak_akses">Kontak</label>
        </div>
        <div class="col-md-8 mb-3">
            <input type="text" name="kontak" id="kontak_akses_edit" class="form-control" value="<?php echo "$kontak"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="email_akses">Email</label>
        </div>
        <div class="col-md-8 mb-3">
        <input type="email" name="email" id="email_akses_edit" class="form-control" value="<?php echo "$email"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="akses">Akses</label>
        </div>
        <div class="col-md-8 mb-3">
            <select name="akses" id="akses" class="form-control">
                <option <?php if($Akses==""){echo "selected";} ?> value="">Pilih</option>
                <option <?php if($Akses=="Pemilik"){echo "selected";} ?> value="Pemilik">Pemilik</option>
                <option <?php if($Akses=="Customer Service"){echo "selected";} ?> value="Customer Service">Customer Service</option>
            </select>
        </div>
    </div>
<?php } ?>