<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/SettingPayment.php";
    if(empty($_POST['id_mitra'])){
        echo '<div class="row mt-4">';
        echo '  <div class="col-md-12 text-center">';
        echo '      <div class="alert alert-danger" role="alert">';
        echo '          <b>Maaf!!</b> Silahkan Anda Isi Data Mitra Terlebih Dulu';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
        if(empty($_POST['id_pelanggan'])){
            echo '<div class="row mt-4">';
            echo '  <div class="col-md-12 text-center">';
            echo '      <div class="alert alert-danger" role="alert">';
            echo '          <b>Maaf!!</b> Silahkan Anda Isi Data Pelanggan Terlebih Dulu';
            echo '      </div>';
            echo '  </div>';
            echo '</div>';
        }else{
            $id_mitra=$_POST['id_mitra'];
            $id_pelanggan=$_POST['id_pelanggan'];
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_mitra='$id_mitra' AND id_pelanggan='$id_pelanggan' AND id_transaksi='0'"));
            if(empty($jml_data)){
                echo '<div class="row mt-4">';
                echo '  <div class="col-md-12 text-center">';
                echo '      <div class="alert alert-danger" role="alert">';
                echo '          Belum ada data rincian transaksi yang bisa ditampilkan.';
                echo '      </div>';
                echo '  </div>';
                echo '</div>';
            }else{
?>
    <div class="row">
        <div class="col-md-12">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <p class="p-4">
                        <b>Layanan Booking</b>
                    </p>
                </div>
                <?php
                    $no = 1;
                    $JumlahRincianTotal=0;
                    $query = mysqli_query($Conn, "SELECT*FROM transaksi_rincian WHERE id_mitra='$id_mitra' AND id_pelanggan='$id_pelanggan' AND id_transaksi='0'");
                    while ($data = mysqli_fetch_array($query)) {
                        $id_transaksi_rincian= $data['id_transaksi_rincian'];
                        $id_barang= $data['id_barang'];
                        $id_kunjungan= $data['id_kunjungan'];
                        $id_mitra= $data['id_mitra'];
                        $id_mitra_layanan= $data['id_mitra_layanan'];
                        $nama_barang=$data['nama_barang'];
                        $nama_layanan= $data['nama_layanan'];
                        $harga= $data['harga'];
                        $qty= $data['qty'];
                        $jumlah= $data['jumlah'];
                        if(empty($data['nama_barang'])){
                            $NamaRincian= $data['nama_layanan'];
                            $Kategori="Booking";
                            $ModalEdit="#ModalEditRincianTindakan";
                        }else{
                            $NamaRincian= $data['nama_barang'];
                            $Kategori="Obat/Alkes";
                            $ModalEdit="#ModalEditRincianBarang";
                        }
                        //Buka data booking
                        $QryKunjungan = mysqli_query($Conn,"SELECT * FROM pelanggan_kunjungan WHERE id_kunjungan='$id_kunjungan'")or die(mysqli_error($Conn));
                        $DataKunjungan = mysqli_fetch_array($QryKunjungan);
                        if(!empty($DataKunjungan['id_hairstylist'])){
                            $id_hairstylist = $DataKunjungan['id_hairstylist'];
                            $id_hairstylist_jadwal = $DataKunjungan['id_hairstylist_jadwal'];
                            $antrian = $DataKunjungan['antrian'];
                            $estimasi = $DataKunjungan['estimasi'];
                            $datetime_daftar = $DataKunjungan['datetime_daftar'];
                            $status = $DataKunjungan['status'];
                            $strtotime=strtotime($datetime_daftar);
                            $strtotime2=strtotime($estimasi);
                            //Format datetime_daftar
                            $datetime_daftar=date('d/m/y H:i', $strtotime);
                            $estimasi=date('d/m/Y', $strtotime2);
                            $jam_estimasi=date('H:i', $strtotime2);
                        }else{
                            $id_hairstylist ="";
                            $id_hairstylist_jadwal ="";
                            $antrian ="";
                            $estimasi ="";
                            $datetime_daftar ="";
                            $status ="";
                            $strtotime="";
                            $strtotime2="";
                            //Format datetime_daftar
                            $datetime_daftar="";
                            $estimasi="";
                            $jam_estimasi="";
                        }
                        //Buka nama hairstylist
                        $QryHairstylist = mysqli_query($Conn,"SELECT * FROM hairstylist WHERE id_hairstylist='$id_hairstylist'")or die(mysqli_error($Conn));
                        $DataHairstylist = mysqli_fetch_array($QryHairstylist);
                        if(!empty($DataHairstylist['nama'])){
                            $NamaHairstylist= $DataHairstylist['nama'];
                        }else{
                            $NamaHairstylist="Tidak Diketahui";
                        }
                        //Buka nama layanan
                        $QryLayanan = mysqli_query($Conn,"SELECT * FROM mitra_layanan WHERE id_mitra_layanan='$id_mitra_layanan'")or die(mysqli_error($Conn));
                        $DataLayanan = mysqli_fetch_array($QryLayanan);
                        if(!empty($DataLayanan['id_mitra_layanan'])){
                            $NamaLayanan= $DataLayanan['keterangan'];
                        }else{
                            $NamaLayanan ="Tidak Diketahui";
                        }
                        //Buka jadwal
                        $QryJadwal = mysqli_query($Conn,"SELECT * FROM  hairstylist_jadwal WHERE id_hairstylist_jadwal='$id_hairstylist_jadwal'")or die(mysqli_error($Conn));
                        $Datajadwal = mysqli_fetch_array($QryJadwal);
                        if(!empty($Datajadwal['id_hairstylist_jadwal'])){
                            $jam_mulai= $Datajadwal['jam_mulai'];
                            $jam_selesai= $Datajadwal['jam_selesai'];
                            $Jadwal="$jam_mulai s/d $jam_selesai";
                        }else{
                            $Jadwal ="";
                        }
                        //FormatRupiahJumlah
                        $JumlahRp="Rp " . number_format($jumlah,0,',','.');
                        $HargaRp="Rp " . number_format($harga,0,',','.');
                        $JumlahRincianTotal=$jumlah+$JumlahRincianTotal;
                        $JumlahRincianTotalRp="Rp " . number_format($JumlahRincianTotal,0,',','.');
                ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $no;?>" aria-expanded="false" aria-controls="collapse<?php echo $no;?>">
                                <?php 
                                    echo '<b>'.$no.'.'.$NamaLayanan.'</b> ('.$HargaRp.')';  
                                ?>
                            </button>
                        </h2>
                        <div id="collapse<?php echo $no;?>" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul>
                                            <li>
                                                <?php echo ''.$NamaLayanan.''; ?>
                                            </li>
                                            <li>
                                                <?php echo 'Booking '.$estimasi.' '.$jam_estimasi.''; ?>
                                            </li>
                                            <li>
                                                <?php echo '<i>Hairstylist '.$NamaHairstylist.'</i>'; ?>
                                            </li>
                                            <li>
                                                <?php echo 'Tarif ('.$HargaRp.' X '.$qty.')'; ?>
                                            </li>
                                            <li>
                                                <?php echo '<b>Jumlah '.$JumlahRp.'</b>'; ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="btn-group"> 
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDeleteTransaksiRincian" data-id="<?php echo "$id_transaksi_rincian"; ?>">
                                                <i class="bi bi-x"></i> Hapus
                                            </button> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
                        $no++; 
                    } 
                    if(empty($jml_data)){
                        $JumlahTotalRp="Rp 0";
                    }else{
                        $BiayaAdm=($biaya_adm/100)*$JumlahRincianTotal;
                        $Ppn=($ppn/100)*$JumlahRincianTotal;
                        $JumlahTotal=$JumlahRincianTotal+$BiayaAdm+$Ppn;
                        $JumlahRincianTotalRp="Rp " . number_format($JumlahRincianTotal,0,',','.');
                        $JumlahTotalRp="Rp " . number_format($JumlahTotal,0,',','.');
                        $BiayaAdmRp="Rp " . number_format($BiayaAdm,0,',','.');
                        $PpnRp="Rp " . number_format($Ppn,0,',','.');
                    } 
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table>
                <tr>
                    <td><b>Jumlah Rincian</b></td>
                    <td><b>:</b></td>
                    <td><?php echo "$JumlahRincianTotalRp"; ?></td>
                </tr>
                <tr>
                    <td><b>Biaya Adm</b></td>
                    <td><b>:</b></td>
                    <td><?php echo "$BiayaAdmRp"; ?></td>
                </tr>
                <tr>
                    <td><b>PPN</b></td>
                    <td><b>:</b></td>
                    <td><?php echo "$PpnRp"; ?></td>
                </tr>
                <tr>
                    <td><b>TOTAL</b></td>
                    <td><b>:</b></td>
                    <td><?php echo "$JumlahTotalRp"; ?></td>
                </tr>
            </table>
        </div>
    </div>
<?php }}} ?>