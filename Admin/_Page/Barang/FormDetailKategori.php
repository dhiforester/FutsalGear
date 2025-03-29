<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_mitra
    if(empty($_POST['id_barang_kategori'])){
        echo ' <div class="modal-body">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 text-center text-danger mb-3">';
        echo '          ID Kategori Tidak Boleh Kosong!.';
        echo '      </div>';
        echo '  </div>';
        echo ' </div>';
        echo ' <div class="modal-footer bg-info">';
        echo '  <div class="row">';
        echo '      <div class="col-md-12 mb-3">';
        echo '          <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">';
        echo '              <i class="bi bi-x-circle"></i> Tutup';
        echo '          </button>';
        echo '      </div>';
        echo '  </div>';
        echo ' </div>';
    }else{
        $id_barang_kategori=$_POST['id_barang_kategori'];
        //Buka data Kategori
        $QryBarang = mysqli_query($Conn,"SELECT * FROM barang_kategori WHERE id_barang_kategori='$id_barang_kategori'")or die(mysqli_error($Conn));
        $DataBarang = mysqli_fetch_array($QryBarang);
        $id_barang_kategori= $DataBarang['id_barang_kategori'];
        $kategori= $DataBarang['kategori'];
        if(!empty($DataBarang['foto'])){
            $foto=$DataBarang['foto'];
            $url_foto="assets/img/Barang/$foto";
        }else{
            $foto="";
            $url_foto="assets/img/no_access.webp";
        }
        //Hitung Jumlah Item
        $JumlahItem = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang WHERE kategori='$kategori'"));
?>
<div class="modal-body">
    <div class="row mt-2"> 
        <div class="col-md-12 text-center">
            <img src="<?php echo $url_foto;?>" alt="<?php echo $kategori;?>" width="70%">
        </div>
    </div>
    <div class="row mt-2"> 
        <div class="col-md-5"><dt>ID Kategori</dt></div>
        <div class="col-md-7"><?php echo "$id_barang_kategori"; ?></div>
    </div>
    <div class="row mt-2"> 
        <div class="col-md-5"><dt>Kategori Barang</dt></div>
        <div class="col-md-7"><?php echo "$kategori"; ?></div>
    </div>
    <div class="row mt-2"> 
        <div class="col-md-5"><dt>Jumlah Item</dt></div>
        <div class="col-md-7"><?php echo "$JumlahItem"; ?></div>
    </div>
</div>
<div class="modal-footer bg-info">
    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
        <i class="bi bi-x-circle"></i> Tutup
    </button>
</div>
<?php } ?>