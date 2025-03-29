<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set('Asia/Jakarta');
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    //Validasi id_brand tidak boleh kosong
    if(empty($_POST['id_brand'])){
        echo '<small class="text-danger">ID Brand tidak boleh kosong</small>';
    }else{
        if(empty($_POST['nama_brand'])){
            echo '<small class="text-danger">Nama Brand tidak boleh kosong</small>';
        }else{
            if(empty($_POST['deskripsi'])){
                echo '<small class="text-danger">Deskripsi Brand tidak boleh kosong</small>';
            }else{
                //Buka data Kategori
                $id_brand=$_POST['id_brand'];
                $nama_brand=$_POST['nama_brand'];
                $deskripsi=$_POST['deskripsi'];
                $UpdateBrand = mysqli_query($Conn,"UPDATE brand SET 
                    nama_brand='$nama_brand',
                    deskripsi='$deskripsi'
                WHERE id_brand='$id_brand'") or die(mysqli_error($Conn)); 
                if($UpdateBrand){
                    echo '<small class="text-success" id="NotifikasiEditBrandBerhasil">Success</small>';
                }else{
                    echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                }
            }
        }
    }
?>