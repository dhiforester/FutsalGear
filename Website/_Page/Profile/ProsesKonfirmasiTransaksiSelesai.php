<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    $Tanggal=date('Y-m-d H:i:s');
    if(empty($_POST['id_transaksi'])){
        echo '<span class="text-danger">ID Transaksi Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['status_transaksi'])){
            echo '<span class="text-danger">Status Transaksi Tidak Boleh Kosong!</span>';
        }else{
            $id_transaksi=$_POST['id_transaksi'];
            $status_transaksi=$_POST['status_transaksi'];
            //Validasi Kelengkapan Data
            if($status_transaksi=="Selesai"){
                if(empty($_POST['testimoni'])){
                    $ValidasiKelengkapanData="Testimoni tidak boleh kosong!";
                }else{
                    if(empty($_POST['saran_kritik'])){
                        $ValidasiKelengkapanData="Saran dan kritik tidak boleh kosong!";
                    }else{
                        $testimoni=$_POST['testimoni'];
                        $saran_kritik=$_POST['saran_kritik'];
                        $ValidasiKelengkapanData="Valid";
                    }
                }
            }else{
                if(empty($_POST['keterangan'])){
                    $ValidasiKelengkapanData="Keterangan pengembalian tidak boleh kosong!";
                }else{
                    if(empty($_FILES['bukti']['name'])){
                        $ValidasiKelengkapanData="File bukti tidak boleh kosong!";
                    }else{
                        $keterangan=$_POST['keterangan'];
                        $ValidasiKelengkapanData="Valid";
                    }
                }
            }
            if($ValidasiKelengkapanData!=="Valid"){
                echo '<span class="text-danger">'.$ValidasiKelengkapanData.'</span>';
            }else{
                //Buka Resi Pengiriman
                $QryPengiriman = mysqli_query($Conn,"SELECT * FROM pengiriman WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                $DataPengiriman = mysqli_fetch_array($QryPengiriman);
                $no_resi=$DataPengiriman['no_resi'];
                //Tambahkan Ke Pengiriman
                $EntryPengiriman="INSERT INTO pengiriman (
                    id_transaksi,
                    no_resi,
                    tanggal,
                    keterangan,
                    status_pengiriman
                ) VALUES (
                    '$id_transaksi',
                    '$no_resi',
                    '$Tanggal',
                    '$status_transaksi',
                    '$status_transaksi'
                )";
                $InputPengiriman=mysqli_query($Conn, $EntryPengiriman);
                if($InputPengiriman){
                    //Update Transaksi
                    $UpdateTransaksi = mysqli_query($Conn,"UPDATE transaksi SET 
                        status_pengiriman='$status_transaksi'
                    WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn)); 
                    if($UpdateTransaksi){
                        if($status_transaksi=="Selesai"){
                            //Input Testimoni
                            $EntryTestimoni="INSERT INTO testimoni (
                                id_transaksi,
                                id_akses,
                                testimoni,
                                saran_kritik,
                                status
                            ) VALUES (
                                '$id_transaksi',
                                '$SessionIdAksesPelanggan',
                                '$testimoni',
                                '$saran_kritik',
                                'Draft'
                            )";
                            $InputTestimoni=mysqli_query($Conn, $EntryTestimoni);
                            if($InputTestimoni){
                                //Input Reting Secara Loop
                                $query = mysqli_query($Conn, "SELECT*FROM rincian WHERE id_transaksi='$id_transaksi'");
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_rincian= $data['id_rincian'];
                                    $id_produk= $data['id_produk'];
                                    //Tangkap Nilai Reting
                                    $reting=$_POST['reting'.$id_produk.''];
                                    $EntryReting="INSERT INTO reting (
                                        id_transaksi,
                                        id_rincian,
                                        id_produk,
                                        id_akses,
                                        reting
                                    ) VALUES (
                                        '$id_transaksi',
                                        '$id_rincian',
                                        '$id_produk',
                                        '$SessionIdAksesPelanggan',
                                        '$reting'
                                    )";
                                    $InputReting=mysqli_query($Conn, $EntryReting);
                                }
                                $_SESSION ["NotifikasiSwal"]="Konfirmasi Transaksi Berhasil";
                                echo '<small class="text-success" id="NotifikasiKonfirmasiTransaksiBerhasil">Success</small>';
                            }else{
                                echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data testimoni</small>';
                            }
                        }else{
                            //Proses Pembatalan
                            $nama_gambar=$_FILES['bukti']['name'];
                            //ukuran gambar
                            $ukuran_gambar = $_FILES['bukti']['size']; 
                            //tipe
                            $tipe_gambar = $_FILES['bukti']['type']; 
                            //sumber gambar
                            $tmp_gambar = $_FILES['bukti']['tmp_name'];
                            $timestamp = strval(time()-strtotime('1970-01-01 00:00:00'));
                            $key=implode('', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
                            $FileNameRand=$key;
                            $Pecah = explode("." , $nama_gambar);
                            $BiasanyaNama=$Pecah[0];
                            $Ext=$Pecah[1];
                            $namabaru = "$FileNameRand.$Ext";
                            $path = "../../../Admin/assets/img/Bukti/".$namabaru;
                            if($tipe_gambar == "image/jpeg"||$tipe_gambar == "image/jpg"||$tipe_gambar == "image/gif"||$tipe_gambar == "image/png"){
                                if($ukuran_gambar<2000000){
                                    if(move_uploaded_file($tmp_gambar, $path)){
                                        $ValidasiGambar="Valid";
                                    }else{
                                        $ValidasiGambar="Upload file bukti gambar gagal";
                                    }
                                }else{
                                    $ValidasiGambar="File gambar bukti tidak boleh lebih dari 2 mb";
                                }
                            }else{
                                $ValidasiGambar="tipe file bukti hanya boleh JPG, JPEG, PNG and GIF";
                            }
                            if($ValidasiGambar!=="Valid"){
                                echo '<small class="text-danger">'.$ValidasiGambar.'</small>';
                            }else{
                                //Input Pembatalan
                                $EntryPembatalan="INSERT INTO pembatalan (
                                    id_transaksi,
                                    keterangan,
                                    bukti
                                ) VALUES (
                                    '$id_transaksi',
                                    '$keterangan',
                                    '$namabaru'
                                )";
                                $InputPembatalan=mysqli_query($Conn, $EntryPembatalan);
                                if($InputPembatalan){
                                    $_SESSION ["NotifikasiSwal"]="Konfirmasi Transaksi Berhasil";
                                    echo '<small class="text-success" id="NotifikasiKonfirmasiTransaksiBerhasil">Success</small>';
                                }else{
                                    echo '<small class="text-danger">Input pembatalan gagal!</small>';
                                }
                            }
                        }
                    }else{
                        echo '<small class="text-danger">Terjadi kesalahan pada saat update data transaksi</small>';
                    }
                }else{
                    echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data pengiriman</small>';
                }
            }
        }
    }
?>