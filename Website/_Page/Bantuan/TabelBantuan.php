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
    if(!empty($_POST['keyword'])){
        $keyword=$_POST['keyword'];
    }else{
        $keyword="";
    }
    //batas
    if(!empty($_POST['batas'])){
        $batas=$_POST['batas'];
    }else{
        $batas="5";
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
        $OrderBy="id_help";
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
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM help"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM help WHERE title like '%$keyword%' OR category like '%$keyword%' OR description like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM help"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM help WHERE $keyword_by like '%$keyword%'"));
        }
    }
?>
<script>
    //ketika klik next
    $('#NextPage').click(function() {
        var valueNext=$('#NextPage').val();
        var batas=$('#batas').val();
        var keyword="<?php echo "$keyword"; ?>";
        var keyword_by="<?php echo "$keyword_by"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/Bantuan/TabelBantuan.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#TabelBantuan').html(data);

            }
        })
    });
    //Ketika klik Previous
    $('#PrevPage').click(function() {
        var ValuePrev = $('#PrevPage').val();
        var batas=$('#batas').val();
        var keyword="<?php echo "$keyword"; ?>";
        var keyword_by="<?php echo "$keyword_by"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/Bantuan/TabelBantuan.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#TabelBantuan').html(data);
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
            var batas=$('#batas').val();
            var keyword="<?php echo "$keyword"; ?>";
            var keyword_by="<?php echo "$keyword_by"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Bantuan/TabelBantuan.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#TabelBantuan').html(data);
                }
            })
        });
    <?php } ?>
</script>
<?php
    $no = 1+$posisi;
    //KONDISI PENGATURAN MASING FILTER
    if(empty($keyword_by)){
        if(empty($keyword)){
            $query = mysqli_query($Conn, "SELECT*FROM help ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
        }else{
            $query = mysqli_query($Conn, "SELECT*FROM help WHERE title like '%$keyword%' OR category like '%$keyword%' OR description like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
        }
    }else{
        if(empty($keyword)){
            $query = mysqli_query($Conn, "SELECT*FROM help ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
        }else{
            $query = mysqli_query($Conn, "SELECT*FROM help WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
        }
    }
    while ($data = mysqli_fetch_array($query)) {
        $id_help= $data['id_help'];
        $title= $data['title'];
        $category= $data['category'];
        $datetime= $data['datetime'];
        $description= $data['description'];
        $tanggal=date('d/m/Y', $datetime);
?>
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="contact-form bg-light p-30">
                <h3>
                    <a href="index.php?Page=Bantuan&Sub=Detail&id=<?php echo "$id_help"; ?>">
                        <?php echo "$title"; ?>
                    </a>
                </h3>
                <i class="bi bi-tags"></i> <?php echo "$category"; ?><br>
                <p>
                    <?php echo "$description"; ?>
                </p>
                <i class="bi bi-clock-history"></i> <?php echo "$tanggal"; ?>
            </div>
        </div>
    </div>
<?php $no++; } ?>
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="contact-form bg-light p-30">
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
                <button class="btn btn-sm btn-outline-dark" id="PrevPage" value="<?php echo $prev;?>">
                    <span aria-hidden="true">« Previous</span>
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
                            echo '<button class="btn btn-sm btn-outline-primary" id="PageNumber'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                        }else{
                            echo '<button class="btn btn-sm btn-outline-dark" id="PageNumber'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                        }
                    }
                ?>
                <button class="btn btn-md btn-outline-dark" id="NextPage" value="<?php echo $next;?>">
                    <span aria-hidden="true">Next »</span>
                </button>
            </div>
        </div>
    </div>
</div>