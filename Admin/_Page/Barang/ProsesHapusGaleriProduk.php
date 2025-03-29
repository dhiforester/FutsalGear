<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Function.php";
    if(empty($_POST['id_produk_galeri'])){
        echo '<span class="text-danger">ID Galeri Produk Tidak Boleh Kosong</span>';
    }else{
        $id_produk_galeri=$_POST['id_produk_galeri'];
        //Buka Detail
        $QryProduk = mysqli_query($Conn,"SELECT * FROM produk_galeri WHERE id_produk_galeri='$id_produk_galeri'")or die(mysqli_error($Conn));
        $DataProduk = mysqli_fetch_array($QryProduk);
        $galeri= $DataProduk['galeri'];
        //Buat URL
        $UrlFoto="../../assets/img/Barang/$galeri";
        //Hapus Galeri
        $HapusGaleri= mysqli_query($Conn, "DELETE FROM produk_galeri WHERE id_produk_galeri='$id_produk_galeri'") or die(mysqli_error($Conn));
        if($HapusGaleri){
            unlink($UrlFoto);
            echo '<span class="text-success" id="NotifikasiHapusGaleriBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Error</span>';
        }
    }
?>