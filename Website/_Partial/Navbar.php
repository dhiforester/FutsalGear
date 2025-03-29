<!-- Navbar Start -->
<div class="container-fluid bg-gelap mb-30">
    <div class="row px-xl-5">

        <!-- tombol search baru start -->
        <div class="col-lg-3 d-none d-lg-block bg-primary">
            <i class="fa fa-search text-dark"></i>
            <input class="btn text-left h-100" data-toggle="collapse" href="#navbar-vertical" id="search-mitra" name="search-mitra" placeholder="Cari Band ?" type="search"></input>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                <div class="navbar-nav w-100">
                    <?php
                        //Menampilkan Data Brand
                        $QryBrand = mysqli_query($Conn, "SELECT*FROM brand ORDER BY nama_brand");
                        while ($DataBrand = mysqli_fetch_array($QryBrand)) {
                            $id_brand= $DataBrand['id_brand'];
                            $nama_brand= $DataBrand['nama_brand'];
                            echo '<a href="index.php?Page=Produk&Sub=Detail&id='.$id_brand.'" class="nav-item nav-link">'.$nama_brand.'</a>';
                        }
                    ?>
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-gelap navbar-dark py-3 py-lg-0 px-0">
                <a href="index.php" class="text-decoration-none d-block d-lg-none">
                    <span class="h1 text-light px-2">
                        <img src="<?php echo $base_url; ?>/assets/img/<?php echo $logo; ?>" width="80px" height="80px">
                        <?php echo "$title_page"; ?>
                    </span>
                    <!-- <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span> -->
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="index.php" class="nav-item nav-link <?php if($Page==""){echo "active";} ?>">Beranda</a>
                        <a href="index.php?Page=Produk" class="nav-item nav-link <?php if($Page=="Produk"){echo "active";} ?>">Produk</a>
                        <a href="index.php?Page=Diskon" class="nav-item nav-link <?php if($Page=="Diskon"){echo "active";} ?>">Diskon</a>
                        <a href="index.php?Page=Tentang" class="nav-item nav-link <?php if($Page=="Tentang"){echo "active";} ?>">Tentang</a>
                        <a href="index.php?Page=Faq" class="nav-item nav-link <?php if($Page=="Faq"){echo "active";} ?>">FAQ</a>
                        <a href="index.php?Page=Testimoni" class="nav-item nav-link <?php if($Page=="Testimoni"){echo "active";} ?>">Testimoni</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0 d-none d-lg-block text-light">
                        <?php 
                            if(!empty($SessionIdAksesPelanggan)){ 
                                $JumlahPesanMasuk= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM chat WHERE id_akses='$SessionIdAksesPelanggan' AND status='Terkirim' AND kategori='From Admin'"));
                                $JumlahKeranjangPelanggan= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM rincian WHERE id_akses='$SessionIdAksesPelanggan' AND id_transaksi='0'"));
                        ?>
                            <a href="index.php?Page=Inbox" class="btn px-0 ml-3">
                                <i class="fas fa-envelope text-light"></i>
                                <?php
                                    if(!empty($JumlahPesanMasuk)){
                                        echo '<span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">'.$JumlahPesanMasuk.'</span>';
                                    }
                                ?>
                            </a>
                            <!-- <a href="index.php?Page=Notifikasi" class="btn px-0 ml-3">
                                <i class="fas fa-bell text-light"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">1</span>
                            </a> -->
                            <a href="index.php?Page=Keranjang" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-light"></i>
                                <?php
                                    if(!empty($JumlahKeranjangPelanggan)){
                                        echo '<span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">'.$JumlahKeranjangPelanggan.'</span>';
                                    }
                                ?>
                            </a>
                            <a href="index.php?Page=Profile" class="btn px-0 ml-3">
                                <img src="<?php echo ''.$base_url.'/assets/img/User/'.$SessionGambar.''; ?>" alt="User Image" width="30px" class="rounded-circle object-fit-cover" style="aspect-ratio: 1/1 !important;">
                            </a>
                        <?php }else{ ?>
                            <a href="index.php?Page=Login" class="btn px-0 text-light">
                                Masuk/Daftar
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar End -->