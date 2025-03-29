<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    // include "../../_Config/Session.php";
    //Keyword_by
    if(!empty($_POST['keyword_by'])){
        $keyword_by=$_POST['keyword_by'];
    }else{
        $keyword_by="";
    }
    //keyword
    if(!empty($_POST['keyword_produk'])){
        $keyword=$_POST['keyword_produk'];
    }else{
        $keyword="";
    }
    //batas
    if(!empty($_POST['batas'])){
        $batas=$_POST['batas'];
    }else{
        $batas="10";
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
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM produk WHERE nama_produk like '%$keyword%' OR brand like '%$keyword%' OR kategori like '%$keyword%'"));
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
    //Pencarian
    $('#ProsesPencarianProduk').submit(function(){
        var ProsesPencarianProduk = $('#ProsesPencarianProduk').serialize();
        $('#MenampilkanDataProduk').html('Loading...');
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Diskon/TabelProduk.php',
            data 	    :  ProsesPencarianProduk,
            success     : function(data){
                $('#MenampilkanDataProduk').html(data);
            }
        });
    });
    //ketika klik next
    $('#NextPage').click(function() {
        var valueNext=$('#NextPage').val();
        var batas="<?php echo "$batas"; ?>";
        var keyword="<?php echo "$keyword"; ?>";
        var keyword_by="<?php echo "$keyword_by"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $('#MenampilkanDataProduk').html('Loading...');
        $.ajax({
            url     : "_Page/Diskon/TabelProduk.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanDataProduk').html(data);

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
        $('#MenampilkanDataProduk').html('Loading...');
        $.ajax({
            url     : "_Page/Diskon/TabelProduk.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanDataProduk').html(data);
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
            $('#MenampilkanDataProduk').html('Loading...');
            $.ajax({
                url     : "_Page/Diskon/TabelProduk.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanDataProduk').html(data);
                }
            })
        });
    <?php } ?>
</script>
<div class="row mt-4 p-0">
    <div class="col-md-12 text-center">
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-items-center mb-0">
                <thead class="">
                    <tr>
                        <th class="text-center">
                            <b>No</b>
                        </th>
                        <th class="text-center">
                            <b>Nama Produk</b>
                        </th>
                        <th class="text-center">
                            <b>Opsi</b>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(empty($jml_data)){
                            echo '<tr>';
                            echo '  <td colspan="5">';
                            echo '      <span class="text-danger">No Data</span>';
                            echo '  </td>';
                            echo '</tr>';
                        }else{
                            $no = 1+$posisi;
                            //KONDISI PENGATURAN MASING FILTER
                            if(empty($keyword_by)){
                                if(empty($keyword)){
                                    $query = mysqli_query($Conn, "SELECT*FROM produk ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }else{
                                    $query = mysqli_query($Conn, "SELECT*FROM produk WHERE nama_produk like '%$keyword%' OR brand like '%$keyword%' OR kategori like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
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
                                $nama_produk= $data['nama_produk'];
                                $brand= $data['brand'];
                                $kategori= $data['kategori'];
                                $harga= $data['harga'];
                                $HargaRp = "Rp " . number_format($harga,0,',','.');
                                $stok= $data['stok'];
                                //Mengambil Tahun
                                $strtotime=strtotime($tahun);
                                $TahunTerbit=date('F Y', $strtotime);
                                //Potong Judul apabila kepanjangan
                                $judul_potong = substr($judul,0,35);

                        ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <?php 
                                        echo "<small >$no</small>";
                                    ?>
                                </td>
                                <td class="text-left" align="left">
                                    <?php 
                                        echo '<span class="text-primary">';
                                        echo "<small><b>$nama_produk</b></small><br>";
                                        echo '</span>';
                                        echo "<small>Harga : $HargaRp</small><br>";
                                    ?>
                                </td>
                                <td align="center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#ModalTambahDiskon" data-id="<?php echo "$id_produk"; ?>">
                                            <i class="bi bi-check"></i> Pilih
                                        </button>  
                                    </div>
                                </td>
                            </tr>
                        <?php $no++; }} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card-footer text-center">
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