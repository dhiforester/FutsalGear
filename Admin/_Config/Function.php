<?php
    //Verifikasi App
    function VerifikasiApp($NowIs,$username_acc,$key_acc){
        if($username_acc!=="f4a3229c9c5f1bdd9c6a6791080791b7"){
            $Response="false1";
        }else{
            if($key_acc!=="9255303f8208c9a43359a3b93b692b3d"){
                $Response="false2";
            }else{
                date_default_timezone_set('Asia/Jakarta');
                $now=date('Y-m-d H:i:s');
                $now=strtotime($now);
                if($NowIs<$now){
                    $Response="false3";
                }else{
                    $Response="true";
                }
            }
        }
        return $Response;
    }
    //Memanggil Detail Data
    function getDataDetail($Conn,$NamaDb,$NamaParam,$IdParam,$Kolom){
        $QryParam = mysqli_query($Conn,"SELECT * FROM $NamaDb WHERE $NamaParam='$IdParam'")or die(mysqli_error($Conn));
        $DataParam = mysqli_fetch_array($QryParam);
        if(empty($DataParam[$Kolom])){
            $Response="";
        }else{
            $Response=$DataParam[$Kolom];
        }
        return $Response;
    }
    //Membuat Token
    function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        $charLength = strlen($characters);
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charLength - 1)];
        }
        return $randomString;
    }
    //Send Email
    function SendEmail($NamaTujuan,$EmailTujuan,$Subjek,$Pesan,$email_gateway,$password_gateway,$url_provider,$nama_pengirim,$port_gateway,$url_service) {
        if(empty($NamaTujuan)){
            $Response="Nama tujuan pesan tidak boleh kosong!";
        }else{
            if(empty($EmailTujuan)){
                $Response="Email tujuan pesan tidak boleh kosong!";
            }else{
                if(empty($Subjek)){
                    $Response="Subjek pesan tidak boleh kosong!";
                }else{
                    if(empty($Pesan)){
                        $Response="Isi Pesan Tidak Boleh Kosong!";
                    }else{
                        if(empty($email_gateway)){
                            $Response="Akun Email Gateway Tidak Boleh Kosong!";
                        }else{
                            if(empty($password_gateway)){
                                $Response="Password Tidak Boleh Kosong!";
                            }else{
                                if(empty($url_provider)){
                                    $Response="URL Provider Tidak Boleh Kosong!";
                                }else{
                                    if(empty($nama_pengirim)){
                                        $Response="Nama pengirim Tidak Boleh Kosong!";
                                    }else{
                                        if(empty($port_gateway)){
                                            $Response="Port Tidak Boleh Kosong!";
                                        }else{
                                            if(empty($url_service)){
                                                $Response="Url Service Tidak Boleh Kosong!";
                                            }else{
                                                //Kirim email
                                                $ch = curl_init();
                                                $headers = array(
                                                    'Content-Type: Application/JSON',          
                                                    'Accept: Application/JSON'     
                                                );
                                                $arr = array(
                                                    "subjek" => "$Subjek",
                                                    "email_asal" => "$email_gateway",
                                                    "password_email_asal" => "$password_gateway",
                                                    "url_provider" => "$url_provider",
                                                    "nama_pengirim" => "$nama_pengirim",
                                                    "email_tujuan" => "$EmailTujuan",
                                                    "nama_tujuan" => "$NamaTujuan",
                                                    "pesan" => "$Pesan",
                                                    "port" => "$port_gateway"
                                                );
                                                $json = json_encode($arr);
                                                curl_setopt($ch, CURLOPT_URL, "$url_service");
                                                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                                curl_setopt($ch, CURLOPT_TIMEOUT, 3); 
                                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                                                curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                                $content = curl_exec($ch);
                                                $err = curl_error($ch);
                                                curl_close($ch);
                                                $get =json_decode($content, true);
                                                $Response=$content;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return $Response;
    }
    //Delete Data
    function DeleteData($Conn,$NamaDb,$NamaParam,$IdParam){
        $HapusData = mysqli_query($Conn, "DELETE FROM $NamaDb WHERE $NamaParam='$IdParam'") or die(mysqli_error($Conn));
        if($HapusData){
            $Response="Success";
        }else{
            $Response="Hapus Data Gagal";
        }
        return $Response;
    }
    function NamaHari($no){
        if($no==1){
            $Response="Senin";
        }else{
            if($no==2){
                $Response="Selasa";
            }else{
                if($no==3){
                    $Response="Rabu";
                }else{
                    if($no==4){
                        $Response="Kamis";
                    }else{
                        if($no==5){
                            $Response="Jumat";
                        }else{
                            if($no==6){
                                $Response="Sabtu";
                            }else{
                                if($no==7){
                                    $Response="Minggu";
                                }else{
                                    $Response="None";
                                }
                            }
                        }
                    }
                }
            }
        }
        return $Response;
    }
    //Hapus Produk
    function HapusProduk($Conn,$id_produk){
        $HapusBarang= mysqli_query($Conn, "DELETE FROM produk WHERE id_produk='$id_produk'") or die(mysqli_error($Conn));
        if($HapusBarang){
            $HapusReting= mysqli_query($Conn, "DELETE FROM reting WHERE id_produk='$id_produk'") or die(mysqli_error($Conn));
            if($HapusReting){
                $HapusDiskon= mysqli_query($Conn, "DELETE FROM diskon WHERE id_produk='$id_produk'") or die(mysqli_error($Conn));
                if($HapusDiskon){
                    $Response="Success";
                }else{
                    $Response="Terjadi Kesalahan Pada Saat Menghapus Diskon";
                }
            }else{
                $Response="Terjadi Kesalahan Pada Saat Menghapus Reting";
            }
        }else{
            $Response="Terjadi Kesalahan Pada Saat Menghapus Barang";
        }
        return $Response;
    }
    //Get Setting
    function OpenJsonFile($UrlJsonConfig,$ParameterNameSetting){
        $json_data = file_get_contents($UrlJsonConfig);
        $JsonDecode = json_decode($json_data, true);
        $Response=$JsonDecode[$ParameterNameSetting];
        return $Response;
    }
    //Get Status App
    function GetStatusApp($UrlServer,$AppId,$AppKey){
        $array = array(
            "app_id"=> "$AppId",
            "app_key"=>"$AppKey"
        );
        $json = json_encode($array);
        //Mulai CURL
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, "$UrlServer");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch,CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $content = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        $ambil_json =json_decode($content, true);
        return $ambil_json;
    }
?>