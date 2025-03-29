<?php
    if(empty($_GET['Sub'])){
        include "_Page/Chating/ChatingHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="DetailChat"){
            include "_Page/Chating/DetailChat.php";
        }else{
            include "_Page/Chating/ChatingHome.php";
        }
    }
?>