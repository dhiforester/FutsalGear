//Kondisi Pertama kali muncul
var ProsesBatas = $('#ProsesBatas').serialize();
$('#MenampilkanTabelAkses').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Akses/TabelAkses.php',
    data 	    :  ProsesBatas,
    success     : function(data){
        $('#MenampilkanTabelAkses').html(data);
    }
});
//Merubah Jumlah Batas Data
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelAkses').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/TabelAkses.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelAkses').html(data);
        }
    });
});
//Proses Pencarian
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelAkses').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/TabelAkses.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelAkses').html(data);
        }
    });
});
//Tambah Akses
$('#ModalTambahAkses').on('show.bs.modal', function (e) {
    $('#NotifikasiTambahAkses').html('<small class="text-primary">Pastkan data yang anda input sudah benar</small>');
    $('#FormTambahAkses').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormTambahAkses.php',
        success     : function(data){
            $('#FormTambahAkses').html(data);
            //Kondisi saat tampilkan password
            $('.form-check-input').click(function(){
                if($(this).is(':checked')){
                    $('#password1').attr('type','text');
                    $('#password2').attr('type','text');
                }else{
                    $('#password1').attr('type','password');
                    $('#password2').attr('type','password');
                }
            });
            //Kondisi ketika akses dipilih
            $('#akses').change(function(){
                var akses = $('#akses').val();
                if(akses==""){
                    $("#grup_akses").prop("disabled", false);
                }else{
                    $("#grup_akses").prop("disabled", true);
                }
            });
        }
    });
});
//Proses Tambah Akses
$('#ProsesTambahAkses').submit(function(){
    $('#NotifikasiTambahAkses').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesTambahAkses')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/ProsesTambahAkses.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiTambahAkses').html(data);
            var NotifikasiTambahAksesBerhasil=$('#NotifikasiTambahAksesBerhasil').html();
            if(NotifikasiTambahAksesBerhasil=="Success"){
                $('#ModalTambahAkses').modal('hide');
                var ProsesBatas = $('#ProsesBatas').serialize();
                $('#MenampilkanTabelAkses').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/TabelAkses.php',
                    data 	    :  ProsesBatas,
                    success     : function(data){
                        $('#MenampilkanTabelAkses').html(data);
                    }
                });
                swal("Good Job!", "Tambah Akses Berhasil!", "success");
            }
        }
    });
});
//Proses Atur Ijin Akses
$('#ProsesAturIjinAkses').submit(function(){
    $('#NotifikasiAturIjinAkses').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesAturIjinAkses')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/ProsesAturIjinAkses.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiAturIjinAkses').html(data);
            var NotifikasiAturIjinAksesBerhasil=$('#NotifikasiAturIjinAksesBerhasil').html();
            if(NotifikasiAturIjinAksesBerhasil=="Success"){
                location.reload();
            }
        }
    });
});
//Detail Akses
$('#ModalDetailAkses').on('show.bs.modal', function (e) {
    var id_akses = $(e.relatedTarget).data('id');
    $('#FormDetailAkses').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormDetailAkses.php',
        data        : {id_akses: id_akses},
        success     : function(data){
            $('#FormDetailAkses').html(data);
        }
    });
});
//Edit Akses
$('#ModalEditAkses').on('show.bs.modal', function (e) {
    var id_akses = $(e.relatedTarget).data('id');
    $('#FormEditAkses').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormEditAkses.php',
        data        : {id_akses: id_akses},
        success     : function(data){
            $('#FormEditAkses').html(data);
        }
    });
});
//Proses Edit Akses
$('#ProsesEditAkses').submit(function(){
    $('#NotifikasiEditAkses').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesEditAkses')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/ProsesEditAkses.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiEditAkses').html(data);
            var NotifikasiEditAksesBerhasil=$('#NotifikasiEditAksesBerhasil').html();
            if(NotifikasiEditAksesBerhasil=="Success"){
                $('#ModalEditAkses').modal('hide');
                var ProsesBatas = $('#ProsesBatas').serialize();
                $('#MenampilkanTabelAkses').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/TabelAkses.php',
                    data 	    :  ProsesBatas,
                    success     : function(data){
                        $('#MenampilkanTabelAkses').html(data);
                    }
                });
                swal("Good Job!", "Ubah Akses Berhasil!", "success");
            }
        }
    });
});
//Modal Ubah Password
$('#ModalUbahPassword').on('show.bs.modal', function (e) {
    var id_akses = $(e.relatedTarget).data('id');
    $('#PutIdAksesPassword').val(id_akses);
    $('#TampilkanPassword2').click(function(){
        if($(this).is(':checked')){
            $('#password1_edit').attr('type','text');
            $('#password2_edit').attr('type','text');
        }else{
            $('#password1_edit').attr('type','password');
            $('#password2_edit').attr('type','password');
        }
    });
});
//Proses Ubah Password
$('#ProsesUbahPassword').submit(function(){
    $('#NotifikasiUbahPassword').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesUbahPassword')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/ProsesUbahPassword.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiUbahPassword').html(data);
            var NotifikasiUbahPasswordBerhasil=$('#NotifikasiUbahPasswordBerhasil').html();
            if(NotifikasiUbahPasswordBerhasil=="Success"){
                $('#ModalUbahPassword').modal('hide');
                var ProsesBatas = $('#ProsesBatas').serialize();
                $('#MenampilkanTabelAkses').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/TabelAkses.php',
                    data 	    :  ProsesBatas,
                    success     : function(data){
                        $('#MenampilkanTabelAkses').html(data);
                    }
                });
                swal("Good Job!", "Ubah Password Akses Berhasil!", "success");
            }
        }
    });
});
//Modal Ubah Foto
$('#ModalEditFoto').on('show.bs.modal', function (e) {
    $('#NotifikasiUbahFoto').html('<small class="text-primary">Pastikan file foto yang akan anda upload sudah sesuai</small>');
    var id_akses = $(e.relatedTarget).data('id');
    $('#PutIdAksesFoto').val(id_akses);
});
//Proses Ubah Foto
$('#ProsesEditFoto').submit(function(){
    $('#NotifikasiUbahFoto').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesEditFoto')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/ProsesEditFoto.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiUbahFoto').html(data);
            var NotifikasiUbahFotoBerhasil=$('#NotifikasiUbahFotoBerhasil').html();
            if(NotifikasiUbahFotoBerhasil=="Success"){
                $('#ModalEditFoto').modal('hide');
                var ProsesBatas = $('#ProsesBatas').serialize();
                $('#MenampilkanTabelAkses').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/TabelAkses.php',
                    data 	    :  ProsesBatas,
                    success     : function(data){
                        $('#MenampilkanTabelAkses').html(data);
                    }
                });
                swal("Good Job!", "Ubah Foto Profile Berhasil!", "success");
                $('#ProsesEditFoto')[0].reset();
            }
        }
    });
});
//Modal Ubah Status Akses
$('#ModalUbahStatusAkses').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_akses = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormUbahStatusAkes').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/FormUbahStatusAkes.php',
        data        : {id_akses: id_akses},
        success     : function(data){
            $('#FormUbahStatusAkes').html(data);
            //Proses Ubah Level
            $('#ProsesUbahStatusAkses').submit(function(){
                $('#NotifikasiUbahStatusAkses').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesUbahStatusAkses')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/ProsesUbahStatusAkses.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiUbahStatusAkses').html(data);
                        var NotifikasiUbahStatusAksesBerhasil=$('#NotifikasiUbahStatusAksesBerhasil').html();
                        if(NotifikasiUbahStatusAksesBerhasil=="Success"){
                            $('#MenampilkanTabelAkses').html("Loading...");
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Akses/TabelAkses.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelAkses').html(data);
                                    $('#ModalUbahStatusAkses').modal('hide');
                                    swal("Good Job!", "Ubah Status Akses Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Ketika Modal Hapus Akses Muncul
$('#ModalHapusAkses').on('show.bs.modal', function (e) {
    var id_akses = $(e.relatedTarget).data('id');
    $('#PutIdAkses').val(id_akses);
    $('#NotifikasiHapusAkses').html('<span class="text-primary">Apakah anda yakin akan menghapus data akses ini?</span>');
});
//Ketika Hapus Akses Dimulai
$('#ProsesHapusAkses').submit(function(){
    $('#NotifikasiHapusAkses').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesHapusAkses')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Akses/ProsesHapusAkses.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiHapusAkses').html(data);
            var NotifikasiHapusAksesBerhasil=$('#NotifikasiHapusAksesBerhasil').html();
            if(NotifikasiHapusAksesBerhasil=="Success"){
                $('#ModalHapusAkses').modal('hide');
                var ProsesBatas = $('#ProsesBatas').serialize();
                $('#MenampilkanTabelAkses').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Akses/TabelAkses.php',
                    data 	    :  ProsesBatas,
                    success     : function(data){
                        $('#MenampilkanTabelAkses').html(data);
                    }
                });
                swal("Good Job!", "Hapus Akses Berhasil!", "success");
            }
        }
    });
});