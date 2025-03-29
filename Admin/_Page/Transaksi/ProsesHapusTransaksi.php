<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_transaksi'])){
        echo '<span class="text-danger">ID Transaksi Tidak Boleh Kosong!</span>';
    }else{
        $id_transaksi=$_POST['id_transaksi'];
        //Buka Detail Pembayaran
        $QryPembayaran = mysqli_query($Conn,"SELECT * FROM pembayaran WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataPembayaran = mysqli_fetch_array($QryPembayaran);
        if(!empty($DataPembayaran['image_bukti'])){
            $image_bukti=$DataPembayaran['image_bukti'];
            $UrlImageBukti="../../assets/img/Pembayaran/$image_bukti";
        }else{
            $image_bukti="";
            $UrlImageBukti="";
        }
        //Proses Hapus Transaksi
        $HapusTransaksi = mysqli_query($Conn, "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn));
        if($HapusTransaksi){
            //Hapus Rincian
            $HapusRincian = mysqli_query($Conn, "DELETE FROM rincian WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn));
            if($HapusRincian){
                //Hapus Pembayaran
                $HapusPembayaran = mysqli_query($Conn, "DELETE FROM pembayaran WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn));
                if($HapusPembayaran){
                    $HapusPengiriman = mysqli_query($Conn, "DELETE FROM pengiriman WHERE id_transaksi='$id_transaksi'") or die(mysqli_error($Conn));
                    if($HapusPengiriman){
                        unlink($UrlImageBukti);
                        echo '<span class="text-success" id="NotifikasiHapusTransaksiBerhasil">Success</span>';
                    }else{
                        echo '<span class="text-danger">Hapus Pengiriman Gagal</span>';
                    }
                }else{
                    echo '<span class="text-danger">Hapus Pembayaran Gagal</span>';
                }
            }else{
                echo '<span class="text-danger">Hapus Rincian Transaksi Gagal</span>';
            }
        }else{
            echo '<span class="text-danger">Hapus Transaksi Gagal</span>';
        }
    }
?>