//Kondisi Pertama kali muncul
$('#MenampilkanTabelRating').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Rating/TabelRating.php',
    success     : function(data){
        $('#MenampilkanTabelRating').html(data);
    }
});
//Menampilkan Riwayat Rating
$('#ModalDetailRating').on('show.bs.modal', function (e) {
    var id_produk= $(e.relatedTarget).data('id');
    $('#FormRiwayatRating').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Rating/FormRiwayatRating.php',
        data        : {id_produk: id_produk},
        success     : function(data){
            $('#FormRiwayatRating').html(data);
        }
    });
});