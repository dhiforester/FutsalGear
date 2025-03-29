<div class="modal fade" id="ModalLogout" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>
                            <i class="fas fa-question-circle"></i>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center text-dark">
                        <small>Apakah anda yakin ingin keluar?</small>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <a href="_Page/Logout/Logout.php" class="btn btn-primary">
                    <i class="bi bi-check-circle"></i> Ya
                </a>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle"></i> Tidak
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalUbahFoto" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesUbahFoto">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Foto Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 text-center mb-3">
                            <img src="<?php echo "img/Pelanggan/$SessionGambar"; ?>" alt="" width="100%">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="foto">Pilih Foto</label>
                            <input type="file" class="form-control" name="foto" id="foto">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3" id="NotifikasiUbahFoto">
                            <span class="text-dark">Pilih file foto dan simpan.</span>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalUbahPassword" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesUbahPassword">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="password1">Password Baru</label>
                            <input type="password" class="form-control" name="password1" id="password1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="password2">Ulangi Password</label>
                            <input type="password" class="form-control" name="password2" id="password2">
                        </div>
                    </div>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" class="custom-control-input" id="TampilkanPassword" name="TampilkanPassword" value="Tampilkan">
                        <label class="custom-control-label text-dark" for="TampilkanPassword">Tampilkan Password</label>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3" id="NotifikasiUbahPassword">
                            <span class="text-dark">Pastikan anda mengingat password baru yang digunakan.</span>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalUbahProfile" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesUbahProfile">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?php echo "$SessionNama"; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="kontak">Kontak</label>
                            <input type="text" class="form-control" name="kontak" id="kontak" value="<?php echo "$SessionKontak"; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?php echo "$SessionEmail"; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3" id="NotifikasiUbahProfile">
                            <span class="text-dark">Pastikan anda menggunakan informasi identitas yang valid.</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalKonfirmasiPembayaran" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesKonfirmasiPembayaran">
                <input type="hidden" id="PutIdTransaksiPembayaran" name="id_transaksi">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="rekening"><b>Metode Pembayaran</b></label>
                            <select name="metode_pembayaran" id="metode_pembayaran" class="form-control">
                                <option value="">Pilih</option>
                                <?php
                                    $QryBank = mysqli_query($Conn, "SELECT*FROM bank");
                                    while ($DataBank = mysqli_fetch_array($QryBank)) {
                                        $nama_bank= $DataBank['nama_bank'];
                                        echo '<option value="'.$nama_bank.'">'.$nama_bank.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <b>Cara Pembayaran</b><br>
                            Silahkan lakukan pembayaran melalui transfer sesuai informasi berikut ini :
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3" id="InformasiCaraPembayaran">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <b>Konfirmasi Pembayaran</b><br>
                            Silahkan isi informasi pembayaran yang telah anda lakukan.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="nama">Nama Pemilik Rekening</label>
                            <input type="text" class="form-control" name="nama" id="nama">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="rekening">Nomor Rekening</label>
                            <input type="text" class="form-control" name="rekening" id="rekening">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="bukti_transfer">Bukti Transfer</label>
                            <input type="file" class="form-control" name="bukti_transfer" id="bukti_transfer">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3" id="NotifikasiKonfirmasiPembayaran">
                            <span class="text-dark">Pastikan anda menggunakan informasi pembayaran yang valid.</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalKonfirmasiTransaksiSelesai" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesKonfirmasiTransaksiSelesai">
                <input type="hidden" id="PutIdTransaksiSelesai" name="id_transaksi">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Transaksi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <label for="status_transaksi"><b>Status Traansaksi</b></label>
                            <select name="status_transaksi" id="status_transaksi" class="form-control">
                                <option value="">Pilih</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Dikembalikan">Dikembalikan</option>
                            </select>
                        </div>
                    </div>
                    <div id="FormLanjutanTransaksiSelesai">

                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-4" id="NotifikasiKonfirmasiTransaksiSelesai">
                            <span class="text-dark">Pastikan barang yang sampai sesuai dengan pesanan.</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>