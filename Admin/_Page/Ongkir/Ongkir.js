//Kondisi Pertama kali muncul
var ProsesBatas = $('#ProsesBatas').serialize();
$('#MenampilkanTabelOngkir').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Ongkir/TabelOngkir.php',
    data 	    :  ProsesBatas,
    success     : function(data){
        $('#MenampilkanTabelOngkir').html(data);
    }
});
//Merubah Jumlah Batas Data
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelOngkir').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Ongkir/TabelOngkir.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelOngkir').html(data);
        }
    });
});
//Ketika Dimulai Pencarian
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelOngkir').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Ongkir/TabelOngkir.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelOngkir').html(data);
        }
    });
});
//Ketika Provinsi Diketik
$('#provinsi').keyup(function(){
    var provinsi = $('#provinsi').val();
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Ongkir/ListProvinsi.php',
        data 	    :  {provinsi: provinsi},
        success     : function(data){
            $('#ListProvinsi').html(data);
        }
    });
});
$('#provinsi').dblclick(function(){
    var provinsi = $('#provinsi').val();
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Ongkir/ListProvinsi.php',
        data 	    :  {provinsi: provinsi},
        success     : function(data){
            $('#ListProvinsi').html(data);
        }
    });
});
//Ketika Kabupaten Diketik
$('#kabupaten').keyup(function(){
    var provinsi = $('#provinsi').val();
    var kabupaten = $('#kabupaten').val();
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Ongkir/ListKabupaten.php',
        data 	    :  {provinsi: provinsi, kabupaten: kabupaten},
        success     : function(data){
            $('#ListKabupaten').html(data);
        }
    });
});
$('#kabupaten').dblclick(function(){
    var provinsi = $('#provinsi').val();
    var kabupaten = $('#kabupaten').val();
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Ongkir/ListKabupaten.php',
        data 	    :  {provinsi: provinsi, kabupaten: kabupaten},
        success     : function(data){
            $('#ListKabupaten').html(data);
        }
    });
});
//Ketika Kecamatan Diketik
$('#kecamatan').keyup(function(){
    var kecamatan = $('#kecamatan').val();
    var kabupaten = $('#kabupaten').val();
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Ongkir/ListKecamatan.php',
        data 	    :  {kecamatan: kecamatan, kabupaten: kabupaten},
        success     : function(data){
            $('#ListKecamatan').html(data);
        }
    });
});
$('#kecamatan').dblclick(function(){
    var kecamatan = $('#kecamatan').val();
    var kabupaten = $('#kabupaten').val();
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Ongkir/ListKecamatan.php',
        data 	    :  {kecamatan: kecamatan, kabupaten: kabupaten},
        success     : function(data){
            $('#ListKecamatan').html(data);
        }
    });
});
//Ketika Desa Diketik
$('#desa').keyup(function(){
    var kecamatan = $('#kecamatan').val();
    var desa = $('#desa').val();
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Ongkir/ListDesa.php',
        data 	    :  {kecamatan: kecamatan, desa: desa},
        success     : function(data){
            $('#ListDesa').html(data);
        }
    });
});
$('#desa').dblclick(function(){
    var kecamatan = $('#kecamatan').val();
    var desa = $('#desa').val();
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Ongkir/ListDesa.php',
        data 	    :  {kecamatan: kecamatan, desa: desa},
        success     : function(data){
            $('#ListDesa').html(data);
        }
    });
});
//Ketika Kurir Diketik
$('#kurir').keyup(function(){
    var kurir = $('#kurir').val();
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Ongkir/ListKurir.php',
        data 	    :  {kurir: kurir},
        success     : function(data){
            $('#ListKurir').html(data);
        }
    });
});
$('#kurir').dblclick(function(){
    var kurir = $('#kurir').val();
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Ongkir/ListKurir.php',
        data 	    :  {kurir: kurir},
        success     : function(data){
            $('#ListKurir').html(data);
        }
    });
});
//Ketika keyword_by diubah
$('#keyword_by').change(function(){
    var keyword_by = $('#keyword_by').val();
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Ongkir/list_keyword.php',
        data 	    :  {keyword_by: keyword_by},
        success     : function(data){
            $('#list_keyword').html(data);
        }
    });
});
//Ketika Modal Tambah Ongkir Muncul
$('#ModalTambahOngkir').on('show.bs.modal', function (e) {
    $('#NotifikasiTambahOngkir').html('<span class="text-primary">Pastikan informasi ongkir sudah terisi dengan benar</span>');
});
//Ketika Modal Ongkir Muncul
$('#TombolTambahOngkir').click(function(){
    $('#PutIdOngkir').val('');
    $('#ModeFormOngkir').val('Tambah');
    //Kosongkan Form
    $('#provinsi').val('');
    $('#kabupaten').val('');
    $('#kecamatan').val('');
    $('#desa').val('');
    $('#kurir').val('');
    $('#ongkir').val('');
});
//Proses Tambah Ongkir
$('#ProsesTambahOngkir').submit(function(){
    var ProsesTambahOngkir = $('#ProsesTambahOngkir').serialize();
    var ModeFormOngkir = $('#ModeFormOngkir').val();
    $('#NotifikasiTambahOngkir').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Ongkir/ProsesTambahOngkir.php',
        data 	    :  ProsesTambahOngkir,
        success     : function(data){
            $('#NotifikasiTambahOngkir').html(data);
            var ProsesTambahOngkirBerhasil=$('#ProsesTambahOngkirBerhasil').html();
            if(ProsesTambahOngkirBerhasil=="Success"){
                var ProsesBatas = $('#ProsesBatas').serialize();
                $('#MenampilkanTabelOngkir').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Ongkir/TabelOngkir.php',
                    data 	    :  ProsesBatas,
                    success     : function(data){
                        $('#MenampilkanTabelOngkir').html(data);
                    }
                });
                $('#ModalTambahOngkir').modal('hide');
                if(ModeFormOngkir=="Tambah"){
                    swal("Berhasil!", "Tambah Ongkir Berhasil!", "success");
                }else{
                    swal("Berhasil!", "Edit Ongkir Berhasil!", "success");
                }
            }
        }
    });
});
//Ketika Modal Hapus Ongkir Muncul
$('#ModalHapusOngkir').on('show.bs.modal', function (e) {
    var id_ongkir = $(e.relatedTarget).data('id');
    $('#PutIdOngkirForDelete').val(id_ongkir);
    $('#NotifikasiHapusAkses').html('<span class="text-primary">Apakah anda yakin akan menghapus data ongkir ini?</span>');
});
//Proses Hapus Ongkir
$('#ProsesHapusOngkir').submit(function(){
    var ProsesHapusOngkir = $('#ProsesHapusOngkir').serialize();
    $('#NotifikasiHapusOngkir').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Ongkir/ProsesHapusOngkir.php',
        data 	    :  ProsesHapusOngkir,
        success     : function(data){
            $('#NotifikasiHapusOngkir').html(data);
            var NotifikasiHapusOngkirBerhasil=$('#NotifikasiHapusOngkirBerhasil').html();
            if(NotifikasiHapusOngkirBerhasil=="Success"){
                var ProsesBatas = $('#ProsesBatas').serialize();
                $('#MenampilkanTabelOngkir').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Ongkir/TabelOngkir.php',
                    data 	    :  ProsesBatas,
                    success     : function(data){
                        $('#MenampilkanTabelOngkir').html(data);
                    }
                });
                $('#ModalHapusOngkir').modal('hide');
                swal("Berhasil!", "Hapus Ongkir Berhasil!", "success");
            }
        }
    });
});
