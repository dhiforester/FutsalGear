//Menampilkan Produk Pertama Kali
var ProsesBatas = $('#ProsesBatas').serialize();
$('#TabelProduk').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Produk/TabelProduk.php',
    data 	    :  ProsesBatas,
    success     : function(data){
        $('#TabelProduk').html(data);
    }
});
//Proses Pencarian Dimulai
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#TabelProduk').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Produk/TabelProduk.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#TabelProduk').html(data);
        }
    });
});
$('#ProsesTambahkanKeKeranjangBelanja').submit(function(){
    var ProsesTambahkanKeKeranjangBelanja = $('#ProsesTambahkanKeKeranjangBelanja').serialize();
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Produk/ProsesTambahkanKeKeranjang.php',
        data 	    :  ProsesTambahkanKeKeranjangBelanja,
        success     : function(data){
            $('#NotifikasiTambahKeKeranjang').html(data);
            var NotifikasiTambahKeKeranjangBerhasil = $('#NotifikasiTambahKeKeranjangBerhasil').html();
            if(NotifikasiTambahKeKeranjangBerhasil=="Success"){
                location.reload();
            }
        }
    });
});