<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
?>
<div class="row">
    <div class="col-md-12 mb-3">
        <label for="nama_produk">Nama Produk</label>
        <input type="text" name="nama_produk" id="nama_produk" class="form-control">
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
                    $id_brand= $Databrand['id_brand'];
                    $nama_brand= $Databrand['nama_brand'];
                    echo '<option value="'.$id_brand.'">'.$nama_brand.'</option>';
                }
            ?>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <label for="kategori">Kategori</label>
        <input type="text" name="kategori" id="kategori" list="ListKategori" class="form-control">
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
        <input type="text" name="stok" id="stok" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <label for="harga">Harga (Rp)</label>
        <input type="text" name="harga" id="harga" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mb-3">
        <label for="foto">Foto Barang</label>
        <input type="file" name="foto" id="foto" class="form-control">
        <small>Format file JPG, JPEG, PNG, GIF (Maksimal 2 mb)</small>
    </div>
</div>
