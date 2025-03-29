$('#ProsesKirimPesanAdmin').submit(function(){
    var ProsesKirimPesanAdmin = $('#ProsesKirimPesanAdmin').serialize();
    var Loading='<div class="spinner-border text-info" role="status"><span class="visually-hidden">Loading...</span></div>';
    $('#NotifikasiKirimChatAdmin').html(Loading);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Inbox/ProsesKirimPesanAdmin.php',
        data 	    :  ProsesKirimPesanAdmin,
        success     : function(data){
            $('#NotifikasiKirimChatAdmin').html(data);
            var NotifikasiKirimChatAdminBerhasil=$('#NotifikasiKirimChatAdminBerhasil').html();
            if(NotifikasiKirimChatAdminBerhasil=="Success"){
                location.reload();
            }
        }
    });
});