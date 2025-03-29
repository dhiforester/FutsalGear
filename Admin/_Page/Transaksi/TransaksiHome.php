<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Berikut ini adalah halaman pengelolaan data transaksi. Dimana anda bisa mengelola semua informasi transaksi yang berlangsung.';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <form action="javascript:void(0);" id="ProsesBatas">
                        <input type="hidden" name="page" id="page">
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
                            <div class="col-md-4 mt-3">
                                <select name="keyword_by" id="keyword_by" class="form-control">
                                    <option value="">Pilih</option>
                                    <option value="tanggal">Tanggal</option>
                                    <option value="nama_pelanggan">Pelanggan</option>
                                    <option value="alamat">Alamat</option>
                                    <option value="metode_pembayaran">Metode Pembayaran</option>
                                    <option value="kurir">Kurir</option>
                                    <option value="status_pembayaran">Status Pembayaran</option>
                                    <option value="status_pengiriman">Status Pembayaran</option>
                                </select>
                                <small>Mode Pencarian</small>
                            </div>
                            <div class="col-md-5 mt-3">
                                <input type="text" class="form-control" name="keyword" id="keyword" aria-describedby="basic-addon2"  placeholder="Kata Kunci">
                            </div>
                            <div class="col-md-1 mt-3">
                                <button type="submit" class="btn btn-md btn-dark input-group-text" id="basic-addon2">
                                    <i class="bi bi-search"></i> Cari
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="MenampilkanTabelTransaksi"></div>
</section>