<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_mitra
    if(empty($_POST['id_produk'])){
        echo '<div class="row">';
        echo '  <div class="col-md-12 text-center text-danger mb-3">';
        echo '      ID Barang Tidak Boleh Kosong!.';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_produk=$_POST['id_produk'];
        //Buka data barang
        $QryProduk = mysqli_query($Conn,"SELECT * FROM produk WHERE id_produk='$id_produk'")or die(mysqli_error($Conn));
        $DataProduk = mysqli_fetch_array($QryProduk);
        $id_brand= $DataProduk['id_brand'];
        $nama_produk= $DataProduk['nama_produk'];
        $brand= $DataProduk['brand'];
        $kategori= $DataProduk['kategori'];
        $deskripsi= $DataProduk['deskripsi'];
        $stok= $DataProduk['stok'];
        $harga= $DataProduk['harga'];
        $harga = "Rp " . number_format($harga,0,',','.');
        $stok = "Rp " . number_format($stok,0,',','.');
        $foto= $DataProduk['foto'];
?>
    <div class="row mb-3"> 
        <div class="col-md-12 text-center">
            <img src="assets/img/Barang/<?php echo $foto; ?>" width="100%">
        </div>
    </div>
    <div class="row mb-3"> 
        <div class="col-md-6"><dt>ID Produk</dt></div>
        <div class="col-md-6"><?php echo "$id_produk"; ?></div>
    </div>
    <div class="row mb-3"> 
        <div class="col-md-6"><dt>Nama Produk</dt></div>
        <div class="col-md-6"><?php echo "$nama_produk"; ?></div>
    </div>
    <div class="row mb-3"> 
        <div class="col-md-6"><dt>Brand</dt></div>
        <div class="col-md-6"><?php echo "$brand"; ?></div>
    </div>
    <div class="row mb-3"> 
        <div class="col-md-6"><dt>Kategori</dt></div>
        <div class="col-md-6"><?php echo "$kategori"; ?></div>
    </div>
    <div class="row mb-3"> 
        <div class="col-md-6"><dt>Stok</dt></div>
        <div class="col-md-6"><?php echo "$stok"; ?></div>
    </div>
    <div class="row mb-3"> 
        <div class="col-md-6"><dt>Harga</dt></div>
        <div class="col-md-6"><?php echo "$harga"; ?></div>
    </div>
    <div class="row mb-3"> 
        <div class="col-md-12"><dt>Deskripsi</dt></div>
        <div class="col-md-12"><?php echo "$deskripsi"; ?></div>
    </div>
<?php } ?>