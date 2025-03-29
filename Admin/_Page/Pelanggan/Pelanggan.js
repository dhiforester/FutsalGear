//Pertama Kali menampilkan Data Pelanggan
var ProsesBatas = $('#ProsesBatas').serialize();
$('#MenampilkanTabelPelanggan').html("Loading...");
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Pelanggan/TabelPelanggan.php',
    data 	    :  ProsesBatas,
    success     : function(data){
        $('#MenampilkanTabelPelanggan').html(data);
    }
});
//Batas Data Diubah
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelPelanggan').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pelanggan/TabelPelanggan.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelPelanggan').html(data);
        }
    });
});
//Proses Pencarian
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelPelanggan').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pelanggan/TabelPelanggan.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelPelanggan').html(data);
        }
    });
});
//Ketika Modal Hapus Pelanggan Muncul
$('#ModalDeletePelanggan').on('show.bs.modal', function (e) {
    var id_akses = $(e.relatedTarget).data('id');
    $('#PutIdAksesToDelete').val(id_akses);
    $('#NotifikasiHapusPelanggan').html('<small class="text-primary">Apakah Anda Yakin Akan Menghapus Pelanggan Ini?</small>');
});
//Proses Hapus Pelanggan
$('#ProsesDeletePelanggan').submit(function(){
    var ProsesDeletePelanggan=$('#ProsesDeletePelanggan').serialize();
    $('#NotifikasiHapusPelanggan').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pelanggan/ProsesHapusPelanggan.php',
        data        : ProsesDeletePelanggan,
        success     : function(data){
            $('#NotifikasiHapusPelanggan').html(data);
            var NotifikasiHapusPelangganBerhasil=$('#NotifikasiHapusPelangganBerhasil').html();
            if(NotifikasiHapusPelangganBerhasil=="Success"){
                var ProsesBatas = $('#ProsesBatas').serialize();
                $('#MenampilkanTabelPelanggan').html("Loading...");
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Pelanggan/TabelPelanggan.php',
                    data 	    :  ProsesBatas,
                    success     : function(data){
                        $('#MenampilkanTabelPelanggan').html(data);
                        $('#ModalDeletePelanggan').modal('hide');
                        swal("Good Job!", "Hapus Pelanggan Berhasil!", "success");
                    }
                });
            }
        }
    });
});
//Modal Konfirmasi Pendaftaran Kunjungan
$('#ModalKonfirmasiPendaftaranKunjungan').on('show.bs.modal', function (e) {
    var id_pelanggan = $(e.relatedTarget).data('id');
    $('#KonfirmasiPendaftaranKunjungan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pelanggan/KonfirmasiPendaftaranKunjungan.php',
        data        : {id_pelanggan: id_pelanggan},
        success     : function(data){
            $('#KonfirmasiPendaftaranKunjungan').html(data);
        }
    });
});
//Modal Detail Kunjungan
$('#ModalDetailKunjungan').on('show.bs.modal', function (e) {
    var id_kunjungan = $(e.relatedTarget).data('id');
    $('#KonfirmasiDetailKunjungan').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pelanggan/KonfirmasiDetailKunjungan.php',
        data        : {id_kunjungan: id_kunjungan},
        success     : function(data){
            $('#KonfirmasiDetailKunjungan').html(data);
        }
    });
});