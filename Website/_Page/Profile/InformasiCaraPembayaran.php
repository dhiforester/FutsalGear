<?php
    include "../../_Config/Connection.php";
    include "../../_Config/SettingGeneral.php";
    if(empty($_POST['metode_pembayaran'])){
        echo '<small class="text-danger">Belum ada informasi metode pembayaran!</small>';
    }else{
        $metode_pembayaran=$_POST['metode_pembayaran'];
        //Buka Detail Bank
        $QryBank = mysqli_query($Conn,"SELECT * FROM bank WHERE nama_bank='$metode_pembayaran'")or die(mysqli_error($Conn));
        $DataBank = mysqli_fetch_array($QryBank);
        $rekening= $DataBank['rekening'];
        $atas_nama= $DataBank['atas_nama'];
        $logo= $DataBank['logo'];
        echo '<div class="row">';
        echo '  <div class="col-md-4 text-center">';
        echo '      <img src="'.$base_url.'/assets/img/Bank/'.$logo.'" width="100%">';
        echo '  </div>';
        echo '  <div class="col-md-8">';
        echo '      <ul>';
        echo '          <li class="mb-3">Nama Bank : <br><code>'.$metode_pembayaran.'</code></li>';
        echo '          <li class="mb-3">Nomor Rekening : <br><code>'.$rekening.'</code></li>';
        echo '          <li class="mb-3">A/n : <br><code>'.$atas_nama.'</code></li>';
        echo '      </ul>';
        echo '  </div>';
        echo '</div>';
        
    }
?>