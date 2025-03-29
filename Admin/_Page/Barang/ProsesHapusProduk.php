<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Function.php";
    if(empty($_POST['id_produk'])){
        echo '<span class="text-danger">ID Produk Tidak Boleh Kosong</span>';
    }else{
        $id_produk=$_POST['id_produk'];
        $QryProduk = mysqli_query($Conn,"SELECT * FROM produk WHERE id_produk='$id_produk'")or die(mysqli_error($Conn));
        $DataProduk = mysqli_fetch_array($QryProduk);
        $foto= $DataProduk['foto'];
        $UrlFoto="../../assets/img/Barang/$foto";
        unlink($UrlFoto);
        if(!file_exists("$UrlFoto")){
            $HapusProduk=HapusProduk($Conn,$id_produk);
            if($HapusProduk=="Success"){
                echo '<span class="text-success" id="NotifikasiHapusProdukBerhasil">Success</span>';
            }else{
                echo '<span class="text-danger">'.$HapusProduk.'</span>';
            }
        }else{
            echo '<span class="text-danger">Gagal Menghapus Foto Produk</span>';
        }
    }
?>