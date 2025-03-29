<?php
    include "_Page/Logout/ModalLogout.php";
    if(empty($_GET['Page'])){
        $Page="";
    }else{
        $Page=$_GET['Page'];
    }
    if($Page=="Akses"){
        include "_Page/Akses/ModalAkses.php";
    }else{
        if($Page=="MyProfile"){
            include "_Page/MyProfile/ModalMyProfile.php";
        }else{
            if($Page=="Barang"){
                include "_Page/Barang/ModalBarang.php";
            }else{
                if($Page=="Transaksi"){
                    include "_Page/Transaksi/ModalTransaksi.php";
                }else{
                    if($Page=="Chating"){
                        include "_Page/Chating/ModalChating.php";
                    }else{
                        if($Page=="SettingBank"){
                            include "_Page/SettingBank/ModalSettingBank.php";
                        }else{
                            if($Page=="Diskon"){
                                include "_Page/Diskon/ModalDiskon.php";
                            }else{
                                if($Page=="Ongkir"){
                                    include "_Page/Ongkir/ModalOngkir.php";
                                }else{
                                    if($Page=="Pelanggan"){
                                        include "_Page/Pelanggan/ModalPelanggan.php";
                                    }else{
                                        if($Page=="Testimoni"){
                                            include "_Page/Testimoni/ModalTestimoni.php";
                                        }else{
                                            if($Page=="Rating"){
                                                include "_Page/Rating/ModalRating.php";
                                            }else{
                                                if($Page=="Laporan"){
                                                    include "_Page/Laporan/ModalLaporan.php";
                                                }else{
                                                }
                                            }
                                        }
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