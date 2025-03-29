<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Function.php";
    include "../../_Config/Session.php";
    //Tangkap id_produk
    if(empty($_POST['id_produk'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Produk Tidak Boleh Kosong!.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_produk=$_POST['id_produk'];
        //Buka data Produk
        $QryProduk = mysqli_query($Conn,"SELECT * FROM produk WHERE id_produk='$id_produk'")or die(mysqli_error($Conn));
        $DataProduk = mysqli_fetch_array($QryProduk);
        $id_brand= $DataProduk['id_brand'];
        $nama_produk= $DataProduk['nama_produk'];
        $brand= $DataProduk['brand'];
        $kategori= $DataProduk['kategori'];
        $deskripsi= $DataProduk['deskripsi'];
        $stok= $DataProduk['stok'];
        $harga= $DataProduk['harga'];
?>
    <input type="hidden" name="id_produk" value="<?php echo $id_produk;?>">
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="<?php echo $nama_produk;?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="id_brand">Brand</label>
            <select name="id_brand" id="id_brand" class="form-control">
                <option value="">Pilih</option>
                <?php
                    $QryBrand = mysqli_query($Conn, "SELECT*FROM brand ORDER BY nama_brand ASC");
                    while ($Databrand = mysqli_fetch_array($QryBrand)) {
                        $id_brand_list= $Databrand['id_brand'];
                        $nama_brand_list= $Databrand['nama_brand'];
                        if($id_brand==$id_brand_list){
                            echo '<option selected value="'.$id_brand_list.'">'.$nama_brand_list.'</option>';
                        }else{
                            echo '<option value="'.$id_brand_list.'">'.$nama_brand_list.'</option>';
                        }
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="kategori">Kategori</label>
            <input type="text" name="kategori" id="kategori" list="ListKategori" class="form-control" value="<?php echo $kategori;?>">
            <datalist id="ListKategori">
                <?php
                    $QryKategori = mysqli_query($Conn, "SELECT DISTINCT kategori FROM produk ORDER BY kategori ASC");
                    while ($DataKategori = mysqli_fetch_array($QryKategori)) {
                        $kategori= $DataKategori['kategori'];
                        echo '<option value="'.$kategori.'">'.$kategori.'</option>';
                    }
                ?>
            </datalist>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="stok">Stok</label>
            <input type="text" name="stok" id="stok" class="form-control" value="<?php echo $stok;?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="harga">Harga (Rp)</label>
            <input type="text" name="harga" id="harga" class="form-control" value="<?php echo $harga;?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control"><?php echo $deskripsi;?></textarea>
        </div>
    </div>
<?php } ?>