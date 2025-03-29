<!-- Topbar Start -->
<?php
    //Menangkap Page
    if(empty($_GET['Page'])){
        $Page="";
    }else{
        $Page=$_GET['Page'];
    }
    if(empty($_GET['id'])){
        $id="";
    }else{
        $id=$_GET['id'];
    }
    if($Page=="Tentang"){
        $TopText="";
    }
?>
<div class="container-fluid">
    <div class="row bg-gelap py-1 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center h-100 text-light text-nowrap">
                <a class="<?php if($Page==""){echo "text-primary";}else{echo "text-light";} ?> mr-3 w-100" href="index.php">Beranda</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center d-block d-lg-none">
                <?php 
                    if(!empty($SessionIdPelanggan)){ 
                        $JumlahPesanMasuk= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM chating WHERE id_pelanggan='$SessionIdPelanggan' AND status='Pending' AND (kategori='AdminToPelanggan' OR kategori='MitraToPelanggan')"));
                        $JumlahKeranjangPelanggan= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE id_pelanggan='$SessionIdPelanggan' AND status='Pending'"));
                ?>
                    <a href="index.php?Page=Inbox" class="btn px-0 ml-3">
                        <i class="fas fa-envelope text-light"></i>
                        <?php
                            if(!empty($JumlahPesanMasuk)){
                                echo '<span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">'.$JumlahPesanMasuk.'</span>';
                            }
                        ?>
                        
                    </a>
                    <!-- <a href="index.php?Page=Notifikasi" class="btn px-0 ml-3">
                        <i class="fas fa-bell text-light"></i>
                        <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">1</span>
                    </a> -->
                    <!-- <a href="index.php?Page=Keranjang" class="btn px-0 ml-3">
                        <i class="fas fa-shopping-cart text-light"></i>
                        <?php
                            if(!empty($JumlahKeranjangPelanggan)){
                                echo '<span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">'.$JumlahPesanMasuk.'</span>';
                            }
                        ?>
                    </a> -->
                    <a href="index.php?Page=Profile" class="btn px-0 ml-3">
                        <img src="<?php echo 'img/Pelanggan/'.$SessionGambar.''; ?>" alt="User Image" width="30px" class="rounded-circle">
                    </a>
                <?php }else{ ?>
                    <a href="index.php?Page=Login" class="btn btn-sm btn-primary w-100 mt-3">
                        Masuk/Daftar
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
        <div class="col-lg-4">
            <a href="index.php" class="text-decoration-none">
                <img src="<?php echo $base_url; ?>/assets/img/<?php echo $logo; ?>" width="80px" height="80px">
                <span class="h1 text-dark px-2"><?php echo "$title_page"; ?></span>
                <!-- <span class="h1 text-uppercase text-gelap bg-merah px-2 ml-n1">Rambut</span> -->
            </a>
        </div>
        <div class="col-lg-4 col-6 text-left">
            
        </div>
        <div class="col-lg-4 col-6 text-right">
            <p class="m-0">Layanan Pelanggan</p>
            <h5 class="m-0"><?php echo "$telepon_bisnis"; ?></h5>
        </div>
    </div>
</div>
<!-- Topbar End -->