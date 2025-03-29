<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    //Tangkap id_pelanggan
    if(empty($_POST['id_pelanggan'])){
        echo '<div class="row">';
        echo '  <div class="col-md-12 mb-3 text-danger text-center">';
        echo '      ID Pelanggan Tidak Dapat Ditangkap Oleh Sistem.';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_pelanggan=$_POST['id_pelanggan'];
        //Buka data pasien
        //Buka data pelanggan
        $Qrypelanggan = mysqli_query($Conn,"SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'")or die(mysqli_error($Conn));
        $Datapelanggan = mysqli_fetch_array($Qrypelanggan);
        $id_pelanggan= $Datapelanggan['id_pelanggan'];
        $nama= $Datapelanggan['nama'];
        $kontak= $Datapelanggan['kontak'];
        $email= $Datapelanggan['email'];
        $datetime_daftar= $Datapelanggan['datetime_daftar'];
        $datetime_update= $Datapelanggan['datetime_update'];
?>
    <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?php echo "$id_pelanggan"; ?>">
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="nama">Nama Pelanggan</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?php echo "$nama"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-3">
            <label for="kontak">Kontak</label>
            <input type="text" name="kontak" id="kontak" class="form-control" placeholder="+62" value="<?php echo "$kontak"; ?>">
        </div>
        <div class="col-md-6 mt-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="+62" value="<?php echo "$email"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3" id="NotifikasiEditPelanggan">
            <small class="text-primary">Pastikan data yang anda input sudah benar</small>
        </div>
    </div>
<?php } ?>