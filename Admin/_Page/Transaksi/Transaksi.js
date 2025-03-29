var ProsesBatas = $('#ProsesBatas').serialize();
$('#MenampilkanTabelTransaksi').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Transaksi/TabelTransaksi.php',
    data 	    :  ProsesBatas,
    success     : function(data){
        $('#MenampilkanTabelTransaksi').html(data);
    }
});
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelTransaksi').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/TabelTransaksi.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelTransaksi').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelTransaksi').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/TabelTransaksi.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelTransaksi').html(data);
        }
    });
});
//Modal Hapus Transaksi
$('#ModalHapusTransaksi').on('show.bs.modal', function (e) {
    var id_transaksi = $(e.relatedTarget).data('id');
    $('#PutIdTransaksi').val(id_transaksi);
});
//Proses Hapus
$('#ProsesHapusTransaksi').submit(function(){
    var ProsesHapusTransaksi = $('#ProsesHapusTransaksi').serialize();
    $('#NotifikasiHapusTransaksi').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/ProsesHapusTransaksi.php',
        data 	    :  ProsesHapusTransaksi,
        success     : function(data){
            $('#NotifikasiHapusTransaksi').html(data);
            var NotifikasiHapusTransaksiBerhasil= $('#NotifikasiHapusTransaksiBerhasil').html();
            if(NotifikasiHapusTransaksiBerhasil=="Success"){
                $('#ModalHapusTransaksi').modal('hide');
                var ProsesBatas = $('#ProsesBatas').serialize();
                $('#MenampilkanTabelTransaksi').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/TabelTransaksi.php',
                    data 	    :  ProsesBatas,
                    success     : function(data){
                        $('#MenampilkanTabelTransaksi').html(data);
                    }
                });
                swal("Berhasil!", "Hapus Transaksi Berhasil!", "success");
            }
        }
    });
});
//Menampilkan List Riwayat Pengiriman
var GetIdTransaksi =$('#GetIdTransaksi').html();
$('#TabelRiwayatPengiriman').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Transaksi/TabelRiwayatPengiriman.php',
    data 	    :  {id_transaksi: GetIdTransaksi},
    success     : function(data){
        $('#TabelRiwayatPengiriman').html(data);
    }
});
//Modal Update Status Pembayaran
$('#ModalUpdateStatusPembayaran').on('show.bs.modal', function (e) {
    var id_transaksi = $(e.relatedTarget).data('id');
    var StatusPembayaran =$('#GetStatusPembayaran').html();
    $('#PutIdTransaksiStatusPembayaran').val(id_transaksi);
    $('#status_pembayaran_'+StatusPembayaran+'').prop("checked", true);
});
//Proses Update Status Pembayaran
$('#ProsesUpdateStatusPembayaran').submit(function(){
    var ProsesUpdateStatusPembayaran = $('#ProsesUpdateStatusPembayaran').serialize();
    $('#NotifikasiUpdateStatusPembayaran').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/ProsesUpdateStatusPembayaran.php',
        data 	    :  ProsesUpdateStatusPembayaran,
        success     : function(data){
            $('#NotifikasiUpdateStatusPembayaran').html(data);
            var NotifikasiUpdateStatusPembayaranBerhasil= $('#NotifikasiUpdateStatusPembayaranBerhasil').html();
            if(NotifikasiUpdateStatusPembayaranBerhasil=="Success"){
                location.reload();
            }
        }
    });
});
//Kondisi Ketika modal Tambah Riwayat Pengiriman Muncul
$('#ModalTambahRiwayatPengiriman').on('show.bs.modal', function (e) {
    var id_transaksi = $(e.relatedTarget).data('id');
    var GetStatusPengiriman =$('#GetStatusPengiriman').html();
    var GetResiPengiriman =$('#GetResiPengiriman').html();
    $('#PutIdTransaksiStatusPengiriman').val(id_transaksi);
    $('#status_pengiriman').val(GetStatusPengiriman);
    $('#no_resi').val(GetResiPengiriman);
    $('#NotifikasiTambahRiwayatPengiriman').html('<span class="text-dark">Pastikan riwayat pengirian terisi dengan benar!</span>');
});
//Proses Tambah Riwayat Pengiriman
$('#ProsesTambahRiwayatPengiriman').submit(function(){
    var ProsesTambahRiwayatPengiriman = $('#ProsesTambahRiwayatPengiriman').serialize();
    $('#NotifikasiTambahRiwayatPengiriman').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/ProsesTambahRiwayatPengiriman.php',
        data 	    :  ProsesTambahRiwayatPengiriman,
        success     : function(data){
            $('#NotifikasiTambahRiwayatPengiriman').html(data);
            var NotifikasiTambahRiwayatPengirimanBerhasil= $('#NotifikasiTambahRiwayatPengirimanBerhasil').html();
            if(NotifikasiTambahRiwayatPengirimanBerhasil=="Success"){
                var no_resi =$('#no_resi').val();
                var status_pengiriman =$('#status_pengiriman').val();
                $('#GetResiPengiriman').html(no_resi);
                $('#GetStatusPengiriman').html(status_pengiriman);
                var GetIdTransaksi =$('#GetIdTransaksi').html();
                $('#TabelRiwayatPengiriman').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/TabelRiwayatPengiriman.php',
                    data 	    :  {id_transaksi: GetIdTransaksi},
                    success     : function(data){
                        $('#TabelRiwayatPengiriman').html(data);
                    }
                });
                $('#ProsesTambahRiwayatPengiriman')[0].reset();
                $('#ModalTambahRiwayatPengiriman').modal('hide');
                swal("Berhasil!", "Tambah Informaso Pengiriman Berhasil!", "success");
            }
        }
    });
});
//Kondisi Ketika modal Hapus Pengiriman Muncul
$('#ModalHapusPengiriman').on('show.bs.modal', function (e) {
    var id_pengiriman = $(e.relatedTarget).data('id');
    $('#PutIdPengiriman').val(id_pengiriman);
    $('#NotifikasiHapusPengiriman').html('<span class="text-dark">Apakah anda yakin akan menghapus data Pengiriman ini?</span>');
});
//Proses Hapus Riwayat Pengiriman
$('#ProsesHapusPengiriman').submit(function(){
    var ProsesHapusPengiriman = $('#ProsesHapusPengiriman').serialize();
    $('#NotifikasiHapusPengiriman').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Transaksi/ProsesHapusPengiriman.php',
        data 	    :  ProsesHapusPengiriman,
        success     : function(data){
            $('#NotifikasiHapusPengiriman').html(data);
            var NotifikasiHapusPengirimanBerhasil= $('#NotifikasiHapusPengirimanBerhasil').html();
            if(NotifikasiHapusPengirimanBerhasil=="Success"){
                var GetIdTransaksi =$('#GetIdTransaksi').html();
                $('#TabelRiwayatPengiriman').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Transaksi/TabelRiwayatPengiriman.php',
                    data 	    :  {id_transaksi: GetIdTransaksi},
                    success     : function(data){
                        $('#TabelRiwayatPengiriman').html(data);
                    }
                });
                $('#ModalHapusPengiriman').modal('hide');
                swal("Berhasil!", "Hapus Informasi Pengiriman Berhasil!", "success");
            }
        }
    });
});