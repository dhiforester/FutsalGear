<?php
    //Karena Ini Di running Dengan JS maka Panggil Ulang Koneksi
    include "../_Config/Connection.php";
    include "../_Config/Session.php";
    //Menghitung Jumlah
    //Jumlah Chating Belum Dibaca
    $JumlahChatBelumDibaca=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM chat WHERE kategori='To Admin' AND status='Terkirim'"));
    //Jumlah Verifikasi Pembayaran Pending
    $JumlahMenungguVerifikasiPembayaran=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pembayaran WHERE status='Pending'"));
    //Jumlah Transaksi Lunas Belum Dikirim
    $JumlahTransaksiLunasBelumDikirim=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE status_pembayaran='Lunas' AND status_pengiriman='Pending'"));
    //Testimoni Belum Di Publish
    $JumlahTestimoniBelumDiPublish=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM testimoni WHERE status!='Publish'"));
    //Menghitung Jumlah Notifikasi
    $JumlahNotifikasi=$JumlahChatBelumDibaca+$JumlahMenungguVerifikasiPembayaran+$JumlahTransaksiLunasBelumDikirim+$JumlahTestimoniBelumDiPublish;
    //Apabila ada notifgikasi
    if($SessionAkses=="Customer Service"){
        if(!empty($JumlahNotifikasi)){
            echo '<i class="bi bi-bell"></i>';
            echo '<span class="badge bg-danger rounded-pill badge-number">'.$JumlahNotifikasi.'</span>';
        }else{
            //Apabila Tidak Ada
            echo '<i class="bi bi-bell"></i>';
        }
    }else{
        echo '<i class="bi bi-bell"></i>';
    }
?>