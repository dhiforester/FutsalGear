<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/SettingGeneral.php";
    //Tangkap id_produk
    if(empty($_POST['id_produk'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-12 mb-3">';
        echo '          ID Produk Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_produk=$_POST['id_produk'];
        //Buka data produk
        $QryProduuk = mysqli_query($Conn,"SELECT * FROM produk WHERE id_produk='$id_produk'")or die(mysqli_error($Conn));
        $DataProduk = mysqli_fetch_array($QryProduuk);
        $nama_produk= $DataProduk['nama_produk'];
        $brand= $DataProduk['brand'];
        $kategori= $DataProduk['kategori'];
        $harga= $DataProduk['harga'];
        $HargaRp = "Rp " . number_format($harga,0,',','.');
        $stok= $DataProduk['stok'];
        $foto= $DataProduk['foto'];
?>
    <div class="row">
        <div class="col-md-4 mt-3 text-center">
            <img src="<?php echo "$base_url/assets/img/Barang/$foto"; ?>" alt="<?php echo $foto;?>" width="100%">
        </div>
        <div class="col-md-8 mt-3">
            <h4><?php echo $nama_produk;?></h4>
            <?php
                echo '<small>Kategori : </small><code>'.$kategori.'</code><br>';
                echo '<small>Brand : </small><code>'.$brand.'</code><br>';
                echo '<small>Harga : </small><code>'.$HargaRp.'</code><br>';
                echo '<small><a href="index.php?Page=Produk&Sub=Detail&id='.$id_produk.'">Lihat Informasi Selengkapnya..</a></small>';
            ?>
        </div>
    </div>
<?php } ?>