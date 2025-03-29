<!-- Breadcrumb Start -->
<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                    <span class="breadcrumb-item active">Diskon</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-8">
                <div class="row pb-3">
                <?php
                    $Sekarang=date('Y-m-d');
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM diskon WHERE periode_awal<='$Sekarang' AND periode_akhir>='$Sekarang'"));
                    if(empty($jml_data)){
                        echo '<div class="col-12 pb-1">';
                        echo '  <div class="bg-light p-4 mb-30 text-center">';
                        echo '      Tidak ada data barang yang ditampilkan.';
                        echo '  </div>';
                        echo '</div>';
                    }else{
                        $no = 1;
                        //KONDISI PENGATURAN MASING FILTER
                        $query = mysqli_query($Conn, "SELECT*FROM diskon WHERE periode_awal<='$Sekarang' AND periode_akhir>='$Sekarang'");
                        while ($data = mysqli_fetch_array($query)) {
                            $id_diskon= $data['id_diskon'];
                            $id_produk= $data['id_produk'];
                            //Buka produk
                            $QryProduk = mysqli_query($Conn,"SELECT * FROM produk WHERE id_produk='$id_produk'")or die(mysqli_error($Conn));
                            $data = mysqli_fetch_array($QryProduk);
                            $id_produk= $data['id_produk'];
                            $id_brand= $data['id_brand'];
                            $nama_produk= $data['nama_produk'];
                            $brand= $data['brand'];
                            $kategori= $data['kategori'];
                            $deskripsi= $data['deskripsi'];
                            $harga= $data['harga'];
                            $stok= $data['stok'];
                            $foto= $data['foto'];
                            $harga_rp = "Rp " . number_format($harga,0,',','.');
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
                            <div class="col col-6 col-md-3 pb-1">
                                <div class="product-item bg-light mb-4">
                                    <div class="product-img position-relative overflow-hidden">
                                        <img class="img-fluid w-100" src="<?php echo "$base_url/assets/img/Barang/$foto"; ?>" alt="">
                                        <div class="product-action">
                                            <a class="btn btn-outline-dark btn-square" href="index.php?Page=Produk&Sub=Detail&id=<?php echo "$id_produk"; ?>" title="Lihat Detail Produk">
                                                <i class="bi bi-info-circle"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="text-center py-4">
                                        <a class="h6 text-decoration-none text-truncate" href="index.php?Page=Produk&Sub=Detail&id=<?php echo "$id_produk"; ?>" title="Lihat Detail Produk">
                                            <?php echo "$nama_produk"; ?>
                                        </a>
                                        <br>
                                        <small>
                                            <i class="bi bi-tags"></i></i> <?php echo "$kategori"; ?>
                                        </small>
                                        <div class="d-flex align-items-center justify-content-center mt-2">
                                            <h5><?php echo "$HargaSetelahDiskonRp"; ?></h5>
                                            <h6 class="text-muted ml-2">
                                                <del>
                                                    <?php 
                                                        if(!empty($DataDiskon['id_diskon'])){
                                                            echo "$harga_rp"; 
                                                        }
                                                    ?>
                                                </del>
                                            </h6>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center mb-1">
                                            <small class="fa fa-star <?php if($Reting>=1){echo "text-primary";} ?> mr-1"></small>
                                            <small class="fa fa-star <?php if($Reting>=2){echo "text-primary";} ?> mr-1"></small>
                                            <small class="fa fa-star <?php if($Reting>=3){echo "text-primary";} ?> mr-1"></small>
                                            <small class="fa fa-star <?php if($Reting>=4){echo "text-primary";} ?> mr-1"></small>
                                            <small class="fa fa-star <?php if($Reting>=5){echo "text-primary";} ?> mr-1"></small>
                                            <small>(<?php echo $Reting;?>)</small>
                                        </div>
                                        <p>
                                            <?php
                                                if(empty($stok)){
                                                    echo '<span class="text-danger">Stok Habis</span>';
                                                }else{
                                                    echo '<span class="text-success">Barang Tersedia</span>';
                                                }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                <?php $no++; }} ?>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
</div>
    <!-- Shop End -->