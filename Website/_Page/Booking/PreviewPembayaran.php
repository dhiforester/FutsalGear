<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/SettingGeneral.php";
    if(empty($_POST['id_transaksi'])){
        echo '<div class="row">';
        echo '  <div class="col-md-12 text-center text-danger mb-3">';
        echo '      ID Transaksi Tidak Boleh Kosong!';
        echo '  </div>';
        echo '</div>';
    }else{
        if(empty($_POST['nama_bank'])){
            echo '<div class="row">';
            echo '  <div class="col-md-12 text-center text-danger mb-3">';
            echo '      Silahkan Pilih Metode Pembayaran Terlebih Dulu!';
            echo '  </div>';
            echo '</div>';
        }else{
            $id_transaksi=$_POST['id_transaksi'];
            $nama_bank=$_POST['nama_bank'];
            //Buka data transaksi
            $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
            $DataTransaksi = mysqli_fetch_array($QryTransaksi);
            $id_mitra = $DataTransaksi['id_mitra'];
            $id_pelanggan = $DataTransaksi['id_pelanggan'];
            $tanggal = $DataTransaksi['tanggal'];
            $tagihan = $DataTransaksi['tagihan'];
            $biaya_adm = $DataTransaksi['biaya_adm'];
            $ppn = $DataTransaksi['ppn'];
            $total = $DataTransaksi['total'];
            $metode = $DataTransaksi['metode'];
            $status = $DataTransaksi['status'];
            $StrTransaksi=strtotime($tanggal);
            $TanggalTransaksi=date('d/m/y H:i', $StrTransaksi);
            $NominalTagihan = "Rp " . number_format($tagihan,0,',','.');
            $NominalBiayaAdm = "Rp " . number_format($biaya_adm,0,',','.');
            $NominalPpn = "Rp " . number_format($ppn,0,',','.');
            $NominalTotal = "Rp " . number_format($total,0,',','.');

            //Buka data bank
            $QryBank = mysqli_query($Conn,"SELECT * FROM setting_bank WHERE nama_bank='$nama_bank'")or die(mysqli_error($Conn));
            $DataBank = mysqli_fetch_array($QryBank);
            $id_setting_bank=$DataBank['id_setting_bank'];
            $nama_bank=$DataBank['nama_bank'];
            $rekening=$DataBank['rekening'];
            $atas_nama=$DataBank['atas_nama'];
            if(empty($DataBank['logo'])){
                $UrlLogo="$base_url_admin/assets/img/Bank/No-Image.png";
            }else{
                $logo=$DataBank['logo'];
                $UrlLogo="$base_url_admin/assets/img/Bank/$logo";
            }
?>
    <div class="row">
        <div class="col-md-12 mb-3 text-center">
            <img src="<?php echo $UrlLogo;?>" width="70%">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3 text-center">
            <?php echo "<h4>$nama_bank</h4>";?>
            <?php echo "<b>No.Rek $rekening</b>";?><br>
            <?php echo "<b>A/N $atas_nama</b>";?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <b>Silahkan lakukan tahapan pembayaran sebagai berikut:</b>
            <ul>
                <li>
                    Anda bisa menggunakan ATM atau mendatangi kantor bank terdekat untuk melakukan transfer.
                </li>
                <li>
                    Adapun biaya transfer sesuai kebijakan masing-masing layanan yang anda pilih.
                </li>
                <li>
                    Lakukan transfer sebesar <?php echo '<b>'.$NominalTotal.'</b>'; ?> ke nomor rekening <?php echo '<b>'.$rekening.'</b>'; ?> 
                    untuk akun <?php echo '<b>'.$nama_bank.'</b>'; ?> atas nama <?php echo '<b>'.$atas_nama.'</b>'; ?>
                </li>
                <li>
                    Simpan bukti transfer apabila dibutuhkan sewaktu-waktu.
                </li>
                <li>
                    Tunggu beberapa saat untuk verifikasi oleh petugas kami.
                </li>
                <li>
                    Apabila booking anda belum memperoleh verifikasi pembayaran, silahkan hubungi admin kami pada kontak yang tertera pada halaman web.
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3" id="NotifikasiPembayaranManual">
            Pastikan anda sudah memilih metode pembayaran dengan benar.
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <button type="submit" class="btn btn-primary btn-block">
                <i class="bi bi-check"></i> Lanjtkan
            </button>
        </div>
    </div>
<?php }} ?>