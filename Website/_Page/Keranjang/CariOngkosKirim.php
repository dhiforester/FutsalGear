<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['provinsi'])){
        echo '<span class="text-danger">Provinsi belum diisi</span>';
    }else{
        if(empty($_POST['kabupaten'])){
            echo '<span class="text-danger">Kabupaten belum diisi</span>';
        }else{
            if(empty($_POST['kecamatan'])){
                echo '<span class="text-danger">Kecamatan belum diisi</span>';
            }else{
                if(empty($_POST['desa'])){
                    echo '<span class="text-danger">Desa belum diisi</span>';
                }else{
                    if(empty($_POST['kurir'])){
                        echo '<span class="text-danger">Kurir belum diisi</span>';
                    }else{
                        $provinsi=$_POST['provinsi'];
                        $kabupaten=$_POST['kabupaten'];
                        $kecamatan=$_POST['kecamatan'];
                        $desa=$_POST['desa'];
                        $kurir=$_POST['kurir'];
                        //Mencari nilai ongkir
                        $QryOngkir = mysqli_query($Conn,"SELECT * FROM ongkir WHERE provinsi='$provinsi' AND kabupaten='$kabupaten' AND kecamatan='$kecamatan' AND desa='$desa' AND kurir='$kurir'")or die(mysqli_error($Conn));
                        $DataOngkir = mysqli_fetch_array($QryOngkir);
                        $ongkir= $DataOngkir['ongkir'];
                        $OngkirFormat = "Rp " . number_format($ongkir,0,',','.');
                        echo "$OngkirFormat";
                    }
                }
            }
        }
    }
?>