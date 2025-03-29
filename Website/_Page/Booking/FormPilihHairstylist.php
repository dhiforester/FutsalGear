<?php
    include "../../_Config/Connection.php";
    include "../../_Config/SettingGeneral.php";
    date_default_timezone_set('Asia/Jakarta');
    $Sekarang=date('Y-m-d H:i');

    echo '<div class="row">';
    echo '<div class="col-md-12 table table-responsive">';
    echo '<table class="row class="table table-hover"">';
    // echo '<tbody>';

    if(empty($_POST['id_mitra'])){
        echo '<div class="row">';
        echo '  <div class="col-md-12 text-center text-danger">';
        echo '      Belum Ada Mitra Yang Dipilih';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_mitra=$_POST['id_mitra'];
        //Jumlah Hairstylist
        $JumlahHairstylist=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM hairstylist WHERE id_mitra='$id_mitra'"));
        if(empty($JumlahHairstylist)){
            echo '<div class="row">';
            echo '  <div class="col-md-12 text-center text-danger">';
            echo '      Belum Ada Hairstylist Untuk Mitra Tersebut';
            echo '  </div>';
            echo '</div>';
        }else{
            $query = mysqli_query($Conn, "SELECT*FROM hairstylist WHERE id_mitra='$id_mitra' ORDER BY nama DESC");
            while ($data = mysqli_fetch_array($query)) {
                $id_hairstylist= $data['id_hairstylist'];
                $NamaHairstylist= $data['nama'];
                $deskripsi= $data['deskripsi'];
                if(empty($data['foto'])){
                    $foto="No-Image.png";
                }else{
                    $foto=$data['foto'];
                }
                echo '<tr>';
                echo '  <td class="col-2 text-center mb-3">';
                echo '      <input class="form-check-input" type="radio" name="GetIdHairstylist" id="GetIdHairstylist'.$id_hairstylist.'" value="'.$id_hairstylist.'">';
                echo '  </td>';
                echo '  <td class="col-2 text-center">';
                echo '      <img src="'.$base_url_admin.'/assets/img/Hairstylist/'.$foto.'" width="50px" class="img img-fluid rounded-circle object-fit-cover" style="aspect-ratio: 1/1 !important;">';
                echo '  </td>';
                echo '  <td class="col-8">';
                echo '      <label for="GetIdHairstylist'.$id_hairstylist.'"><b>'.$NamaHairstylist.'</b></label><br>';
                // echo '      <small>'.$deskripsi.'</small>';
                echo '  </td>';
                echo '</tr>';

            }
        }
    }
    // echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '</div>';
?>