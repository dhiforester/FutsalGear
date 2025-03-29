<?php
    if(empty($SessionIdPelanggan)){
        include "_Page/Booking/Login.php";
    }else{
        if(!empty($_GET['Sub'])){
            $Sub=$_GET['Sub'];
            if($Sub=="Detail"){
                include "_Page/Booking/DetailBooking.php";
            }else{
                include "_Page/Booking/FormBooking.php";
            }
        }else{
            include "_Page/Booking/FormBooking.php";
        }
    }

?>