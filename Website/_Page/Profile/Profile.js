//Ubah Foto 
$('#ProsesUbahFoto').submit(function(){
    $('#NotifikasiUbahFoto').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesUbahFoto')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Profile/ProsesUbahFoto.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiUbahFoto').html(data);
            var NotifikasiUbahFotoBerhasil=$('#NotifikasiUbahFotoBerhasil').html();
            if(NotifikasiUbahFotoBerhasil=="Success"){
                window.location.href = "index.php?Page=Profile";
            }
        }
    });
});
//Kondisi saat tampilkan password
$('#TampilkanPassword').click(function(){
    if($(this).is(':checked')){
        $('#password1').attr('type','text');
        $('#password2').attr('type','text');
    }else{
        $('#password1').attr('type','password');
        $('#password2').attr('type','password');
    }
});
//Proses Ubah Password
$('#ProsesUbahPassword').submit(function(){
    $('#NotifikasiUbahPassword').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesUbahPassword')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Profile/ProsesUbahPassword.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiUbahPassword').html(data);
            var NotifikasiUbahPasswordBerhasil=$('#NotifikasiUbahPasswordBerhasil').html();
            if(NotifikasiUbahPasswordBerhasil=="Success"){
                window.location.href = "index.php?Page=Profile";
            }
        }
    });
});
//Proses Ubah Profile
$('#ProsesUbahProfile').submit(function(){
    $('#NotifikasiUbahProfile').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesUbahProfile')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Profile/ProsesUbahProfile.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiUbahProfile').html(data);
            var NotifikasiUbahProfileBerhasil=$('#NotifikasiUbahProfileBerhasil').html();
            if(NotifikasiUbahProfileBerhasil=="Success"){
                window.location.href = "index.php?Page=Profile";
            }
        }
    });
});
//Ketika Modal Konfirmasi Pembayaran
$('#ModalKonfirmasiPembayaran').on('show.bs.modal', function (e) {
    var id_transaksi = $(e.relatedTarget).data('id');
    var metode_pembayaran = $('#GetMetodePembayaran').html();
    $('#metode_pembayaran').val(metode_pembayaran);
    $('#PutIdTransaksiPembayaran').val(id_transaksi);
    $('#InformasiCaraPembayaran').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Profile/InformasiCaraPembayaran.php',
        data 	    :  {metode_pembayaran: metode_pembayaran},
        success     : function(data){
            $('#InformasiCaraPembayaran').html(data);
        }
    });
});
//Ketika Metode Pembayaran Diubah
$('#metode_pembayaran').change(function(){
    var metode_pembayaran = $('#metode_pembayaran').val();
    $('#InformasiCaraPembayaran').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Profile/InformasiCaraPembayaran.php',
        data 	    :  {metode_pembayaran: metode_pembayaran},
        success     : function(data){
            $('#InformasiCaraPembayaran').html(data);
        }
    });
});
//Ketika Proses Konfirmasi Pembayaran Dimulai
$('#ProsesKonfirmasiPembayaran').submit(function(){
    $('#NotifikasiKonfirmasiPembayaran').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesKonfirmasiPembayaran')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Profile/ProsesKonfirmasiPembayaran.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiKonfirmasiPembayaran').html(data);
            var NotifikasiKonfirmasiPembayaranBerhasil=$('#NotifikasiKonfirmasiPembayaranBerhasil').html();
            if(NotifikasiKonfirmasiPembayaranBerhasil=="Success"){
                location.reload();
            }
        }
    });
});
//Ketika Modal Konfirmasi Transaksi Selesai Muncul
$('#ModalKonfirmasiTransaksiSelesai').on('show.bs.modal', function (e) {
    var id_transaksi = $(e.relatedTarget).data('id');
    $('#PutIdTransaksiSelesai').val(id_transaksi);
    $('#NotifikasiKonfirmasiTransaksiSelesai').html('<span class="text-dark">Pastikan barang yang sampai sesuai dengan pesanan.</span>');
});
//Ketika Status Transaksi Diubah
$('#status_transaksi').change(function(){
    var id_transaksi = $('#PutIdTransaksiSelesai').val();
    var status_transaksi = $('#status_transaksi').val();
    $('#FormLanjutanTransaksiSelesai').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Profile/FormLanjutanTransaksiSelesai.php',
        data 	    :  {status_transaksi: status_transaksi, id_transaksi: id_transaksi},
        success     : function(data){
            $('#FormLanjutanTransaksiSelesai').html(data);
        }
    });
});
//Ketika Proses Konfirmasi Transaksi Selesai
$('#ProsesKonfirmasiTransaksiSelesai').submit(function(){
    $('#NotifikasiKonfirmasiTransaksiSelesai').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesKonfirmasiTransaksiSelesai')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Profile/ProsesKonfirmasiTransaksiSelesai.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiKonfirmasiTransaksiSelesai').html(data);
            var NotifikasiKonfirmasiTransaksiBerhasil=$('#NotifikasiKonfirmasiTransaksiBerhasil').html();
            if(NotifikasiKonfirmasiTransaksiBerhasil=="Success"){
                location.reload();
            }
        }
    });
});