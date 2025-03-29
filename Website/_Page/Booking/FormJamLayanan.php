<div class="row">
    <div class="col-md-12 table table-responsive">
        <table class="table table-hover">
            <tbody>
                <?php
                    date_default_timezone_set('Asia/Jakarta');
                    $Sekarang=date('Y-m-d H:i');
                    if(empty($_POST['id_mitra'])){
                        echo '<tr>';
                        echo '  <td align="center" class="text-danger">';
                        echo '      Belum Ada Mitra Yang Dipilih';
                        echo '  </td>';
                        echo '</tr>';
                    }else{
                        if(empty($_POST['id_hairstylist'])){
                            echo '<tr>';
                            echo '  <td align="center" class="text-danger">';
                            echo '      Belum Ada Hairstylist Yang Dipilih';
                            echo '  </td>';
                            echo '</tr>';
                        }else{
                            if(empty($_POST['tanggal'])){
                                echo '<tr>';
                                echo '  <td align="center" class="text-danger">';
                                echo '      Silahkan Isi Tanggal Booking Terlebih Dulu';
                                echo '  </td>';
                                echo '</tr>';
                            }else{
                                $id_hairstylist=$_POST['id_hairstylist'];
                                $id_mitra=$_POST['id_mitra'];
                                $tanggal=$_POST['tanggal'];
                                //Mencari nama Hari
                                $day = date('D', strtotime($tanggal));
                                $dayList = array(
                                    'Mon' => '1',
                                    'Tue' => '2',
                                    'Wed' => '3',
                                    'Thu' => '4',
                                    'Fri' => '5',
                                    'Sat' => '6',
                                    'Sun' => '7'
                                );
                                $dayList2 = array(
                                    '1' => 'Senin',
                                    '2' => 'Selasa',
                                    '3' => 'Rabu',
                                    '4' => 'Kamis',
                                    '5' => 'Jumat',
                                    '6' => 'Sabtu',
                                    '7' => 'Minggu'
                                );
                                $hari=$dayList[$day];
                                $NamaHari=$dayList2[$hari];
                                //Buka data jadwal
                                include "../../_Config/Connection.php";
                                //Jumlah Jadwal
                                $JumlahJadwal=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM hairstylist_jadwal WHERE id_mitra='$id_mitra' AND id_hairstylist='$id_hairstylist' AND hari='$hari'"));
                                if(empty($JumlahJadwal)){
                                    echo '<tr>';
                                    echo '  <td align="center" class="text-danger">';
                                    echo '      Tidak ada jadwal untuk hari '.$NamaHari.'.';
                                    echo '  </td>';
                                    echo '</tr>';
                                }else{
                                    $query = mysqli_query($Conn, "SELECT*FROM hairstylist_jadwal WHERE id_mitra='$id_mitra' AND id_hairstylist='$id_hairstylist' AND hari='$hari' ORDER BY jam ASC");
                                    while ($data = mysqli_fetch_array($query)) {
                                        $id_hairstylist_jadwal= $data['id_hairstylist_jadwal'];
                                        $jam= $data['jam'];
                                        $jam=date('H:i',$jam);
                                        $TanggalJam="$tanggal $jam";
                                        if($TanggalJam<=$Sekarang){
                                            echo '<tr>';
                                            echo '  <td align="center">';
                                            echo '      <input disabled class="form-check-input" type="radio" name="GetIdJadwal" id="GetIdJadwal'.$id_hairstylist_jadwal.'" value="'.$id_hairstylist_jadwal.'">';
                                            echo '  </td>';
                                            echo '  <td align="left" class="text-danger">';
                                            echo '      <label class="form-check-label" for="GetIdJadwal'.$id_hairstylist_jadwal.'">'.$jam.'</label>';
                                            echo '  </td>';
                                            echo '  <td class="text-danger">';
                                            echo '      Sudah Berakhir';
                                            echo '  </td>';
                                            echo '</tr>';
                                        }else{
                                            //Cek Apakah Ada yang Menempati
                                            $ValidasiMenempati=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM booking WHERE id_hairstylist_jadwal='$id_hairstylist_jadwal' AND tanggal_dilayani='$tanggal' AND status_booking!='Batal'"));
                                            if(!empty($ValidasiMenempati)){
                                                echo '<tr>';
                                                echo '  <td align="center">';
                                                echo '      <input disabled class="form-check-input" type="radio" name="GetIdJadwal" id="GetIdJadwal'.$id_hairstylist_jadwal.'" value="'.$id_hairstylist_jadwal.'">';
                                                echo '  </td>';
                                                echo '  <td align="left" class="text-danger">';
                                                echo '      <label class="form-check-label" for="GetIdJadwal'.$id_hairstylist_jadwal.'">'.$jam.'</label>';
                                                echo '  </td>';
                                                echo '  <td class="text-danger">';
                                                echo '      Sudah Ada';
                                                echo '  </td>';
                                                echo '</tr>';
                                            }else{
                                                echo '<tr>';
                                                echo '  <td align="center">';
                                                echo '      <input class="form-check-input" type="radio" name="GetIdJadwal" id="GetIdJadwal'.$id_hairstylist_jadwal.'" value="'.$id_hairstylist_jadwal.'">';
                                                echo '  </td>';
                                                echo '  <td align="left">';
                                                echo '      <label class="form-check-label" for="GetIdJadwal'.$id_hairstylist_jadwal.'">'.$jam.'</label>';
                                                echo '  </td>';
                                                echo '</tr>';
                                            }
                                        }
                                        
                                    }
                                }
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>