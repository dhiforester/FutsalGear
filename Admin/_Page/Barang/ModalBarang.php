<div class="modal fade" id="ModalTambahBrand" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahBrand">
                <div class="modal-header">
                    <h5 class="modal-title text-dark"><i class="bi bi-plus"></i> Tambah Brand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label for="nama_brand">Nama Brand</label>
                            <input type="text" name="nama_brand" id="nama_brand" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo" id="logo" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12" id="NotifikasiTambahBrand">
                            <span class="text-primary">Pastikan informasi Brand Sudah Sesuai</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
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
<div class="modal fade" id="ModalDetailBrand" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark">
                    <i class="bi bi-info-circle"></i> Detail Brand
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormDetailBrand">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalEditBrand" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditBrand">
                <div class="modal-header">
                    <h5 class="modal-title text-dark"><i class="bi bi-pencil"></i> Edit Brand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="FormEditBrand"></div>
                    <div class="row mb-3">
                        <div class="col-md-12" id="NotifikasiEditBrand">
                            <span class="text-primary">Pastikan informasi Brand Sudah Sesuai</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
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
<div class="modal fade" id="ModalHapusBrand" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesHapusBrand">
                <div class="modal-header">
                    <h5 class="modal-title text-dark"><i class="bi bi-trash"></i> Hapus Brand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_brand" id="PutIdBrand">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <img src="assets/img/question.gif" alt="" width="70%">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12 text-center" id="NotifikasiHapusBrand">
                            <span class="text-primary">
                                Menghapus data brand ini akan menghapus data produk yang termasuk dalam brand tersebut. Apakah anda yakin akan menghapus data brand ini?
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-rounded">
                        <i class="bi bi-check"></i> Ya, Hapus
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalEditLogoBrand" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditLogoBrand">
                <input type="hidden" name="id_brand" id="PutIdBrandImage">
                <div class="modal-header">
                    <h5 class="modal-title text-dark"><i class="bi bi-image"></i> Edit Logo Brand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo_brand_edit" id="logo_brand_edit" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12" id="NotifikasiEditLogoBrand">
                            <span class="text-primary">Pastikan Logo Brand Sudah Sesuai</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
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
<div class="modal fade" id="ModalTambahBarang" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahBarang">
                <div class="modal-header">
                    <h5 class="modal-title text-dark"><i class="bi bi-plus"></i> Tambah Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="FormTambahBarang"></div>
                    <div class="row">
                        <div class="col-md-12" id="NotifikasiTambahBarang">
                            <span class="text-primary">Pastikan form terisi dengan benar</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
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
<div class="modal fade" id="ModalDetailProduk" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark"><i class="bi bi-box"></i> Detail Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormDetailProduk">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalEditProduk" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesEditProduk">
                <div class="modal-header">
                    <h5 class="modal-title text-dark"><i class="bi bi-pencil-alt"></i> Ubah Informasi Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="FormEditProduk"></div>
                    <div class="row">
                        <div class="col-md-12" id="NotifikasiEditProduk">
                            <span class="text-primary">Pastikan form terisi dengan benar</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
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
<div class="modal fade" id="ModalUbahFotoProduk" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesUbahFotoProduk">
                <input type="hidden" name="id_produk" id="PutIdProdukForEditFoto">
                <div class="modal-header">
                    <h5 class="modal-title text-dark"><i class="bi bi-pencil-alt"></i> Ubah Informasi Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="foto">Foto Barang</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                            <small>Format file JPG, JPEG, PNG, GIF (Maksimal 2 mb)</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="NotifikasiUbahFotoProduk">
                            <span class="text-primary">Pastikan foto produk terisi dengan benar</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
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
<div class="modal fade" id="ModalHapusProduk" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesHapusProduk">
                <div class="modal-header">
                    <h5 class="modal-title text-dark"><i class="bi bi-trash"></i> Hapus Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_produk" id="PutIdProdukForDelete">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <img src="assets/img/question.gif" alt="" width="70%">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12 text-center" id="NotifikasiHapusProduk">
                            <span class="text-primary">Apakah anda yakin akan menghapus data produk ini?</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-rounded">
                        <i class="bi bi-check"></i> Ya, Hapus
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tidak
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalVarianProduk" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahVarianProduk">
                <input type="hidden" name="id_produk" id="PutIdProdukVarianProduk">
                <div class="modal-header">
                    <h5 class="modal-title text-dark">
                        <i class="bi bi-list-check"></i> Varian Produk
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-12 sub-title" id="ListVarian">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="grup_variant">Group Variant</label>
                            <input type="text" id="grup_variant" name="grup_variant" list="DataListGrupVariant" class="form-control">
                            <datalist id="DataListGrupVariant">
                                Menampilkan List Group Variant
                            </datalist>
                        </div>
                        <div class="col-md-6">
                            <label for="value_variant">Value</label>
                            <input type="text" id="value_variant" name="value_variant" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12" id="NotifikasiTambahVariant">
                            <small class="text-primary">Pastikan data variant sudah terisi dengan benar</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-rounded">
                        <i class="bi bi-plus"></i> Tambahkan
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalGaleriProduk" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahGaleriProduk">
                <input type="hidden" name="id_produk" id="PutIdProdukGaleriProduk">
                <div class="modal-header">
                    <h5 class="modal-title text-dark">
                        <i class="bi bi-image-alt"></i> Galeri Produk
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-12 sub-title" id="ListGaleri">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="file" id="galeri" name="galeri" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12" id="NotifikasiTambahGaleri">
                            <small class="text-primary">Pastikan file galeri sudah sesuai</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-rounded">
                        <i class="bi bi-download"></i> Upload
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
