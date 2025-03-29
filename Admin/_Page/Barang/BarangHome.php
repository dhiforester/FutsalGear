<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Berikut ini adalah halaman pengelolaan data produk.';
                echo '  Anda bisa mengelola ketersediaan stok produk dan nama brand.';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <form action="javascript:void(0);" id="ProsesBatas">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="bi bi-search"></i> Pencarian Produk</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <select name="batas" id="batas" class="form-control">
                                    <option value="8">8</option>
                                    <option selected value="16">16</option>
                                    <option value="32">32</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="250">250</option>
                                    <option value="500">500</option>
                                </select>
                                <small>Batas</small>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Kata Kunci" aria-describedby="basic-addon2">
                                    <button type="submit" class="input-group-text" id="basic-addon2">
                                        <i class="bi bi-search"></i> Cari
                                    </button>
                                </div>
                                <small>Pencarian</small>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="button" class="btn btn-md btn-primary btn-rounded btn-block" data-bs-toggle="modal" data-bs-target="#ModalTambahBarang" title="Tambah Barang">
                                    <i class="bi bi-plus-lg"></i> Tambah Produk
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5><i class="bi bi-tag"></i> Brand</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <button type="button" class="btn btn-md btn-primary btn-block btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalTambahBrand" title="Tambah Brand">
                                    <i class="bi bi-plus-lg"></i> Tambah Brand
                                </button>
                            </div>
                        </div>
                        <div id="TabelBrand">
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <div id="MenampilkanTabelBarang"></div>
        </div>
    </div>
    
</section>