<?php
    include "../../_Config/Connection.php";
    include "../../_Config/SettingGeneral.php";
    date_default_timezone_set('Asia/Jakarta');
    $Sekarang=date('Y-m-d H:i');
    if(empty($_POST['id_mitra'])){
        echo '<div class="row">';
        echo '  <div class="col-md-12 text-center text-danger">';
        echo '      Belum Ada Mitra Yang Dipilih';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_mitra=$_POST['id_mitra'];
        //Jumlah Layanan
        $JumlahLayananMitra=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM mitra_layanan WHERE id_mitra='$id_mitra'"));
        if(empty($JumlahLayananMitra)){
            echo '<div class="row">';
            echo '  <div class="col-md-12 text-center text-danger">';
            echo '      Belum Ada Layanan Untuk Mitra Tersebut';
            echo '  </div>';
            echo '</div>';
        }else{
            $query = mysqli_query($Conn, "SELECT*FROM mitra_layanan WHERE id_mitra='$id_mitra' ORDER BY keterangan DESC");
            while ($data = mysqli_fetch_array($query)) {
                $id_mitra_layanan= $data['id_mitra_layanan'];
                $keterangan= $data['keterangan'];
                echo '<div class="row mb-4">';
                echo '  <div class="col-2 text-center mb-3">';
                echo '      <input class="form-check-input" type="radio" name="GetIdLayanan" id="GetIdLayanan'.$id_mitra_layanan.'" value="'.$id_mitra_layanan.'">';
                echo '  </div>';
                echo '  <div class="col-10">';
                echo '      <label for="GetIdLayanan'.$id_mitra_layanan.'"><b>'.$keterangan.'</b></label><br>';
                echo '  </div>';
                echo '</div>';
            }
        }
    }
?>