<?php
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/SettingPayment.php";
    include "../../_Config/Function.php";
    $Sekarang=date('Y-m-d H:i:s');
    if(empty($_POST['id_kunjungan'])){
        echo 'ID Booking Tidak Ada!';
    }else{
        $id_kunjungan=$_POST['id_kunjungan'];
        $tanggal_booking=getDataDetail($Conn,'booking','id_kunjungan',$id_kunjungan,'tanggal_booking');
        $strtotime1=strtotime($tanggal_booking);
        //Limit
        $LimitWaktu=$limit_time*60;
        $ExpiredTime=$strtotime1+$LimitWaktu;
        //Menghitung Interval waktu
        //Awal
        $waktu_awal=date('Y-m-d H:i:s');
        $waktu_awal = new DateTime($waktu_awal);
        //  akhir
        $waktu_akhir=date('Y-m-d H:i:s',$ExpiredTime);
        $waktu_akhir = new DateTime($waktu_akhir);
        // Menghitung interval waktu (durasi) antara dua waktu
        if($waktu_akhir<$waktu_awal){
            $interval =0;
            // Mengambil informasi interval
            $interval_jam =0;
            $interval_menit =0;
            $interval_detik =0;
        }else{
            $interval = $waktu_awal->diff($waktu_akhir);
            // Mengambil informasi interval
            $interval_jam = $interval->format('%h');
            $interval_menit = $interval->format('%i');
            $interval_detik = $interval->format('%s');
        }
        echo ''.$interval_jam.' Jam, '.$interval_menit.' Min, '.$interval_detik.' Sec';
    }
?>