<?php
    if(empty($_GET['Sub'])){
        include "_Page/Transaksi/TransaksiHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="DetailTransaksi"){
            include "_Page/Transaksi/DetailTransaksi.php";
        }else{
            include "_Page/Transaksi/TransaksiHome.php";
        }
    }
?>