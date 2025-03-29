<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set('Asia/Jakarta');
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    //Validasi id_transaksi tidak boleh kosong
    if(empty($_POST['id_transaksi'])){
        echo '<small class="text-danger">ID Transaksi tidak boleh kosong</small>';
    }else{
        //Validasi metode_pembayaran tidak boleh kosong
        if(empty($_POST['metode_pembayaran'])){
            echo '<small class="text-danger">Metode pembayaran tidak boleh kosong</small>';
        }else{
            //Validasi nama tidak boleh kosong
            if(empty($_POST['nama'])){
                echo '<small class="text-danger">Nama pemilik rekening tidak boleh kosong</small>';
            }else{
                //Validasi rekening tidak boleh kosong
                if(empty($_POST['rekening'])){
                    echo '<small class="text-danger">Nomorrekening tidak boleh kosong</small>';
                }else{
                    //Validasi rekening tidak boleh kosong
                    if(empty($_FILES['bukti_transfer']['name'])){
                        echo '<small class="text-danger">Nomorrekening tidak boleh kosong</small>';
                    }else{
                        $id_transaksi=$_POST['id_transaksi'];
                        $metode_pembayaran=$_POST['metode_pembayaran'];
                        $nama=$_POST['nama'];
                        $rekening=$_POST['rekening'];
                        //Apakah sudah ada data pembayaran sebelumnya?
                        $QryPembayaran = mysqli_query($Conn,"SELECT * FROM pembayaran WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                        $DataPembayaran = mysqli_fetch_array($QryPembayaran);
                        if(!empty($DataPembayaran['id_pembayaran'])){
                            $id_pembayaran= $DataPembayaran['id_pembayaran'];
                            $image_bukti= $DataPembayaran['image_bukti'];
                            $UrlBuktiPembayaranLama="../../../Admin/assets/img/Pembayaran/$image_bukti";
                        }else{
                            $id_pembayaran="";
                            $UrlBuktiPembayaranLama="";
                        }
                        //nama gambar
                        $nama_gambar=$_FILES['bukti_transfer']['name'];
                        //ukuran gambar
                        $ukuran_gambar = $_FILES['bukti_transfer']['size']; 
                        //tipe
                        $tipe_gambar = $_FILES['bukti_transfer']['type']; 
                        //sumber gambar
                        $tmp_gambar = $_FILES['bukti_transfer']['tmp_name'];
                        $timestamp = strval(time()-strtotime('1970-01-01 00:00:00'));
                        $key=implode('', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
                        $FileNameRand=$key;
                        $Pecah = explode("." , $nama_gambar);
                        $BiasanyaNama=$Pecah[0];
                        $Ext=$Pecah[1];
                        $namabaru = "$FileNameRand.$Ext";
                        $path = "../../../Admin/assets/img/Pembayaran/".$namabaru;
                        if($tipe_gambar == "image/jpeg"||$tipe_gambar == "image/jpg"||$tipe_gambar == "image/gif"||$tipe_gambar == "image/png"){
                            if($ukuran_gambar<2000000){
                                if(move_uploaded_file($tmp_gambar, $path)){
                                    if(!empty($DataPembayaran['id_pembayaran'])){
                                        unlink($UrlBuktiPembayaranLama);
                                    }
                                    $ValidasiGambar="Valid";
                                }else{
                                    $ValidasiGambar="Upload file gambar gagal";
                                }
                            }else{
                                $ValidasiGambar="File gambar tidak boleh lebih dari 2 mb";
                            }
                        }else{
                            $ValidasiGambar="tipe file hanya boleh JPG, JPEG, PNG and GIF";
                        }
                        //Apabila validasi upload valid maka simpan di database
                        if($ValidasiGambar!=="Valid"){
                            echo '<small class="text-danger">'.$ValidasiGambar.'</small>';
                        }else{
                            if(empty($DataPembayaran['id_pembayaran'])){
                                $entry="INSERT INTO pembayaran (
                                    id_transaksi,
                                    bank,
                                    nama,
                                    rekening,
                                    image_bukti,
                                    status
                                ) VALUES (
                                    '$id_transaksi',
                                    '$metode_pembayaran',
                                    '$nama',
                                    '$rekening',
                                    '$namabaru',
                                    'Pending'
                                )";
                                $Input=mysqli_query($Conn, $entry);
                                if($Input){
                                    $_SESSION ["NotifikasiSwal"]="Konfirmasi Pembayaran Berhasil";
                                    echo '<small class="text-success" id="NotifikasiKonfirmasiPembayaranBerhasil">Success</small>';
                                }else{
                                    echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                                }
                            }else{
                                $UpdatePembayaran = mysqli_query($Conn,"UPDATE pembayaran SET 
                                    bank='$metode_pembayaran',
                                    nama='$nama',
                                    rekening='$rekening',
                                    image_bukti='$namabaru'
                                WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn)); 
                                if($UpdatePembayaran){
                                    $_SESSION ["NotifikasiSwal"]="Konfirmasi Pembayaran Berhasil";
                                    echo '<small class="text-success" id="NotifikasiKonfirmasiPembayaranBerhasil">Success</small>';
                                }else{
                                    echo '<small class="text-danger">Terjadi kesalahan pada saat update data</small>';
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>