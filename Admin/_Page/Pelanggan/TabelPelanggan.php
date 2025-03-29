<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    date_default_timezone_set("Asia/Jakarta");
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
        $OrderBy="id_akses";
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
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE akses='Pelanggan'"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE akses='Pelanggan' AND (nama like '%$keyword%' OR kontak like '%$keyword%' OR email like '%$keyword%' OR akses like '%$keyword%')"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE akses='Pelanggan'"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM akses WHERE akses='Pelanggan' AND $keyword_by like '%$keyword%'"));
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
            url     : "_Page/Pelanggan/TabelPelanggan.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanTabelPelanggan').html(data);
                $('#PutPage').val(valueNext);

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
            url     : "_Page/Pelanggan/TabelPelanggan.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanTabelPelanggan').html(data);
                $('#PutPage').val(ValuePrev);
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
                url     : "_Page/Pelanggan/TabelPelanggan.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelPelanggan').html(data);
                    $('#PutPage').val(PageNumber);
                }
            })
        });
    <?php } ?>
</script>
<div class="row">
    <?php
        $no = 1+$posisi;
        //KONDISI PENGATURAN MASING FILTER
        if(empty($keyword_by)){
            if(empty($keyword)){
                $query = mysqli_query($Conn, "SELECT*FROM akses WHERE akses='Pelanggan' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
            }else{
                $query = mysqli_query($Conn, "SELECT*FROM akses WHERE akses='Pelanggan' AND (nama like '%$keyword%' OR kontak like '%$keyword%' OR email like '%$keyword%' OR akses like '%$keyword%') ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
            }
        }else{
            if(empty($keyword)){
                $query = mysqli_query($Conn, "SELECT*FROM akses WHERE akses='Pelanggan' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
            }else{
                $query = mysqli_query($Conn, "SELECT*FROM akses WHERE akses='Pelanggan' AND $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
            }
        }
        while ($data = mysqli_fetch_array($query)) {
            $id_akses= $data['id_akses'];
            $nama= $data['nama'];
            $kontak= $data['kontak'];
            $email= $data['email'];
            $akses= $data['akses'];
            //Foto
            if(empty($data['foto'])){
                $gambar="No-Image.png";
            }else{
                $gambar=$data['foto'];
            }
            //Buka Data Pelanggan
            $Qrypelanggan = mysqli_query($Conn,"SELECT * FROM pelanggan WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
            $Datapelanggan = mysqli_fetch_array($Qrypelanggan);
            $tanggal_daftar= $Datapelanggan['tanggal_daftar'];
            $datetime_daftar= strtotime($tanggal_daftar);
            $datetime_daftar=date('d/m/Y H:i', $datetime_daftar);

    ?>
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <b><?php echo "$no. $nama";?></b>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <img src="assets/img/User/<?php echo "$gambar"; ?>" alt="" width="100px" height="100px" class="rounded-circle">
                        </div>
                        <div class="col-md-9">
                            <div class="row mb-2">
                                <div class="col-md-6"><small>Nama Pelanggan</small></div>
                                <div class="col-md-6"><code class="text-secondary"><?php echo $nama; ?></code></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6"><small>Kontak</small></div>
                                <div class="col-md-6"><code class="text-secondary"><?php echo $kontak; ?></code></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6"><small>Email</small></div>
                                <div class="col-md-6"><code class="text-secondary"><?php echo $email; ?></code></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6"><small>Tanggal Daftar</small></div>
                                <div class="col-md-6"><code class="text-secondary"><?php echo $datetime_daftar; ?></code></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-sm btn-grayish" data-bs-toggle="modal" data-bs-target="#ModalDeletePelanggan" data-id="<?php echo "$id_akses"; ?>" title="Hapus Pelanggan">
                        <i class="bi bi-x"></i> Hapus Pelanggan
                    </button>
                </div>
            </div>
        </div>
    <?php $no++; } ?>
</div>
<div class="row">
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