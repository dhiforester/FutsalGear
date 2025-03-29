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
        $OrderBy="id_ongkir";
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
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM ongkir"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM ongkir WHERE provinsi like '%$keyword%' OR kabupaten like '%$keyword%' OR kecamatan like '%$keyword%' OR desa like '%$keyword%' OR kurir like '%$keyword%'"));
        }
    }else{
        if(empty($keyword)){
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM ongkir"));
        }else{
            $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM ongkir WHERE $keyword_by like '%$keyword%'"));
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
        $('#MenampilkanTabelOngkir').html("Loading...");
        $.ajax({
            url     : "_Page/Ongkir/TabelOngkir.php",
            method  : "POST",
            data 	:  { page: valueNext, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success: function (data) {
                $('#MenampilkanTabelOngkir').html(data);
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
        $('#MenampilkanTabelOngkir').html("Loading...");
        $.ajax({
            url     : "_Page/Ongkir/TabelOngkir.php",
            method  : "POST",
            data 	:  { page: ValuePrev,batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
            success : function (data) {
                $('#MenampilkanTabelOngkir').html(data);
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
            $('#MenampilkanTabelOngkir').html("Loading...");
            $.ajax({
                url     : "_Page/Ongkir/TabelOngkir.php",
                method  : "POST",
                data 	:  { page: PageNumber, batas: batas, keyword: keyword, keyword_by: keyword_by, OrderBy: OrderBy, ShortBy: ShortBy },
                success: function (data) {
                    $('#MenampilkanTabelOngkir').html(data);
                    $('#page').val(PageNumber);
                }
            })
        });
    <?php } ?>
    //Kondisi Ketika Tombol Edit Ditekan
    $(".GetEditButton").click(function() {
        var id_ongkir = $(this).attr('value');
        //Menampilkan modal data
        $('#ModalTambahOngkir').modal('show');
        //Ambil nilai masing-masing parameter
        var provinsi=$('#GetProvinsi'+id_ongkir+'').html();
        var kabupaten=$('#GetKabupaten'+id_ongkir+'').html();
        var kecamatan=$('#GetKecamatan'+id_ongkir+'').html();
        var desa=$('#GetDesa'+id_ongkir+'').html();
        var kurir=$('#GetKurir'+id_ongkir+'').html();
        var ongkir=$('#GetOngkir'+id_ongkir+'').val();
        //Tempelkan Ke Form
        $('#PutIdOngkir').val(id_ongkir);
        $('#ModeFormOngkir').val('Edit');
        $('#provinsi').val(provinsi);
        $('#kabupaten').val(kabupaten);
        $('#kecamatan').val(kecamatan);
        $('#desa').val(desa);
        $('#kurir').val(kurir);
        $('#ongkir').val(ongkir);
    });

</script>
<div class="card-body">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-items-center mb-0">
                    <thead class="">
                        <tr>
                            <th class="text-center"><b>No</b></th>
                            <th class="text-center"><b>Provinsi</b></th>
                            <th class="text-center"><b>Kabupaten</b></th>
                            <th class="text-center"><b>Kecamatan</b></th>
                            <th class="text-center"><b>Desa</b></th>
                            <th class="text-center"><b>Kurir</b></th>
                            <th class="text-center"><b>Ongkir</b></th>
                            <th class="text-center"><b>Opsi</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(empty($jml_data)){
                                echo '<tr>';
                                echo '  <td colspan="8">Belum Ada Data Ongkir Yang Ditampilkan</td>';
                                echo '</tr>';
                            }else{
                                $no = 1+$posisi;
                                //KONDISI PENGATURAN MASING FILTER
                                if(empty($keyword_by)){
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM ongkir ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM ongkir WHERE provinsi like '%$keyword%' OR kabupaten like '%$keyword%' OR kecamatan like '%$keyword%' OR desa like '%$keyword%' OR kurir like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }else{
                                    if(empty($keyword)){
                                        $query = mysqli_query($Conn, "SELECT*FROM ongkir ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }else{
                                        $query = mysqli_query($Conn, "SELECT*FROM ongkir WHERE $keyword_by like '%$keyword%' ORDER BY $OrderBy $ShortBy LIMIT $posisi, $batas");
                                    }
                                }
                                while ($data = mysqli_fetch_array($query)) {
                                    $id_ongkir= $data['id_ongkir'];
                                    $provinsi= $data['provinsi'];
                                    $kabupaten= $data['kabupaten'];
                                    $kecamatan= $data['kecamatan'];
                                    $desa= $data['desa'];
                                    $kurir= $data['kurir'];
                                    $ongkir= $data['ongkir'];
                                    $OngkirFormat = "" . number_format($ongkir,0,',','.');
                                    echo '<input type="hidden" id="GetOngkir'.$id_ongkir.'" value="'.$ongkir.'">';
                        ?>
                            <tr>
                                <td class="text-center text-xs"><?php echo "$no" ?></td>
                                <td class="text-left text-xs" align="left" id="GetProvinsi<?php echo "$id_ongkir"; ?>"><?php echo "$provinsi" ?></td>
                                <td class="text-left text-xs" align="left" id="GetKabupaten<?php echo "$id_ongkir"; ?>"><?php echo "$kabupaten" ?></td>
                                <td class="text-left text-xs" align="left" id="GetKecamatan<?php echo "$id_ongkir"; ?>"><?php echo "$kecamatan" ?></td>
                                <td class="text-left text-xs" align="left" id="GetDesa<?php echo "$id_ongkir"; ?>"><?php echo "$desa" ?></td>
                                <td class="text-left text-xs" align="left" id="GetKurir<?php echo "$id_ongkir"; ?>"><?php echo "$kurir" ?></td>
                                <td class="text-right text-xs" align="right"><?php echo "$OngkirFormat" ?></td>
                                <td align="center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-dark btn-sm GetEditButton" value="<?php echo "$id_ongkir"; ?>">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>  
                                        <button type="button" class="btn btn-outline-dark btn-sm" data-bs-toggle="modal" data-bs-target="#ModalHapusOngkir" data-id="<?php echo "$id_ongkir"; ?>">
                                            <i class="bi bi-x"></i>
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