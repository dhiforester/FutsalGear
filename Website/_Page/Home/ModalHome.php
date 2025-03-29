
<div class="modal fade" id="ModalOrderBooking" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="fa fa-address-book text-primary m-0 mr-2"></i> Order/Booking
                </h3>
            </div>
            <div class="modal-body pre-scrollable">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flex flex-grow flex-col gap-3">
                            <div class="min-h-[20px] flex flex-col items-start gap-4 whitespace-pre-wrap break-words">
                                <div class="markdown prose w-full break-words dark:prose-invert light">
                                    <p>Berikut ini adalah petunjuk langkah demi langkah untuk melakukan pemesanan layanan cukur rambut melalui website cukur rambut:</p>
                                    <ol>
                                        <li>
                                            <p>Buka Website: Buka website cukur rambut menggunakan peramban web di perangkat Anda. Ketikkan alamat website cukur rambut yang sesuai di bilah alamat atau cari melalui mesin pencari.</p>
                                        </li>
                                        <li>
                                            <p>Daftar atau Masuk: Jika Anda belum memiliki akun, cari tautan "Daftar" atau "Buat Akun" di halaman utama website. Klik pada tautan tersebut dan ikuti langkah-langkah untuk membuat akun pelanggan baru. Jika Anda sudah memiliki akun, cari tautan "Masuk" dan masukkan informasi akun Anda untuk login.</p>
                                        </li>
                                        <li>
                                            <p>Pilih Lokasi: Setelah masuk ke website, biasanya akan ada opsi untuk memilih lokasi Anda. Pilihlah lokasi terdekat atau lokasi yang Anda inginkan untuk mendapatkan layanan cukur rambut.</p>
                                        </li>
                                        <li>
                                            <p>Telusuri Layanan: Telusuri atau cari daftar layanan cukur rambut yang tersedia di website. Biasanya, Anda akan menemukan berbagai pilihan seperti potongan rambut, pemotongan jenggot, dan perawatan rambut. Baca deskripsi dan detail setiap layanan untuk memahami apa yang disertakan dan memilih sesuai kebutuhan Anda.</p>
                                        </li>
                                        <li>
                                            <p>Pilih Tanggal dan Waktu: Setelah memilih layanan, pilihlah tanggal dan waktu yang tersedia untuk melakukan pemesanan. Beberapa website mungkin menampilkan kalender interaktif atau formulir dengan opsi waktu yang dapat dipilih. Pilihlah opsi yang sesuai dengan preferensi Anda.</p>
                                        </li>
                                        <li>
                                            <p>Pilih Tukang Cukur atau Salon: Jika ada beberapa tukang cukur atau salon yang tersedia, Anda mungkin perlu memilih salah satu dari mereka. Tinjau profil mitra atau salon yang disediakan, termasuk ulasan dan penilaian jika tersedia, untuk membantu Anda membuat keputusan yang tepat.</p>
                                        </li>
                                        <li>
                                            <p>Konfirmasi Pesanan: Setelah memilih tanggal, waktu, dan tukang cukur atau salon, konfirmasikan pesanan Anda. Biasanya, Anda akan melihat ringkasan pesanan Anda, termasuk tanggal, waktu, layanan yang dipilih, dan harga perkiraan. Pastikan untuk memeriksa kembali detail pesanan Anda sebelum melanjutkan.</p>
                                        </li>
                                        <li>
                                            <p>Pembayaran: Lakukan pembayaran sesuai dengan instruksi yang diberikan di website. Beberapa website mungkin mengharuskan Anda membayar penuh secara online, sementara yang lain mungkin meminta pembayaran tunai atau pembayaran paruh di lokasi. Ikuti langkah-langkah yang diberikan untuk menyelesaikan pembayaran Anda.</p>
                                        </li>
                                        <li>
                                            <p>Terima Konfirmasi: Setelah pembayaran selesai, Anda akan menerima konfirmasi pemesanan melalui email atau pesan di website. Pastikan untuk menyimpan konfirmasi tersebut sebagai bukti dan referensi Anda.</p>
                                        </li>
                                    </ol>
                                    <p>Dengan mengikuti langkah-langkah di atas, Anda dapat melakukan pemesanan layanan cukur rambut melalui website cukur rambut dengan mudah dan praktis.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-md btn-dark" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalPembayaran" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">
                    <i class="fas fa-money-bill text-primary m-0 mr-3"></i> Pembayaran
                </h3>
            </div>
            <div class="modal-body pre-scrollable">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        Berikut ini adalah beberapa metode pembayaran yang tersedia.
                    </div>
                </div>
                <?php
                    //Menampilkan Data Akun Bank
                    $QryBank = mysqli_query($Conn, "SELECT*FROM setting_bank");
                    while ($DataBank = mysqli_fetch_array($QryBank)) {
                        $logo= $DataBank['logo'];
                        $nama_bank= $DataBank['nama_bank'];
                        $rekening= $DataBank['rekening'];
                        $atas_nama= $DataBank['atas_nama'];
                ?>
                <div class="row">
                    <div class="col-3 mb-3">
                        <img src="<?php echo ''.$base_url_admin.'/assets/img/Bank/'.$logo.''; ?>" width="100%">
                    </div>
                    <div class="col-9 mb-3">
                        <?php
                            echo '<b>'.$nama_bank.'</b><br>';
                            echo '<small>'.$rekening.' ('.$atas_nama.')</small><br>';
                        ?>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-md btn-dark" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalSupport" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mt-2 text-center">
                        <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2 text-center">
                        <h3>Support</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3 mb-3 text-center">
                        Anda bisa menghubungi kontak support kami di nomor <br> <?php echo "<h3 class='text-primary'>$kontak</h3>"; ?>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 mt-5 text-center">
                        <button type="button" class="btn btn-md btn-dark" data-bs-dismiss="modal" aria-label="Close">
                            <i class="bi bi-x"></i> Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalLoginBerhasil" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mt-2 text-center">
                        <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-2 text-center">
                        <h3>Login Berhasil</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3 mb-3 text-center">
                        Selamat Datang Kembali
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 mt-5 text-center">
                        <button type="button" class="btn btn-md btn-dark" data-bs-dismiss="modal" aria-label="Close">
                            <i class="bi bi-x"></i> Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalDetailLayanan" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Layanan </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormDetailLayanan">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalDetailMitra" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormDetailMitra">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalDetailHairstylist" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Hairstylist </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormDetailHairstylist">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalDetailProduk" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-info-circle"></i> Detail Produk
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormDetailProduk">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalMasukanKeranjang" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormMasukanKeranjang">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalMasukanFavorit" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="FormMasukanFavorit">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalKomentarProduk" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesTambahKomentar">
                <div class="modal-header">
                    <h5 class="modal-title">Komentar Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3" id="ListKomentarProduk">

                        </div>
                    </div>
                    <?php
                        if(empty($SessionIdPelanggan)){
                            echo '<div class="row">';
                            echo '  <div class="col-md-12 text-center text-danger">';
                            echo '      Silahkan login terlebih dulu untuk dapat mengirimkan komentar';
                            echo '  </div>';
                            echo '</div>';
                        }else{
                    ?>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="komentar">Isi Komentar</label>
                                <textarea name="komentar" id="komentar" cols="30" rows="3" class="form-control"></textarea>
                                <small id="NotifikasiKomentar">
                                    <span class="text-dark">Maksimal komentar 200 karakter</span>
                                </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="bi bi-send"></i> Kirim
                                </button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalChatMitra" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="javascript:void(0);" id="ProsesKirimChatKeMitra">
                <div class="modal-header">
                    <h5 class="modal-title">Kirim Chat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3" id="FormKirimPesanChat">

                        </div>
                    </div>
                    <?php
                        if(empty($SessionIdPelanggan)){
                            echo '<div class="row">';
                            echo '  <div class="col-md-12 text-center text-danger">';
                            echo '      <h1><i class="bi bi-emoji-expressionless"></i></h1>';
                            echo '      Silahkan login terlebih dulu untuk dapat mengirimkan pesan';
                            echo '  </div>';
                            echo '</div>';
                        }else{
                    ?>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="pesan"><b>Isi Pesan Disini</b></label>
                                <input type="text" class="form-control" name="pesan" id="pesan">
                                <small id="NotifikasiKirimChat">
                                    <span class="text-dark">Maksimal pesan 200 karakter</span>
                                </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="bi bi-send"></i> Kirim
                                </button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x"></i> Tutup
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>