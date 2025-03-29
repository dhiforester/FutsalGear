<?php
    //koneksi dan session
    date_default_timezone_set("Asia/Jakarta");
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
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
        $OrderBy="id_transaksi";
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
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal like '%$keyword%' OR nama_pelanggan like '%$keyword%' OR metode_pembayaran like '%$keyword%' OR kurir like '%$keyword%'  OR status_pembayaran like '%$keyword%'  OR status_pengiriman like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE $keyword_by like '%$keyword%'"));
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
            url     : "_Page/Transaksi/TabelTransaksi.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanTabelTransaksi').html(data);

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
            url     : "_Page/Transaksi/TabelTransaksi.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanTabelTransaksi').html(data);
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
                url     : "_Page/Transaksi/TabelTransaksi.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelTransaksi').html(data);
                }
            })
        });
    <?php } ?>
</script>
<div class="row">
    <?php
        if(empty($jml_data)){
            echo '<div class="col-md-12">';
            echo '  <div class="card">';
            echo '      <div class="card-body text-center text-danger">Belum Ada Data Transaksi</div>';
            echo '  </div>';
            echo '</div>';
        }else{
            $no = 1+$posisi;
            //KONDISI PENGATURAN MASING FILTER
            if(empty($keyword_by)){
                if(empty($keyword)){
                    $query = mysqli_query($Conn, "SELECT*FROM transaksi ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                }else{
                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal like '%$keyword%' OR nama_pelanggan like '%$keyword%' OR metode_pembayaran like '%$keyword%' OR kurir like '%$keyword%'  OR status_pembayaran like '%$keyword%'  OR status_pengiriman like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                }
            }else{
                if(empty($keyword)){
                    $query = mysqli_query($Conn, "SELECT*FROM transaksi ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                }else{
                    $query = mysqli_query($Conn, "SELECT*FROM transaksi WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                }
            }
            while ($data = mysqli_fetch_array($query)) {
                $id_transaksi= $data['id_transaksi'];
                $tanggal= $data['tanggal'];
                $nama_pelanggan= $data['nama_pelanggan'];
                $metode_pembayaran= $data['metode_pembayaran'];
                $kurir= $data['kurir'];
                $subtotal= $data['subtotal'];
                $ongkir= $data['ongkir'];
                $jumlah= $data['jumlah'];
                $status_pembayaran= $data['status_pembayaran'];
                $status_pengiriman= $data['status_pengiriman'];
                $subtotal = "Rp " . number_format($subtotal,0,',','.');
                $ongkir = "Rp " . number_format($ongkir,0,',','.');
                $jumlah = "Rp " . number_format($jumlah,0,',','.');
                $strtotime=strtotime($tanggal);
                $tanggal=date('d/m/Y H:i:s', $strtotime);
    ?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <b class="card-title">
                    <?php echo "$no. $nama_pelanggan (ID. $id_transaksi)"; ?>
                </b>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <ul>
                            <li>Tanggal : <br><code><?php echo $tanggal; ?></code></li>
                            <li>Metode Pembayaran : <br><code><?php echo $metode_pembayaran; ?></code></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul>
                            <li>Subtotal : <code><?php echo $subtotal; ?></code></li>
                            <li>Ongkir : <code><?php echo $ongkir; ?></code></li>
                            <li>Jumlah : <code><?php echo $jumlah; ?></code></li>
                            <li>Kurir : <code><?php echo $kurir; ?></code></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul>
                            <li>Status Pembayaran : <code><?php echo $status_pembayaran; ?></code></li>
                            <li>Status Pengiriman : <code><?php echo $status_pengiriman; ?></code></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="index.php?Page=Transaksi&Sub=DetailTransaksi&id=<?php echo "$id_transaksi"; ?>"  class="btn btn-outline-dark btn-sm">
                    <i class="bi bi-info-circle"></i> Detail Transaksi
                </a>  
                <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapusTransaksi" data-id="<?php echo "$id_transaksi"; ?>">
                    <i class="bi bi-x"></i> Hapus
                </button>  
            </div>
        </div>
    </div>
    <?php $no++; }} ?>
</div>
<div class="row mt-4 mb-4">
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
