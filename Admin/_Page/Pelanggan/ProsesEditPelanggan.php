<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set("Asia/Jakarta");
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    //Id_pasien tidak boleh kosong
    if(empty($_POST['id_pelanggan'])){
        echo '<small class="text-danger">ID Pelanggan Tidak Boleh Kosong</small>';
    }else{
        //nama Tidak Boleh Kosong
        if(empty($_POST['nama'])){
            echo '<small class="text-danger">Nama Tidak Boleh Kosong</small>';
        }else{
            //kontak tidak boleh kosong
            if(empty($_POST['kontak'])){
                echo '<small class="text-danger">Kontak Pelanggan Tidak Boleh Kosong</small>';
            }else{
                //email tidak boleh kosong
                if(empty($_POST['email'])){
                    echo '<small class="text-danger">Email Tidak Boleh Kosong</small>';
                }else{
                    $id_pelanggan=$_POST['id_pelanggan'];
                    $nama=$_POST['nama'];
                    $email=$_POST['email'];
                    $kontak=$_POST['kontak'];
                    $JumlahKarakterKontak=strlen($_POST['kontak']);
                    if($JumlahKarakterKontak>20||$JumlahKarakterKontak<6||!preg_match("/^[0-9]*$/", $_POST['kontak'])){
                        echo '<small class="text-danger">Kontak hanya boleh terdiri dari 6-20 karakter numerik</small>';
                    }else{
                        //Validasi email
                        //Buka data pelanggan
                        $Qrypelanggan = mysqli_query($Conn,"SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'")or die(mysqli_error($Conn));
                        $Datapelanggan = mysqli_fetch_array($Qrypelanggan);
                        $email_lama= $Datapelanggan['email'];
                        if($email_lama!=="$email"){
                            $CekEmail=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pelanggan WHERE email='$email'"));
                        }else{
                            $CekEmail="";
                        }
                        if(!empty($CekEmail)){
                            echo '<small class="text-danger">Email tersebut sudah digunakan</small>';
                        }else{
                            //Simpan Data
                            $UpdatePelanggan = mysqli_query($Conn,"UPDATE pelanggan SET 
                                nama='$nama',
                                kontak='$kontak',
                                email='$email',
                                datetime_update='$now'
                            WHERE id_pelanggan='$id_pelanggan'") or die(mysqli_error($Conn)); 
                            if($UpdatePelanggan){
                                echo '<small class="text-success" id="NotifikasiEditPelangganBerhasil">Success</small>';
                            }else{
                                echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                            }
                        }
                    }
                }
            }
        }
    }
?>