<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/Function.php";
    //Tangkap id_mitra
    if(empty($_POST['id_brand'])){
        echo '<div class="row">';
        echo '  <div class="col-md-12 text-center text-danger mb-3">';
        echo '      ID Brand Tidak Boleh Kosong!.';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_brand=$_POST['id_brand'];
        //Buka Data Brand
        $nama_brand=getDataDetail($Conn,'brand','id_brand',$id_brand,'nama_brand');
        $deskripsi=getDataDetail($Conn,'brand','id_brand',$id_brand,'deskripsi');
        $logo=getDataDetail($Conn,'brand','id_brand',$id_brand,'logo');
?>
    <input type="hidden" name="id_brand" id="id_brand" value="<?php echo "$id_brand" ?>">
    <div class="row mb-4">
        <div class="col-md-12">
            <label for="nama_brand">Nama Brand</label>
            <input type="text" name="nama_brand" id="nama_brand" class="form-control" value="<?php echo "$nama_brand"; ?>">
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-12">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control"><?php echo "$deskripsi"; ?></textarea>
        </div>
    </div>
<?php } ?>