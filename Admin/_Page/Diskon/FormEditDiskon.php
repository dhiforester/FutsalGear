<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap id_diskon
    if(empty($_POST['id_diskon'])){
        echo '  <div class="row">';
        echo '      <div class="col-md-12 mb-3">';
        echo '          ID Buku/Produk Tidak Boleh Kosong!.';
        echo '      </div>';
        echo '  </div>';
    }else{
        $id_diskon=$_POST['id_diskon'];
        //Buka data ongkir
        $QryDiskon = mysqli_query($Conn,"SELECT * FROM diskon WHERE id_diskon='$id_diskon'")or die(mysqli_error($Conn));
        $DataDiskon = mysqli_fetch_array($QryDiskon);
        $id_produk= $DataDiskon['id_produk'];
        $nama_produk= $DataDiskon['nama_produk'];
        $periode_awal= $DataDiskon['periode_awal'];
        $periode_akhir= $DataDiskon['periode_akhir'];
        $diskon= $DataDiskon['diskon'];
?>
    <script>
        //Proses Edit Diskon
        $('#ProsesEditDiskon').submit(function(){
            $('#NotifikasiEditDiskon').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
            var form = $('#ProsesEditDiskon')[0];
            var data = new FormData(form);
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Diskon/ProsesEditDiskon.php',
                data 	    :  data,
                cache       : false,
                processData : false,
                contentType : false,
                enctype     : 'multipart/form-data',
                success     : function(data){
                    $('#NotifikasiEditDiskon').html(data);
                    var NotifikasiEditDiskonBerhasil=$('#NotifikasiEditDiskonBerhasil').html();
                    if(NotifikasiEditDiskonBerhasil=="Success"){
                        $('#MenampilkanTabelDiskon').html("Loading...");
                        $.ajax({
                            type 	    : 'POST',
                            url 	    : '_Page/Diskon/TabelDiskon.php',
                            success     : function(data){
                                $('#MenampilkanTabelDiskon').html(data);
                                $('#ModalEditDiskon').modal('hide');
                                swal("Good Job!", "Edit Diskon Berhasil!", "success");
                            }
                        });
                    }
                }
            });
        });
    </script>
    <input type="hidden" name="id_diskon" id="id_diskon" value="<?php echo $id_diskon;?>">
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="nama_produk">Nama Produk</label>
            <input type="text" readonly name="nama_produk" id="nama_produk" class="form-control" value="<?php echo "$nama_produk"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="periode_awal">Periode Awal</label>
            <input type="date" name="periode_awal" id="periode_awal" class="form-control" value="<?php echo "$periode_awal"; ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label for="periode_akhir">Periode Akhir</label>
            <input type="date" name="periode_akhir" id="periode_akhir" class="form-control" value="<?php echo "$periode_akhir"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <label for="diskon">Diskon</label>
            <input type="number" min="0" name="diskon" id="diskon" class="form-control" value="<?php echo "$diskon"; ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="NotifikasiEditDiskon">
            <div class="alert alert-primary" role="alert">
                <span class="text-primary">Pastikan bahwa informasi diskon yang anda masukan sudah benar</span>
            </div>
        </div>
    </div>
<?php } ?>