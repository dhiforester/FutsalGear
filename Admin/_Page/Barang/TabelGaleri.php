<div class="row">
    <?php
        include "../../_Config/Connection.php";
        if(empty($_POST['id_produk'])){
            echo '<div class="col-md-12"><span class="text-danger">ID Produk Tidak Boleh Kosong</span></div>';
        }else{
            $id_produk=$_POST['id_produk'];
            $JumlahGaleri = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM produk_galeri WHERE id_produk='$id_produk'"));
            if(empty($JumlahGaleri)){
                echo '<div class="col-md-12"><span class="text-danger">Tidak ada galeri yang ditampilkan</span></div>';
            }else{
                $no = 1;
                $query = mysqli_query($Conn, "SELECT * FROM produk_galeri WHERE id_produk='$id_produk'");
                while ($data = mysqli_fetch_array($query)) {
                    $id_produk_galeri= $data['id_produk_galeri'];
                    $galeri= $data['galeri'];
    ?>
        <div class="col-md-4">
            <div class="card">
                <img src="assets/img/Barang/<?php echo $galeri; ?>" class="card-img-top" width="100%">
                <div class="card-footer">
                    <button type="button" class="btn btn-sm btn-dark btn-block btn-rounded HapusGaleriProduk" id="HapusGaleriProduk<?php echo $id_produk_galeri; ?>" value="<?php echo $id_produk_galeri; ?>">
                        <i class="bi bi-x-circle"></i> Hapus
                    </button>
                </div>
            </div>
        </div>
    <?php
                }
            }
        }
    ?>
</div>
<script>
    $(".HapusGaleriProduk").click(function() {
        var id_produk ="<?php echo "$id_produk"; ?>";
        var id_produk_galeri = $(this).attr('value');
        $('#HapusGaleriProduk'+id_produk_galeri+'').html('Loading..');
        //Proses Hapus Data
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Barang/ProsesHapusGaleriProduk.php',
            data        : {id_produk_galeri: id_produk_galeri},
            success     : function(data){
                $('#HapusGaleriProduk'+id_produk_galeri+'').html(data);
                var NotifikasiHapusGaleriBerhasil=$('#NotifikasiHapusGaleriBerhasil').html();
                if(NotifikasiHapusGaleriBerhasil=="Success"){
                    $('#ListGaleri').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                    $.ajax({
                        type 	    : 'POST',
                        url 	    : '_Page/Barang/TabelGaleri.php',
                        data        : {id_produk: id_produk},
                        success     : function(data){
                            $('#ListGaleri').html(data);
                        }
                    });
                }
            }
        });
    });
</script>