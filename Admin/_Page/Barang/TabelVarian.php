<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['id_produk'])){
        echo '<span class="text-danger">ID Produk Tidak Boleh Kosong</span>';
    }else{
        $id_produk=$_POST['id_produk'];
        $JumlahVarian = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM produk_varian WHERE id_produk='$id_produk'"));
        if(empty($JumlahVarian)){
            echo '<span class="text-danger">Tidak ada data variant yang dapat ditampilkan</span>';
        }else{
            $no = 1;
            //KONDISI PENGATURAN MASING FILTER
            $query = mysqli_query($Conn, "SELECT DISTINCT grup_variant FROM produk_varian WHERE id_produk='$id_produk'");
            while ($data = mysqli_fetch_array($query)) {
                $grup_variant= $data['grup_variant'];
                echo '<div class="row mb-4">';
                echo '  <div class="col-md-12">';
                echo '      <b>'.$grup_variant.'</b>';
                echo '      <ol class="list-group list-group-numbered">';
                            $Qry2 = mysqli_query($Conn, "SELECT * FROM produk_varian WHERE id_produk='$id_produk' AND grup_variant='$grup_variant'");
                            while ($Data2 = mysqli_fetch_array($Qry2)) {
                                $id_produk_varian= $Data2['id_produk_varian'];
                                $value_variant= $Data2['value_variant'];
                                echo '<li class="list-group-item d-flex justify-content-between align-items-start">';
                                echo '  <div class="ms-2 me-auto">';
                                echo '      <div>'.$value_variant.'</div>';
                                echo '      ';
                                echo '  </div>';
                                echo '  <button type="button" class="btn btn-sm btn-outline-dark HapusVarian" id="HapusVarian'.$id_produk_varian.'" value="'.$id_produk_varian.'">';
                                echo '      <i class="bi bi-x-circle"></i>';
                                echo '  </button>';
                                echo '</li>';
                            }
                echo '      </ol>';
                echo '  </div>';
                echo '</div>';
            }
        }
    }
?>
<script>
    $(".HapusVarian").click(function() {
        var id_produk ="<?php echo "$id_produk"; ?>";
        var id_produk_varian = $(this).attr('value');
        $('#HapusVarian'+id_produk_varian+'').html('Loading..');
        //Proses Hapus Data
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Barang/ProsesHapusVariant.php',
            data        : {id_produk_varian: id_produk_varian},
            success     : function(data){
                $('#HapusVarian'+id_produk_varian+'').html(data);
                var NotifikasiHapusVarianBerhasil=$('#NotifikasiHapusVarianBerhasil').html();
                if(NotifikasiHapusVarianBerhasil=="Success"){
                    $('#ListVarian').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                    $.ajax({
                        type 	    : 'POST',
                        url 	    : '_Page/Barang/TabelVarian.php',
                        data        : {id_produk: id_produk},
                        success     : function(data){
                            $('#ListVarian').html(data);
                        }
                    });
                }
            }
        });
    });
</script>