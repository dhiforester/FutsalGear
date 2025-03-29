<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set('Asia/Jakarta');
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    //Validasi provinsi tidak boleh kosong
    if(empty($_POST['provinsi'])){
        echo '<small class="text-danger">Provinsi tidak boleh kosong</small>';
    }else{
        //Validasi kabupaten tidak boleh kosong
        if(empty($_POST['kabupaten'])){
            echo '<small class="text-danger">Kabupaten tidak boleh kosong</small>';
        }else{
            //Validasi kecamatan tidak boleh kosong
            if(empty($_POST['kecamatan'])){
                echo '<small class="text-danger">Kecamatan tidak boleh kosong</small>';
            }else{
                //Validasi desa tidak boleh kosong
                if(empty($_POST['desa'])){
                    echo '<small class="text-danger">Desa tidak boleh kosong</small>';
                }else{
                    //Validasi kurir tidak boleh kosong
                    if(empty($_POST['kurir'])){
                        echo '<small class="text-danger">Kurir tidak boleh kosong</small>';
                    }else{
                        //Validasi ongkir tidak boleh kosong
                        if(empty($_POST['ongkir'])){
                            echo '<small class="text-danger">Ongkir tidak boleh kosong</small>';
                        }else{
                            //Validasi ModeFormOngkir tidak boleh kosong
                            if(empty($_POST['ModeFormOngkir'])){
                                echo '<small class="text-danger">Mode Form Ongkir Tidak Diketahui</small>';
                            }else{
                                if(empty($_POST['id_ongkir'])){
                                    $id_ongkir="";
                                }else{
                                    $id_ongkir=$_POST['id_ongkir'];
                                }
                                //Validasi kontak tidak boleh duplikat
                                $ModeFormOngkir=$_POST['ModeFormOngkir'];
                                $provinsi=$_POST['provinsi'];
                                $kabupaten=$_POST['kabupaten'];
                                $kecamatan=$_POST['kecamatan'];
                                $desa=$_POST['desa'];
                                $kurir=$_POST['kurir'];
                                $ongkir=$_POST['ongkir'];
                                if($ModeFormOngkir=="Tambah"){
                                    $entry="INSERT INTO ongkir (
                                        provinsi,
                                        kabupaten,
                                        kecamatan,
                                        desa,
                                        kurir,
                                        ongkir
                                    ) VALUES (
                                        '$provinsi',
                                        '$kabupaten',
                                        '$kecamatan',
                                        '$desa',
                                        '$kurir',
                                        '$ongkir'
                                    )";
                                    $Input=mysqli_query($Conn, $entry);
                                    if($Input){
                                        echo '<small class="text-success" id="ProsesTambahOngkirBerhasil">Success</small>';
                                    }else{
                                        echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                                    }
                                }else{
                                    $UpdateOngkir = mysqli_query($Conn,"UPDATE ongkir SET 
                                        provinsi='$provinsi',
                                        kabupaten='$kabupaten',
                                        kecamatan='$kecamatan',
                                        desa='$desa',
                                        kurir='$kurir',
                                        ongkir='$ongkir'
                                    WHERE id_ongkir='$id_ongkir'") or die(mysqli_error($Conn)); 
                                    if($UpdateOngkir){
                                        echo '<small class="text-success" id="ProsesTambahOngkirBerhasil">Success</small>';
                                    }else{
                                        echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>