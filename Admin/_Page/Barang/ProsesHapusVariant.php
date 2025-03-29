<?php
    //Connection
    include "../../_Config/Connection.php";
    include "../../_Config/Function.php";
    if(empty($_POST['id_produk_varian'])){
        echo '<span class="text-danger">ID variant Produk Tidak Boleh Kosong</span>';
    }else{
        $id_produk_varian=$_POST['id_produk_varian'];
        $HapusVarian= mysqli_query($Conn, "DELETE FROM produk_varian WHERE id_produk_varian='$id_produk_varian'") or die(mysqli_error($Conn));
        if($HapusVarian){
            echo '<span class="text-success" id="NotifikasiHapusVarianBerhasil">Success</span>';
        }else{
            echo '<span class="text-danger">Error</span>';
        }
    }
?>