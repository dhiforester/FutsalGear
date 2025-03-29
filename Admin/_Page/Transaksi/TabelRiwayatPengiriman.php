<?php
    include "../../_Config/Connection.php";
    //Tangkap id_akses
    if(empty($_POST['id_transaksi'])){
        echo '<span class="text-danger">ID Transaksi Tidak Boleh Kosong!</span>';
    }else{
        $id_transaksi=$_POST['id_transaksi'];
?>
    <div class="table table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th><b>No</b></th>
                    <th><b>Tanggal</b></th>
                    <th><b>Nomor Resi</b></th>
                    <th><b>Keterangan</b></th>
                    <th><b>Status</b></th>
                    <th><b>Option</b></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pengiriman WHERE id_transaksi='$id_transaksi'"));
                    if(empty($jml_data)){
                        echo '<tr>';
                        echo '  <td colspan="6" class="text-center">';
                        echo '      <span class="text-danger">Belum Ada Data Pengiriman</span>';
                        echo '  </td>';
                        echo '</tr>';
                    }else{
                        $no = 1;
                        //KONDISI PENGATURAN MASING FILTER
                        $query = mysqli_query($Conn, "SELECT*FROM pengiriman WHERE id_transaksi='$id_transaksi' ORDER BY id_pengiriman ASC");
                        while ($data = mysqli_fetch_array($query)) {
                            $id_pengiriman = $data['id_pengiriman'];
                            $no_resi = $data['no_resi'];
                            $tanggal = $data['tanggal'];
                            $keterangan = $data['keterangan'];
                            $status_pengiriman = $data['status_pengiriman'];
                            //Format Tanggal
                            $strtotime=strtotime($tanggal);
                            $tanggal=date('d/m/Y H:i:s',$strtotime);
                    ?>
                        <tr tabindex="0" class="table-light">
                            <td class="text-center" align="center"><?php echo "<small>$no</small>";?></td>    
                            <td class="text-left" align="left"><?php echo "<small>$tanggal</small>";?></td>
                            <td class="text-left" align="left"><?php echo "<small>$no_resi</small>";?></td>
                            <td class="text-left" align="left"><?php echo "<small>$keterangan</small>";?></td>
                            <td class="text-left" align="left"><?php echo "<small>$status_pengiriman</small>";?></td>
                            <td class="text-left" align="left">
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#ModalHapusPengiriman" data-id="<?php echo $id_pengiriman; ?>">
                                    <i class="bi bi-x"></i> Hapus
                                </button>
                            </td>
                        </tr>
                <?php
                    $no++; } }
                ?>
            </tbody>
        </table>
    </div>
<?php } ?>