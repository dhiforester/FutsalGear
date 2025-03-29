var ProsesBatas = $('#ProsesBatas').serialize();
$('#TabelBantuan').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Bantuan/TabelBantuan.php',
    data 	    :  ProsesBatas,
    success     : function(data){
        $('#TabelBantuan').html(data);
    }
});
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#TabelBantuan').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Bantuan/TabelBantuan.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#TabelBantuan').html(data);
        }
    });
});
