<?php
    //Menangkap Get
    if(empty($_GET['id_mitra'])){
        $id_mitra="";
    }else{
        $id_mitra=$_GET['id_mitra'];
    }
    if(empty($_GET['id_hairstylist'])){
        $id_hairstylist="";
    }else{
        $id_hairstylist=$_GET['id_hairstylist'];
    }
    if(empty($_GET['id_mitra_layanan'])){
        $id_mitra_layanan="";
    }else{
        $id_mitra_layanan=$_GET['id_mitra_layanan'];
    }
?>
<!-- Contact Start -->
<div class="container-fluid">
    <!-- <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Login</span></h2> -->
    <div class="row px-xl-5 mt-5">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <div class="contact-form bg-light p-30">
                <form action="javascript:void(0)" id="ProsesLoginBooking">
                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <h3>
                                <i class="bi bi-lock-fill"></i>
                                Form Login
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="TampilkanPassword" name="TampilkanPassword" value="Tampilkan">
                        <label class="custom-control-label text-dark" for="TampilkanPassword">Tampilkan Password</label>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-left mb-3">
                            <p class="help-block" id="NotifikasiLogin">
                                Pastikan Email dan passsword yang anda gunakan sudah benar.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <button class="btn btn-dark  btn-block py-2 px-4" type="submit">
                                Login
                            </button>
                        </div>
                        <div class="col-md-12 text-center mb-3">
                            <a href="google.php?Page=Booking&id_mitra=<?php echo "$id_mitra";?>&id_hairstylist=<?php echo "$id_hairstylist";?>&id_mitra_layanan=<?php echo "$id_mitra_layanan";?>" class="btn btn-dark  btn-block py-2 px-4">
                                Login Dengan Google
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <a href="index.php?Page=LupaPassword" class="btn btn-dark  btn-block py-2 px-4">
                                Lupa Password
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
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
        <div class="col-md-2"></div>
    </div>
</div>
<!-- Contact End -->