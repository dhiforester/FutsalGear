$('#ModalDetailLayanan').on('show.bs.modal', function (e) {    
    var id_layanan = $(e.relatedTarget).data('id');
    $('#FormDetailLayanan').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Home/FormDetailLayanan.php',
        data 	    :  {id_layanan: id_layanan},
        success     : function(data){
            $('#FormDetailLayanan').html(data);
        }
    });
});
$('#ModalDetailMitra').on('show.bs.modal', function (e) {    
    var id_mitra = $(e.relatedTarget).data('id');
    $('#FormDetailMitra').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Home/FormDetailMitra.php',
        data 	    :  {id_mitra: id_mitra},
        success     : function(data){
            $('#FormDetailMitra').html(data);
        }
    });
});
$('#ModalDetailHairstylist').on('show.bs.modal', function (e) {    
    var id_hairstylist = $(e.relatedTarget).data('id');
    var id_layanan =$('#PutIdLayanan').val();
    $('#FormDetailHairstylist').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Home/FormDetailHairstylist.php',
        data 	    :  {id_hairstylist: id_hairstylist, id_layanan: id_layanan},
        success     : function(data){
            $('#FormDetailHairstylist').html(data);
        }
    });
});
$('#ModalDetailProduk').on('show.bs.modal', function (e) {    
    var id_produk = $(e.relatedTarget).data('id');
    $('#FormDetailProduk').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Home/FormDetailProduk.php',
        data 	    :  {id_produk: id_produk},
        success     : function(data){
            $('#FormDetailProduk').html(data);
        }
    });
});
$('#ModalMasukanKeranjang').on('show.bs.modal', function (e) {    
    var id_barang = $(e.relatedTarget).data('id');
    $('#FormMasukanKeranjang').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Home/FormMasukanKeranjang.php',
        data 	    :  {id_barang: id_barang},
        success     : function(data){
            $('#FormMasukanKeranjang').html(data);
        }
    });
});
$('#ModalMasukanFavorit').on('show.bs.modal', function (e) {    
    var id_barang = $(e.relatedTarget).data('id');
    $('#FormMasukanFavorit').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Home/FormMasukanFavorit.php',
        data 	    :  {id_barang: id_barang},
        success     : function(data){
            $('#FormMasukanFavorit').html(data);
        }
    });
});
$('#ModalKomentarProduk').on('show.bs.modal', function (e) {    
    var id_barang = $(e.relatedTarget).data('id');
    $('#ListKomentarProduk').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Home/ListKomentarProduk.php',
        data 	    :  {id_barang: id_barang},
        success     : function(data){
            $('#ListKomentarProduk').html(data);
        }
    });
    $('#ProsesTambahKomentar').submit(function(){
        var ProsesTambahKomentar = $('#ProsesTambahKomentar').serialize();
        var Loading='<div class="spinner-border text-info" role="status"><span class="visually-hidden">Loading...</span></div>';
        $('#NotifikasiKomentar').html("Loading...");
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Home/ProsesTambahKomentar.php',
            data 	    :  ProsesTambahKomentar,
            success     : function(data){
                $('#NotifikasiKomentar').html(data);
                var NotifikasiKomentarBerhasil=$('#NotifikasiKomentarBerhasil').html();
                if(NotifikasiKomentarBerhasil=="Success"){
                    $('#ProsesTambahKomentar').trigger("reset");
                    $('#ListKomentarProduk').html('Loading...');
                    $.ajax({
                        type 	    : 'POST',
                        url 	    : '_Page/Home/ListKomentarProduk.php',
                        data 	    :  {id_barang: id_barang},
                        success     : function(data){
                            $('#ListKomentarProduk').html(data);
                            $('#NotifikasiKomentar').html('<span class="text-dark">Maksimal komentar 200 karakter</span>');
                        }
                    });
                }
            }
        });
    });
});
$('#ModalChatMitra').on('show.bs.modal', function (e) {    
    var id_mitra = $(e.relatedTarget).data('id');
    $('#FormKirimPesanChat').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Home/FormKirimPesanChat.php',
        data 	    :  {id_mitra: id_mitra},
        success     : function(data){
            $('#FormKirimPesanChat').html(data);
        }
    });
    $('#ProsesKirimChatKeMitra').submit(function(){
        var ProsesKirimChatKeMitra = $('#ProsesKirimChatKeMitra').serialize();
        var Loading='<div class="spinner-border text-info" role="status"><span class="visually-hidden">Loading...</span></div>';
        $('#NotifikasiKirimChat').html("Loading...");
        $.ajax({
            type 	    : 'POST',
            url 	    : '_Page/Home/ProsesKirimChatKeMitra.php',
            data 	    :  ProsesKirimChatKeMitra,
            success     : function(data){
                $('#NotifikasiKirimChat').html(data);
                var NotifikasiKirimChatBerhasil=$('#NotifikasiKirimChatBerhasil').html();
                if(NotifikasiKirimChatBerhasil=="Success"){
                    $('#ProsesKirimChatKeMitra').trigger("reset");
                    $('#FormKirimPesanChat').html('Loading...');
                    $.ajax({
                        type 	    : 'POST',
                        url 	    : '_Page/Home/FormKirimPesanChat.php',
                        data 	    :  {id_mitra: id_mitra},
                        success     : function(data){
                            $('#FormKirimPesanChat').html(data);
                            $('#NotifikasiKirimChat').html('<span class="text-dark">Maksimal pesan 200 karakter</span>');
                        }
                    });
                }
            }
        });
    });
});