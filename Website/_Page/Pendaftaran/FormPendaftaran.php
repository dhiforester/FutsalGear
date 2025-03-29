<?php
    include "_Config/Connection.php";
?>
<!-- Contact Start -->
<div class="container-fluid">
    <!-- <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Login</span></h2> -->
    <div class="row px-xl-5 mt-5">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="contact-form bg-light p-30">
                <form action="javascript:void(0)" id="ProsesPendaftaran">
                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <h3>
                                <i class="bi bi-pencil"></i>
                                Pendaftaran
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="nama">Nama Pelanggan</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="kontak">Nomor Kontak</label>
                            <input type="text" class="form-control" id="kontak" name="kontak" placeholder="62">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="email">Alamat Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="password1">Password</label>
                            <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="password2">Ulangi Password</label>
                            <input type="password" class="form-control" id="password2" name="password2" placeholder="Password">
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="TampilkanPassword2" name="TampilkanPassword2">
                        <label class="custom-control-label text-dark" for="TampilkanPassword2">Tampilkan Password</label>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="SyaratDanKetentuan" name="SyaratDanKetentuan">
                        <label class="custom-control-label text-dark" for="SyaratDanKetentuan">Dengan ini saya telah memahami dan menyutujui <a href="index.php?Page=SyaratKetentuan&id=4">syarat dan ketentuan</a> yang berlaku</label>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-left mb-3">
                            <p class="help-block" id="NotifikasiPendaftaran">
                                Pastikan informasi pendaftaran anda sudah benar.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <button class="btn btn-primary  btn-block py-2 px-4" type="submit">
                                Daftar
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <a href="index.php?Page=Login" class="btn btn-dark  btn-block py-2 px-4">
                                Kembali Ke Halaman Login
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<!-- Contact End -->
<script>
    
</script>