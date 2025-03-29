<?php
    if(empty($_GET['Sub'])){
        include "_Page/Barang/BarangHome.php";
    }else{
        $Sub=$_GET['Sub'];
        if($Sub=="Kategori"){
            include "_Page/Barang/KategoriBarang.php";
        }else{
            if($Sub=="DetailBarang"){
                include "_Page/Barang/DetailBarang.php";
            }
        }
    }
?>