<?php
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/SettingPayment.php";
    include "../../_Config/Function.php";
    //Validasi id_kunjungan tidak boleh kosong
    if(empty($_POST['id_kunjungan'])){
        echo '<small class="text-danger">ID Kunjungan Tidak Boleh Kosong</small>';
    }else{
        if(empty($_POST['nama_bank'])){
            $Validasi="Nama Bank Tidak Boleh Kosong!";
            echo '<small class="text-danger">'.$Validasi.'</small>';
        }else{
            if(empty($_POST['norek'])){
                $Validasi="Nomor Rekening Tidak Boleh Kosong!";
                echo '<small class="text-danger">'.$Validasi.'</small>';
            }else{
                if(empty($_POST['atas_nama'])){
                    $Validasi="Nama Pemilik Rekening Tidak Boleh Kosong!";
                    echo '<small class="text-danger">'.$Validasi.'</small>';
                }else{
                    $id_kunjungan=$_POST['id_kunjungan'];
                    $nama_bank=$_POST['nama_bank'];
                    $norek=$_POST['norek'];
                    $atas_nama=$_POST['atas_nama'];
                    $InformasiRekening = array(
                        "nama_bank"=>$nama_bank,
                        "norek"=>$norek,
                        "atas_nama"=>$atas_nama
                    );
                    $info_pembayaran= json_encode($InformasiRekening);
                    //Update booking
                    $UpdateBooking = mysqli_query($Conn,"UPDATE booking SET 
                        status_pembayaran='Request',
                        info_pembayaran='$info_pembayaran'
                    WHERE id_kunjungan='$id_kunjungan'") or die(mysqli_error($Conn)); 
                    if($UpdateBooking){
                        $_SESSION ["NotifikasiSwal"]="Update Pembayaran Berhasil";
                        echo '<small class="text-success" id="NotifikasiPembayaranManualBerhasil">Success</small>';
                    }else{
                        echo '<small class="text-danger">Update booking gagal!</small>';
                    }
                }
            }
        }
    }
?>