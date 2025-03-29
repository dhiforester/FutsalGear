<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set('UTC');
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    $datetime=strtotime($now);
    //Validasi id_setting_bank tidak boleh kosong
    if(empty($_POST['id_setting_bank'])){
        echo '<small class="text-danger">ID Setting Bank Tidak Boleh Kosong</small>';
    }else{
        //Validasi nama_bank tidak boleh kosong
        if(empty($_POST['nama_bank'])){
            echo '<small class="text-danger">Nama Bank Tidak Boleh Kosong</small>';
        }else{
            //Validasi rekening tidak boleh kosong
            if(empty($_POST['rekening'])){
                echo '<small class="text-danger">Rekening Tidak Boleh Kosong</small>';
            }else{
                //Validasi atas_nama tidak boleh kosong
                if(empty($_POST['atas_nama'])){
                    echo '<small class="text-danger">Nama Pemilik rekening Tidak Boleh Kosong</small>';
                }else{
                    $id_setting_bank=$_POST['id_setting_bank'];
                    $nama_bank=$_POST['nama_bank'];
                    $rekening=$_POST['rekening'];
                    $atas_nama=$_POST['atas_nama'];
                    //Buka data Bank
                    $QrySettingBank = mysqli_query($Conn,"SELECT * FROM bank WHERE id_setting_bank='$id_setting_bank'")or die(mysqli_error($Conn));
                    $DataSettingBank = mysqli_fetch_array($QrySettingBank);
                    $nama_bank_lama= $DataSettingBank['nama_bank'];
                    $logo= $DataSettingBank['logo'];
                    //Validasi Duplikat
                    if($nama_bank_lama==$nama_bank){
                        $ValidasiBankDuplikat=0;
                    }else{
                        $ValidasiBankDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM bank WHERE nama_bank='$nama_bank'"));
                    }
                    if(!empty($ValidasiBankDuplikat)){
                        echo '<small class="text-danger">Rekening Bank Tersebut Sudah Ada</small>';
                    }else{
                        //Validasi rekening tidak boleh lebih dari 20 karakter
                        $JumlahRekening=strlen($_POST['rekening']);
                        if($JumlahRekening>20||$JumlahRekening<6||!preg_match("/^[0-9]*$/", $_POST['rekening'])){
                            echo '<small class="text-danger">Rekening terdiri dari 6-20 karakter numerik</small>';
                        }else{
                            if(empty($_FILES['logo']['name'])){
                                //Update data tanpa upload
                                $UpdateSettingBank = mysqli_query($Conn,"UPDATE bank SET 
                                    nama_bank='$nama_bank',
                                    rekening='$rekening',
                                    atas_nama='$atas_nama'
                                WHERE id_setting_bank='$id_setting_bank'") or die(mysqli_error($Conn));
                                if($UpdateSettingBank){
                                    echo '<small class="text-success" id="NotifikasiEditSettingBankBerhasil">Success</small>';
                                }else{
                                    echo '<small class="text-danger">Terjadi Kesalahan Pada Saat Menyimpan Data</small>';
                                }
                            }else{
                                //nama gambar
                                $nama_gambar=$_FILES['logo']['name'];
                                //ukuran gambar
                                $ukuran_gambar = $_FILES['logo']['size']; 
                                //tipe
                                $tipe_gambar = $_FILES['logo']['type']; 
                                //sumber gambar
                                $tmp_gambar = $_FILES['logo']['tmp_name'];
                                $timestamp = strval(time()-strtotime('1970-01-01 00:00:00'));
                                $key=implode('', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
                                $FileNameRand=$key;
                                $Pecah = explode("." , $nama_gambar);
                                $BiasanyaNama=$Pecah[0];
                                $Ext=$Pecah[1];
                                $namabaru = "$FileNameRand.$Ext";
                                $path = "../../assets/img/Bank/".$namabaru;
                                if($tipe_gambar == "image/jpeg"||$tipe_gambar == "image/jpg"||$tipe_gambar == "image/gif"||$tipe_gambar == "image/png"){
                                    if($ukuran_gambar<2000000){
                                        if(move_uploaded_file($tmp_gambar, $path)){
                                            $ValidasiGambar="Valid";
                                            //Hapus File Lama
                                            $UrlLogo="../../assets/img/Bank/$logo";
                                            if(file_exists("$UrlLogo")){
                                                unlink($UrlLogo);
                                            }
                                        }else{
                                            $ValidasiGambar="Image upload failed";
                                        }
                                    }else{
                                        $ValidasiGambar="File size cannot be more than 2 Mb";
                                    }
                                }else{
                                    $ValidasiGambar="File Types Can Only JPG, JPEG, PNG and GIF";
                                }
                                //Apabila validasi upload valid maka simpan di database
                                if($ValidasiGambar!=="Valid"){
                                    echo '<small class="text-danger">'.$ValidasiGambar.'</small>';
                                }else{
                                    //Update data tanpa upload
                                    $UpdateSettingBank = mysqli_query($Conn,"UPDATE bank SET 
                                        nama_bank='$nama_bank',
                                        rekening='$rekening',
                                        atas_nama='$atas_nama',
                                        logo='$namabaru'
                                    WHERE id_setting_bank='$id_setting_bank'") or die(mysqli_error($Conn));
                                    if($UpdateSettingBank){
                                        echo '<small class="text-success" id="NotifikasiEditSettingBankBerhasil">Success</small>';
                                    }else{
                                        echo '<small class="text-danger">Terjadi Kesalahan Pada Saat Menyimpan Data</small>';
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>