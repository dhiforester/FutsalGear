$('#MenampilkanSettingBank').html("Loading...");
var ProsesBatas = $('#ProsesBatas').serialize();
$('#MenampilkanSettingBank').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/SettingBank/TabelSettingBank.php',
    data 	    :  ProsesBatas,
    success     : function(data){
        $('#MenampilkanSettingBank').html(data);
    }
});
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanSettingBank').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/SettingBank/TabelSettingBank.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanSettingBank').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanSettingBank').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/SettingBank/TabelSettingBank.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanSettingBank').html(data);
        }
    });
});
$('#ProsesFilterSettingBank').submit(function(){
    var batas = $('#FilterBatas').val();
    var OrderBy = $('#OrderBy').val();
    var ShortBy = $('#ShortBy').val();
    var KeywordBy = $('#KeywordBy').val();
    var FilterKeyword = $('#FilterKeyword').val();
    $('#MenampilkanSettingBank').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/SettingBank/TabelSettingBank.php',
        data 	    :  {batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: KeywordBy, keyword: FilterKeyword},
        success     : function(data){
            $('#MenampilkanSettingBank').html(data);
            $('#ModalFilterSettingBank').modal('hide');
        }
    });
});

//Modal Tambah Setting Bank
$('#ModalTambahSettingBank').on('show.bs.modal', function (e) {
    var id_setting_bank = $(e.relatedTarget).data('id');
    $('#FormTambahSettingBank').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/SettingBank/FormTambahSettingBank.php',
        data        : {id_setting_bank: id_setting_bank},
        success     : function(data){
            $('#FormTambahSettingBank').html(data);
            //Proses Tambah Akses
            $('#ProsesTambahSettingBank').submit(function(){
                $('#NotifikasiTambahSettingBank').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahSettingBank')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/SettingBank/ProsesTambahSettingBank.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahSettingBank').html(data);
                        var NotifikasiTambahSettingBankBerhasil=$('#NotifikasiTambahSettingBankBerhasil').html();
                        if(NotifikasiTambahSettingBankBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Modal Detail Setting Bank
$('#ModalDetailSettingBank').on('show.bs.modal', function (e) {
    var id_setting_bank = $(e.relatedTarget).data('id');
    $('#FormDetailSettingBank').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/SettingBank/FormDetailSettingBank.php',
        data        : {id_setting_bank: id_setting_bank},
        success     : function(data){
            $('#FormDetailSettingBank').html(data);
        }
    });
});
//Modal Edit Setting Bank
$('#ModalEditSettingBank').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_setting_bank = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormEditSettingBank').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/SettingBank/FormEditSettingBank.php',
        data        : {id_setting_bank: id_setting_bank},
        success     : function(data){
            $('#FormEditSettingBank').html(data);
            //Proses Setting Bank
            $('#ProsesEditSettingBank').submit(function(){
                $('#NotifikasiEditSettingBank').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditSettingBank')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/SettingBank/ProsesEditSettingBank.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditSettingBank').html(data);
                        var NotifikasiEditSettingBankBerhasil=$('#NotifikasiEditSettingBankBerhasil').html();
                        if(NotifikasiEditSettingBankBerhasil=="Success"){
                            $('#MenampilkanSettingBank').html("Loading...");
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/SettingBank/TabelSettingBank.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanSettingBank').html(data);
                                    $('#ModalEditSettingBank').modal('hide');
                                    swal("Good Job!", "Edit Setting Bank Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});
//Hapus Setting Bank
$('#ModalDeleteSettingBank').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_setting_bank = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormDeleteSettingBank').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/SettingBank/FormDeleteSettingBank.php',
        data        : {id_setting_bank: id_setting_bank},
        success     : function(data){
            $('#FormDeleteSettingBank').html(data);
            //Konfirmasi Hapus akses
            $('#KonfirmasiHapusSettingBank').click(function(){
                $('#NotifikasiHapusSettingBank').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/SettingBank/ProsesHapusSettingBank.php',
                    data        : {id_setting_bank: id_setting_bank},
                    success     : function(data){
                        $('#NotifikasiHapusSettingBank').html(data);
                        var NotifikasiHapusSettingBankBerhasil=$('#NotifikasiHapusSettingBankBerhasil').html();
                        if(NotifikasiHapusSettingBankBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/SettingBank/TabelSettingBank.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanSettingBank').html(data);
                                    $('#ModalDeleteSettingBank').modal('hide');
                                    swal("Good Job!", "Hapus Setting Bank Berhasil!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});