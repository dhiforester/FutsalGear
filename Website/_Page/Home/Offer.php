<!-- Offer Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Layanan & Mitra</span></h2>
    <div class="row px-xl-5">
        <?php
            //Menampilkan Layanan
            $query = mysqli_query($Conn, "SELECT*FROM layanan ORDER BY nama_layanan ASC");
            while ($data = mysqli_fetch_array($query)) {
                $id_layanan= $data['id_layanan'];
                $nama_layanan= $data['nama_layanan'];
                $foto= $data['foto'];
        ?>
        <div class="col-md-3">
            <div class="product-offer mb-30" style="height: 300px;">
                <img class="img-fluid" src="<?php echo "$base_url_admin/assets/img/Layanan/$foto"; ?>" alt="">
                <div class="offer-text">
                    <h4 class="text-white mb-3"><?php echo "$nama_layanan"; ?></h3>
                    <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalDetailLayanan" data-id="<?php echo "$id_layanan"; ?>">
                        Selengkapnya
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<!-- Offer End -->