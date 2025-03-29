<?php
    if(empty($_GET['id'])){
        $id_produk="";
    }else{
        $id_produk=$_GET['id'];
    }
    //Buka Informasi Produk
    $QryProduk = mysqli_query($Conn,"SELECT * FROM produk WHERE id_produk='$id_produk'")or die(mysqli_error($Conn));
    $DataProduk = mysqli_fetch_array($QryProduk);
    $id_brand= $DataProduk['id_brand'];
    $nama_produk= $DataProduk['nama_produk'];
    $brand= $DataProduk['brand'];
    $kategori= $DataProduk['kategori'];
    $deskripsi= $DataProduk['deskripsi'];
    $stok= $DataProduk['stok'];
    $harga= $DataProduk['harga'];
    $HargaFormat = "Rp " . number_format($harga,0,',','.');
    $foto= $DataProduk['foto'];
    //Jumlah Galery Produk
    $JumlahGalery = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM produk_galeri WHERE id_produk='$id_produk'"));
    //Menghitung reting
    $JumlahDataReting= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM reting WHERE id_produk='$id_produk'"));
    if(empty($JumlahDataReting)){
        $JumlahReting=0;
        $Reting=0;
    }else{
        $Sum = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(reting) AS reting FROM reting WHERE id_produk='$id_produk'"));
        $JumlahReting = $Sum['reting'];
        $Reting=$JumlahReting/$JumlahDataReting;
    }
    $Reting=round($Reting);
    //Membuka data diskon
    $Sekarang=date('Y-m-d');
    $QryDiskon = mysqli_query($Conn,"SELECT * FROM diskon WHERE id_produk='$id_produk' AND periode_awal<='$Sekarang' AND periode_akhir>='$Sekarang'")or die(mysqli_error($Conn));
    $DataDiskon = mysqli_fetch_array($QryDiskon);
    if(!empty($DataDiskon['id_diskon'])){
        $diskon=$DataDiskon['diskon'];
        $NilaiDiskon=($diskon/100)*$harga;
    }else{
        $diskon="";
        $NilaiDiskon=0;
    }
    $HargaSetelahDiskon=$harga-$NilaiDiskon;
    $HargaSetelahDiskonRp = "Rp " . number_format($HargaSetelahDiskon,0,',','.');
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                    <span class="breadcrumb-item active">Detail Produk</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <form action="javascript:void(0);" id="ProsesTambahkanKeKeranjangBelanja">
        <input type="hidden" name="id_produk" value="<?php echo "$id_produk"; ?>">
        <!-- Shop Detail Start -->
        <div class="container-fluid pb-5">
            <div class="row px-xl-5">
                <div class="col-lg-5 mb-30">
                    <img src="<?php echo "$base_url/assets/img/Barang/$foto"; ?>" alt="" width="100%" class="mb-3">
                    <div id="product-carousel" class="carousel slide text-center" data-ride="carousel">
                        <?php
                            if(empty($JumlahGalery)){
                                echo "";
                            }else{
                                echo '<div class="carousel-inner bg-light">';
                                $no=1;
                                $query = mysqli_query($Conn, "SELECT*FROM produk_galeri WHERE id_produk='$id_produk'");
                                while ($data = mysqli_fetch_array($query)) {
                                    $galeri=$data['galeri'];
                                    if($no=="1"){
                                        echo '<div class="carousel-item active">';
                                        echo '  <img src="'.$base_url.'/assets/img/Barang/'.$galeri.'" alt="'.$galeri.'" width="200px" height="200px">';
                                        echo '</div>';
                                    }else{
                                        echo '<div class="carousel-item">';
                                        echo '  <img src="'.$base_url.'/assets/img/Barang/'.$galeri.'" alt="'.$galeri.'" width="200px" height="200px">';
                                        echo '</div>';
                                    }
                                    
                                    $no++;
                                }
                                echo '</div>';
                                echo '<a class="carousel-control-prev" href="#product-carousel" data-slide="prev">';
                                echo '  <i class="fa fa-2x fa-angle-left text-dark"></i>';
                                echo '</a>';
                                echo '<a class="carousel-control-next" href="#product-carousel" data-slide="next">';
                                echo '  <i class="fa fa-2x fa-angle-right text-dark"></i>';
                                echo '</a>';
                            }
                        ?>
                    </div>
                </div>
                <div class="col-lg-7 h-auto mb-30">
                    <div class="h-100 bg-light p-30">
                        <h3><?php echo "$nama_produk"; ?></h3>
                        <div class="d-flex mb-3">
                            <div class="text-primary mr-2">
                                <?php
                                    if(!empty($Reting)){
                                        for ( $i =1; $i<=$Reting; $i++ ){
                                            echo '<small class="fas fa-star"></small>';
                                        }
                                        echo '<small class="pt-1">('.$JumlahDataReting.' Reviews)</small>';
                                    }
                                ?>
                            </div>
                        </div>
                        <h3 class="font-weight-semi-bold mb-4">
                            <?php
                                echo "$HargaSetelahDiskonRp ";
                                if(!empty($DataDiskon['id_diskon'])){
                                    echo "$HargaSetelahDiskonRp <del>$HargaFormat</del>"; 
                                }
                            ?>
                        </h3>
                        <p class="mb-4"><?php echo "$deskripsi"; ?></p>
                        <?php
                            //Variant
                            $no=1;
                            $QryVariant = mysqli_query($Conn, "SELECT DISTINCT grup_variant FROM produk_varian WHERE id_produk='$id_produk'");
                            while ($DataVariant = mysqli_fetch_array($QryVariant)) {
                                $grup_variant= $DataVariant['grup_variant'];
                                echo '<div class="d-flex mb-3">';
                                echo '  <strong class="text-dark mr-3">'.$grup_variant.' :</strong>';
                                $no2=1;
                                $QryItemVariant = mysqli_query($Conn, "SELECT * FROM produk_varian WHERE id_produk='$id_produk' AND grup_variant='$grup_variant'");
                                while ($DataItemvariant = mysqli_fetch_array($QryItemVariant)) {
                                    $value_variant= $DataItemvariant['value_variant'];
                                    echo '<div class="custom-control custom-radio custom-control-inline">';
                                    echo '  <input type="radio" class="custom-control-input" id="GrupVariant'.$no2.''.$no.'" name="GrupVariant'.$no.'" value="'.$value_variant.'">';
                                    echo '  <label class="custom-control-label" for="GrupVariant'.$no2.''.$no.'">'.$value_variant.'</label>';
                                    echo '</div>';
                                    $no2++;
                                }
                                echo '</div>';
                                $no++;
                            }
                        ?>
                        <div class="d-flex align-items-center mb-4 pt-2">
                            <div class="input-group quantity mr-3" style="width: 130px;">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-primary btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control bg-secondary border-0 text-center" name="qty" value="1">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-shopping-cart mr-1"></i> Add To Cart
                            </button>
                        </div>
                        <div class="d-flex pt-2">
                            <strong class="text-dark mr-2">Brand: <?php echo "$brand"; ?></strong>
                        </div>
                        <div class="d-flex pt-2">
                            <strong class="text-dark mr-2">Stock : <?php echo "$stok"; ?></strong>
                        </div>
                        <div class="d-flex pt-2" id="NotifikasiTambahKeKeranjang"></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
    <!-- Shop Detail End -->