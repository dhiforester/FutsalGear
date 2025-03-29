<?php
    if(empty($_GET['Sub'])){
        include "_Page/Produk/ProdukHome2.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="Detail"){
            include "_Page/Produk/DetailProduk2.php";
        }
    }
?>