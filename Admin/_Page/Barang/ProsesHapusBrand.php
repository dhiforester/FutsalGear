<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Function.php";
    if(empty($_POST['id_brand'])){
        echo '<span class="text-danger">ID Brand Tidak Boleh Kosong</span>';
    }else{
        $id_brand=$_POST['id_brand'];
        $id_brand=$_POST['id_brand'];
        $LogoLama=getDataDetail($Conn,'brand','id_brand',$id_brand,'logo');
        $PathLogolama = "../../assets/img/Brand/".$LogoLama;
        //Proses hapus Brand
        $HapusBrand= mysqli_query($Conn, "DELETE FROM brand WHERE id_brand='$id_brand'") or die(mysqli_error($Conn));
        if($HapusBrand){
            //Hapus Logo Brand
            unlink($PathLogolama);
            //Melakukan looping terhadap produk Berdasarkan Brand
            $query = mysqli_query($Conn, "SELECT*FROM produk WHERE id_brand='$id_brand'");
            while ($data = mysqli_fetch_array($query)) {
                $id_produk= $data['id_produk'];
                $foto= $data['foto'];
                $PathFotoProduk= "../../assets/img/Barang/".$foto;
                $hapusProduk=HapusProduk($Conn,$id_produk);
                if($hapusProduk=="Success"){
                    unlink($PathFotoProduk);
                }
            }
            echo '<span class="text-success" id="NotifikasiHapusBrandBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Hapus Brand Gagal</span>';
        }
    }
?>