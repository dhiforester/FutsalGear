<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_akses
    if(empty($_POST['id_transaksi'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-6 mb-3">';
        echo '          ID Transaksi Tidak Boleh Kosong.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_transaksi=$_POST['id_transaksi'];
        //Buka data Transaksi
        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
        $id_transaksi = $DataTransaksi['id_transaksi'];
        $id_mitra= $DataTransaksi['id_mitra'];
        $id_pelanggan= $DataTransaksi['id_pelanggan'];
        $tanggal= $DataTransaksi['tanggal'];
        $metode= $DataTransaksi['metode'];
        $status= $DataTransaksi['status'];
        $total= $DataTransaksi['total'];
        $total = "Rp " . number_format($total,0,',','.');
        //Buka data mitra
        $QryMitra = mysqli_query($Conn,"SELECT * FROM mitra WHERE id_mitra='$id_mitra'")or die(mysqli_error($Conn));
        $DataMitra = mysqli_fetch_array($QryMitra);
        if(!empty($DataMitra['nama_mitra'])){
            $NamaMitra=$DataMitra['nama_mitra'];
        }else{
            $NamaMitra="";
        }
        $nama_mitra= $DataMitra['nama_mitra'];
        //Buka data Pelanggan
        $QryPelanggan = mysqli_query($Conn,"SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'")or die(mysqli_error($Conn));
        $DataPelanggan = mysqli_fetch_array($QryPelanggan);
        if(!empty($DataPelanggan['id_pelanggan'])){
            $id_pelanggan= $DataPelanggan['id_pelanggan'];
            $nama= $DataPelanggan['nama'];
        }else{
            $id_pelanggan="";
            $nama="";
        }
        $strtotime=strtotime($tanggal);
        $tanggal=date('d/m/Y', $strtotime);
?>
<div class="modal-body">
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td><small><dt>ID Transaksi</dt></small></td>
                            <td><small><?php echo "$id_transaksi"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small><dt>Tanggal</dt></small></td>
                            <td><small><?php echo "$tanggal"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small><dt>Mitra</dt></small></td>
                            <td><small><?php echo "$nama_mitra"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small><dt>Pelanggan</dt></small></td>
                            <td><small><?php echo "$nama"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small><dt>Metode Transaksi</dt></small></td>
                            <td><small><?php echo "$metode"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small><dt>Total</dt></small></td>
                            <td><small><?php echo "$total"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small><dt>Metode Pembayaran</dt></small></td>
                            <td><small><?php echo "$metode"; ?></small></td>
                        </tr>
                        <tr>
                            <td><small><dt>Status Transaksi</dt></small></td>
                            <td><small><?php echo "$status"; ?></small></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer bg-info">
    <div class="row">
        <div class="col-md-12">
            <a href="index.php?Page=Transaksi&Sub=DetailTransaksi&id=<?php echo "$id_transaksi";?>" class="btn btn-success btn-rounded">
                <i class="bi bi-three-dots"></i> Selengkapnya
            </a>
            <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
                <i class="bi bi-x-circle"></i> Tutup
            </button>
        </div>
    </div>
</div>
<?php } ?>