<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_pelanggan
    if(empty($_POST['id_pelanggan'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID pelanggan Tidak Bisa Di Tangkap Oleh Sistem.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_pelanggan=$_POST['id_pelanggan'];
        //Buka data pelanggan
        $Qrypelanggan = mysqli_query($Conn,"SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'")or die(mysqli_error($Conn));
        $Datapelanggan = mysqli_fetch_array($Qrypelanggan);
        $id_pelanggan= $Datapelanggan['id_pelanggan'];
        $nama= $Datapelanggan['nama'];
        $kontak= $Datapelanggan['kontak'];
        $email= $Datapelanggan['email'];
        $datetime_daftar= $Datapelanggan['datetime_daftar'];
        $datetime_update= $Datapelanggan['datetime_update'];
        date_default_timezone_set('Asia/Jakarta');
        $datetime_daftar= strtotime($datetime_daftar);
        $datetime_update= strtotime($datetime_update);
        $datetime_daftar=date('d/m/Y H:i', $datetime_daftar);
        $datetime_update=date('d/m/Y H:i', $datetime_update);
?>
    <div class="modal-body">
        <div class="row mt-2"> 
            <div class="col-md-5"><dt>ID Pelanggan</dt></div>
            <div class="col-md-7"><?php echo $id_pelanggan; ?></div>
        </div>
        <div class="row mt-2"> 
            <div class="col-md-5"><dt>Nama Lengkap</dt></div>
            <div class="col-md-7"><?php echo $nama; ?></div>
        </div>
        <div class="row mt-2"> 
            <div class="col-md-5"><dt>Kontak</dt></div>
            <div class="col-md-7"><?php echo $kontak; ?></div>
        </div>
        <div class="row mt-2"> 
            <div class="col-md-5"><dt>Alamat Email</dt></div>
            <div class="col-md-7"><?php echo $email; ?></div>
        </div>
        <div class="row mt-2"> 
            <div class="col-md-5"><dt>Tanggal Daftar</dt></div>
            <div class="col-md-7"><?php echo $datetime_daftar; ?></div>
        </div>
        <div class="row mt-2"> 
            <div class="col-md-5"><dt>Tanggal Update</dt></div>
            <div class="col-md-7"><?php echo $datetime_update; ?></div>
        </div>
    </div>
    <div class="modal-footer bg-info">
        <a href="index.php?Page=Pelanggan&Sub=Detail&id=<?php echo "$id_pelanggan"; ?>" class="btn btn-success btn-rounded">
            <i class="bi bi-three-dots"></i> Selengkapnya
        </a>
        <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
            <i class="bi bi-x-circle"></i> Tutup
        </button>
    </div>
<?php } ?>