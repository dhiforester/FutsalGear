<?php
    //Menghitung Jumlah
    //Jumlah Transaksi
    $JumlahTransaksi = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_akses='$SessionIdAksesPelanggan'"));
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                <span class="breadcrumb-item active">Profile</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Profil Pelanggan</span></h2>
    <div class="row px-xl-5">
        <div class="col-md-3 mb-5">
            <div class="contact-form bg-light p-30">
                <div class="row">
                    <div class="col-md-3">
                        <img src="<?php echo "$base_url/assets/img/User/$SessionGambar"; ?>" alt="" width="100%">
                    </div>
                    <div class="col-md-9">
                        <h4>
                            <?php echo "$SessionNama"; ?>
                        </h4>
                        <small>
                            <?php echo "$SessionEmail"; ?>
                        </small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <a href="javascript:void(0);" class="btn btn-md btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#ModalUbahFoto">
                            <i class="fas fa-image"></i> Ganti Foto
                        </a>
                    </div>
                    <div class="col-md-12 mt-3">
                        <a href="javascript:void(0);" class="btn btn-md btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#ModalUbahPassword">
                            <i class="fas fa-key"></i> Ubah Kata Sandi
                        </a>
                    </div>
                    <div class="col-md-12 mt-3">
                        <a href="javascript:void(0);" class="btn btn-md btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#ModalUbahProfile">
                            <i class="fas fa-user-circle"></i> Ubah Profil
                        </a>
                    </div>
                    <div class="col-md-12 mt-3">
                        <a href="javascript:void(0);" class="btn btn-md btn-dark btn-block" data-bs-toggle="modal" data-bs-target="#ModalLogout">
                            <i class="fas fa-sign-out-alt"></i> Keluar
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1" title="Profil Pelanggan">
                        <i class="fas fa-user-circle"></i> Profil
                    </a>
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2" title="Booking Layanan">
                        <i class="bi bi-ticket"></i> Transaksi (<?php echo $JumlahTransaksi;?>)
                    </a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Profil Pelanggan</h4>
                        <p>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>
                                            <b>Nama Lengkap</b><br>
                                            <?php echo "$SessionNama"; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Email</b><br>
                                            <?php echo "$SessionEmail"; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Kontak</b><br>
                                            <?php echo "$SessionKontak"; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Alamat</b><br>
                                            <?php echo "$SessionAlamat"; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Tanggal Daftar</b><br>
                                            <?php echo "$SessionTanggalDaftar"; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-2">
                        <h4 class="mb-3">Riwayat Transaksi</h4>
                        <p></p>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><b>No</b></th>
                                            <th class="text-center"><b>Tanggal</b></th>
                                            <th class="text-center"><b>Pelanggan</b></th>
                                            <th class="text-center"><b>Tagihan</b></th>
                                            <th class="text-center"><b>Pembayaran</b></th>
                                            <th class="text-center"><b>Pengiriman</b></th>
                                            <th class="text-center"><b>opt</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            //Menampilkan list transaksi
                                            if(empty($JumlahTransaksi)){
                                                echo '<tr>';
                                                echo '  <td colspan="7" class="text-center text-danger">Belum Ada Transaksi Yang Ditampilan</td>';
                                                echo '</tr>';
                                            }else{
                                                $no=1;
                                                //KONDISI PENGATURAN MASING FILTER
                                                $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_akses='$SessionIdAksesPelanggan' ORDER BY id_transaksi DESC");
                                                while ($data = mysqli_fetch_array($query)) {
                                                    $id_transaksi= $data['id_transaksi'];
                                                    $id_akses= $data['id_akses'];
                                                    $id_ongkir= $data['id_ongkir'];
                                                    $tanggal= $data['tanggal'];
                                                    $nama_pelanggan= $data['nama_pelanggan'];
                                                    $alamat= $data['alamat'];
                                                    $metode_pembayaran= $data['metode_pembayaran'];
                                                    $kurir= $data['kurir'];
                                                    $subtotal= $data['subtotal'];
                                                    $ongkir= $data['ongkir'];
                                                    $jumlah= $data['jumlah'];
                                                    $status_pembayaran= $data['status_pembayaran'];
                                                    $status_pengiriman= $data['status_pengiriman'];
                                                    //Format tanggal
                                                    $strtotime=strtotime($tanggal);
                                                    $TanggalFormat=date('d/m/Y H:i:s',$strtotime);
                                                    //Format Rupiah
                                                    $JumlahFormat = "Rp " . number_format($jumlah,0,',','.');
                                                    echo '<tr>';
                                                    echo '  <td class="text-center">'.$no.'</td>';
                                                    echo '  <td class="text-left">'.$TanggalFormat.'</td>';
                                                    echo '  <td class="text-left">'.$nama_pelanggan.'</td>';
                                                    echo '  <td class="text-left">'.$JumlahFormat.'</td>';
                                                    echo '  <td class="text-left">'.$status_pembayaran.'</td>';
                                                    echo '  <td class="text-left">'.$status_pengiriman.'</td>';
                                                    echo '  <td class="text-left">';
                                                    echo '      <a href="index.php?Page=Profile&Sub=DetailTransaksi&id='.$id_transaksi.'" class="btn btn-sm btn-dark">Lihat Detail</a>';
                                                    echo '  </td>';
                                                    echo '</tr>';
                                                    $no++;
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->