//Menampilkan Chating Pertama Kali
$('#TabelChating').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Chating/TabelChating.php',
    success     : function(data){
        $('#TabelChating').html(data);
    }
});
//Apabila Semua Pesan Di Click
$('#SemuaPesan').click(function(){
    var KategoriData ="Semua";
    $('#TabelChating').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Chating/TabelChating.php',
        data 	    :  {KategoriData: KategoriData},
        success     : function(data){
            $('#TabelChating').html(data);
        }
    });
});
//Apabila Pesan Belum Dibaca Di Click
$('#BelumDibaca').click(function(){
    var KategoriData ="BelumDibaca";
    $('#TabelChating').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Chating/TabelChating.php',
        data 	    :  {KategoriData: KategoriData},
        success     : function(data){
            $('#TabelChating').html(data);
        }
    });
});
//Detail Chat Admin
$('#ModalDetailChat').on('show.bs.modal', function (e) {
    var id_akses = $(e.relatedTarget).data('id');
    $('#isiChat').html("Loading...");
    $('#PutIdAkses').val(id_akses);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Chating/isiChat.php',
        data        : {id_akses: id_akses},
        success     : function(data){
            $('#isiChat').html(data);
        }
    });
});
//Proses Kirim Pesan
$('#ProsesBalasChat').submit(function(){
    $('#TombolKirim').html('Sending..');
    var id_akses =$('#PutIdAkses').val();
    var ProsesBalasChat =$('#ProsesBalasChat').serialize();
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Chating/ProsesBalasChat.php',
        data 	    :  ProsesBalasChat,
        success     : function(data){
            $('#TombolKirim').html(data);
            $('#TombolKirim').html('<i class="bi bi-send-check-fill"></i> Kirim');
            $('#pesan').val('');
            $.ajax({
                type 	    : 'POST',
                url 	    : '_Page/Chating/isiChat.php',
                data        : {id_akses: id_akses},
                success     : function(data){
                    $('#isiChat').html(data);
                }
            });
        }
    });
});