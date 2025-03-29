<?php
    if(empty($Page)){
        include "_Page/Home/ModalHome.php";
    }else{
        if($Page=="Version"){
            include "_Page/Home/ModalHome.php";
        }else{
            if($Page=="Profile"){
                include "_Page/Profile/ModalProfile.php";
            }else{
                if($Page=="Produk"){
                    include "_Page/Produk/ModalProduk.php";
                    include "_Page/Home/ModalHome.php";
                }else{
                    if($Page=="Layanan"){
                        include "_Page/Layanan/ModalLayanan.php";
                    }else{
                        if($Page=="Mitra"){
                            include "_Page/Mitra/ModalMitra.php";
                            include "_Page/Home/ModalHome.php";
                        }else{
                            if($Page=="Booking"){
                                include "_Page/Booking/ModalBooking.php";
                            }else{
                                if($Page=="Hairstylist"){
                                    include "_Page/Hairstylist/ModalHairstylist.php";
                                    include "_Page/Home/ModalHome.php";
                                }else{
                                    if($Page=="Inbox"){
                                        include "_Page/Inbox/ModalInbox.php";
                                        include "_Page/Home/ModalHome.php";
                                    }else{
                                        if($Page=="Notifikasi"){
                                            include "_Page/Notifikasi/ModalNotifikasi.php";
                                        }else{
                                            if($Page=="Keranjang"){
                                                include "_Page/Keranjang/ModalKeranjang.php";
                                            }else{
                                                include "_Page/Home/ModalHome.php";
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