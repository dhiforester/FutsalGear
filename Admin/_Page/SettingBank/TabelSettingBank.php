<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
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
        $OrderBy="id_setting_bank";
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
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM bank"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM bank WHERE nama_bank like '%$keyword%' OR rekening like '%$keyword%' OR atas_nama like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM bank"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM bank WHERE $keyword_by like '%$keyword%'"));
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
            url     : "_Page/SettingBank/TabelSettingBank.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanSettingBank').html(data);

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
            url     : "_Page/SettingBank/TabelSettingBank.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanSettingBank').html(data);
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
                url     : "_Page/SettingBank/TabelSettingBank.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanSettingBank').html(data);
                }
            })
        });
    <?php } ?>
</script>
<div class="row">
    <?php
        if(empty($jml_data)){
            echo '<div class="col-md-12 mb-3">';
            echo '  <div class="card">';
            echo '      <div class="card-body text-center text-danger">Belum Ada Data Bank</div>';
            echo '  </div>';
            echo '</div>';
        }else{
            $no = 1+$posisi;
            //KONDISI PENGATURAN MASING FILTER
            if(empty($keyword_by)){
                if(empty($keyword)){
                    $query = mysqli_query($Conn, "SELECT*FROM bank ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                }else{
                    $query = mysqli_query($Conn, "SELECT*FROM bank WHERE nama_bank like '%$keyword%' OR rekening like '%$keyword%' OR atas_nama like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                }
            }else{
                if(empty($keyword)){
                    $query = mysqli_query($Conn, "SELECT*FROM bank ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                }else{
                    $query = mysqli_query($Conn, "SELECT*FROM bank WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                }
            }
            while ($data = mysqli_fetch_array($query)) {
                $id_setting_bank=$data['id_setting_bank'];
                $nama_bank=$data['nama_bank'];
                $rekening=$data['rekening'];
                $atas_nama=$data['atas_nama'];
                if(empty($data['logo'])){
                    $UrlLogo="assets/img/Bank/No-Image.png";
                }else{
                    $logo=$data['logo'];
                    $UrlLogo="assets/img/Bank/$logo";
                }
    ?>
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <b class="card-title">
                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalDetailSettingBank" data-id="<?php echo "$id_setting_bank"; ?>" title="Lihat Detail">
                            <?php echo "$no. $nama_bank"; ?>
                        </a>
                    </b>
                </div>
                <div class="card-body profile-card pt-4 d-flex flex-column">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <img src="<?php echo "$UrlLogo";?>" alt="<?php echo $nama_bank;?>" width="70px" height="70px" class="rounded-circle">
                        </div>
                        <div class="col-md-9">
                            <ul>
                                <li><code class="text-secondary"><?php echo "$nama_bank"; ?></code></li>
                                <li><code class="text-secondary"><?php echo "$atas_nama"; ?></code></li>
                                <li><code class="text-secondary"><?php echo "$rekening"; ?></code></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEditSettingBank" data-id="<?php echo "$id_setting_bank,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Ubah Akun Bank">
                        <i class="bi bi-pencil-square"></i> Edit
                    </button>  
                    <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDeleteSettingBank" data-id="<?php echo "$id_setting_bank,$keyword,$batas,$ShortBy,$OrderBy,$page,$keyword_by"; ?>" title="Hapus Akun Bank">
                        <i class="bi bi-x"></i> Hapus
                    </button> 
                </div>
            </div>
        </div>
    <?php $no++; }} ?>
</div>
<div class="row">
    <div class="col-md-12 text-center mt-4">
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
