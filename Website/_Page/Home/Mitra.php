<!-- Vendor Start -->
<div class="container-fluid mt-xl-5 mt-md-1">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <a href="index.php?Page=Mitra">
            <span class="bg-secondary text-dark pr-3">Mitra</span>
        </a>
    </h2>
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                <?php
                    //Menampilkan Mitra
                    $query = mysqli_query($Conn, "SELECT*FROM mitra ORDER BY nama_mitra ASC LIMIT 12");
                    while ($data = mysqli_fetch_array($query)) {
                        $id_mitra= $data['id_mitra'];
                        $nama_mitra= $data['nama_mitra'];
                        $logo= $data['logo'];
                ?>
                    <div class="card cat-item border-0 overflow-hidden" onclick='window.location="index.php?Page=Mitra&Sub=Detail&id=<?php echo "$id_mitra"; ?>"'>
                        <div class="overflow-hidden">
                            <img src="<?php echo "$base_url_admin/assets/img/Mitra/$logo"; ?>" alt="<?php echo "$nama_mitra" ?>" class="card-img-body">
                        </div>
                        <div class="card-body text-center">
                            <?php echo "<h5>$nama_mitra</h5>" ?>
                            <h5>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                                <i class="bi bi-star"></i>
                            </h5>
                            <!-- <p>
                                <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#ModalDetailMitra" data-id="<?php echo "$id_mitra"; ?>">
                                    <?php echo "Lihat Detail" ?>
                                </a>
                            </p> -->
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- <div class="row px-xl-5 pb-3">
        <div class="col-md-12 mt-5">
            <a href="index.php?Page=Mitra">Lihat Selengkapnya</a>
        </div>
    </div> -->
</div>
<!-- Vendor End -->