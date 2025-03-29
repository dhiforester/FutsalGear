<!-- Carousel Start -->
<div class="container-fluid mb-xl-5 mb-md-1">
    <div class="row px-xl-5">
        <?php if(empty($SessionIdPelanggan)){echo '<div class="col-lg-8">';}else{echo '<div class="col-lg-12">';} ?>
            <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                        $no=1;
                        //menampilkan Hero Banner
                        $QryHero = mysqli_query($Conn, "SELECT*FROM konten_url WHERE kategori_url='Slider' ORDER BY id_konten_url");
                        while ($DataHero = mysqli_fetch_array($QryHero)) {
                            $id_konten_url= $DataHero['id_konten_url'];
                            if($no==1){
                                $active="active";
                            }else{
                                $active="";
                            }
                            $start=$no-1;
                            echo '<li data-target="#header-carousel" data-slide-to="'.$start.'" class="'.$active.'"></li>';
                            $no++;
                        }
                    ?>
                </ol>
                <div class="carousel-inner">
                    <?php
                        $no=1;
                        //menampilkan Hero Banner
                        $QryHero = mysqli_query($Conn, "SELECT*FROM konten_url WHERE kategori_url='Slider' ORDER BY id_konten_url");
                        while ($DataHero = mysqli_fetch_array($QryHero)) {
                            $id_konten_url= $DataHero['id_konten_url'];
                            $nama_url= $DataHero['nama_url'];
                            $konten_url= $DataHero['konten_url'];
                            $text_url= $DataHero['text_url'];
                            $image_url= $DataHero['image_url'];
                            if($no==1){
                                $active="active";
                            }else{
                                $active="";
                            }
                            echo '<div class="carousel-item position-relative '.$active.'" style="height: 430px;">';
                            echo '  <img class="position-absolute w-100 h-100" src="'.$base_url_admin.'/assets/img/Posting/'.$image_url.'" style="object-fit: cover;">';
                            echo '  <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">';
                            echo '      <div class="p-3" style="max-width: 700px;">';
                            echo '          <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">'.$nama_url.'</h1>';
                            echo '          <p class="mx-md-5 px-5 animate__animated animate__bounceIn">'.$text_url.'</p>';
                            echo '          <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="'.$konten_url.'">Selengkapnya</a>';
                            echo '      </div>';
                            echo '  </div>';
                            echo '</div>';
                            $no++;
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php if(empty($SessionIdPelanggan)){ ?>
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="img/cukur.jpeg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Layanan</h6>
                        <h3 class="text-white mb-3">Pendaftaran Pelanggan</h3>
                        <a href="index.php?Page=Pendaftaran" class="btn btn-primary">Daftar sekarang</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="img/cukur2.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Layanan</h6>
                        <h3 class="text-white mb-3">Pendaftaran Mitra</h3>
                        <a href="<?php echo "$base_url_admin/Pendaftaran.php"; ?>" class="btn btn-primary">Daftar sekarang</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- Carousel End -->