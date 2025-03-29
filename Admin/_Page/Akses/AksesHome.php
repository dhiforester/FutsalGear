<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Berikut ini adalah halaman pengelolaan data akses. Anda bisa menambahkan data akses baru untuk <i>Customer Service</i> dan Pemilik.';
                echo '  ';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <form action="javascript:void(0);" id="ProsesBatas">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="bi bi-search"></i> Cari Akses</h5>
                    </div>
                    <div class="card-body">
                        <input type="hidden" name="page" id="PutPage" value="">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <select name="batas" id="batas" class="form-control">
                                    <option value="5">5</option>
                                    <option selected value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="250">250</option>
                                    <option value="500">500</option>
                                </select>
                                <small>Batas Data</small>
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Kata Kunci">
                                <small>Pencarian</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12 text-center mb-3">
                                <button type="submit" class="btn btn-md btn-rounded btn-dark btn-block">
                                    <i class="bi bi-search"></i> Cari
                                </button>
                            </div>
                            <div class="col-md-12 text-center mb-3">
                                <button type="button" class="btn btn-md btn-primary btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalTambahAkses" title="Tambah Akses">
                                    <i class="bi bi-person-plus"></i> Tambah Akses
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-9">
            <div id="MenampilkanTabelAkses"></div>
        </div>
    </div>
</section>