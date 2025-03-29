<?php
    if(empty($_GET['Sub'])){
        include "_Page/Pelanggan/PelangganHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="Detail"){
            include "_Page/Pelanggan/DetailPelanggan.php";
        }else{
            include "_Page/Pelanggan/PelangganHome.php";
        }
    }
?>