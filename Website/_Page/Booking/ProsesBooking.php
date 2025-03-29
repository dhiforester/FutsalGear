<?php
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/SettingPayment.php";
    include "../../_Config/GlobalFunction.php";
    $TanggalBooking=date('Y-m-d H:i');
    $StrtotimeTanggal=strtotime($TanggalBooking);
    $tanggal_booking=date('Y-m-d H:i');
    if(empty($_POST['id_mitra'])){
        echo '<span class="text-danger">Mitra Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['id_mitra_layanan'])){
            echo '<span class="text-danger">Layanan Mitra Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['id_hairstylist'])){
                echo '<span class="text-danger">Hairstylist Tidak Boleh Kosong!</span>';
            }else{
                if(empty($_POST['tanggal'])){
                    echo '<span class="text-danger">Tanggal Booking Tidak Boleh Kosong!</span>';
                }else{
                    if(empty($_POST['jam'])){
                        echo '<span class="text-danger">Jam Booking Tidak Boleh Kosong!</span>';
                    }else{
                        if(empty($_POST['id_setting_bank'])){
                            echo '<span class="text-danger">Metode Pembayaran Tidak Boleh Kosong!</span>';
                        }else{
                            $id_mitra=$_POST['id_mitra'];
                            $id_mitra_layanan=$_POST['id_mitra_layanan'];
                            $id_hairstylist=$_POST['id_hairstylist'];
                            $tanggal_dilayani=$_POST['tanggal'];
                            $id_hairstylist_jadwal=$_POST['jam'];
                            $id_setting_bank=$_POST['id_setting_bank'];
                            //Buka Pelanggan
                            $id_pelanggan=$SessionIdPelanggan;
                            $nama_pelanggan=$SessionNama;
                            //Validasi Jadwal Terisi
                            $ValidasiJadwalSama = mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM booking WHERE tanggal_dilayani='$tanggal_dilayani' AND id_hairstylist_jadwal='$id_hairstylist_jadwal' AND (status_booking='Pending' OR status_booking='Booking')"));
                            //Validasi waktu booking
                            if(!empty($ValidasiJadwalSama)){
                                echo '<small class="text-danger">Waktu booking tersebut sudah terisi</small>';
                            }else{
                                //Membuat Kode transaksi
                                $Mikrotime=strtotime(date('Y-m-d H:i:s'));
                                $kode_transaksi="BK$id_pelanggan-$Mikrotime";
                                //Buka nomor hari dilayani
                                $hari_dilayani=getDataDetail($Conn,'hairstylist_jadwal','id_hairstylist_jadwal',$id_hairstylist_jadwal,'hari');
                                $jam_dilayani=getDataDetail($Conn,'hairstylist_jadwal','id_hairstylist_jadwal',$id_hairstylist_jadwal,'jam');
                                //Buka nama mitra
                                $nama_mitra=getDataDetail($Conn,'mitra','id_mitra',$id_mitra,'nama_mitra');
                                //Buka nama hairstylist
                                $nama_hairstylist=getDataDetail($Conn,'hairstylist','id_hairstylist',$id_hairstylist,'nama');
                                //Buka ID layanan
                                $id_layanan=getDataDetail($Conn,'mitra_layanan','id_mitra_layanan',$id_mitra_layanan,'id_layanan');
                                $harga_layanan=getDataDetail($Conn,'mitra_layanan','id_mitra_layanan ',$id_mitra_layanan,'harga');
                                //Buka nama layanan
                                $nama_layanan=getDataDetail($Conn,'layanan','id_layanan',$id_layanan,'nama_layanan');
                                if(empty($nama_layanan)){
                                    echo '<small class="text-danger">ID Layanan Tidak Valid</small>';
                                }else{
                                    //Jika dimasa depan mau ada diskon, utarakan disini
                                    $diskon_persen=0;
                                    $diskon_rp=0;
                                    //Utarakan nilai PPN berdasarkan settingan
                                    $biaya_adm=$biaya_adm;
                                    $ppn_persen=$ppn;
                                    if(!empty($ppn)){
                                        $ppn_rp=($ppn/100)*$harga_layanan;
                                    }else{
                                        $ppn_rp=0;
                                    }
                                    //Hitung Total
                                    $total=($harga_layanan+$ppn_rp+$biaya_adm)-$diskon_rp;
                                    //Utarakan metode Karena ini manual maka offline
                                    $metode="Online";
                                    //Utarakan Informasi Bank
                                    $nama_bank=getDataDetail($Conn,'setting_bank','id_setting_bank ',$id_setting_bank ,'nama_bank');
                                    $no_rek=getDataDetail($Conn,'setting_bank','id_setting_bank ',$id_setting_bank ,'rekening');
                                    $atas_nama=getDataDetail($Conn,'setting_bank','id_setting_bank ',$id_setting_bank ,'atas_nama');
                                    //Setiap booking yang masuk Pending dan harus di verifikasi pembayarannya
                                    $status_booking="Pending";
                                    $status_pembayaran="Pending";
                                    //Tambahkan Data ke booking
                                    $entry="INSERT INTO booking (
                                        id_pelanggan,
                                        id_mitra,
                                        id_mitra_layanan,
                                        id_hairstylist,
                                        id_hairstylist_jadwal,
                                        id_setting_bank,
                                        kode_transaksi,
                                        tanggal_booking,
                                        tanggal_dilayani,
                                        hari_dilayani,
                                        jam_dilayani,
                                        nama_pelanggan,
                                        nama_mitra,
                                        nama_hairstylist,
                                        nama_layanan,
                                        harga_layanan,
                                        diskon_persen,
                                        diskon_rp,
                                        biaya_adm,
                                        ppn_persen,
                                        ppn_rp,
                                        total,
                                        metode,
                                        nama_bank,
                                        no_rek,
                                        atas_nama,
                                        status_booking,
                                        status_pembayaran,
                                        info_pembayaran,
                                        alasan_batal
                                    ) VALUES (
                                        '$id_pelanggan',
                                        '$id_mitra',
                                        '$id_mitra_layanan',
                                        '$id_hairstylist',
                                        '$id_hairstylist_jadwal',
                                        '$id_setting_bank',
                                        '$kode_transaksi',
                                        '$tanggal_booking',
                                        '$tanggal_dilayani',
                                        '$hari_dilayani',
                                        '$jam_dilayani',
                                        '$nama_pelanggan',
                                        '$nama_mitra',
                                        '$nama_hairstylist',
                                        '$nama_layanan',
                                        '$harga_layanan',
                                        '$diskon_persen',
                                        '$diskon_rp',
                                        '$biaya_adm',
                                        '$ppn_persen',
                                        '$ppn_rp',
                                        '$total',
                                        '$metode',
                                        '$nama_bank',
                                        '$no_rek',
                                        '$atas_nama',
                                        '$status_booking',
                                        '$status_pembayaran',
                                        '',
                                        ''
                                    )";
                                    $Input=mysqli_query($Conn, $entry);
                                    if($Input){
                                        $_SESSION ["NotifikasiSwal"]="Tambah Booking Berhasil";
                                        echo '<small class="text-success" id="NotifikasiBookingBerhasil">Success</small>';
                                        echo '<input type="hidden" id="UrlBack" value="index.php?Page=Booking&Sub=Detail&kode_transaksi='.$kode_transaksi.'">';
                                    }else{
                                        echo '<small class="text-danger">Terjadi Kesalahan Pada Saat Menyimpan Data </small>';
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