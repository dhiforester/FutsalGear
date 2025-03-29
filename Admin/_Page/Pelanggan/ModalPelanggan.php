<div class="modal fade" id="ModalFilterPelanggan" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesFilterPelanggan">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-light"><i class="bi bi-funnel"></i> Filter Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="FilterBatas">Data</label>
                            <select name="FilterBatas" id="FilterBatas" class="form-control">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="250">250</option>
                                <option value="500">500</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="OrderBy">Order By</label>
                            <select name="OrderBy" id="OrderBy" class="form-control">
                                <option value="">Pilih</option>
                                <option value="nama">Nama</option>
                                <option value="kontak">Kontak</option>
                                <option value="email">Email</option>
                                <option value="datetime_daftar">Tanggal Daftar</option>
                                <option value="datetime_update">Update Terakhir</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="ShortBy">Shot By</label>
                            <select name="ShortBy" id="ShortBy" class="form-control">
                                <option value="ASC">A To Z</option>
                                <option value="DESC">Z To A</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="KeywordBy">Search By</label>
                            <select name="KeywordBy" id="KeywordBy" class="form-control">
                                <option value="">Pilih</option>
                                <option value="nama">Nama</option>
                                <option value="kontak">Kontak</option>
                                <option value="email">Email</option>
                                <option value="datetime_daftar">Tanggal Daftar</option>
                                <option value="datetime_update">Update Terakhir</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3" id="FormFilter">
                            <label for="FilterKeyword">Keyword</label>
                            <input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-info">
                    <button type="submit" class="btn btn-success btn-rounded">
                        <i class="bi bi-save"></i> Filter
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalExportPelanggan" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="_Page/Pelanggan/ExportPelanggan.php" method="POST" target="_blank">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-light"><i class="bi bi-file-excel"></i> Export</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="format">Pilih Format</label>
                            <select name="format" id="format" class="form-control">
                                <option value="HTML">HTML</option>
                                <option value="Excel">Excel</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="keyword_by_export">Periode</label>
                            <select name="keyword_by_export" id="keyword_by_export" class="form-control">
                                <option value="">Semua</option>
                                <option value="datetime_daftar">Tanggal Daftar</option>
                                <option value="datetime_update">Tanggal Update</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3" id="FormKeyword">
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-success">
                    <button type="submit" class="btn btn-primary btn-rounded">
                        <i class="bi bi-check"></i> Export
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tidak
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalTambahPelanggan" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahPelanggan">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-person"></i> Tambah Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormTambahPelanggan">
                    
                </div>
                <div class="modal-footer bg-primary">
                    <button type="submit" class="btn btn-success btn-rounded">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalDetailPelanggan" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light"><i class="bi bi-person"></i> Detail Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="FormDetailPelanggan">
                
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalEditPelanggan" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditPelanggan">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-light"><i class="bi bi-journal-medical"></i> Edit Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormEditPelanggan">
                    
                </div>
                <div class="modal-footer bg-primary">
                    <button type="submit" class="btn btn-success btn-rounded">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalDeletePelanggan" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesDeletePelanggan">
                <input type="hidden" name="id_akses" id="PutIdAksesToDelete">
                <div class="modal-header">
                    <h5 class="modal-title text-dark"><i class="bi bi-trash"></i> Hapus Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                            <div class="col col-md-12 text-center">
                                <span class="modal-icon display-2-lg">
                                    <img src="assets/img/question.gif" width="70%">
                                </span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col col-md-12 text-center" id="NotifikasiHapusPelanggan">
                                <small class="text-primary">Apakah Anda Yakin Akan Menghapus Pelanggan Ini?</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-6 mb-2">
                                <button type="submit" class="btn btn-success btn-block btn-rounded" id="KonfirmasiHapusPelanggan">
                                    <i class="bi bi-check"></i> Ya,Hapus
                                </button>
                            </div>
                            <div class="col col-md-6 mb-2">
                                <button type="button" class="btn btn-dark btn-block btn-rounded" data-bs-dismiss="modal">
                                    <i class="bi bi-x-circle"></i> Tidak
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalEditPassword" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditPassword">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-light"><i class="bi bi-key"></i> Edit Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="FormEditPassword">
                    
                </div>
                <div class="modal-footer bg-info">
                    <button type="submit" class="btn btn-success btn-rounded">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalKonfirmasiPendaftaranKunjungan" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light"><i class="bi bi-link"></i> Pendaftaran Kunjungan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="KonfirmasiPendaftaranKunjungan">
                
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalDetailKunjungan" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-light"><i class="bi bi-link"></i> Detail Kunjungan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="KonfirmasiDetailKunjungan">
                
            </div>
        </div>
    </div>
</div>