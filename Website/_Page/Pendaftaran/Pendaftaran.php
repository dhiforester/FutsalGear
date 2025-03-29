<?php
    if(empty($_GET['Sub'])){
        include "_Page/Pendaftaran/FormPendaftaran.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="Validasi"){
            include "_Page/Pendaftaran/ValidasiPendaftaran.php";
        }else{
            include "_Page/Pendaftaran/FormPendaftaran.php";
        }
    }
?>