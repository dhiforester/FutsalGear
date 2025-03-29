//Kondisi saat tampilkan password
$('#TampilkanPassword2').click(function(){
    if($(this).is(':checked')){
        $('#password1').attr('type','text');
    }else{
        $('#password1').attr('type','password');
    }
    if($(this).is(':checked')){
        $('#password2').attr('type','text');
    }else{
        $('#password2').attr('type','password');
    }
});
$('#ProsesPendaftaran').submit(function(){
    var ProsesPendaftaran = $('#ProsesPendaftaran').serialize();
    var Loading='<div class="spinner-border text-info" role="status"><span class="visually-hidden">Loading...</span></div>';
    $('#NotifikasiPendaftaran').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pendaftaran/ProsesPendaftaran.php',
        data 	    :  ProsesPendaftaran,
        success     : function(data){
            $('#NotifikasiPendaftaran').html(data);
            var NotifikasiPendaftaranBerhasil=$('#NotifikasiPendaftaranBerhasil').html();
            if(NotifikasiPendaftaranBerhasil=="Success"){
                window.location.href = 'index.php?Page=Login';
            }
        }
    });
});
$('#provinsi').change(function(){
    var provinsi = $('#provinsi').val();
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pendaftaran/PilihKabupaten.php',
        data 	    :  {provinsi: provinsi},
        success     : function(data){
            $('#kabupaten').html(data);
        }
    });
});
$('#kabupaten').change(function(){
    var kabupaten = $('#kabupaten').val();
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pendaftaran/PilihKecamatan.php',
        data 	    :  {kabupaten: kabupaten},
        success     : function(data){
            $('#kecamatan').html(data);
        }
    });
});
$('#kecamatan').change(function(){
    var kecamatan = $('#kecamatan').val();
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Pendaftaran/PilihDesa.php',
        data 	    :  {kecamatan: kecamatan},
        success     : function(data){
            $('#desa').html(data);
        }
    });
});