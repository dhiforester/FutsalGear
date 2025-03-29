<!-- Categories Start -->
<div class="container-fluid pt-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Brand</span></h2>
    <div class="row px-xl-5 pb-3">
        <?php
            //Menampilkan Kategori
            $query = mysqli_query($Conn, "SELECT*FROM brand ORDER BY nama_brand ASC");
            while ($data = mysqli_fetch_array($query)) {
                $id_brand= $data['id_brand'];
                $nama_brand= $data['nama_brand'];
                $logo= $data['logo'];
                $JumlahProduk = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM produk WHERE id_brand='$id_brand'"));

        ?>
            <div class="col col-6 col-md-3 pb-1">
                <a class="text-decoration-none" href="index.php?Page=Produk&keyword_by=brand&keyword=<?php echo "$nama_brand";?>">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="<?php echo "$base_url/assets/img/brand/$logo"; ?>" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6><?php echo "$nama_brand"; ?></h6>
                            <small class="text-body"><?php echo "$JumlahProduk Produk"; ?></small>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
<!-- Categories End -->