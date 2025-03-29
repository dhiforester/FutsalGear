<?php
    //Pengaturan Zona Waktu
    date_default_timezone_set('Asia/Jakarta');
    //Ciptakan Variabel Waktu
    $DateTimeNow=date('Y-m-d H:i:s');
    $StrtotimeDateTimeNow=strtotime($DateTimeNow);
    //Set Update Setiap Satu Jam
    $SatuJamYangAkanDatang=$StrtotimeDateTimeNow+ 60*60;
    //SETTING HALAMAN WEB
    $title_page="Madu Sport";
    $kata_kunci="Alat olahraga, CRM, madu sport, Kuningan";
    $deskripsi="Toko peralatan olahraga paling lengkap dikuningan";
    $alamat_bisnis="Jl. Pramuka No.327, Purwawinangun, Kec. Kuningan, Kabupaten Kuningan, Jawa Barat 45512";
    $email_bisnis="madu_sport@gmail.com";
    $telepon_bisnis="(0232)8776240";
    $favicon="logo.png";
    $logo= "logo.png";
    $base_url="http://localhost:81/madu_sport/Admin";
    $author="Avif Mulyawan";
    $year="2023";
    $organization="Fakultas Ilmu Komputer - Universitas Kuningan";
    $google_map='<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126729.78587300704!2d108.32731962203978!3d-6.973201672597646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f16817279d4cd%3A0x89d2bfe4d3168ee8!2sMadu%20Sports!5e0!3m2!1sen!2sid!4v1698949384171!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
?>