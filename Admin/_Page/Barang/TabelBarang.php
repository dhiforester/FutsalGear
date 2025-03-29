<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //GetIdMitra
    if(!empty($_POST['GetIdMitra'])){
        $GetIdMitra=$_POST['GetIdMitra'];
    }else{
        $GetIdMitra="";
    }
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
        $batas="16";
    }
    //ShortBy
    if(!empty($_POST['ShortBy'])){
        $ShortBy=$_POST['ShortBy'];
        if($ShortBy=="ASC"){
            $NextShort="DESC";
        }else{
            $NextShort="ASC";
        }
    }else{
        $ShortBy="DESC";
        $NextShort="ASC";
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
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM produk WHERE nama_produk like '%$keyword%' OR brand like '%$keyword%' OR kategori like '%$keyword%' OR deskripsi like '%$keyword%'"));
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
            url     : "_Page/Barang/TabelBarang.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanTabelBarang').html(data);

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
            url     : "_Page/Barang/TabelBarang.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanTabelBarang').html(data);
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
                url     : "_Page/Barang/TabelBarang.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelBarang').html(data);
                }
            })
        });
    <?php } ?>
</script>
<?php
    if(empty($jml_data)){
        echo '<div class="row">';
        echo '  <div class="col-md-12">';
        echo '      <div class="card">';
        echo '          <div class="card-body text-center text-danger">';
        echo '              Tidak ada data barang yang ditampilkan.';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
        $no = 1+$posisi;
        //KONDISI PENGATURAN MASING FILTER
        if(empty($keyword_by)){
            if(empty($keyword)){
                $query = mysqli_query($Conn, "SELECT*FROM produk ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
            }else{
                $query = mysqli_query($Conn, "SELECT*FROM produk WHERE nama_produk like '%$keyword%' OR brand like '%$keyword%' OR kategori like '%$keyword%' OR deskripsi like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
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
            $nama_produk= $data['nama_produk'];
            $brand= $data['brand'];
            $kategori= $data['kategori'];
            $deskripsi= $data['deskripsi'];
            $foto= $data['foto'];
            $stok= $data['stok'];
            $harga= $data['harga'];
            $harga_rp = "Rp " . number_format($harga,0,',','.');
            $stok = "" . number_format($stok,0,',','.');
            $url_foto="assets/img/Barang/$foto";
            //Deskripsi
            $jumlah_karakter = strlen($deskripsi);
            //Routing Berdasarkan jumlah Karakter\
            if($jumlah_karakter<100){
                $FormatDeskripsi=$deskripsi;
            }else{
                $potong_kalimat = substr($deskripsi, 0, 100);
                $FormatDeskripsi="$potong_kalimat...";
            }
?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <b class="card-title">
                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalDetailProduk" data-id="<?php echo "$id_produk"; ?>">
                            <?php 
                                echo "$no. $nama_produk";
                            ?>
                        </a>
                    </b>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="assets/img/Barang/<?php echo $foto; ?>" width="100%">
                        </div>
                        <div class="col-md-5">
                            <ul>
                                <li> Kategori : <code class="text text-grayish"><?php echo "$kategori"; ?></code></li>
                                <li> Brand : <code class="text text-grayish"><?php echo "$brand"; ?></code></li>
                                <li> Stok : <code class="text text-grayish"><?php echo "$stok"; ?></code></li>
                                <li> Harga : <code class="text text-grayish"><?php echo "$harga_rp"; ?></code></li>
                            </ul>
                        </div>
                        <div class="col-md-5">
                            Deskripsi:<br>
                            <code class="text text-grayish"><?php echo "$FormatDeskripsi"; ?></code>
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#ModalVarianProduk" data-id="<?php echo "$id_produk"; ?>" title="List Varian Produk Produk">
                        <i class="bi bi-card-checklist"></i>
                    </button> 
                    <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditProduk" data-id="<?php echo "$id_produk"; ?>" title="Ubah Informasi Produk">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#ModalUbahFotoProduk" data-id="<?php echo "$id_produk"; ?>" title="Ubah Foto Produk">
                        <i class="bi bi-image"></i>
                    </button>  
                    <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#ModalGaleriProduk" data-id="<?php echo "$id_produk"; ?>" title="List Galeri Produk">
                        <i class="bi bi-memory"></i>
                    </button>  
                    <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapusProduk" data-id="<?php echo "$id_produk"; ?>" title="Hapus Data Produk">
                        <i class="bi bi-x"></i>
                    </button>  
                </div>
            </div>
        </div>
<?php $no++; }} ?>
<div class="row mt-4">
    <div class="col-md-12 text-center">
        <div class="btn-group shadow-0" role="group" aria-label="Basic example">
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
            <button class="btn btn-sm btn-outline-info" id="PrevPage" value="<?php echo $prev;?>">
                <span aria-hidden="true">«</span>
            </button>
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
                        echo '<button class="btn btn-sm btn-info" id="PageNumber'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }else{
                        echo '<button class="btn btn-sm btn-outline-info" id="PageNumber'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                    }
                }
            ?>
            <button class="btn btn-sm btn-outline-info" id="NextPage" value="<?php echo $next;?>">
                <span aria-hidden="true">»</span>
            </button>
        </div>
    </div>
</div>