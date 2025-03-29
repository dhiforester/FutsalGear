<?php
    if(empty($_GET['Page'])){
        $PageMenu="";
    }else{
        $PageMenu=$_GET['Page'];
    }
    if(empty($_GET['Sub'])){
        $SubMenu="";
    }else{
        $SubMenu=$_GET['Sub'];
    }
?>
<aside id="sidebar" class="sidebar menu_background">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link <?php if($PageMenu==""){echo "";}else{echo "collapsed";} ?>" href="index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <?php if($SessionAkses=="Customer Service"){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu=="Akses"||$PageMenu=="EntitasAkses"){echo "";}else{echo "collapsed";} ?>" href="index.php?Page=Akses">
                    <i class="bi bi-key"></i>
                    <span>Akses</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu!=="Barang"){echo "collapsed";} ?>" href="index.php?Page=Barang">
                    <i class="bi bi-box-seam"></i>
                    <span>Produk</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu!=="Pelanggan"){echo "collapsed";} ?>" href="index.php?Page=Pelanggan">
                    <i class="bi bi-people-fill"></i>
                    <span>Pelanggan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu!=="Ongkir"){echo "collapsed";} ?>" href="index.php?Page=Ongkir">
                    <i class="bi bi-map"></i>
                    <span>Ongkir</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu!=="Diskon"){echo "collapsed";} ?>" href="index.php?Page=Diskon">
                    <i class="bi bi-gift"></i>
                    <span>Diskon</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu!=="Transaksi"){echo "collapsed";} ?>" href="index.php?Page=Transaksi">
                    <i class="bi bi-cart-check"></i>
                    <span>Transaksi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu!=="Chating"){echo "collapsed";} ?>" href="index.php?Page=Chating">
                    <i class="bi bi-chat"></i>
                    <span>Inbox</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu!=="Rating"){echo "collapsed";} ?>" href="index.php?Page=Rating">
                    <i class="bi bi-star"></i>
                    <span>Rating</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu!=="Testimoni"){echo "collapsed";} ?>" href="index.php?Page=Testimoni">
                    <i class="bi bi-chat-dots-fill"></i>
                    <span>Testimoni</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu!=="SettingBank"){echo "collapsed";} ?>" href="index.php?Page=SettingBank">
                    <i class="bi bi-building"></i>
                    <span>Akun Bank</span>
                </a>
            </li>
        <?php } ?>
        <?php if($SessionAkses=="Pemilik"){ ?>
            <li class="nav-item">
                <a class="nav-link <?php if($PageMenu!=="Laporan"){echo "collapsed";} ?>" href="index.php?Page=Laporan">
                    <i class="bi bi-bar-chart-line"></i>
                    <span>Laporan</span>
                </a>
            </li>
        <?php } ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalLogout">
                <i class="bi bi-box-arrow-in-left"></i>
                <span>Keluar</span>
            </a>
        </li>
    </ul>
</aside>