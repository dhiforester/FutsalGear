<div class="modal fade" id="ModalHapusTransaksi" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesHapusTransaksi">
                <input type="hidden" name="id_transaksi" id="PutIdTransaksi">
                <div class="modal-header">
                    <h5 class="modal-title text-dark"><i class="bi bi-trash"></i> Hapus Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="assets/img/delete.gif" alt="" width="100%">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center" id="NotifikasiHapusTransaksi">
                            <span class="text-primary">
                                Apakah anda yakin akan menghapus data transaksi ini?
                            </span>
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
<div class="modal fade" id="ModalUpdateStatusPembayaran" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesUpdateStatusPembayaran">
                <input type="hidden" name="id_transaksi" id="PutIdTransaksiStatusPembayaran">
                <div class="modal-header">
                    <h5 class="modal-title text-dark"><i class="bi bi-pencil"></i> Update Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            Status Pembayaran
                            <ul>
                                <li>
                                    <input type="radio" name="status_pembayaran" id="status_pembayaran_Pending" value="Pending">
                                    <label for="status_pembayaran_Pending">Pending</label>
                                </li>
                                <li>
                                    <input type="radio" name="status_pembayaran" id="status_pembayaran_Lunas" value="Lunas">
                                    <label for="status_pembayaran_Lunas">Lunas</label>
                                </li>
                                <li>
                                    <input type="radio" name="status_pembayaran" id="status_pembayaran_Valid" value="Valid">
                                    <label for="status_pembayaran_Valid">Valid</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="NotifikasiUpdateStatusPembayaran">
                            <span class="text-dark">
                                Apakah anda yakin akan melakukan update pada status transaksi ini?
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-rounded">
                        <i class="bi bi-check"></i> Ya, Update
                    </button>
                    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tidak
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalTambahRiwayatPengiriman" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahRiwayatPengiriman">
                <input type="hidden" name="id_transaksi" id="PutIdTransaksiStatusPengiriman">
                <div class="modal-header">
                    <h5 class="modal-title text-dark">
                        <i class="bi bi-truck"></i> Tambah Riwayat Pengiriman
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label for="no_resi">Nomor Resi</label>
                            <input type="text" name="no_resi" id="no_resi" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" name="keterangan" id="keterangan" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label for="status_pengiriman">Status Pengiriman</label>
                            <select name="status_pengiriman" id="status_pengiriman" class="form-control">
                                <option value="">Pilih</option>
                                <option value="Pending">Pending</option>
                                <option value="Dikirim">Dikirim</option>
                                <option value="Dikembalikan">Dikembalikan</option>
                                <option value="Sampai Tujuan">Sampai Tujuan</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12" id="NotifikasiTambahRiwayatPengiriman">
                            <span class="text-dark">Pastikan riwayat pengirian terisi dengan benar!</span>
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
<div class="modal fade" id="ModalHapusPengiriman" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesHapusPengiriman">
                <input type="hidden" name="id_pengiriman" id="PutIdPengiriman">
                <div class="modal-header">
                    <h5 class="modal-title text-dark"><i class="bi bi-trash"></i> Hapus Pengiriman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="assets/img/delete.gif" alt="" width="100%">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center" id="NotifikasiHapusPengiriman">
                            <span class="text-primary">
                                Apakah anda yakin akan menghapus data Pengiriman ini?
                            </span>
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
