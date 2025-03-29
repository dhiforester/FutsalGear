<?php
    if(empty($_GET['id'])){
        echo "ID Transaksi Tidak Boleh Kosong";
    }else{
        $id_transaksi=$_GET['id'];
        //Buka Detal Transaksi
        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
        $id_akses= $DataTransaksi['id_akses'];
        $id_ongkir= $DataTransaksi['id_ongkir'];
        $tanggal= $DataTransaksi['tanggal'];
        $nama_pelanggan= $DataTransaksi['nama_pelanggan'];
        $alamat= $DataTransaksi['alamat'];
        $metode_pembayaran= $DataTransaksi['metode_pembayaran'];
        $kurir= $DataTransaksi['kurir'];
        $subtotal= $DataTransaksi['subtotal'];
        $ongkir= $DataTransaksi['ongkir'];
        $jumlah= $DataTransaksi['jumlah'];
        $status_pembayaran= $DataTransaksi['status_pembayaran'];
        $status_pengiriman= $DataTransaksi['status_pengiriman'];
        //Format tanggal
        $strtotime=strtotime($tanggal);
        $TanggalTransaksi=date('d/m/Y H:i:s');
        //Format Rupiah
        $SubtotalRp = "Rp " . number_format($subtotal,0,',','.');
        $OngkirRp = "Rp " . number_format($ongkir,0,',','.');
        $JumlahRp = "Rp " . number_format($jumlah,0,',','.');
        //Buka Detail Ongkir
        $QryOngkir = mysqli_query($Conn,"SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'")or die(mysqli_error($Conn));
        $DataOngkir = mysqli_fetch_array($QryOngkir);
        $provinsi= $DataOngkir['provinsi'];
        $kabupaten= $DataOngkir['kabupaten'];
        $kecamatan= $DataOngkir['kecamatan'];
        $desa= $DataOngkir['desa'];
        $kurir= $DataOngkir['kurir'];
        //Buka Detail Pengiriman
        $QryResi = mysqli_query($Conn,"SELECT * FROM pengiriman WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataResi = mysqli_fetch_array($QryResi);
        $no_resi= $DataResi['no_resi'];
?>
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                    <span class="breadcrumb-item active">Keranjang</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Contact Start -->
    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Keranjang</span></h2>
        <div class="row px-xl-5 mt-4 mb-4">
            <div class="col-md-12">
                <div class="contact-form bg-light p-30">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <h5>Informasi Transaksi</h5>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <ul>
                                <li>ID Transaksi : <code><?php echo "$id_transaksi"; ?></code></li>
                                <li>ID Pelanggan : <code><?php echo "$id_akses"; ?></code></li>
                                <li>Tgl Transaksi : <code><?php echo "$TanggalTransaksi"; ?></code></li>
                                <li>Metode Pembayaran : <code id="GetMetodePembayaran"><?php echo "$metode_pembayaran"; ?></code></li>
                                <li>Kurir : <code><?php echo "$kurir (No.Resi: $no_resi)"; ?></code></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <h5>Rincian Keranjang</h5>
                            <div class="table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><b>No</b></th>
                                            <th class="text-center"><b>Item Produk</b></th>
                                            <th class="text-center"><b>Harga</b></th>
                                            <th class="text-center"><b>Qty</b></th>
                                            <th class="text-center"><b>Jumlah</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=1;
                                            $JumlahTotal=0;
                                            $query = mysqli_query($Conn, "SELECT*FROM rincian WHERE id_transaksi='$id_transaksi'");
                                            while ($data = mysqli_fetch_array($query)) {
                                                $id_rincian= $data['id_rincian'];
                                                $id_transaksi= $data['id_transaksi'];
                                                $id_akses= $data['id_akses'];
                                                $id_produk= $data['id_produk'];
                                                $harga= $data['harga'];
                                                $qty= $data['qty'];
                                                $jumlah= $data['jumlah'];
                                                $keterangan= $data['keterangan'];
                                                //Detail Keranjang
                                                $QryProduk = mysqli_query($Conn,"SELECT * FROM produk WHERE id_produk='$id_produk'")or die(mysqli_error($Conn));
                                                $DataProduk = mysqli_fetch_array($QryProduk);
                                                $id_brand= $DataProduk['id_brand'];
                                                $nama_produk= $DataProduk['nama_produk'];
                                                $HargaFormat = "Rp " . number_format($harga,0,',','.');
                                                //Format Jumlah
                                                $JumlahFormat = "Rp " . number_format($jumlah,0,',','.');
                                                //Jumlah Total
                                                $JumlahTotal=$JumlahTotal+$jumlah;
                                                echo '<tr>';
                                                echo '  <td class="text-center">'.$no.'</td>';
                                                echo '  <td class="text-left">'.$nama_produk.'</td>';
                                                echo '  <td class="text-right">'.$HargaFormat.'</td>';
                                                echo '  <td class="text-center">'.$qty.'</td>';
                                                echo '  <td class="text-right">'.$JumlahFormat.'</td>';
                                                echo '</tr>';
                                                $no++;
                                            }
                                            echo '<tr>';
                                            echo '  <td class="text-center"></td>';
                                            echo '  <td class="text-left" colspan="3"><b>SUB TOTAL</b></td>';
                                            echo '  <td class="text-right"><b>'.$SubtotalRp.'</b></td>';
                                            echo '</tr>';
                                            echo '<tr>';
                                            echo '  <td class="text-center"></td>';
                                            echo '  <td class="text-left" colspan="3"><b>ONGKOS KIRIM</b></td>';
                                            echo '  <td class="text-right"><b id="">'.$OngkirRp.'</b></td>';
                                            echo '</tr>';
                                            echo '<tr>';
                                            echo '  <td class="text-center"></td>';
                                            echo '  <td class="text-left" colspan="3"><b>TOTAL</b></td>';
                                            echo '  <td class="text-right"><b id="">'.$JumlahRp.'</b></td>';
                                            echo '</tr>';
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <h5>Alamat Pengiriman</h5>
                            <ul>
                                <li>Provinsi : <code><?php echo "$provinsi"; ?></code></li>
                                <li>Kabupaten : <code><?php echo "$kabupaten"; ?></code></li>
                                <li>Kecamatan : <code><?php echo "$kecamatan"; ?></code></li>
                                <li>Desa : <code><?php echo "$desa"; ?></code></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h5>Lacak Pengiriman</h5>
                            <?php
                                $JumlahRiwayatPengiriman=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pengiriman WHERE id_transaksi='$id_transaksi'"));
                                if(empty($JumlahRiwayatPengiriman)){
                                    echo '<code>Belum ada informasi pengiriman</code>';
                                }else{
                                    echo '<ul>';
                                    $QryPengiriman = mysqli_query($Conn, "SELECT*FROM pengiriman WHERE id_transaksi='$id_transaksi' ORDER BY id_pengiriman ASC");
                                    while ($DataPengiriman = mysqli_fetch_array($QryPengiriman)) {
                                        $TanggalPengiriman= $DataPengiriman['tanggal'];
                                        $KeteranganPengiriman= $DataPengiriman['keterangan'];
                                        $strtotimePengiriman=strtotime($TanggalPengiriman);
                                        $FormatTanggalPengiriman=date('d/m/Y H:i:s',$strtotimePengiriman);
                                        echo '<li class="mb-4"><b>'.$FormatTanggalPengiriman.'</b><br><i>'.$KeteranganPengiriman.'</i></li>';
                                    }
                                    echo '</ul>';
                                }
                            ?>
                        </div>
                        <div class="col-md-4">
                            <h5>Pembayaran</h5>
                            <?php
                                //Buka Informasi Pembayaran
                                $QryPembayaran = mysqli_query($Conn,"SELECT * FROM pembayaran WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                                $DataPembayaran = mysqli_fetch_array($QryPembayaran);
                                if(!empty($DataPembayaran['id_pembayaran'])){
                                    $id_pembayaran= $DataPembayaran['id_pembayaran'];
                                    $bank= $DataPembayaran['bank'];
                                    $nama= $DataPembayaran['nama'];
                                    $rekening= $DataPembayaran['rekening'];
                                    $image_bukti= $DataPembayaran['image_bukti'];
                                    $status= $DataPembayaran['status'];
                                    echo '<ul class="mb-3">';
                                    echo '  <li>ID Pembayaran : <code>'.$id_pembayaran.'</code></li>';
                                    echo '  <li>Nama Bank : <code>'.$bank.'</code></li>';
                                    echo '  <li>Nama Pemilik Rekening : <code>'.$nama.'</code></li>';
                                    echo '  <li>Lampiran Bukti : <code><a href="'.$base_url.'/assets/img/Pembayaran/'.$image_bukti.'">'.$image_bukti.'</a></code></li>';
                                    echo '  <li>Status Pembayaran : <code>'.$status.'</code></li>';
                                    echo '  <li>Status Pengiriman : <code>'.$status_pengiriman.'</code></li>';
                                    echo '</ul>';
                                    if($status!=="Lunas"){
                                        echo '<button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#ModalKonfirmasiPembayaran" data-id="'.$id_transaksi.'">';
                                        echo '  Ubah Pembayaran';
                                        echo '</button>';
                                    }
                                }else{
                                    $id_pembayaran="";
                                    $bank="";
                                    $nama="";
                                    $rekening="";
                                    $image_bukti="";
                                    $status="";
                                    echo '<p>Anda belum melakukan pembayaran, silahkan lakukan pembayaran dengan mengisi informasi konfirmasi pembayaran berikut</p>';
                                    echo '<button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#ModalKonfirmasiPembayaran" data-id="'.$id_transaksi.'">';
                                    echo '  <i class="bi bi-coin"></i> Konfirmasi Pembayaran';
                                    echo '</button>';
                                }

                                if($status_pengiriman=="Sampai Tujuan"){
                                    echo '<p><button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#ModalKonfirmasiTransaksiSelesai" data-id="'.$id_transaksi.'">';
                                    echo '  <i class="bi bi-check"></i> Konfirmasi Transaksi Selesai';
                                    echo '</button></p>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
<?php } ?>