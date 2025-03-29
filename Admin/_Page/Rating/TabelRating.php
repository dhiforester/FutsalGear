<?php
    //koneksi dan session
    include "../../_Config/Connection.php";
    //batas
    if(!empty($_POST['batas'])){
        $batas=$_POST['batas'];
    }else{
        $batas="10";
    }
    //ShortBy
    $ShortBy="DESC";
    //OrderBy
    $OrderBy="ave_reting";
    //Atur Page
    if(!empty($_POST['page'])){
        $page=$_POST['page'];
        $posisi = ( $page - 1 ) * $batas;
    }else{
        $page="1";
        $posisi = 0;
    }
    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM reting_rank"));
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
        $('#MenampilkanTabelRating').html("Loading...");
        $.ajax({
            url     : "_Page/Rating/TabelRating.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanTabelRating').html(data);
                $('#page').val(valueNext);
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
        $('#MenampilkanTabelRating').html("Loading...");
        $.ajax({
            url     : "_Page/Rating/TabelRating.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanTabelRating').html(data);
                $('#page').val(ValuePrev);
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
            $('#MenampilkanTabelRating').html("Loading...");
            $.ajax({
                url     : "_Page/Rating/TabelRating.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelRating').html(data);
                    $('#page').val(PageNumber);
                }
            })
        });
    <?php } ?>
</script>
<div class="card-body">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-items-center mb-0">
                    <thead class="">
                        <tr>
                            <th class="text-center"><b>No</b></th>
                            <th class="text-center"><b>Produk</b></th>
                            <th class="text-center"><b>Frekuensi</b></th>
                            <th class="text-center"><b>Jumlah</b></th>
                            <th class="text-center"><b>Rata-Rata</b></th>
                            <th class="text-center"><b>Opsi</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(empty($jml_data)){
                                echo '<tr>';
                                echo '  <td colspan="6">Belum Ada Data Rating Produk</td>';
                                echo '</tr>';
                            }else{
                                $no = 1+$posisi;
                                //KONDISI PENGATURAN MASING FILTER
                                $query = mysqli_query($Conn, "SELECT*FROM reting_rank ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_reting= $data['id_reting'];
                                    $id_produk= $data['id_produk'];
                                    $sum_reting= $data['sum_reting'];
                                    $frq_reting= $data['frq_reting'];
                                    $ave_reting= $data['ave_reting'];
                                    //Detail Produk
                                    $QryProduk = mysqli_query($Conn,"SELECT * FROM produk WHERE id_produk='$id_produk'")or die(mysqli_error($Conn));
                                    $DataProduk = mysqli_fetch_array($QryProduk);
                                    $id_brand= $DataProduk['id_brand'];
                                    $nama_produk= $DataProduk['nama_produk'];
                        ?>
                            <tr>
                                <td class="text-center text-xs"><?php echo "$no" ?></td>
                                <td class="text-left text-xs" align="left"><?php echo "$nama_produk" ?></td>
                                <td class="text-left text-xs" align="left"><?php echo "$frq_reting" ?></td>
                                <td class="text-left text-xs" align="left"><?php echo "$sum_reting" ?></td>
                                <td class="text-left text-xs" align="left"><?php echo "$ave_reting" ?></td>
                                <td align="center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-dark btn-sm GetEditButton" data-bs-toggle="modal" data-bs-target="#ModalDetailRating" data-id="<?php echo "$id_produk"; ?>">
                                            <i class="bi bi-info-circle"></i> Detail
                                        </button>  
                                    </div>
                                </td>
                            </tr>
                        <?php
                                    $no++; 
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
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