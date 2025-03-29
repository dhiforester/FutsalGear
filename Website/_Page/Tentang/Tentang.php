<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                <span class="breadcrumb-item active">Tentang</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Tentang Kami</span></h2>
    <div class="row px-xl-5">
        <div class="col-lg-6 mb-5">
            <div class="contact-form bg-light p-30">
                <h3>Profil Perusahaan</h3>
                <p>
                    <?php echo "$deskripsi"; ?>
                </p>
                <p class="mb-2">
                    <b class="text-primary"><i class="fa fa-map-marker-alt text-primary mr-3"></i> Alamat :</b><br>
                    <?php echo "$alamat_bisnis"; ?>
                </p>
                <p class="mb-2">
                    <b class="text-primary"> <i class="fa fa-envelope text-primary mr-3"></i> Email :</b><br>
                    <?php echo "$email_bisnis"; ?>
                </p>
                <p class="mb-2">
                    <b class="text-primary"> <i class="fa fa-phone-alt text-primary mr-3"></i> Kontak :</b><br>
                    <?php echo "$telepon_bisnis"; ?>
                </p>
            </div>
        </div>
        <div class="col-lg-6 mb-5">
            <div class="bg-light p-30 mb-30">
                <h3>Peta Lokasi</h3>
                <?php echo "$google_map"; ?>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->