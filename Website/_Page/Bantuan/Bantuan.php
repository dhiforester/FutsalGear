<?php
    if(empty($_GET['Sub'])){
        include "_Page/Bantuan/BantuanHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="Detail"){
            include "_Page/Bantuan/BantuanDetail.php";
        }
    }
?>