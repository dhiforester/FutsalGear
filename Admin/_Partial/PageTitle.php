<?php
    echo '<div class="pagetitle">';
    //Routing Page Title
    if(empty($_GET['Page'])){
        echo '<h1><i class="bi bi-grid"></i> Dashboard</h1>';
        echo '<nav>';
        echo '  <ol class="breadcrumb">';
        echo '      <li class="breadcrumb-item active">Dashboard</li>';
        echo '  </ol>';
        echo '</nav>';
    }else{
        if($_GET['Page']=="Akses"){
            echo '<h1><i class="bi bi-person"></i> Akses</h1>';
            echo '<nav>';
            echo '  <ol class="breadcrumb">';
            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
            echo '      <li class="breadcrumb-item active">Akses</li>';
            echo '  </ol>';
            echo '</nav>';
        }else{
            if($_GET['Page']=="MyProfile"){
                echo '<h1><i class="bi bi-person-circle"></i> Profile Saya</h1>';
                echo '<nav>';
                echo '  <ol class="breadcrumb">';
                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                echo '      <li class="breadcrumb-item active">Profile Saya</li>';
                echo '  </ol>';
                echo '</nav>';
            }else{
                if($_GET['Page']=="Help"){
                    echo '<h1><i class="bi bi-person-circle"></i> Bantuan</h1>';
                    echo '<nav>';
                    echo '  <ol class="breadcrumb">';
                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                    echo '      <li class="breadcrumb-item active">Bantuan</li>';
                    echo '  </ol>';
                    echo '</nav>';
                }else{
                    if($_GET['Page']=="Pelanggan"){
                        echo '<h1><i class="bi bi-people"></i> Pelanggan</h1>';
                        echo '<nav>';
                        echo '  <ol class="breadcrumb">';
                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                        echo '      <li class="breadcrumb-item active">Pelanggan</li>';
                        echo '  </ol>';
                        echo '</nav>';
                    }else{
                        if($_GET['Page']=="Barang"){
                            echo '<h1><i class="bi bi-box-seam"></i> Produk</h1>';
                            echo '<nav>';
                            echo '  <ol class="breadcrumb">';
                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                            echo '      <li class="breadcrumb-item active">Produk</li>';
                            echo '  </ol>';
                            echo '</nav>';
                        }else{
                            if($_GET['Page']=="Transaksi"){
                                echo '<h1><i class="bi bi-cart-check"></i> Transaksi</h1>';
                                echo '<nav>';
                                echo '  <ol class="breadcrumb">';
                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                echo '      <li class="breadcrumb-item active">Transaksi</li>';
                                echo '  </ol>';
                                echo '</nav>';
                            }else{
                                if($_GET['Page']=="SettingBank"){
                                    echo '<h1><i class="bi bi-bank"></i> Setting Bank</h1>';
                                    echo '<nav>';
                                    echo '  <ol class="breadcrumb">';
                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                    echo '      <li class="breadcrumb-item active">Setting Bank</li>';
                                    echo '  </ol>';
                                    echo '</nav>';
                                }else{
                                    if($_GET['Page']=="Chating"){
                                        echo '<h1><i class="bi bi-chat"></i> Inbox</h1>';
                                        echo '<nav>';
                                        echo '  <ol class="breadcrumb">';
                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                        echo '      <li class="breadcrumb-item active">Inbox</li>';
                                        echo '  </ol>';
                                        echo '</nav>';
                                    }else{
                                        if($_GET['Page']=="Diskon"){
                                            echo '<h1><i class="bi bi-gift"></i> Diskon</h1>';
                                            echo '<nav>';
                                            echo '  <ol class="breadcrumb">';
                                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                            echo '      <li class="breadcrumb-item active">Diskon</li>';
                                            echo '  </ol>';
                                            echo '</nav>';
                                        }else{
                                            if($_GET['Page']=="Ongkir"){
                                                echo '<h1><i class="bi bi-map"></i> Ongkir</h1>';
                                                echo '<nav>';
                                                echo '  <ol class="breadcrumb">';
                                                echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                echo '      <li class="breadcrumb-item active">Ongkir</li>';
                                                echo '  </ol>';
                                                echo '</nav>';
                                            }else{
                                                if($_GET['Page']=="Testimoni"){
                                                    echo '<h1><i class="bi bi-chat-dots-fill"></i> Testimoni</h1>';
                                                    echo '<nav>';
                                                    echo '  <ol class="breadcrumb">';
                                                    echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                    echo '      <li class="breadcrumb-item active">Testimoni</li>';
                                                    echo '  </ol>';
                                                    echo '</nav>';
                                                }else{
                                                    if($_GET['Page']=="Rating"){
                                                        echo '<h1><i class="bi bi-star"></i> Rating</h1>';
                                                        echo '<nav>';
                                                        echo '  <ol class="breadcrumb">';
                                                        echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                        echo '      <li class="breadcrumb-item active">Rating</li>';
                                                        echo '  </ol>';
                                                        echo '</nav>';
                                                    }else{
                                                        if($_GET['Page']=="Laporan"){
                                                            echo '<h1><i class="bi bi-printer"></i> Laporan</h1>';
                                                            echo '<nav>';
                                                            echo '  <ol class="breadcrumb">';
                                                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                            echo '      <li class="breadcrumb-item active">Laporan</li>';
                                                            echo '  </ol>';
                                                            echo '</nav>';
                                                        }else{
                                                            echo '<h1><i class="bi bi-emoji-angry"></i> Error</h1>';
                                                            echo '<nav>';
                                                            echo '  <ol class="breadcrumb">';
                                                            echo '      <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>';
                                                            echo '      <li class="breadcrumb-item active">Error</li>';
                                                            echo '  </ol>';
                                                            echo '</nav>';
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
    echo '</div>';
?>
