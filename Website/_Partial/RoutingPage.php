<?php
    if(empty($_GET['Page'])){
        include "_Page/Home/Home.php";
    }else{
        $Page=$_GET['Page'];
        if($Page=="Version"){
            include "_Page/Version/Version.php";
        }else{
            if($Page=="Tentang"){
                include "_Page/Tentang/Tentang.php";
            }else{
                if($Page=="Bantuan"){
                    include "_Page/Bantuan/Bantuan.php";
                }else{
                    if($Page=="Faq"){
                        include "_Page/Faq/Faq.php";
                    }else{
                        if($Page=="Login"){
                            include "_Page/Login/Login.php";
                        }else{
                            if($Page=="Pendaftaran"){
                                include "_Page/Pendaftaran/Pendaftaran.php";
                            }else{
                                if($Page=="LupaPassword"){
                                    include "_Page/LupaPassword/LupaPassword.php";
                                }else{
                                    if($Page=="LoginBerhasil"){
                                        include "_Page/Login/LoginBerhasil.php";
                                    }else{
                                        if($Page=="Profile"){
                                            include "_Page/Profile/Profile.php";
                                        }else{
                                            if($Page=="Produk"){
                                                include "_Page/Produk/Produk.php";
                                            }else{
                                                if($Page=="Inbox"){
                                                    include "_Page/Inbox/Inbox.php";
                                                }else{
                                                    if($Page=="Notifikasi"){
                                                        include "_Page/Notifikasi/Notifikasi.php";
                                                    }else{
                                                        if($Page=="Keranjang"){
                                                            include "_Page/Keranjang/Keranjang.php";
                                                        }else{
                                                            if($Page=="Testimoni"){
                                                                include "_Page/Testimoni/Testimoni.php";
                                                            }else{
                                                                if($Page=="Diskon"){
                                                                    include "_Page/Diskon/Diskon.php";
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
    }
?>