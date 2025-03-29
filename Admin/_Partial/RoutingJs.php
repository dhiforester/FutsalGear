<?php 
    //Universal JS
    echo '<script type="text/javascript" src="_Partial/Universal.js"></script>';
    //Routing JS
    if(empty($_GET['Page'])){
        echo '<script type="text/javascript" src="_Page/Dashboard/Dashboard.js"></script>';
    }else{
        if($_GET['Page']=="Akses"){
            echo '<script type="text/javascript" src="_Page/Akses/Akses.js"></script>';
        }else{
            if($Page=="MyProfile"){
                echo '<script type="text/javascript" src="_Page/MyProfile/MyProfile.js"></script>';
            }else{
                if($Page=="Help"){
                    echo '<script type="text/javascript" src="_Page/Help/Help.js"></script>';
                }else{
                    if($Page=="Barang"){
                        echo '<script type="text/javascript" src="_Page/Barang/Barang.js"></script>';
                    }else{
                        if($Page=="Transaksi"){
                            echo '<script type="text/javascript" src="_Page/Transaksi/Transaksi.js"></script>';
                        }else{
                            if($Page=="Pelanggan"){
                                echo '<script type="text/javascript" src="_Page/Pelanggan/Pelanggan.js"></script>';
                            }else{
                                if($Page=="SettingBank"){
                                    echo '<script type="text/javascript" src="_Page/SettingBank/SettingBank.js"></script>';
                                }else{
                                    if($Page=="Chating"){
                                        echo '<script type="text/javascript" src="_Page/Chating/Chating.js"></script>';
                                    }else{
                                        if($Page=="Diskon"){
                                            echo '<script type="text/javascript" src="_Page/Diskon/Diskon.js"></script>';
                                        }else{
                                            if($Page=="Ongkir"){
                                                echo '<script type="text/javascript" src="_Page/Ongkir/Ongkir.js"></script>';
                                            }else{
                                                if($Page=="Testimoni"){
                                                    echo '<script type="text/javascript" src="_Page/Testimoni/Testimoni.js"></script>';
                                                }else{
                                                    if($Page=="Rating"){
                                                        echo '<script type="text/javascript" src="_Page/Rating/Rating.js"></script>';
                                                    }else{
                                                        if($Page=="Laporan"){
                                                            echo '<script type="text/javascript" src="_Page/Laporan/Laporan.js"></script>';
                                                        }else{
                                                            echo '<script type="text/javascript" src="_Page/Dashboard/Dashboard.js"></script>';
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
        }
    }
    //default Login
    echo '<script type="text/javascript" src="_Page/Login/Login.js"></script>';
    echo '<script type="text/javascript" src="_Page/ResetPassword/ResetPassword.js"></script>';
?>