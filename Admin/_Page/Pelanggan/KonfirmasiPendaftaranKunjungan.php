<?php
    if(empty($_POST['id_pasien'])){
        echo '<div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 mb-3 text-danger text-center">';
        echo '          ID Pasien Tidak Dapat Ditangkap Oleh Sistem.';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
        echo '<div class="modal-footer bg-info">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12">';
        echo '          <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">';
        echo '              <i class="bi bi-x-circle"></i> Tutup';
        echo '          </button>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_pasien=$_POST['id_pasien'];
?>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-primary" role="alert">
                Dengan memilih tombol <b>Lanjutkan</b>, maka anda akan diarahkan ke halaman pendaftaran kunjungan.
            </div>
        </div>
    </div>
</div>
<div class="modal-footer bg-info">
    <div class="row">
        <div class="col-md-12">
            <a href="index.php?Page=Kunjungan&Sub=Pendaftaran&id_pasien=<?php echo $id_pasien;?>" class="btn btn-success btn-rounded">
                <i class="bi bi-check"></i> Lanjutkan
            </a>
            <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                <i class="bi bi-x-circle"></i> Tutup
            </button>
        </div>
    </div>
</div>
<?php } ?>