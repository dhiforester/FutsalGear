<?php 
    if(empty($_GET['Page'])){
        echo '<script type="text/javascript" src="_Page/Home/Home.js"></script>';
    }else{
        if($_GET['Page']=="Bantuan"){
            echo '<script type="text/javascript" src="_Page/Bantuan/Bantuan.js"></script>';
        }else{
            if($_GET['Page']=="Login"){
                echo '<script type="text/javascript" src="_Page/Login/Login.js"></script>';
            }else{
                if($_GET['Page']=="Pendaftaran"){
                    echo '<script type="text/javascript" src="_Page/Pendaftaran/Pendaftaran.js"></script>';
                }else{
                    if($_GET['Page']=="Artikel"){
                        echo '<script type="text/javascript" src="_Page/Artikel/Artikel.js"></script>';
                    }else{
                        if($_GET['Page']=="LupaPassword"){
                            echo '<script type="text/javascript" src="_Page/LupaPassword/LupaPassword.js"></script>';
                        }else{
                            if($_GET['Page']=="Profile"){
                                echo '<script type="text/javascript" src="_Page/Profile/Profile.js"></script>';
                            }else{
                                if($_GET['Page']=="Produk"){
                                    echo '<script type="text/javascript" src="_Page/Produk/Produk.js"></script>';
                                    echo '<script type="text/javascript" src="_Page/Home/Home.js"></script>';
                                }else{
                                    if($_GET['Page']=="Layanan"){
                                        echo '<script type="text/javascript" src="_Page/Layanan/Layanan.js"></script>';
                                    }else{
                                        if($_GET['Page']=="Mitra"){
                                            echo '<script type="text/javascript" src="_Page/Mitra/Mitra.js"></script>';
                                            echo '<script type="text/javascript" src="_Page/Home/Home.js"></script>';
                                        }else{
                                            if($_GET['Page']=="Booking"){
                                                echo '<script type="text/javascript" src="_Page/Booking/Booking.js"></script>';
                                            }else{
                                                if($_GET['Page']=="Hairstylist"){
                                                    echo '<script type="text/javascript" src="_Page/Hairstylist/Hairstylist.js"></script>';
                                                    echo '<script type="text/javascript" src="_Page/Home/Home.js"></script>';
                                                }else{
                                                    if($_GET['Page']=="Inbox"){
                                                        echo '<script type="text/javascript" src="_Page/Inbox/Inbox.js"></script>';
                                                        echo '<script type="text/javascript" src="_Page/Home/Home.js"></script>';
                                                    }else{
                                                        if($_GET['Page']=="Notifikasi"){
                                                            echo '<script type="text/javascript" src="_Page/Notifikasi/Notifikasi.js"></script>';
                                                        }else{
                                                            if($_GET['Page']=="Keranjang"){
                                                                echo '<script type="text/javascript" src="_Page/Keranjang/Keranjang.js"></script>';
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
            }
        }
    }
    //default Login
    // echo '<script type="text/javascript" src="_Page/Login/Login.js"></script>';
?>