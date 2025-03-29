<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    include "../../_Config/SettingGeneral.php";
    //Keyword_by
    if(!empty($_POST['keyword_by'])){
        $keyword_by=$_POST['keyword_by'];
    }else{
        $keyword_by="";
    }
    //keyword
    if(!empty($_POST['keyword'])){
        $keyword=$_POST['keyword'];
    }else{
        $keyword="";
    }
    //batas
    if(!empty($_POST['batas'])){
        $batas=$_POST['batas'];
    }else{
        $batas="12";
    }
    //ShortBy
    if(!empty($_POST['ShortBy'])){
        $ShortBy=$_POST['ShortBy'];
    }else{
        $ShortBy="DESC";
    }
    //OrderBy
    if(!empty($_POST['OrderBy'])){
        $OrderBy=$_POST['OrderBy'];
    }else{
        $OrderBy="id_produk";
    }
    //Atur Page
    if(!empty($_POST['page'])){
        $page=$_POST['page'];
        $posisi = ( $page - 1 ) * $batas;
    }else{
        $page="1";
        $posisi = 0;
    }
    if(empty($keyword_by)){
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM produk"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM produk WHERE nama_produk like '%$keyword%' OR kategori like '%$keyword%' OR brand like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM produk"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM produk WHERE $keyword_by like '%$keyword%'"));
        }
    }
?>
<script>
    //ketika klik next
    $('#NextPage').click(function() {
        var valueNext=$('#NextPage').val();
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var keyword_by="<?php echo "$keyword_by"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/Produk/TabelProduk.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#TabelProduk').html(data);

            }
        })
    });
    //Ketika klik Previous
    $('#PrevPage').click(function() {
        var ValuePrev = $('#PrevPage').val();
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var keyword_by="<?php echo "$keyword_by"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/Produk/TabelProduk.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#TabelProduk').html(data);
            }
        })
    });
    <?php 
        $JmlHalaman =ceil($jml_data/$batas); 
        $a=1;
        $b=$JmlHalaman;
        for ( $i =$a; $i<=$b; $i++ ){
    ?>
        //ketika klik page number
        $('#PageNumber<?php echo $i;?>').click(function() {
            var PageNumber = $('#PageNumber<?php echo $i;?>').val();
            var batas="<?php echo "$batas"; ?>";
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Produk/TabelProduk.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#TabelProduk').html(data);
                }
            })
        });
    <?php } ?>
</script>
<div class="col-12 pb-1">
    <div class="bg-light p-4 mb-30">
        <div class="row">
            <div class="col-md-4 mb-2">
                <b>Keyword :</b> 
                <?php 
                    if(empty($keyword)){
                        echo "Semua Produk";
                    }else{
                        echo "$keyword"; 
                    }
                ?>
            </div>
            <div class="col-md-4 mb-2">
                <b>Showing :</b> <?php echo "$batas Item"; ?>
            </div>
            <div class="col-md-4 mb-2">
                <b>Order By :</b> 
                <?php 
                    echo "$OrderBy"; 
                ?>
            </div>
        </div>
    </div>
