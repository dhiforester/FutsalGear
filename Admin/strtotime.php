<?php
    include "_Config/Connection.php";
    include "_Config/Function.php";
    include "_Config/SettingGeneral.php";
    //Format datetime_expired
    $datetime_expired_format=date('Y-m-d H:i:s',$datetime_expired);
    $SatuJamYangAkanDatang=date('Y-m-d H:i:s',$SatuJamYangAkanDatang);
    echo "Sekarang: $StrtotimeDateTimeNow / $DateTimeNow<br>";
    echo "Expired: $datetime_expired / $datetime_expired_format<br>";
    if($StrtotimeDateTimeNow>$datetime_expired){
        echo "Status Aplikasi: $status_app<br>";
        echo "Status: Expired<br>";
        echo "Meta Data : $code<br>";
        echo "Satu Jam Yang Akan Datang: $SatuJamYangAkanDatang<br>";
        echo "newJsonString: $newJsonString<br>";
    }else{
        echo "Status: Active<br>";
    }
?>