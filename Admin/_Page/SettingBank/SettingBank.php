<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Berikut ini adalah halaman pengelolaan akun bank.';
                echo '  Data akun bank yang anda tambahkan disini akan digunakan pelanggan untuk melakukan transaksi.';
                echo '  Pastikan semua akun bank yang ada disini sudah sesuai dan aktif.';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <form action="javascript:void(0);" id="ProsesBatas">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="bi bi-search"></i> Cari Akun Bank
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <select name="batas" id="batas" class="form-control">
                                    <option value="5">5</option>
                                    <option selected value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <small>Batas Tampilan Data/Halaman</small>
                            </div>
                            <div class="col-md-12 mb-4">
                                <input type="text" class="form-control" name="keyword" id="keyword" aria-describedby="basic-addon2"  placeholder="Kata Kunci">
                                <small>Kata Kunci</small>
                            </div>
                            <div class="col-md-12 text-center mb-4">
                                <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded">
                                    <i class="bi bi-search"></i> Cari
                                </button>
                            </div>
                            <div class="col-md-12 text-center mb-4">
                                <button type="button" class="btn btn-md btn-primary btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalTambahSettingBank" title="Tambah Akun Bank">
                                    <i class="bi bi-plus-lg"></i> Akun Bank
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div id="MenampilkanSettingBank">

            </div>
        </div>
    </div>
</section>