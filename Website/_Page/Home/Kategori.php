<!-- Categories Start -->
<div class="container-fluid pt-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Kategori</span></h2>
    <div class="row px-xl-5 pb-3">
        <?php
            //Menampilkan Kategori
            $query = mysqli_query($Conn, "SELECT DISTINCT kategori FROM produk ORDER BY kategori ASC");
            while ($data = mysqli_fetch_array($query)) {
                $kategori= $data['kategori'];
                $JumlahProduk = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM produk WHERE kategori='$kategori'"));

        ?>
            <div class="col col-6 col-md-3 pb-1">
                <a class="text-decoration-none" href="index.php?Page=Produk&keyword_by=kategori&keyword=<?php echo "$kategori";?>">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="<?php echo "img/tag.png"; ?>" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6><?php echo "$kategori"; ?></h6>
                            <small class="text-body"><?php echo "$JumlahProduk Produk"; ?></small>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
<!-- Categories End -->