<?php
    if(empty($_GET['id'])){
        $id="";
    }else{
        $id=$_GET['id'];
    }
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                <a class="breadcrumb-item text-dark" href="index.php?Page=Bantuan">Bantuan</a>
                <span class="breadcrumb-item active">Detail Bantuan</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Detail Bantuan</span></h2>
    <div class="row px-xl-5">
        <div class="col-lg-12 mb-5">
            <div class="bg-light p-30 mb-30">
                <?php
                    if(empty($_GET['id'])){
                        echo "Maaf ID Bantuan Tidak Boleh Kosong";
                    }else{
                        //Buka data bantuan
                        $QryBantuanDetail = mysqli_query($Conn,"SELECT * FROM help WHERE id_help='$id'")or die(mysqli_error($Conn));
                        $DataDetailBantuan = mysqli_fetch_array($QryBantuanDetail);
                        if(empty($DataDetailBantuan['id_help'])){
                            echo "Maaf ID Bantuan Tidak Valid";
                        }else{
                            $id_help= $DataDetailBantuan['id_help'];
                            $title= $DataDetailBantuan['title'];
                            $category= $DataDetailBantuan['category'];
                            $datetime= $DataDetailBantuan['datetime'];
                            $description= $DataDetailBantuan['description'];
                            $tanggal=date('d/m/Y', $datetime);
                            echo '<h4 class="mt-3">'.$category.'</h3>';
                            echo '<small>'.$category.' | '.$tanggal.'</small>';
                            echo '<p>'.$description.'</p>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->