<?php
    include "../../_Config/Connection.php";
    include "../../_Config/SettingGeneral.php";
    $JumlahMitra=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM mitra WHERE status_mitra='Valid'"));
    if(empty($JumlahMitra)){
        echo '<div class="row">';
        echo '  <div class="col-md-12 text-center text-danger">';
        echo '      Belum Ada Data Mitra Yang Valid';
        echo '  </div>';
        echo '</div>';
    }else{
        $query = mysqli_query($Conn, "SELECT*FROM mitra WHERE status_mitra='Valid'");
        while ($data = mysqli_fetch_array($query)) {
            $id_mitra= $data['id_mitra'];
            $nama_mitra= $data['nama_mitra'];
            $email_mitra= $data['email_mitra'];
            $logo= $data['logo'];
            echo '<div class="row mb-4">';
            echo '  <div class="col-2 text-center mb-3">';
            echo '      <input class="form-check-input" type="radio" name="GetIdMitra" id="GetIdMitra'.$id_mitra.'" value="'.$id_mitra.'">';
            echo '  </div>';
            echo '  <div class="col-2 text-center">';
            echo '      <img src="'.$base_url_admin.'/assets/img/Mitra/'.$logo.'" width="100%" class="img img-fluid rounded-circle object-fit-cover" style="aspect-ratio: 1/1 !important;">';
            echo '  </div>';
            echo '  <div class="col-8">';
            echo '      <label for="GetIdMitra'.$id_mitra.'"><b>'.$nama_mitra.'</b><br/><small>'.$email_mitra.'</small></label><br>';
            // echo '      <small>'.$email_mitra.'</small>';
            echo '  </div>';
            echo '</div>';
        }
    }
?>