<?php
    //koneksi dan session
    ini_set("display_errors","off");
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //keyword
    if(!empty($_POST['keyword_pelanggan'])){
        $keyword=$_POST['keyword_pelanggan'];
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
        $OrderBy="nama";
    }
    //Atur Page
    if(!empty($_POST['page'])){
        $page=$_POST['page'];
        $posisi = ( $page - 1 ) * $batas;
    }else{
        $page="1";
        $posisi = 0;
    }
    if(empty($keyword)){
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pelanggan"));
    }else{
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pelanggan WHERE nama like '%$keyword%' OR email like '%$keyword%' OR kontak like '%$keyword%' OR datetime_daftar like '%$keyword%' OR datetime_update like '%$keyword%'"));
    }
?>
<script>
    //ketika klik next
    $('#NextPagePelanggan').click(function() {
        var valueNext=$('#NextPagePelanggan').val();
        var batas=$('#batas').val();
        var keyword="<?php echo "$keyword"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/Transaksi/TabelPelanggan.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#TabelPelanggan').html(data);

            }
        })
    });
    //Ketika klik Previous
    $('#PrevPagePelanggan').click(function() {
        var ValuePrev = $('#PrevPagePelanggan').val();
        var batas=$('#batas').val();
        var keyword="<?php echo "$keyword"; ?>";
        var OrderBy="<?php echo "$OrderBy"; ?>";
        var ShortBy="<?php echo "$ShortBy"; ?>";
        $.ajax({
            url     : "_Page/Transaksi/TabelPelanggan.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#TabelPelanggan').html(data);
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
        $('#PageNumberPelanggan<?php echo $i;?>').click(function() {
            var PageNumber = $('#PageNumberPelanggan<?php echo $i;?>').val();
            var batas=$('#batas').val();
            var keyword="<?php echo "$keyword"; ?>";
            var OrderBy="<?php echo "$OrderBy"; ?>";
            var ShortBy="<?php echo "$ShortBy"; ?>";
            $.ajax({
                url     : "_Page/Transaksi/TabelPelanggan.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#TabelPelanggan').html(data);
                }
            })
        });
    <?php 
        } 
        //KONDISI PENGATURAN MASING FILTER
        if(empty($keyword)){
            $query = mysqli_query($Conn, "SELECT*FROM pelanggan ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
        }else{
            $query = mysqli_query($Conn, "SELECT*FROM pelanggan WHERE nama like '%$keyword%' OR email like '%$keyword%' OR kontak like '%$keyword%' OR datetime_daftar like '%$keyword%' OR datetime_update like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
        }
        while ($data = mysqli_fetch_array($query)) {
            $id_pelanggan= $data['id_pelanggan'];
            $nama= $data['nama'];
    ?>
        //ketika klik page number
        $('#PilihPelanggan<?php echo $id_pelanggan;?>').click(function() {
            $('#TabelPelanggan').html('Loading..');
            $('#MenampilkanTabelRincian').html('Loading...');
            $('#id_pelanggan').html('<option>Loading...</option>');
            var GetIdPelanggan="<?php echo $id_pelanggan;?>";
            var GetIdMitra = $('#id_mitra').val();
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Transaksi/TabelRincian.php',
                data 	    :  {id_mitra: GetIdMitra, id_pelanggan: GetIdPelanggan},
                success     : function(data){
                    $('#MenampilkanTabelRincian').html(data);
                }
            });
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Transaksi/PilihPelanggan.php',
                data 	    :  {id_pelanggan: GetIdPelanggan},
                success     : function(data){
                    $('#id_pelanggan').html(data);
                }
            });
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Transaksi/PilihPelanggan2.php',
                data 	    :  {id_pelanggan: GetIdPelanggan},
                success     : function(data){
                    $('#nama_pelanggan').val(data);
                }
            });
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Transaksi/PilihPelanggan3.php',
                data 	    :  {id_pelanggan: GetIdPelanggan},
                success     : function(data){
                    $('#email_pelanggan').val(data);
                }
            });
            $('#ModalCariPelanggan').modal('hide');
        });
    <?php
        }
    ?>
</script>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12 text-center" style="height: 300px; overflow-y: scroll;">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-items-center mb-0">
                    <thead class="">
                        <tr>
                            <th class="text-center">
                                <b>No</b>
                            </th>
                            <th class="text-center">
                                <b>Pelanggan</b>
                            </th>
                            <th class="text-center">
                                <b>Pilih</b>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(empty($jml_data)){
                                echo '<tr>';
                                echo '  <td class="text-center text-danger" colspan="3">Belum ada data pelanggan yang bisa ditampilkan</td>';
                                echo '</tr>';
                            }else{
                                $no = 1+$posisi;
                                //KONDISI PENGATURAN MASING FILTER
                                if(empty($keyword)){
                                    $query = mysqli_query($Conn, "SELECT*FROM pelanggan ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }else{
                                    $query = mysqli_query($Conn, "SELECT*FROM pelanggan WHERE nama like '%$keyword%' OR email like '%$keyword%' OR kontak like '%$keyword%' OR datetime_daftar like '%$keyword%' OR datetime_update like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                }
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_pelanggan= $data['id_pelanggan'];
                                    $nama= $data['nama'];
                                    $kontak= $data['kontak'];
                                    $email= $data['email'];
                                    $datetime_daftar= $data['datetime_daftar'];
                                    $datetime_update= $data['datetime_update'];
                                    date_default_timezone_set('Asia/Jakarta');
                                    $datetime_daftar= strtotime($datetime_daftar);
                                    $datetime_update= strtotime($datetime_update);
                                    $datetime_daftar=date('d/m/Y H:i', $datetime_daftar);
                                    $datetime_update=date('d/m/Y H:i', $datetime_update);
                        ?>
                            <tr>
                                <td class="text-center text-xs">
                                    <?php echo "$no" ?>
                                </td>
                                <td class="text-left text-xs" align="left">
                                    <?php echo "<b>$nama</b><br>" ?>
                                    <?php echo "$email" ?>
                                </td>
                                <td align="center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-success" value="<?php echo "$id_pelanggan"; ?>" id="PilihPelanggan<?php echo "$id_pelanggan"; ?>" title="Pilih Pelanggan">
                                            <i class="bi bi-check"></i>
                                        </button>   
                                    </div>
                                </td>
                            </tr>
                        <?php
                            $no++; }}
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3 text-center">
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
                <button class="btn btn-sm btn-outline-info" id="PrevPagePelanggan" value="<?php echo $prev;?>">
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
                            echo '<button class="btn btn-sm btn-info" id="PageNumberPelanggan'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                        }else{
                            echo '<button class="btn btn-sm btn-outline-info" id="PageNumberPelanggan'.$i.'" value="'.$i.'"><span aria-hidden="true">'.$i.'</span></button>';
                        }
                    }
                ?>
                <button class="btn btn-sm btn-outline-info" id="NextPagePelanggan" value="<?php echo $next;?>">
                    <span aria-hidden="true">»</span>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-dark btn-rounded" data-bs-dismiss="modal">
        <i class="bi bi-x-circle"></i> Tutup
    </button>
</div>

