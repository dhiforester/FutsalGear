<?php
    //Tangkap id_akses
    if(empty($_GET['id'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Transaksi Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_transaksi=$_GET['id'];
        //Buka data Transaksi
        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
        $id_transaksi= $DataTransaksi['id_transaksi'];
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
        $subtotal_rp = "Rp " . number_format($subtotal,0,',','.');
        $ongkir_rp = "Rp " . number_format($ongkir,0,',','.');
        $jumlah_rp = "Rp " . number_format($jumlah,0,',','.');
        $strtotime=strtotime($tanggal);
        $TanggalFormat=date('d/m/Y', $strtotime);
        //Buka Data Ongkir
        $QryOngkir = mysqli_query($Conn,"SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'")or die(mysqli_error($Conn));
        $DataOngkir = mysqli_fetch_array($QryOngkir);
        $provinsi= $DataOngkir['provinsi'];
        $kabupaten= $DataOngkir['kabupaten'];
        $kecamatan= $DataOngkir['kecamatan'];
        $desa= $DataOngkir['desa'];
        //Buka Data Pembayaran
        $QryPembayaran = mysqli_query($Conn,"SELECT * FROM pembayaran WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataPembayaran = mysqli_fetch_array($QryPembayaran);
        $id_pembayaran= $DataPembayaran['id_pembayaran'];
        $bank= $DataPembayaran['bank'];
        $nama= $DataPembayaran['nama'];
        $rekening= $DataPembayaran['rekening'];
        $image_bukti= $DataPembayaran['image_bukti'];
        $StatusPembayaran= $DataPembayaran['status'];
        //Buka Data Pengiriman
        $QryPengiriman = mysqli_query($Conn,"SELECT * FROM pengiriman WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataPengiriman = mysqli_fetch_array($QryPengiriman);
        if(!empty($DataPengiriman['no_resi'])){
            $no_resi= $DataPengiriman['no_resi'];
        }else{
            $no_resi="";
        }
?>
    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10 mt-3">
                                <b class="card-title">Detail Transaksi</b>
                            </div>
                            <div class="col-md-2 mt-3">
                                <a href="index.php?Page=Transaksi" class="btn btn-md btn-dark btn-rounded btn-block">
                                    <i class="bi bi-arrow-left-short"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td><small><dt>ID.Transaksi</dt></small></td>
                                                <td><small id="GetIdTransaksi"><?php echo "$id_transaksi"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Tanggal</dt></small></td>
                                                <td><small><?php echo "$TanggalFormat"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Pelanggan</dt></small></td>
                                                <td><small><?php echo "$id_akses - $nama_pelanggan"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Metode Pembayaran</dt></small></td>
                                                <td><small><?php echo "$metode_pembayaran"; ?></small></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <b class="card-title">Rincian Transaksi</b>
                                <div class="table table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center"><b>No</b></th>
                                                <th class="text-center"><b>Uraian</b></th>
                                                <th class="text-center"><b>Keterangan</b></th>
                                                <th class="text-center"><b>Harga</b></th>
                                                <th class="text-center"><b>Qty</b></th>
                                                <th class="text-center"><b>Jumlah</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                $QryRincian = mysqli_query($Conn, "SELECT*FROM rincian WHERE id_transaksi='$id_transaksi'");
                                                while ($DataRincian = mysqli_fetch_array($QryRincian)) {
                                                    $id_rincian= $DataRincian['id_rincian'];
                                                    $id_produk= $DataRincian['id_produk'];
                                                    $harga= $DataRincian['harga'];
                                                    $qty= $DataRincian['qty'];
                                                    $jumlah= $DataRincian['jumlah'];
                                                    $keterangan= $DataRincian['keterangan'];
                                                    //Format Rp
                                                    $harga_rp = "Rp " . number_format($harga,0,',','.');
                                                    $jumlah_rincian_rp = "Rp " . number_format($jumlah,0,',','.');
                                                    //Buka Produk
                                                    $QryProduk = mysqli_query($Conn,"SELECT * FROM produk WHERE id_produk='$id_produk'")or die(mysqli_error($Conn));
                                                    $DataProduk = mysqli_fetch_array($QryProduk);
                                                    $id_brand= $DataProduk['id_brand'];
                                                    $nama_produk= $DataProduk['nama_produk'];
                                                    echo '<tr>';
                                                    echo '  <td class="text-center">'.$no.'</td>';
                                                    echo '  <td class="text-left">'.$nama_produk.'</td>';
                                                    echo '  <td class="text-left">';
                                                    if(!empty($keterangan)){
                                                        echo '<ul>';
                                                        //Keterangan
                                                        $JsonData =json_decode($keterangan, true);
                                                        foreach($JsonData as $KeteranganList){
                                                            $grup_variant=$KeteranganList['grup_variant'];
                                                            $value_variant=$KeteranganList['value_variant'];
                                                            echo "<li><small>$grup_variant : <code>$value_variant</code></small></li>";
                                                        }
                                                        echo '</ul>';
                                                    }
                                                    echo '  </td>';
                                                    echo '  <td align="right">'.$harga_rp.'</td>';
                                                    echo '  <td class="text-center">'.$qty.'</td>';
                                                    echo '  <td align="right">'.$jumlah_rincian_rp.'</td>';
                                                    echo '</tr>';
                                                }
                                            ?>
                                            <tr>
                                                <td colspan="5"><b>SUBTOTAL</b></td>
                                                <td align="right"><b><?php echo "$subtotal_rp"; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5"><b>ONGKIR</b></td>
                                                <td align="right"><b><?php echo "$ongkir_rp"; ?></b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5"><b>TOTAL</b></td>
                                                <td align="right"><b><?php echo "$jumlah_rp"; ?></b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10 mt-3">
                                <b class="card-title">Detail Pembayaran</b>
                            </div>
                            <div class="col-md-2 mt-3">
                                <button type="button" class="btn btn-sm btn-rounded btn-primary" data-bs-toggle="modal" data-bs-target="#ModalUpdateStatusPembayaran" data-id="<?php echo $id_transaksi; ?>">
                                    Update Status Pembayaran
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td><small><dt>ID.Pembayaran</dt></small></td>
                                                <td><small><?php echo "$id_pembayaran"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Nama Bank</dt></small></td>
                                                <td><small><?php echo "$bank"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Nama Pengirim</dt></small></td>
                                                <td><small><?php echo "$nama"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>No.Rekening</dt></small></td>
                                                <td><small><?php echo "$rekening"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Tagihan</dt></small></td>
                                                <td>
                                                    <a href="assets/img/Pembayaran/<?php echo "$image_bukti"; ?>" class="text-success">
                                                        <small><?php echo "$image_bukti"; ?></small>
                                                    </a>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Status Pembayaran</dt></small></td>
                                                <td><small id="GetStatusPembayaran"><?php echo "$StatusPembayaran"; ?></small></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <b class="card-title">Detail Pengiriman</b>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td><small><dt>Provinsi</dt></small></td>
                                                <td><small><?php echo "$provinsi"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Kabupaten/Kota</dt></small></td>
                                                <td><small><?php echo "$kabupaten"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Kecamatan</dt></small></td>
                                                <td><small><?php echo "$kecamatan"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Desa/Kelurahan</dt></small></td>
                                                <td><small><?php echo "$desa"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Alamat Pengiriman</dt></small></td>
                                                <td><small><?php echo "$alamat"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Kurir</dt></small></td>
                                                <td><small><?php echo "$kurir"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Nomor Resi</dt></small></td>
                                                <td><small id="GetResiPengiriman"><?php echo "$no_resi"; ?></small></td>
                                            </tr>
                                            <tr>
                                                <td><small><dt>Status Pengiriman</dt></small></td>
                                                <td><small id="GetStatusPengiriman"><?php echo "$status_pengiriman"; ?></small></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10 mt-3">
                                <b class="card-title">Riwayat Pengiriman</b>
                            </div>
                            <div class="col-md-2 mt-3">
                                <button type="button" class="btn btn-sm btn-rounded btn-primary" data-bs-toggle="modal" data-bs-target="#ModalTambahRiwayatPengiriman" data-id="<?php echo $id_transaksi; ?>">
                                    Tambah Riwayat Pengiriman
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12" id="TabelRiwayatPengiriman">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>