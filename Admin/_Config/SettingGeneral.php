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
    $base_url="http://localhost:81/madu_sport/";
    $author="Avif Mulyawan";
    $year="2023";
    $organization="Fakultas Ilmu Komputer - Universitas Kuningan";
    //SETTING VERIFIKASI APP
    //Membuka file Json
    $nama_file_json="config.json";
    //Parameter Koneksi Ke Server
    $datetime_expired=OpenJsonFile($nama_file_json,'datetime_expired');
    $UrlServer=OpenJsonFile($nama_file_json,'server_url');
    $AppId=OpenJsonFile($nama_file_json,'app_id');
    $AppKey=OpenJsonFile($nama_file_json,'app_key');
    //Apabila Waktu Sekarang Lebih Besar Dari Date Time Expired
    //Sudah saatnya cek status aplikasi
    if($StrtotimeDateTimeNow>$datetime_expired){
        //Cek Status Aplikasi Melalui Service
        $ResponseMonitor=GetStatusApp($UrlServer,$AppId,$AppKey);
        //Apabila Tidak Ada Response
        if(empty($ResponseMonitor['code'])){
            $code="";
            $message="";
            $id_app="";
            $id_client_list="";
            $nama_app="";
            $deskripsi="";
            $status_app="No Service";
        }else{
            $code=$ResponseMonitor['code'];
            //Apabila Response Code Bukan 200
            if($code!==200){
                $message=$ResponseMonitor['message'];
                $id_app="";
                $id_client_list="";
                $nama_app="";
                $deskripsi="";
                $status_app=$ResponseMonitor['message'];
            }else{
                //Apabila Response Berhasil
                $message=$ResponseMonitor['message'];
                $id_app=$ResponseMonitor['metadata']['id_app'];
                $id_client_list=$ResponseMonitor['metadata']['id_client_list'];
                $nama_app=$ResponseMonitor['metadata']['nama_app'];
                $deskripsi=$ResponseMonitor['metadata']['deskripsi'];
                $status_app=$ResponseMonitor['metadata']['status_app'];
                if($status_app=="Aktif"){
                    //Perbaharui JSON file Pengaturan
                    $ArrayJsonUpdate=array(
                        "datetime_creat"=> "$StrtotimeDateTimeNow",
                        "datetime_expired"=> "$SatuJamYangAkanDatang",
                        "server_url"=> "$UrlServer",
                        "app_id"=> "$AppId",
                        "app_key"=> "$AppKey",
                        "status"=> "$status_app",
                    );
                    $newJsonString = json_encode($ArrayJsonUpdate, JSON_PRETTY_PRINT); 
                    file_put_contents('config.json', $newJsonString);
                }
            }
        }
    }else{
        $code="";
        $message="";
        $id_app="";
        $id_client_list="";
        $nama_app="";
        $deskripsi="";
        $status_app="Aktif";
    }
?>