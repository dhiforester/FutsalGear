<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set("Asia/Jakarta");
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    //Nama Pasien Tidak Boleh Kosong
    if(empty($_POST['nama'])){
        echo '<small class="text-danger">Nama Tidak Boleh Kosong</small>';
    }else{
        //kontak tidak boleh kosong
        if(empty($_POST['kontak'])){
            echo '<small class="text-danger">Kontak Tidak Boleh Kosong</small>';
        }else{
            //email tidak boleh kosong
            if(empty($_POST['email'])){
                echo '<small class="text-danger">Email Tidak Boleh Kosong</small>';
            }else{
                //password1 tidak boleh kosong
                if(empty($_POST['password1'])){
                    echo '<small class="text-danger">Password Tidak Boleh Kosong</small>';
                }else{
                    //password1 tidak boleh kosong
                    if(empty($_POST['password2'])){
                        echo '<small class="text-danger">Silahkan ulangi passwor dulu</small>';
                    }else{
                        $password1=$_POST['password1'];
                        $password2=$_POST['password2'];
                        //Password Tidak sama
                        if($password1!==$password2){
                            echo '<small class="text-danger">Password Tidak Sama</small>';
                        }else{
                            $nama=$_POST['nama'];
                            $email=$_POST['email'];
                            $kontak=$_POST['kontak'];
                            $password1=$_POST['password1'];
                            $password1=MD5($password1);
                            //Validasi email Data
                            $QryDuplikat = mysqli_query($Conn,"SELECT * FROM pelanggan WHERE email='$email'")or die(mysqli_error($Conn));
                            $DataBuplikat = mysqli_fetch_array($QryDuplikat);
                            if(!empty($DataBuplikat['id_pelanggan'])){
                                echo '<small class="text-danger">Email tersebut sudah digunakan!</small>';
                            }else{
                                $JumlahKarakterKontak=strlen($_POST['kontak']);
                                if($JumlahKarakterKontak>20||$JumlahKarakterKontak<6||!preg_match("/^[0-9]*$/", $_POST['kontak'])){
                                    echo '<small class="text-danger">Kontak hanya boleh maksimal 20 karakter numerik</small>';
                                }else{
                                    //Simpan Data
                                    $EntryPasien="INSERT INTO pelanggan (
                                        nama,
                                        kontak,
                                        email,
                                        password,
                                        datetime_daftar,
                                        datetime_update
                                    ) VALUES (
                                        '$nama',
                                        '$kontak',
                                        '$email',
                                        '$password1',
                                        '$now',
                                        '$now'
                                    )";
                                    $InputPasien=mysqli_query($Conn, $EntryPasien);
                                    if($InputPasien){
                                        $_SESSION ["NotifikasiSwal"]="Tambah Pelanggan Berhasil";
                                        echo '<small class="text-success" id="NotifikasiTambahPelangganBerhasil">Success</small>';
                                    }else{
                                        echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
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