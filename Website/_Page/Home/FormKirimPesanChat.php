<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/SettingGeneral.php";
    include "../../_Config/Session.php";
    if(empty($SessionIdPelanggan)){
        echo '<span class="text-danger"></span>';
    }else{
        //Tangkap id_mitra
        if(empty($_POST['id_mitra'])){
            echo '<span class="text-danger">ID Mitra Tidak Boleh Kosong Atau Tidak Valid.</span>';
        }else{
            $id_mitra=$_POST['id_mitra'];
            //Buka data Mitra
            $Qry = mysqli_query($Conn,"SELECT * FROM mitra WHERE id_mitra='$id_mitra'")or die(mysqli_error($Conn));
            $Data = mysqli_fetch_array($Qry);
            $id_wilayah= $Data['id_wilayah'];
            $nama_mitra= $Data['nama_mitra'];
            $alamat_mitra= $Data['alamat_mitra'];
            $kontak_mitra= $Data['kontak_mitra'];
            $propinsi_mitra= $Data['propinsi_mitra'];
            $kabupaten_mitra= $Data['kabupaten_mitra'];
            $logo= $Data['logo'];
?>
    <input type="hidden" id="id_mitra" name="id_mitra"  value="<?php echo "$id_mitra";?>">
    <input type="hidden" id="id_pelanggan" name="id_pelanggan"  value="<?php echo "$SessionIdPelanggan";?>">
    <div class="row">
        <div class="col-md-12 mt-3 pre-scrollable">
            <div class="table table-responsive">
                <table class="table table-hover">
                    <tbody>
                        <?php
                            //Hitung chat dengan mitra
                            $JumlahDataChating = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM chating WHERE idAksesMitra='$id_mitra' AND id_pelanggan='$SessionIdPelanggan'"));
                            if(empty($JumlahDataChating)){
                                echo '<tr>';
                                echo '  <td class="text-center text-danger">';
                                echo '      Belum Ada Percakapan';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $QryChat = mysqli_query($Conn, "SELECT*FROM chating WHERE idAksesMitra='$id_mitra' AND id_pelanggan='$SessionIdPelanggan' ORDER By id_chating ASC");
                                while ($DataChat = mysqli_fetch_array($QryChat)) {
                                    $id_chating= $DataChat['id_chating'];
                                    $kategori= $DataChat['kategori'];
                                    $tanggal= $DataChat['tanggal'];
                                    $pesan= $DataChat['pesan'];
                                    $status= $DataChat['status'];
                                    if($kategori=="MitraToPelanggan"){
                                        $Pengirim='<span class="text-info">'.$nama_mitra.'</span>';
                                    }else{
                                        $Pengirim='<span class="text-warning">Anda</span>';
                                    }
                                    //Format Tanggal
                                    $strtotime=strtotime($tanggal);
                                    $TanggalFormat=date('d/m/Y H:i',$strtotime);
                                    echo '<tr>';
                                    echo '  <td>';
                                    echo '      <b>'.$Pengirim.'</b><br>';
                                    echo '      '.$pesan.'<br>';
                                    echo '      <small>'.$TanggalFormat.'</small>';
                                    echo '  </td>';
                                    echo '</tr>';
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php }} ?>