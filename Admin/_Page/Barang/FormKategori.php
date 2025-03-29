<script>
    //Proses Tambah Kategori
    $('#ProsesTambahKategori').submit(function(){
        $('#NotifikasiTambahKategori').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
        var form = $('#ProsesTambahKategori')[0];
        var data = new FormData(form);
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Barang/ProsesTambahKategori.php',
            data 	    :  data,
            cache       : false,
            processData : false,
            contentType : false,
            enctype     : 'multipart/form-data',
            success     : function(data){
                $('#NotifikasiTambahKategori').html(data);
                var NotifikasiTambahKategoriBerhasil=$('#NotifikasiTambahKategoriBerhasil').html();
                if(NotifikasiTambahKategoriBerhasil=="Success"){
                    $('#FormKategori').html("Loading...");
                    $.ajax({
                        type 	    : 'POST',
                        url 	    : '_Page/Barang/FormKategori.php',
                        success     : function(data){
                            $('#FormKategori').html(data);
                        }
                    });
                }
                $('#NotifikasiTambahKategoriBerhasil').html('');
                $('#ProsesTambahKategori').trigger("reset");
            }
        });
    });
</script>
<div class="row">
    <div class="col-md-12">
        <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <th class="text-center" colspan="2">
                        <b>List Kategori Barang</b>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "../../_Config/Connection.php";
                    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_kategori"));
                    if(empty($jml_data)){
                        echo '<tr><td class="text-center" colspan="2">Tidak ada data kategori</td></tr>';
                    }else{
                        $no=1;
                        $query = mysqli_query($Conn, "SELECT*FROM barang_kategori ORDER BY kategori ASC");
                        while ($data = mysqli_fetch_array($query)) {
                            $id_barang_kategori= $data['id_barang_kategori'];
                            $kategori= $data['kategori'];
                            if(empty($data['foto'])){
                                $foto="";
                                $url_foto="assets/img/no_access.webp";
                            }else{
                                $foto= $data['foto'];
                                $url_foto="assets/img/Barang/$foto";
                            }
                            echo '<tr>';
                            echo '  <td class="text-center">'.$no.'</td>';
                            echo '  <td>';
                            echo '      <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalDetailKategori" data-id="'.$id_barang_kategori.'">';
                            echo '          '.$kategori.'';
                            echo '      </a>';
                            echo '  </td>';
                            echo '</tr>';
                            $no++;
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>