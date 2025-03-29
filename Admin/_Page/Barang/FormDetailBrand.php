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
    <div class="row mb-3"> 
        <div class="col-md-12">
            <img src="assets/img/Brand/<?php echo $logo; ?>" alt="" width="100%">
        </div>
    </div>
    <div class="row mb-3"> 
        <div class="col-md-12">
            <b>Nama Brand :</b>
        </div>
        <div class="col-md-12">
            <?php echo "$nama_brand"; ?>
        </div>
    </div>
    <div class="row mb-3"> 
        <div class="col-md-12">
            <b>Deskripsi :</b>
        </div>
        <div class="col-md-12">
            <?php echo "$deskripsi"; ?>
        </div>
    </div>
<?php } ?>