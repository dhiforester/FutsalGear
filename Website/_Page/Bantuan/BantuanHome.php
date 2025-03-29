<?php
    if(empty($_GET['Kategori'])){
        $kategori="";
    }else{
        $kategori=$_GET['Kategori'];
    }
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                <span class="breadcrumb-item active">Bantuan</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Bantuan</span></h2>
    <div class="row px-xl-5">
        <div class="col-lg-4 mb-5">
            <div class="bg-light p-30 mb-30">
                <form action="javascript:void(0);" id="ProsesBatas">
                    <input type="hidden" name="keyword_by" id="keyword_by" value="<?php if(!empty($kategori)){echo "category";};?>">
                    <div class="input-group">
                        <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Cari Bantuan" value="<?php echo $kategori;?>">
                        <div class="input-group-append">
                            <button type="submit" class="input-group btn btn-md btn-primary text-light">
                                Cari
                            </button>
                        </div>
                    </div>
                </form>
                <h4 class="mt-3">Kategori</h3>
                <ul>
                    <?php
                        $JumlahSemua = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM help"));
                        echo '<li>';
                        if(empty($_GET['Kategori'])){
                            $kategori="";
                            echo '  <a href="index.php?Page=Bantuan" class="text-primary">Semua Bantuan ('.$JumlahSemua.')</a>';
                        }else{
                            $kategori=$_GET['Kategori'];
                            echo '  <a href="index.php?Page=Bantuan" class="text-dark">Semua Bantuan ('.$JumlahSemua.')</a>';
                        }
                        echo '</li>';
                        //Apabila ada laman mandiri
                        $QryKategoriBantuan = mysqli_query($Conn, "SELECT DISTINCT category FROM help");
                        while ($DataKategoriBantuan = mysqli_fetch_array($QryKategoriBantuan)) {
                            $category= $DataKategoriBantuan['category'];
                            //Jumlah Bantuan
                            $Jumlah = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM help WHERE category='$category'"));
                            echo '<li>';
                            if($kategori=="$category"){
                                echo '  <a href="index.php?Page=Bantuan&Kategori='.$category.'" class="text-primary">'.$category.' ('.$Jumlah.')</a>';
                            }else{
                                echo '  <a href="index.php?Page=Bantuan&Kategori='.$category.'" class="text-dark">'.$category.' ('.$Jumlah.')</a>';
                            }
                            echo '</li>';
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class="col-lg-8 mb-5" id="TabelBantuan">
            <div class="row">
                
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->