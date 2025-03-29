<?php
    include "_Config/SettingPayment.php";
    //Menangkap Get
    if(empty($_GET['kode_transaksi'])){
        $kode_transaksi="";
    }else{
        $kode_transaksi=$_GET['kode_transaksi'];
    }
    //Buka data Booking
    $id_kunjungan=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'id_kunjungan');
    $id_mitra=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'id_mitra');
    $id_mitra_layanan=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'id_mitra_layanan');
    $id_hairstylist=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'id_hairstylist');
    $id_hairstylist_jadwal=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'id_hairstylist_jadwal');
    $id_setting_bank=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'id_setting_bank');
    $kode_transaksi=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'kode_transaksi');
    $tanggal_booking=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'tanggal_booking');
    $tanggal_dilayani=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'tanggal_dilayani');
    $hari_dilayani=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'hari_dilayani');
    $jam_dilayani=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'jam_dilayani');
    $nama_pelanggan=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'nama_pelanggan');
    $nama_mitra=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'nama_mitra');
    $nama_hairstylist=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'nama_hairstylist');
    $nama_layanan=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'nama_layanan');
    $harga_layanan=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'harga_layanan');
    $diskon_persen=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'diskon_persen');
    $diskon_rp=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'diskon_rp');
    $biaya_adm=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'biaya_adm');
    $ppn_persen=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'ppn_persen');
    $ppn_rp=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'ppn_rp');
    $total=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'total');
    $metode=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'metode');
    $nama_bank=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'nama_bank');
    $no_rek=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'no_rek');
    $atas_nama=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'atas_nama');
    $status_booking=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'status_booking');
    $status_pembayaran=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'status_pembayaran');
    $info_pembayaran=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'info_pembayaran');
    $alasan_batal=getDataDetail($Conn,'booking','kode_transaksi',$kode_transaksi,'alasan_batal');
    if(!empty($info_pembayaran)){
        $info_pembayaran_json =json_decode($info_pembayaran, true);
        $NamaBank=$info_pembayaran_json['nama_bank'];
        $NoRek=$info_pembayaran_json['norek'];
        $AtasNama=$info_pembayaran_json['atas_nama'];
    }else{
        $NamaBank="";
        $NoRek="";
        $AtasNama="";
    }
    //Format Tanggal
    $strtotime1=strtotime($tanggal_booking);
    $strtotime2=strtotime($tanggal_dilayani);
    //Konversi time limit ke detik
    $LimitWaktu=$limit_time*60;
    $ExpiredTime=$strtotime1+$LimitWaktu;
    //Format tanggal
    $tanggal_booking=date('d/m/Y H:i:s',$strtotime1);
    $tanggal_dilayani=date('d/m/Y',$strtotime2);
    $TanggalLimit=date('d/m/Y H:i:s T',$ExpiredTime);
    //Menghitung Interval waktu
    //Awal
    $waktu_awal=date('Y-m-d H:i:s');
    $waktu_awal = new DateTime($waktu_awal);
    //  akhir
    $waktu_akhir=date('Y-m-d H:i:s',$ExpiredTime);
    $waktu_akhir = new DateTime($waktu_akhir);
    // Menghitung interval waktu (durasi) antara dua waktu
    if($waktu_akhir<$waktu_awal){
        $interval =0;
        // Mengambil informasi interval
        $interval_jam =0;
        $interval_menit =0;
        $interval_detik =0;
    }else{
        $interval = $waktu_awal->diff($waktu_akhir);
        // Mengambil informasi interval
        $interval_jam = $interval->format('%h');
        $interval_menit = $interval->format('%i');
        $interval_detik = $interval->format('%s');
    }
    //Format Jam Dilayani
    $jam_dilayani=date('H:i',$jam_dilayani);
    $hari_dilayani=NamaHari($hari_dilayani);
    //Format RP
    if(empty($harga_layanan)){
        $harga_layanan="IDR 0";
    }else{
        $harga_layanan = number_format($harga_layanan, 0, ',', '.');
    }
    if(empty($diskon_rp)){
        $diskon_rp="IDR 0";
    }else{
        $diskon_rp = number_format($diskon_rp, 0, ',', '.');
    }
    if(empty($biaya_adm)){
        $biaya_adm="IDR 0";
    }else{
        $biaya_adm = number_format($biaya_adm, 0, ',', '.');
    }
    if(empty($ppn_rp)){
        $ppn_rp="IDR 0";
    }else{
        $ppn_rp = number_format($ppn_rp, 0, ',', '.');
    }
    if(empty($total)){
        $total="IDR 0";
    }else{
        $total = number_format($total, 0, ',', '.');
    }
    //Routing Status Booking
    if($status_booking=="Pending"){
        $LabelStatusBooking='<span class="badge badge-info"> '.$status_booking.'</span>';
        $WarnaLabelPending="text-danger";
        $WarnaLabelBooking="text-dark";
        $WarnaLabelSelesai="text-dark";
        $WarnaLabelBatal="text-dark";
    }else{
        if($status_booking=="Booking"){
            $LabelStatusBooking='<span class="badge badge-primary"> '.$status_booking.'</span>';
            $WarnaLabelPending="text-dark";
            $WarnaLabelBooking="text-danger";
            $WarnaLabelSelesai="text-dark";
            $WarnaLabelBatal="text-dark";
        }else{
            if($status_booking=="Selesai"){
                $LabelStatusBooking='<span class="badge badge-success">'.$status_booking.'</span>';
                $WarnaLabelPending="text-dark";
                $WarnaLabelBooking="text-dark";
                $WarnaLabelSelesai="text-danger";
                $WarnaLabelBatal="text-dark";
            }else{
                if($status_booking=="Batal"){
                    $LabelStatusBooking='<span class="badge badge-dark">'.$status_booking.'</span>';
                    $WarnaLabelPending="text-dark";
                    $WarnaLabelBooking="text-dark";
                    $WarnaLabelSelesai="text-dark";
                    $WarnaLabelBatal="text-danger";
                }else{
                    $LabelStatusBooking='<span class="badge badge-dark">'.$status_booking.'</span>';
                    $WarnaLabelPending="text-dark";
                    $WarnaLabelBooking="text-dark";
                    $WarnaLabelSelesai="text-dark";
                    $WarnaLabelBatal="text-dark";
                }
            }
        }
    }
    //Routing Status Pembayaran
    if($status_pembayaran=="Pending"){
        $LabelStatusPemabayaran='<span class="badge badge-info"> '.$status_pembayaran.'</span>';
        $WarnaLabelPembPending="text-danger";
        $WarnaLabelPembRequest="text-dark";
        $WarnaLabelPembLunas="text-dark";
        $WarnaLabelPembExpired="text-dark";
        $WarnaLabelPembBatal="text-dark";
    }else{
        if($status_pembayaran=="Request"){
            $LabelStatusPemabayaran='<span class="badge badge-primary"> '.$status_pembayaran.'</span>';
            $WarnaLabelPembPending="text-dark";
            $WarnaLabelPembRequest="text-danger";
            $WarnaLabelPembLunas="text-dark";
            $WarnaLabelPembExpired="text-dark";
            $WarnaLabelPembBatal="text-dark";
        }else{
            if($status_pembayaran=="Lunas"){
                $LabelStatusPemabayaran='<span class="badge badge-success"> '.$status_pembayaran.'</span>';
                $WarnaLabelPembPending="text-dark";
                $WarnaLabelPembRequest="text-dark";
                $WarnaLabelPembLunas="text-danger";
                $WarnaLabelPembExpired="text-dark";
                $WarnaLabelPembBatal="text-dark";
            }else{
                if($status_pembayaran=="Expired"){
                    $LabelStatusPemabayaran='<span class="badge badge-danger"> '.$status_pembayaran.'</span>';
                    $WarnaLabelPembPending="text-dark";
                    $WarnaLabelPembRequest="text-dark";
                    $WarnaLabelPembLunas="text-dark";
                    $WarnaLabelPembExpired="text-danger";
                    $WarnaLabelPembBatal="text-dark";
                }else{
                    if($status_pembayaran=="Batal"){
                        $LabelStatusPemabayaran='<span class="badge badge-dark"> '.$status_pembayaran.'</span>';
                        $WarnaLabelPembPending="text-dark";
                        $WarnaLabelPembRequest="text-dark";
                        $WarnaLabelPembLunas="text-dark";
                        $WarnaLabelPembExpired="text-dark";
                        $WarnaLabelPembBatal="text-danger";
                    }else{
                        $LabelStatusPemabayaran='<span class="badge badge-secondary"> '.$status_pembayaran.'</span>';
                        $WarnaLabelPembPending="text-dark";
                        $WarnaLabelPembRequest="text-dark";
                        $WarnaLabelPembLunas="text-dark";
                        $WarnaLabelPembExpired="text-dark";
                        $WarnaLabelPembBatal="text-dark";
                    }
                }
            }
        }
    }
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                <span class="breadcrumb-item active">Detail Booking</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3">Detail Booking</span>
    </h2>
    <div class="row px-xl-5">
        <div class="col col-12 p-30 bg-light">
            <div class="row">
                <div class="col-md-6">
                    <!-- Informasi Utama Booking -->
                    <div class="row mb-3">
                        <div class="col-md-12"><b>Informasi Umum</b></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">ID.Booking</div>
                        <div class="col-md-6"><code id="PutIdKunjungan"><?php echo "$id_kunjungan"; ?></code></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Kode Transaksi</div>
                        <div class="col-md-6"><code><?php echo "$kode_transaksi"; ?></code></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Tgl.Booking</div>
                        <div class="col-md-6"><code><?php echo "$tanggal_booking"; ?></code></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Tgl.Dilayani</div>
                        <div class="col-md-6"><code><?php echo "$tanggal_dilayani"; ?></code></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Jam Dilayani</div>
                        <div class="col-md-6"><code><?php echo "$jam_dilayani"; ?></code></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Hari Dilayani</div>
                        <div class="col-md-6"><code><?php echo "$hari_dilayani"; ?></code></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Pelanggan</div>
                        <div class="col-md-6"><code><?php echo "$nama_pelanggan"; ?></code></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Mitra</div>
                        <div class="col-md-6"><code><?php echo "$nama_mitra"; ?></code></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Hairstylist</div>
                        <div class="col-md-6"><code><?php echo "$nama_hairstylist"; ?></code></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Layanan</div>
                        <div class="col-md-6"><code><?php echo "$nama_layanan"; ?></code></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-3">
                        <div class="col-md-12"><b>Informasi Pembayaran</b></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Tarif Layanan</div>
                        <div class="col-md-6"><code><?php echo "$harga_layanan"; ?></code></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Diskon</div>
                        <div class="col-md-6"><code><?php echo "$diskon_rp"; ?></code></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Biaya Admin</div>
                        <div class="col-md-6"><code><?php echo "$biaya_adm"; ?></code></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">PPN (<?php echo "$ppn_persen %"; ?>)</div>
                        <div class="col-md-6"><code><?php echo "$ppn_rp"; ?></code></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Total Tagihan</div>
                        <div class="col-md-6"><code><?php echo "$total"; ?></code></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Metode Pembayaran</div>
                        <div class="col-md-6">
                            <code>
                                <?php
                                    echo "$nama_bank <br>"; 
                                    echo "<small>No.Rek: $no_rek </small><br>"; 
                                    echo "<small>A/n: $atas_nama </small><br>"; 
                                ?>
                            </code>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Status Booking</div>
                        <div class="col-md-6"><code><?php echo "$LabelStatusBooking"; ?></code></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">Status Pembayaran</div>
                        <div class="col-md-6"><code><?php echo "$LabelStatusPemabayaran"; ?></code></div>
                    </div>
                    <?php
                        if(!empty($alasan_batal)){
                            echo '<div class="row mb-3">';
                            echo '  <div class="col-md-6">Alasan Pembatalan</div>';
                            echo '  <div class="col-md-6"><code>'.$alasan_batal.'</code></div>';
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
            <?php 
                if($aktif_payment_gateway=="Ya"){ 
                    if(!empty($snap_token)){ 
            ?>
                <div class="row">
                    <div class="col-12 mb-4" id="TombolBayar">
                        <?php
                            $headers = array(
                                'Content-Type:Application/x-www-form-urlencoded',         
                            );
                            //CURL send data
                            $arr = array(
                                "snap_url" => "$snap_url",
                                "client_id" => "$server_key",
                                "snapToken" => "$snap_token"
                            );
                            $json = json_encode($arr);
                            $curl = curl_init();
                            curl_setopt($curl, CURLOPT_URL, "$api_payment_url/GenerateSnapButton.php");
                            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                            curl_setopt($curl, CURLOPT_TIMEOUT, 3); 
                            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
                            curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                            $response = curl_exec($curl);
                            $data =json_decode($response, true);
                            echo "$response";
                        ?>
                    </div>
                </div>
            <?php 
                    } 
                }else{
                    $logo=getDataDetail($Conn,'setting_bank','id_setting_bank',$id_setting_bank,'logo');
                    $UrlLogo="$base_url_admin/assets/img/Bank/$logo";
            ?>
                <?php if($status_pembayaran=="Pending"){ ?>
                    <div class="row">
                        <div class="col-md-12 mb-3 text-center">
                            Silahkan lakukan pembayaran Sebelum:
                            <?php
                                echo '<h4 class="text-danger">'.$TanggalLimit.'</h4>';
                                echo '<small>Apabila transaksi melewati batas waktu yang ditentukan maka secara otomatis akan dibatalkan</small><br>';
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3 text-left">
                            <?php echo "<b>Informasi Bank :</b><br>";?>
                            <img src="<?php echo $UrlLogo;?>" width="100px"><br>
                            <?php echo "<i>$nama_bank</i>";?><br>
                            <?php echo "<i>No.Rek $no_rek</i>";?><br>
                            <?php echo "<i>A/N $atas_nama</i>";?><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3 text-left">
                            <b>Petunjuk Pembayaran :</b><br>
                            <i>Silahkan lakukan tahapan pembayaran sebagai berikut:</i>
                            <ul>
                                <li>
                                    Anda bisa menggunakan ATM atau mendatangi kantor bank terdekat untuk melakukan transfer.
                                </li>
                                <li>
                                    Adapun biaya transfer sesuai kebijakan masing-masing layanan yang anda pilih.
                                </li>
                                <li>
                                    Lakukan transfer sebesar <?php echo '<b>'.$total.'</b>'; ?> ke nomor rekening <?php echo '<b>'.$no_rek.'</b>'; ?> 
                                    untuk akun <?php echo '<b>'.$nama_bank.'</b>'; ?> atas nama <?php echo '<b>'.$atas_nama.'</b>'; ?>
                                </li>
                                <li>
                                    Silahkan lanjutkan memilih tombol bayar pada akhir halaman ini kemudian isi data pembayaran anda.
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
                    <div class="row mb-2">
                        <div class="col-6 mb-1" id="TombolBayar" data-bs-toggle="modal" data-bs-target="#ModalPembayaranManual" data-id="<?php echo $id_kunjungan;?>">
                            <button type="button" class="btn btn-md btn-primary btn-block">
                                Bayar Sekarang
                            </button>
                        </div>
                        <div class="col-6 mb-1">
                            <button type="button" class="btn btn-md btn-danger btn-block" data-bs-toggle="modal" data-bs-target="#ModalBatalkanBooking" data-id="<?php echo $id_kunjungan;?>">
                                Batalkan Booking
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-left">
                            <?php
                                echo 'Sisa Waktu : <i class="text-danger" id="SisaWaktu">'.$interval_jam.' Jam, '.$interval_menit.' Min, '.$interval_detik.' Sec,</i>';
                            ?>
                        </div>
                    </div>
                <?php 
                    }else{
                        echo '<div class="row mb-4">';
                        echo '  <div class="col-md-12 text-center">';
                        echo '      <b>Pembayaran Pelanggan Melalui '.$NamaBank.'</b><br>';
                        echo '      No.Rek: <code>'.$NoRek.'</code><br>';
                        echo '      Atas Nama: <code>'.$AtasNama.'</code><br>';
                        echo '  </div>';
                        echo '</div>';
                        if($status_pembayaran=="Request"){
                            echo '<div class="row  mb-4">';
                            echo '  <div class="col-md-12 text-center">';
                            echo '      <b>Keterangan</b><br>';
                            echo '      Pembayaran sedang menunggu validasi oleh admin kami, silahkan tunggu beberapa saat.';
                            echo '  </div>';
                            echo '</div>';
                        }else{
                            if($status_pembayaran=="Lunas"){
                                echo '<div class="row  mb-4">';
                                echo '  <div class="col-md-12 text-success text-center">';
                                echo '      <h1><i class="bi bi-check-circle"></i></h1>';
                                echo '      Pembayaran Berhasil..';
                                echo '  </div>';
                                echo '</div>';
                            }
                        }
                    }
                    if($status_booking!=="Pending"&&$status_booking!=="Booking"&&$status_booking!=="Batal"){
                        echo '<div class="row  mb-4">';
                        echo '  <div class="col-md-12 text-center text-success">';
                        echo '      <h1>Booking Selesai</h1><br>';
                        echo '      <i class="text-primary">Terima kasih telah menggunakan jasa kami.</i>';
                        echo '  </div>';
                        echo '</div>';
                    }
                ?>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Contact End -->