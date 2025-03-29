<!-- Categories Start -->
<div class="container-fluid mt-xl-5 mt-md-1">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3">
            <a href="index.php?Page=Hairstylist" class="text-dark">Hairstylisty</a>
        </span>
    </h2>
    <div class="row px-xl-5 pb-3">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                <?php
                    //Menampilkan Hairstylist
                    $QryHairstylist = mysqli_query($Conn, "SELECT*FROM hairstylist ORDER BY nama ASC LIMIT 12");
                    while ($DataHairstylist = mysqli_fetch_array($QryHairstylist)) {
                        $id_hairstylist= $DataHairstylist['id_hairstylist'];
                        $id_mitra= $DataHairstylist['id_mitra'];
                        $nama= $DataHairstylist['nama'];
                        $foto= $DataHairstylist['foto'];
                        //buka data mitra
                        $QryMitra = mysqli_query($Conn,"SELECT * FROM mitra WHERE id_mitra='$id_mitra'")or die(mysqli_error($Conn));
                        $DataMitra = mysqli_fetch_array($QryMitra);
                        $NamaMitra= $DataMitra['nama_mitra'];
                ?>
                    <div class="card cat-item border-0 overflow-hidden" onclick='window.location="javascript:void(0);"' class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#ModalDetailHairstylist" data-id="<?php echo "$id_hairstylist"; ?>">
                        <div class="overflow-hidden">
                            <img src="<?php echo "$base_url_admin/assets/img/Hairstylist/$foto"; ?>" class="card-img-body">
                        </div>    
                        <div class="card-body text-center">
                            <?php echo "<h5>$nama</h5>" ?>
                            <?php echo "<small><i class='bi bi-house'></i> $NamaMitra</small>" ?>
                            <!-- <p class="mt-3">
                                <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#ModalDetailHairstylist" data-id="<?php echo "$id_hairstylist"; ?>">
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
            <a href="index.php?Page=Hairstylist">Lihat Selengkapnya</a>
        </div>
    </div> -->
</div>
<!-- Categories End -->