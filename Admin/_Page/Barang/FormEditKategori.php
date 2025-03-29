<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_mitra
    if(empty($_POST['id_barang_kategori'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Kategori Tidak Boleh Kosong!.';
        echo '      </div>';
        echo '  </div>';
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
    <input type="hidden" name="id_barang_kategori" id="id_barang_kategori" value="<?php echo $id_barang_kategori;?>">
    <div class="row">
        <div class="col-md-12 mb-2">
            <input type="text" id="kategori" name="kategori" class="form-control" value="<?php echo $kategori;?>">
            <small for="kategori">Kategori (Maksimal 30 Karakter)</small>
        </div>
        <div class="col-md-12 mb-2">
            <input type="file" id="foto" name="foto" class="form-control">
            <small for="foto">Foto (Format JPEG, JPG, PNG, GIF Maksimal 2 Mb)</small>
        </div>
        <div class="col-md-12 mb-2" id="NotifikasiEditKategori">
            <span class="text-primary">Pastikan kategori sudah sesuai</span>
        </div>
    </div>
<?php } ?>