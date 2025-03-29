<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Get Data
    if(empty($_POST['id_produk'])){
        echo '<span class="text-danger">ID Produk Variant Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['grup_variant'])){
            echo '<span class="text-danger">Group Variant Tidak Boleh Kosong!</span>';
        }else{
            if(empty($_POST['value_variant'])){
                echo '<span class="text-danger">Value Variant Tidak Boleh Kosong!</span>';
            }else{
                $id_produk=$_POST['id_produk'];
                $grup_variant=$_POST['grup_variant'];
                $value_variant=$_POST['value_variant'];
                //Simpan data
                $entry="INSERT INTO produk_varian (
                    id_produk,
                    grup_variant,
                    value_variant
                ) VALUES (
                    '$id_produk',
                    '$grup_variant',
                    '$value_variant'
                )";
                $Input=mysqli_query($Conn, $entry);
                if($Input){
                    echo '<small class="text-success" id="NotifikasiTambahVariantBerhasil">Success</small>';
                }else{
                    echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                }
            }
        }
    }
?>