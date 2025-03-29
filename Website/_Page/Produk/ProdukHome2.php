<?php
    //Keyword_by
    if(!empty($_GET['keyword_by'])){
        $keyword_by=$_GET['keyword_by'];
    }else{
        $keyword_by="";
    }
    //keyword
    if(!empty($_GET['keyword'])){
        $keyword=$_GET['keyword'];
    }else{
        $keyword="";
    }
    //batas
    if(!empty($_GET['batas'])){
        $batas=$_GET['batas'];
    }else{
        $batas="12";
    }
    //ShortBy
    if(!empty($_GET['ShortBy'])){
        $ShortBy=$_GET['ShortBy'];
    }else{
        $ShortBy="DESC";
    }
    //OrderBy
    if(!empty($_GET['OrderBy'])){
        $OrderBy=$_GET['OrderBy'];
    }else{
        $OrderBy="id_produk";
    }
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                    <span class="breadcrumb-item active">Produk</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <form action="javascript:void(0);" id="ProsesBatas">
                    <h5 class="section-title position-relative text-uppercase mb-3">
                        <span class="bg-secondary pr-3">Filter</span>
                    </h5>
                    <div class="bg-light p-4 mb-30">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="batas">Batas Data</label>
                                <select name="batas" id="batas" class="form-control">
                                    <option <?php if($batas=="3"){echo "selected";} ?> value="3">3 Item</option>
                                    <option <?php if($batas=="6"){echo "selected";} ?> value="6">6 Item</option>
                                    <option <?php if($batas=="12"){echo "selected";} ?> value="12">12 Item</option>
                                    <option <?php if($batas=="24"){echo "selected";} ?> value="24">24 Item</option>
                                    <option <?php if($batas=="48"){echo "selected";} ?> value="48">48 Item</option>
                                    <option <?php if($batas=="96"){echo "selected";} ?> value="96">96 Item</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="OrderBy">Mode Urutan</label>
                                <select name="OrderBy" id="OrderBy" class="form-control">
                                    <option <?php if($OrderBy==""){echo "selected";} ?> value="">Pilih</option>
                                    <option <?php if($OrderBy=="id_produk"){echo "selected";} ?> value="id_produk">ID Produk</option>
                                    <option <?php if($OrderBy=="nama_produk"){echo "selected";} ?> value="nama_produk">Nama Produk</option>
                                    <option <?php if($OrderBy=="brand"){echo "selected";} ?> value="brand">Brand/Merek</option>
                                    <option <?php if($OrderBy=="kategori"){echo "selected";} ?> value="kategori">Kategori</option>
                                    <option <?php if($OrderBy=="harga"){echo "selected";} ?> value="harga">Harga</option>
                                    <option <?php if($OrderBy=="stok"){echo "selected";} ?> value="stok">Stok</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="ShortBy">Urutan</label>
                                <select name="ShortBy" id="ShortBy" class="form-control">
                                    <option <?php if($ShortBy=="ASC"){echo "selected";} ?> value="ASC">A to Z</option>
                                    <option <?php if($ShortBy=="DESC"){echo "selected";} ?> value="DESC">Z to A</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="keyword_by">Mode Pencarian</label>
                                <select name="keyword_by" id="keyword_by" class="form-control">
                                    <option <?php if($keyword_by==""){echo "selected";} ?> value="">Pilih</option>
                                    <option <?php if($keyword_by=="nama_produk"){echo "selected";} ?> value="nama_produk">Nama Produk</option>
                                    <option <?php if($keyword_by=="brand"){echo "selected";} ?> value="brand">Brand/Merek</option>
                                    <option <?php if($keyword_by=="kategori"){echo "selected";} ?> value="kategori">Kategori</option>
                                    <option <?php if($keyword_by=="harga"){echo "selected";} ?> value="harga">Harga</option>
                                    <option <?php if($keyword_by=="stok"){echo "selected";} ?> value="stok">Stok</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="keyword">Keyword Pencarian</label>
                                <input type="text" name="keyword" class="form-control" value="<?php echo "$keyword" ?>">
                            </div>
                        </div>
                    </div>
                    <!-- Color End -->
                    <button type="submit" class="btn btn-md btn-primary w-100 mb-4">
                        <i class="bi bi-filter-circle"></i> Filter
                    </button>
                </form>
            </div>
            <!-- Shop Sidebar End -->
            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3" id="TabelProduk">
                    
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
</div>
    <!-- Shop End -->