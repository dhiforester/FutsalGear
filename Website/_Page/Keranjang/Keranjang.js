//Kondisi Ketika Modal Hapus Item Muncul
$('#ModalHapusItemKeranjang').on('show.bs.modal', function (e) {
    var id_rincian = $(e.relatedTarget).data('id');
    $('#PutIdRincianForDelete').val(id_rincian);
    $('#NotifikasiHapusItemKeranjang').html('<small class="text-dark">Apakah anda yakin akan menghapus item ini dari keranjang?</small>');
});
//Kondisi Ketika Proses Hapus Dimulai
$('#ProsesHapusItemKeranjang').submit(function(){
    var ProsesHapusItemKeranjang = $('#ProsesHapusItemKeranjang').serialize();
    $('#NotifikasiHapusItemKeranjang').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Keranjang/ProsesHapusItemKeranjang.php',
        data 	    :  ProsesHapusItemKeranjang,
        success     : function(data){
            $('#NotifikasiHapusItemKeranjang').html(data);
            var NotifikasiHapusItemKeranjangBerhasil=$('#NotifikasiHapusItemKeranjangBerhasil').html();
            if(NotifikasiHapusItemKeranjangBerhasil=="Success"){
                location.reload();
            }
        }
    });
});
//Ketika Provinsi Berubah
$('#provinsi').change(function(){
    var provinsi = $('#provinsi').val();
    $('#kabupaten').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Keranjang/ListKabupaten.php',
        data 	    :  {provinsi: provinsi},
        success     : function(data){
            $('#kabupaten').html(data);
        }
    });
});
//Ketika Provinsi Berubah
$('#provinsi').change(function(){
    var provinsi = $('#provinsi').val();
    $('#kabupaten').html('<option value="">Loading...</option>>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Keranjang/ListKabupaten.php',
        data 	    :  {provinsi: provinsi},
        success     : function(data){
            $('#kabupaten').html(data);
            $('#kecamatan').html('<option value="">Pilih</option>>');
            $('#desa').html('<option value="">Pilih</option>>');
            $('#kurir').html('<option value="">Pilih</option>>');
        }
    });
});
//Ketuka Kabupaten Berubah
$('#kabupaten').change(function(){
    var kabupaten = $('#kabupaten').val();
    $('#kecamatan').html('<option value="">Loading...</option>>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Keranjang/ListKecamatan.php',
        data 	    :  {kabupaten: kabupaten},
        success     : function(data){
            $('#kecamatan').html(data);
            $('#desa').html('<option value="">Pilih</option>>');
            $('#kurir').html('<option value="">Pilih</option>>');
        }
    });
});
//Ketuka Kecamatan Berubah
$('#kecamatan').change(function(){
    var kecamatan = $('#kecamatan').val();
    $('#desa').html('<option value="">Loading...</option>>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Keranjang/ListDesa.php',
        data 	    :  {kecamatan: kecamatan},
        success     : function(data){
            $('#desa').html(data);
            $('#kurir').html('<option value="">Pilih</option>>');
        }
    });
});
//Ketika desa berubah
$('#desa').change(function(){
    var desa = $('#desa').val();
    $('#kurir').html('<option value="">Loading...</option>>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Keranjang/ListKurir.php',
        data 	    :  {desa: desa},
        success     : function(data){
            $('#kurir').html(data);
        }
    });
});
//Ketika Kurir Diubah
$('#kurir').change(function(){
    var JumlahTotal = $('#JumlahTotal').val();
    var provinsi = $('#provinsi').val();
    var kabupaten = $('#kabupaten').val();
    var kecamatan = $('#kecamatan').val();
    var desa = $('#desa').val();
    var kurir = $('#kurir').val();
    $('#PutOngkir').html('<span class="text-danger">Loading...</span>');
    $('#PutTotal').html('<span class="text-danger">Loading...</span>');
    //Cari Nilai Ongkos Kirim
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Keranjang/CariOngkosKirim.php',
        data 	    :  {provinsi: provinsi, kabupaten: kabupaten, kecamatan: kecamatan, desa: desa, kurir: kurir},
        success     : function(data){
            $('#PutOngkir').html(data);
        }
    });
    //Cari Jumlah Total
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Keranjang/CariJumlah.php',
        data 	    :  {provinsi: provinsi, kabupaten: kabupaten, kecamatan: kecamatan, desa: desa, kurir: kurir, JumlahTotal: JumlahTotal},
        success     : function(data){
            $('#PutTotal').html(data);
        }
    });
});
//Ketika Transaksi Di Simpan
$('#ProsesTambahTransaksi').submit(function(){
    var ProsesTambahTransaksi = $('#ProsesTambahTransaksi').serialize();
    $('#NotifikasiSimpanKeranjang').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Keranjang/ProsesTambahTransaksi.php',
        data 	    : ProsesTambahTransaksi,
        success     : function(data){
            $('#NotifikasiSimpanKeranjang').html(data);
            var NotifikasiSimpanKeranjangBerhasil=$('#NotifikasiSimpanKeranjangBerhasil').html();
            var IdTransaksi=$('#IdTransaksi').val();
            if(NotifikasiSimpanKeranjangBerhasil=="Success"){
                window.location.href = 'index.php?Page=Profile&Sub=DetailTransaksi&id='+IdTransaksi+'';
            }
        }
    });
});