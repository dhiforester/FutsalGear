<div class="modal fade" id="ModalTambahOngkir" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahOngkir" autocomplete="off">
                <input type="hidden" id="PutIdOngkir" name="id_ongkir">
                <input type="hidden" id="ModeFormOngkir" name="ModeFormOngkir">
                <div class="modal-header">
                    <h5 class="modal-title text-dark"><i class="bi bi-plus"></i> Tambah Ongkir</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="provinsi">Provinsi</label>
                            <input type="text" name="provinsi" id="provinsi" list="ListProvinsi" class="form-control">
                            <datalist id="ListProvinsi"></datalist>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="kabupaten">Kabupaten</label>
                            <input type="text" name="kabupaten" id="kabupaten" list="ListKabupaten" class="form-control">
                            <datalist id="ListKabupaten"></datalist>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" name="kecamatan" id="kecamatan" list="ListKecamatan" class="form-control">
                            <datalist id="ListKecamatan"></datalist>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="desa">Desa/Kelurahan</label>
                            <input type="text" name="desa" id="desa" list="ListDesa" class="form-control">
                            <datalist id="ListDesa"></datalist>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="kurir">Kurir</label>
                            <input type="text" name="kurir" id="kurir" list="ListKurir" class="form-control">
                            <datalist id="ListKurir"></datalist>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="ongkir">Ongkir (Rp/Kg)</label>
                            <input type="number" min="0" name="ongkir" id="ongkir" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12" id="NotifikasiTambahOngkir">
                            <span class="text-primary">Pastikan informasi ongkir sudah terisi dengan benar</span>
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
<div class="modal fade" id="ModalHapusOngkir" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesHapusOngkir" autocomplete="off">
                <input type="hidden" id="PutIdOngkirForDelete" name="id_ongkir">
                <div class="modal-header">
                    <h5 class="modal-title text-dark"><i class="bi bi-trash"></i> Hapus Ongkir</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-12 text-center">
                            <img src="assets/img/question.gif" alt="" width="70%">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12 text-center" id="NotifikasiHapusOngkir">
                            <span class="text-primary">
                                Apakah anda yakin akan menghapus data ongkir ini?
                            </span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success btn-rounded btn-block">
                                <i class="bi bi-check"></i> Hapus
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-dark btn-rounded btn-block" data-bs-dismiss="modal">
                                <i class="bi bi-x-circle"></i> Tidak
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>