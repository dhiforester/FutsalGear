$('#MenampilkanTabelTestimoni').html("Loading...");
$('#MenampilkanTabelTestimoni').load("_Page/Testimoni/TabelTestimoni.php");
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelTestimoni').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Testimoni/TabelTestimoni.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelTestimoni').html(data);
        }
    });
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelTestimoni').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Testimoni/TabelTestimoni.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelTestimoni').html(data);
        }
    });
});
$('#ProsesFilterTestimoni').submit(function(){
    var batas = $('#FilterBatas').val();
    var OrderBy = $('#OrderBy').val();
    var ShortBy = $('#ShortBy').val();
    var KeywordBy = $('#KeywordBy').val();
    var FilterKeyword = $('#FilterKeyword').val();
    $('#MenampilkanTabelTestimoni').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Testimoni/TabelTestimoni.php',
        data 	    :  {batas: batas, OrderBy: OrderBy, ShortBy: ShortBy, KeywordBy: KeywordBy, keyword: FilterKeyword},
        success     : function(data){
            $('#MenampilkanTabelTestimoni').html(data);
            $('#ModalFilterTestimoni').modal('hide');
        }
    });
});
//Detail Testimoni
$('#ModalDetailTestimoni').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_testimoni = pecah[0];
    $('#FormDetailTestimoni').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Testimoni/FormDetailTestimoni.php',
        data        : {id_testimoni: id_testimoni},
        success     : function(data){
            $('#FormDetailTestimoni').html(data);
            //Proses Tambah Testimoni
            $('#ProsesEditTestimoni').submit(function(){
                $('#NotifikasiEditTestimoni').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesEditTestimoni')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Testimoni/ProsesEditTestimoni.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiEditTestimoni').html(data);
                        var NotifikasiEditTestimoniBerhasil=$('#NotifikasiEditTestimoniBerhasil').html();
                        if(NotifikasiEditTestimoniBerhasil=="Success"){
                            $('#ModalDetailTestimoni').modal("hide");
                            $('#MenampilkanTabelTestimoni').html("Loading...");
                            $('#MenampilkanTabelTestimoni').load("_Page/Testimoni/TabelTestimoni.php");
                            swal("Good Job!", "Update Testimoni Berhasil!", "success");
                        }
                    }
                });
            });
        }
    });
});

//Hapus Testimoni
$('#ModalDeleteTestimoni').on('show.bs.modal', function (e) {
    var GetData = $(e.relatedTarget).data('id');
    var pecah = GetData.split(",");
    var id_testimoni = pecah[0];
    var keyword = pecah[1];
    var batas = pecah[2];
    var ShortBy = pecah[3];
    var OrderBy = pecah[4];
    var page = pecah[5];
    var posisi = pecah[6];
    var keyword_by = pecah[7];
    $('#FormDeleteTestimoni').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Testimoni/FormDeleteTestimoni.php',
        data        : {id_testimoni: id_testimoni},
        success     : function(data){
            $('#FormDeleteTestimoni').html(data);
            //Konfirmasi Hapus Testimoni
            $('#KonfirmasiHapusTestimoni').click(function(){
                $('#NotifikasiHapusTestimoni').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Testimoni/ProsesHapusTestimoni.php',
                    data        : {id_testimoni: id_testimoni},
                    success     : function(data){
                        $('#NotifikasiHapusTestimoni').html(data);
                        var NotifikasiHapusTestimoniBerhasil=$('#NotifikasiHapusTestimoniBerhasil').html();
                        if(NotifikasiHapusTestimoniBerhasil=="Success"){
                            $.ajax({
                                type 	    : 'POST',
                                url 	    : '_Page/Testimoni/TabelTestimoni.php',
                                data 	    :  {keyword: keyword, batas: batas, ShortBy: ShortBy, OrderBy: OrderBy, page: page, posisi: posisi, keyword_by: keyword_by},
                                success     : function(data){
                                    $('#MenampilkanTabelTestimoni').html(data);
                                    $('#ModalDeleteTestimoni').modal('hide');
                                    swal("Good Job!", "Delete Access Success!", "success");
                                }
                            });
                        }
                    }
                });
            });
        }
    });
});