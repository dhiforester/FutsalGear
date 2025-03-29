<?php
    // session_destroy();   
    // session_unset();
    session_start();
    $_SESSION ["IdAksesPelanggan"]="";
    $_SESSION ["NotifikasiSwal"]="Logout Berhasil";
    header('Location:../../index.php?Page=Login');
?>