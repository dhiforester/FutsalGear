<?php
    if(empty($_GET['Sub'])){
        include "_page/Profile/ProfileHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="DetailTransaksi"){
            include "_page/Profile/DetailTransaksi.php";
        }
    }
?>