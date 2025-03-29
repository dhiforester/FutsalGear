<?php
    //Koneksi
    session_start();
    include "../../_Config/Connection.php";
    //Time Zone
    date_default_timezone_set("Asia/Jakarta");
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    //validasi Syarat dan Ketentuan
    if(empty($_POST['SyaratDanKetentuan'])){
        echo '<small class="text-danger">Anda harus memahami dan menyutujui syarat dan ketentuan terlebih dulu</small>';
    }else if(empty($_POST['nama'])){ //Validasi nama tidak boleh kosong
        echo '<small class="text-danger">Nama tidak boleh kosong</small>';
    }else{
        //Validasi kontak tidak boleh kosong
        if(empty($_POST['kontak'])){
            echo '<small class="text-danger">Kontak tidak boleh kosong</small>';
        }else{
            //Validasi email tidak boleh kosong
            if(empty($_POST['email'])){
                echo '<small class="text-danger">Email Perusahaan tidak boleh kosong</small>';
            }else{
                //Validasi password1 tidak boleh kosong
                if(empty($_POST['password1'])){
                    echo '<small class="text-danger">Kategori Perusahaan tidak boleh kosong</small>';
                }else{
                    //Validasi password2 tidak boleh kosong
                    if(empty($_POST['password2'])){
                        echo '<small class="text-danger">Provinsi tidak boleh kosong</small>';
                    }else{
                        //Validasi Password tidak boleh kosong
                        if($_POST['password1']!==$_POST['password2']){
                            echo '<small class="text-danger">Password Tidak sama</small>';
                        }else{
                            if(empty($_POST['provinsi'])){
                                $provinsi="";
                            }else{
                                $provinsi=$_POST['provinsi'];
                            }
                            if(empty($_POST['kabupaten'])){
                                $kabupaten="";
                            }else{
                                $kabupaten=$_POST['kabupaten'];
                            }
                            if(empty($_POST['kecamatan'])){
                                $kecamatan="";
                            }else{
                                $kecamatan=$_POST['kecamatan'];
                            }
                            if(empty($_POST['desa'])){
                                $desa="";
                            }else{
                                $desa=$_POST['desa'];
                            }
                            $QryOngkir = mysqli_query($Conn,"SELECT * FROM ongkir WHERE provinsi='$provinsi' AND kabupaten='$kabupaten' AND kecamatan='$kecamatan' AND desa='$desa'")or die(mysqli_error($Conn));
                            $DataOngkir = mysqli_fetch_array($QryOngkir);
                            if(empty($DataOngkir['id_ongkir'])){
                                $id_ongkir="0";
                            }else{
                                $id_ongkir= $DataOngkir['id_ongkir'];
                            }
                            //Variabel
                            $nama=$_POST['nama'];
                            $kontak=$_POST['kontak'];
                            $email=$_POST['email'];
                            $password1=$_POST['password1'];
                            $password1=MD5($password1);
                            $JumlahKontak=strlen($kontak);
                            //Validasi kontak tidak boleh lebih dari 20 karakter
                            if($JumlahKontak>20||$JumlahKontak<6||!preg_match("/^[0-9]*$/", $kontak)){
                                echo '<small class="text-danger">Kontak perusahaan hanya boleh terdiri dari 6-20 karakter</small>';
                            }else{
                                //Validasi kontak tidak boleh duplikat pada database
                                $ValidasiKontakDuplikat=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE kontak='$kontak' AND akses='Pelanggan'"));
                                if(!empty($ValidasiKontakDuplikat)){
                                    echo '<small class="text-danger">Kontak yang anda gunakan sudah terdaftar</small>';
                                }else{
                                    //Validasi email tidak boleh duplikat pada database
                                    $ValidasiEmail=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE email='$email' AND akses='Pelanggan'"));
                                    if(!empty($ValidasiEmail)){
                                        echo '<small class="text-danger">Email pemilik sudah terdaftar</small>';
                                    }else{
                                        //Simpan Data Pelanggan
                                        $EntryPelanggan="INSERT INTO akses (
                                            nama,
                                            kontak,
                                            email,
                                            password,
                                            akses,
                                            foto
                                        ) VALUES (
                                            '$nama',
                                            '$kontak',
                                            '$email',
                                            '$password1',
                                            'Pelanggan',
                                            ''
                                        )";
                                        $InputPelanggan=mysqli_query($Conn, $EntryPelanggan);
                                        if($InputPelanggan){
                                            //Buka id_akses
                                            $Qry = mysqli_query($Conn,"SELECT * FROM akses WHERE email='$email'")or die(mysqli_error($Conn));
                                            $Data = mysqli_fetch_array($Qry);
                                            $id_akses= $Data['id_akses'];
                                            //Simpan Ke Tabel Pelanggan
                                            $EntryPelanggan2="INSERT INTO pelanggan (
                                                id_akses,
                                                id_ongkir,
                                                tanggal_daftar,
                                                alamat_lengkap
                                            ) VALUES (
                                                '$id_akses',
                                                '$id_ongkir',
                                                '$now',
                                                ''
                                            )";
                                            $InputPelanggan2=mysqli_query($Conn, $EntryPelanggan2);
                                            if($InputPelanggan2){
                                                $_SESSION ["NotifikasiSwal"]="Pendaftaran Berhasil";
                                                echo 'Proses: <small class="text-success" id="NotifikasiPendaftaranBerhasil">Success</small><br>';
                                            }else{
                                                echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data pelanggan</small>';
                                            }
                                        }else{
                                            echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data akses</small>';
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
?>