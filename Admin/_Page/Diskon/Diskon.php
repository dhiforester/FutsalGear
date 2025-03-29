<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Berikut ini adalah halaman pengelolaan data diskon.';
                echo '  Anda bisa membuat event promo berdasarkan produk dan periode waktu.';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <form action="javascript:void(0);" id="ProsesBatas">
                    <div class="card-header">
                        <b class="card-title">
                            <i class="bi bi-search"></i> Cari Diskon
                        </b>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <select name="batas" id="batas" class="form-control">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="250">250</option>
                                    <option value="500">500</option>
                                </select>
                                <small>Data</small>
                            </div>
                            <div class="col-md-12 mt-3">
                                <input type="text" name="keyword" id="keyword" class="form-control">
                                <small>Pencarian</small>
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded">
                                    <i class="bi bi-search"></i> Cari
                                </button>
                            </div>
                            <div class="col-md-12 text-center mt-3">
                                <button type="button" class="btn btn-md btn-primary btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalPilihProduk">
                                    <i class="bi bi-plus-lg"></i> Tambah Promo/Diskon
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <b class="card-title">Data Promo Diskon</b>
                </div>
                <div id="MenampilkanTabelDiskon">

                </div>
            </div>
            
        </div>
    </div>
</section>