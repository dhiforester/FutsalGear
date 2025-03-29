<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Berikut ini adalah halaman pengelolaan data ongkir.';
                echo '  Ongkos kirim berlaku kelipatan berat barang /Kg.';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mb-3">
            <div class="card">
                <form action="javascript:void(0);" id="ProsesBatas" autocomplete="off">
                    <input type="hidden" name="page" id="page" value="">
                    <div class="card-header">
                        <b class="card-title">
                            <i class="bi bi-search"></i> Cari Ongkir
                        </b>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2 mt-3">
                                <select name="batas" id="batas" class="form-control">
                                    <option value="5">5</option>
                                    <option selected value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="250">250</option>
                                    <option value="500">500</option>
                                </select>
                                <small>Data</small>
                            </div>
                            <div class="col-md-2 mt-3">
                                <select name="keyword_by" id="keyword_by" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="provinsi">Provinsi</option>
                                    <option value="kabupaten">Kabupaten</option>
                                    <option value="kecamatan">Kecamatan</option>
                                    <option value="desa">Desa</option>
                                    <option value="kurir">Kurir</option>
                                </select>
                                <small>Mode Pencarian</small>
                            </div>
                            <div class="col-md-4 mt-3">
                                <input type="text" name="keyword" id="keyword" list="list_keyword" class="form-control">
                                <datalist id="list_keyword"></datalist>
                                <small>Pencarian</small>
                            </div>
                            <div class="col-md-2 mt-3">
                                <button type="submit" class="btn btn-md btn-dark btn-block btn-rounded">
                                    <i class="bi bi-search"></i> Cari
                                </button>
                            </div>
                            <div class="col-md-2 text-center mt-3">
                                <button type="button" class="btn btn-md btn-primary btn-block btn-rounded" id="TombolTambahOngkir" data-bs-toggle="modal" data-bs-target="#ModalTambahOngkir">
                                    <i class="bi bi-plus-lg"></i> Tambah Ongkir
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <b class="card-title">
                        <i class="bi bi-truck"></i> Data Ongkir
                    </b>
                </div>
                <div id="MenampilkanTabelOngkir">

                </div>
            </div>
            
        </div>
    </div>
</section>