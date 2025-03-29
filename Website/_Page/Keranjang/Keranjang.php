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
                                        <th class="text-center"><b>Opt</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no=1;
                                        $JumlahTotal=0;
                                        $query = mysqli_query($Conn, "SELECT*FROM rincian WHERE id_akses='$SessionIdAksesPelanggan' AND id_transaksi='0'");
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
                                            echo '  <td class="text-center">';
                                            echo '      <button type="button" class="btn btn-sm btn-dark btn-rounded" data-bs-toggle="modal" data-bs-target="#ModalHapusItemKeranjang" data-id="'.$id_rincian.'">';
                                            echo '          <i class="bi bi-x-circle"></i> Hapus';
                                            echo '      </button>';
                                            echo '  </td>';
                                            echo '</tr>';
                                            $no++;
                                        }
                                        $JumlahTotalFormat = "Rp " . number_format($JumlahTotal,0,',','.');
                                        echo '<tr>';
                                        echo '  <td class="text-center"></td>';
                                        echo '  <td class="text-left" colspan="3"><b>SUB TOTAL</b></td>';
                                        echo '  <td class="text-right"><b>'.$JumlahTotalFormat.'</b></td>';
                                        echo '  <td class="text-left"></td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '  <td class="text-center"></td>';
                                        echo '  <td class="text-left" colspan="3"><b>ONGKOS KIRIM</b></td>';
                                        echo '  <td class="text-right"><b id="PutOngkir"></b></td>';
                                        echo '  <td class="text-left"></td>';
                                        echo '</tr>';
                                        echo '<tr>';
                                        echo '  <td class="text-center"></td>';
                                        echo '  <td class="text-left" colspan="3"><b>TOTAL</b></td>';
                                        echo '  <td class="text-right"><b id="PutTotal"></b></td>';
                                        echo '  <td class="text-left"></td>';
                                        echo '</tr>';
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <form action="javascript:void(0);" id="ProsesTambahTransaksi">
                    <input type="hidden" name="JumlahTotal" id="JumlahTotal" value="<?php echo "$JumlahTotal"; ?>">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <h5>Alamat Pengiriman</h5>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="provinsi">Provinsi</label>
                        </div>
                        <div class="col-md-9">
                            <select name="provinsi" id="provinsi" class="form-control">
                                <option value="">Pilih</option>
                                <?php
                                    $query = mysqli_query($Conn, "SELECT DISTINCT provinsi FROM ongkir ORDER BY provinsi ASC");
                                    while ($data = mysqli_fetch_array($query)) {
                                        $provinsi= $data['provinsi'];
                                        echo '<option value="'.$provinsi.'">'.$provinsi.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="kabupaten">Kabupaten</label>
                        </div>
                        <div class="col-md-9">
                            <select name="kabupaten" id="kabupaten" class="form-control">
                                <option value="">Pilih</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="kecamatan">Kecamatan</label>
                        </div>
                        <div class="col-md-9">
                            <select name="kecamatan" id="kecamatan" class="form-control">
                                <option value="">Pilih</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="desa">Desa/Kelurahan</label>
                        </div>
                        <div class="col-md-9">
                            <select name="desa" id="desa" class="form-control">
                                <option value="">Pilih</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="alamat">Alamat Lengkap</label>
                        </div>
                        <div class="col-md-9">
                            <textarea name="alamat" id="alamat" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <h5>Pilih Kurir</h5>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="kurir">Kurir/Biro Pengiriman</label>
                        </div>
                        <div class="col-md-9">
                            <select name="kurir" id="kurir" class="form-control">
                                <option value="">Pilih</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            
                        </div>
                        <div class="col-md-9" id="PutBiayaOngkir">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <h5>Metode Pembayaran</h5>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <label for="bank">Pilih Bank</label>
                        </div>
                        <div class="col-md-9">
                            <select name="bank" id="bank" class="form-control">
                                <option value="">Pilih</option>
                                <?php
                                    $query = mysqli_query($Conn, "SELECT * FROM bank ORDER BY nama_bank ASC");
                                    while ($data = mysqli_fetch_array($query)) {
                                        $nama_bank= $data['nama_bank'];
                                        echo '<option value="'.$nama_bank.'">'.$nama_bank.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            
                        </div>
                        <div class="col-md-9" id="PutPetunjukPembayaran">
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-12" id="NotifikasiSimpanKeranjang">
                            <span>Pastikan anda sudan mengisi informasi transaksi dengan benar</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-md btn-primary">
                                Simpan Dan Lanjutkan <i class="bi bi-arrow-right-circle"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->