</div>
<?php
    if(empty($jml_data)){
        echo '<div class="col-12 pb-1">';
        echo '  <div class="bg-light p-4 mb-30 text-center">';
        echo '      Tidak ada data barang yang ditampilkan.';
        echo '  </div>';
        echo '</div>';
    }else{
        $no = 1+$posisi;
        //KONDISI PENGATURAN MASING FILTER
        if(empty($keyword_by)){
            if(empty($keyword)){
                $query = mysqli_query($Conn, "SELECT*FROM produk ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
            }else{
                $query = mysqli_query($Conn, "SELECT*FROM produk WHERE nama_produk like '%$keyword%' OR kategori like '%$keyword%' OR brand like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
            }
        }else{
            if(empty($keyword)){
                $query = mysqli_query($Conn, "SELECT*FROM produk ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
            }else{
                $query = mysqli_query($Conn, "SELECT*FROM produk WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
            }
        }
        while ($data = mysqli_fetch_array($query)) {
            $id_produk= $data['id_produk'];
            $id_brand= $data['id_brand'];
            $nama= $data['nama_produk'];
            $kategori= $data['kategori'];
            $brand= $data['brand'];
            $stok= $data['stok'];
            $harga= $data['harga'];
            $harga_rp = "Rp " . number_format($harga,0,',','.');
            if(empty($data['foto'])){
                $foto="";
            }else{
                $foto= $data['foto'];
            }
            //Menghitung reting
            $JumlahDataReting= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM reting WHERE id_produk='$id_produk'"));
            if(empty($JumlahDataReting)){
                $JumlahReting=0;
                $Reting=0;
            }else{
                $Sum = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(reting) AS reting FROM reting WHERE id_produk='$id_produk'"));
                $JumlahReting = $Sum['reting'];
                $Reting=$JumlahReting/$JumlahDataReting;
            }
            $Reting=round($Reting);
            //Membuka data diskon
            $QryDiskon = mysqli_query($Conn,"SELECT * FROM diskon WHERE id_produk='$id_produk' AND periode_awal<='$Sekarang' AND periode_akhir>='$Sekarang'")or die(mysqli_error($Conn));
            $DataDiskon = mysqli_fetch_array($QryDiskon);
            if(!empty($DataDiskon['id_diskon'])){
                $diskon=$DataDiskon['diskon'];
                $NilaiDiskon=($diskon/100)*$harga;
            }else{
                $diskon="";
                $NilaiDiskon=0;
            }
            $HargaSetelahDiskon=$harga-$NilaiDiskon;
            $HargaSetelahDiskonRp = "Rp " . number_format($HargaSetelahDiskon,0,',','.');
?>
            <div class="col-lg-4 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="<?php echo "$base_url/assets/img/Barang/$foto"; ?>" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="javascript:void(0);" title="Lihat Detail Produk" data-bs-toggle="modal" data-bs-target="#ModalDetailProduk" data-id="<?php echo "$id_produk"; ?>">
                                <i class="bi bi-info-circle"></i>
                            </a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalDetailProduk" data-id="<?php echo "$id_produk"; ?>" title="Lihat Detail Produk">
                            <?php echo "$nama"; ?>
                        </a>
                        <br>
                        <small>
                            <i class="bi bi-tags"></i></i> <?php echo "$kategori"; ?>
                        </small>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5><?php echo "$harga_rp"; ?></h5>
                            <h6 class="text-muted ml-2">
                                <del>
                                    <?php 
                                        if(!empty($DataDiskon['id_barang_diskon'])){
                                            echo "$harga_rp"; 
                                        }
                                    ?>
                                </del>
                            </h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star <?php if($Reting>=1){echo "text-primary";} ?> mr-1"></small>
                            <small class="fa fa-star <?php if($Reting>=2){echo "text-primary";} ?> mr-1"></small>
                            <small class="fa fa-star <?php if($Reting>=3){echo "text-primary";} ?> mr-1"></small>
                            <small class="fa fa-star <?php if($Reting>=4){echo "text-primary";} ?> mr-1"></small>
                            <small class="fa fa-star <?php if($Reting>=5){echo "text-primary";} ?> mr-1"></small>
                            <small>(<?php echo $Reting;?>)</small>
                        </div>
                        <p>
                            <?php
                                if(empty($stok)){
                                    echo '<span class="text-danger">Stok Habis</span>';
                                }else{
                                    echo '<span class="text-success">Barang Tersedia</span>';
                                }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
<?php $no++; }} ?>
<div class="col-12">
    <nav>
        <ul class="pagination justify-content-center">
            <?php
                //Mengatur Halaman
                $JmlHalaman = ceil($jml_data/$batas); 
                $JmlHalaman_real = ceil($jml_data/$batas); 
                $prev=$page-1;
                $next=$page+1;
                if($next>$JmlHalaman){
                    $next=$page;
                }else{
                    $next=$page+1;
                }
                if($prev<"1"){
                    $prev="1";
                }else{
                    $prev=$page-1;
                }
            ?>
            <li class="page-item">
                <a class="page-link" id="PrevPage" value="<?php echo $prev;?>" href="javascript:void(0);">
                    <i class="bi bi-arrow-left-circle"></i>
                </a>
            </li>
            <?php 
                //Navigasi nomor
                if($JmlHalaman>3){
                    if($page>=2){
                        $a=$page-1;
                        $b=$page+1;
                        if($JmlHalaman<=$b){
                            $a=$page-1;
                            $b=$JmlHalaman;
                        }
                    }else{
                        $a=1;
                        $b=$page+1;
                        if($JmlHalaman<=$b){
                            $a=1;
                            $b=$JmlHalaman;
                        }
                    }
                }else{
                    $a=1;
                    $b=$JmlHalaman;
                }
                for ( $i =$a; $i<=$b; $i++ ){
                    if($page=="$i"){
                        echo '<li class="page-item active" id="PageNumber'.$i.'" value="'.$i.'"><a class="page-link" href="javascript:void(0);">'.$i.'</a></li>';
                    }else{
                        echo '<li class="page-item" id="PageNumber'.$i.'" value="'.$i.'"><a class="page-link" href="javascript:void(0);">'.$i.'</a></li>';
                    }
                }
            ?>
            <li class="page-item" id="NextPage" value="<?php echo $next;?>">
                <a class="page-link" href="javascript:void(0);">
                    <i class="bi bi-arrow-right-circle"></i>
                </a>
            </li>
        </ul>
    </nav>
</div>