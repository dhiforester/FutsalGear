<?php
    date_default_timezone_set('Asia/Jakarta');
    //Koneksi
    include "../../_Config/Connection.php";
    //Get Data
    if(empty($_POST['id_transaksi'])){
        echo '<span class="text-danger">Id Transaksi Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['no_resi'])){
            echo '<span class="text-danger">Nomor Resi Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['keterangan'])){
                echo '<span class="text-danger">Keterangan Pengiriman Tidak Boleh Kosong!</span>';
            }else{
                if(empty($_POST['status_pengiriman'])){
                    echo '<span class="text-danger">Status Pengiriman Tidak Boleh Kosong!</span>';
                }else{
                    $id_transaksi=$_POST['id_transaksi'];
                    $no_resi=$_POST['no_resi'];
                    $keterangan=$_POST['keterangan'];
                    $status_pengiriman=$_POST['status_pengiriman'];
                    $tanggal=date('Y-m-d H:i:s');
                    //Simpan data
                    $entry="INSERT INTO pengiriman (
                        id_transaksi,
                        no_resi,
                        tanggal,
                        keterangan,
                        status_pengiriman
                    ) VALUES (
                        '$id_transaksi',
                        '$no_resi',
                        '$tanggal',
                        '$keterangan',
                        '$status_pengiriman'
                    )";
                    $Input=mysqli_query($Conn, $entry);
                    if($Input){
                        //Update Transaksi
                        $UpdateTransaksi = mysqli_query($Conn,"UPDATE transaksi SET 
                            status_pengiriman='$status_pengiriman'
                        WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn));
                        if($UpdateTransaksi){
                            echo '<small class="text-success" id="NotifikasiTambahRiwayatPengirimanBerhasil">Success</small>';
                        }else{
                            echo '<small class="text-danger">Terjadi kesalahan pada saat update transaksi</small>';
                        }
                    }else{
                        echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                    }
                }
            }
        }
    }
    //Selesai
?>