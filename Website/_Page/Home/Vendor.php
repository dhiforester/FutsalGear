<!-- Vendor Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                <?php
                    //Menampilkan Mitra
                    $query = mysqli_query($Conn, "SELECT*FROM mitra ORDER BY nama_mitra ASC");
                    while ($data = mysqli_fetch_array($query)) {
                        $id_mitra= $data['id_mitra'];
                        $nama_mitra= $data['nama_mitra'];
                        $logo= $data['logo'];
                ?>
                    <div class="card border-0">
                        <img src="<?php echo "$base_url_admin/assets/img/Mitra/$logo"; ?>" alt="<?php echo "$nama_mitra" ?>" class="card-img-body">
                        <div class="card-body text-center">
                            <?php echo "<b>$nama_mitra</h4>" ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- Vendor End -->