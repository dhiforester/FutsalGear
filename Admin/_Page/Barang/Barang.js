//Menampilkan Produk pertama Kali
$('#MenampilkanTabelBarang').html("Loading...");
var ProsesBatas = $('#ProsesBatas').serialize();
$('#MenampilkanTabelBarang').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Barang/TabelBarang.php',
    data 	    :  ProsesBatas,
    success     : function(data){
        $('#MenampilkanTabelBarang').html(data);
    }
});
//Ketika Batas Data Diubah
$('#batas').change(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelBarang').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/TabelBarang.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelBarang').html(data);
        }
    });
});
//Ketika proses Pencarian
$('#ProsesBatas').submit(function(){
    var ProsesBatas = $('#ProsesBatas').serialize();
    $('#MenampilkanTabelBarang').html('Loading...');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/TabelBarang.php',
        data 	    :  ProsesBatas,
        success     : function(data){
            $('#MenampilkanTabelBarang').html(data);
        }
    });
});
//menampilkan Tabel Brand
$('#TabelBrand').html('Loading...');
$.ajax({
    type 	    : 'POST',
    url 	    : '_Page/Barang/TabelBrand.php',
    success     : function(data){
        $('#TabelBrand').html(data);
    }
});
//Modal Tambah Brand
$('#ModalTambahBrand').on('show.bs.modal', function (e) {
    $('#NotifikasiTambahBrand').html('<span class="text-primary">Pastikan informasi Brand Sudah Sesuai</span>');
});
//Proses Tambah Brand
$('#ProsesTambahBrand').submit(function(){
    $('#NotifikasiTambahBrand').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesTambahBrand')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/ProsesTambahBrand.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiTambahBrand').html(data);
            var NotifikasiTambahBrandBerhasil=$('#NotifikasiTambahBrandBerhasil').html();
            if(NotifikasiTambahBrandBerhasil=="Success"){
                //menampilkan Tabel Brand
                $('#TabelBrand').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/TabelBrand.php',
                    success     : function(data){
                        $('#TabelBrand').html(data);
                    }
                });
                $('#ModalTambahBrand').modal('hide');
                swal("Good Job!", "Tambah Brand Berhasil!", "success");
                $('#ProsesTambahBrand')[0].reset();
            }
        }
    });
});
//Detail Brand
$('#ModalDetailBrand').on('show.bs.modal', function (e) {
    var id_brand= $(e.relatedTarget).data('id');
    $('#FormDetailBrand').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormDetailBrand.php',
        data        : {id_brand: id_brand},
        success     : function(data){
            $('#FormDetailBrand').html(data);
        }
    });
});
//EditBrand
$('#ModalEditBrand').on('show.bs.modal', function (e) {
    var id_brand= $(e.relatedTarget).data('id');
    $('#FormEditBrand').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormEditBrand.php',
        data        : {id_brand: id_brand},
        success     : function(data){
            $('#FormEditBrand').html(data);
            $('#NotifikasiEditBrand').html('<span class="text-primary">Pastikan informasi Brand Sudah Sesuai</span>');
        }
    });
});
//Proses Edit Brand
$('#ProsesEditBrand').submit(function(){
    $('#NotifikasiEditBrand').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesEditBrand')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/ProsesEditBrand.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiEditBrand').html(data);
            var NotifikasiEditBrandBerhasil=$('#NotifikasiEditBrandBerhasil').html();
            if(NotifikasiEditBrandBerhasil=="Success"){
                //menampilkan Tabel Brand
                $('#TabelBrand').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/TabelBrand.php',
                    success     : function(data){
                        $('#TabelBrand').html(data);
                    }
                });
                $('#ModalEditBrand').modal('hide');
                swal("Good Job!", "Edit Brand Berhasil!", "success");
            }
        }
    });
});
//Modal Edit Logo Brand
$('#ModalEditLogoBrand').on('show.bs.modal', function (e) {
    var id_brand= $(e.relatedTarget).data('id');
    $('#PutIdBrandImage').val(id_brand);
    $('#NotifikasiEditLogoBrand').html('<span class="text-primary">Pastikan Logo Brand Sudah Sesuai</span>');
});
//Proses Edit Logo Brand
$('#ProsesEditLogoBrand').submit(function(){
    $('#NotifikasiEditLogoBrand').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesEditLogoBrand')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/ProsesEditLogoBrand.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiEditLogoBrand').html(data);
            var NotifikasiEditLogoBrandBerhasil=$('#NotifikasiEditLogoBrandBerhasil').html();
            if(NotifikasiEditLogoBrandBerhasil=="Success"){
                //menampilkan Tabel Brand
                $('#TabelBrand').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/TabelBrand.php',
                    success     : function(data){
                        $('#TabelBrand').html(data);
                    }
                });
                $('#ProsesEditLogoBrand')[0].reset();
                $('#ModalEditLogoBrand').modal('hide');
                swal("Berhasil!", "Ubah Logo Brand Berhasil!", "success");
                
            }
        }
    });
});
//Modal Hapus Brand
$('#ModalHapusBrand').on('show.bs.modal', function (e) {
    var id_brand = $(e.relatedTarget).data('id');
    $('#PutIdBrand').val(id_brand);
    $('#NotifikasiHapusBrand').html('<span class="text-primary">Menghapus data brand ini akan menghapus data produk yang termasuk dalam brand tersebut. Apakah anda yakin akan menghapus data brand ini?</span>');
});
//Proses Hapus Brand
$('#ProsesHapusBrand').submit(function(){
    $('#NotifikasiHapusBrand').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesHapusBrand')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/ProsesHapusBrand.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiHapusBrand').html(data);
            var NotifikasiHapusBrandBerhasil=$('#NotifikasiHapusBrandBerhasil').html();
            if(NotifikasiHapusBrandBerhasil=="Success"){
                //menampilkan Tabel Brand
                $('#TabelBrand').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/TabelBrand.php',
                    success     : function(data){
                        $('#TabelBrand').html(data);
                    }
                });
                $('#ModalHapusBrand').modal('hide');
                swal("Berhasil!", "Hapus Brand Berhasil!", "success");
            }
        }
    });
});
//Tambah Barang
$('#ModalTambahBarang').on('show.bs.modal', function (e) {
    $('#FormTambahBarang').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormTambahBarang.php',
        success     : function(data){
            $('#FormTambahBarang').html(data);
            $('#harga').mask('000.000.000.000', {reverse: true});
            $('#stok').mask('000.000.000.000', {reverse: true});
        }
    });
});
//Proses Tambah Barang
$('#ProsesTambahBarang').submit(function(){
    $('#NotifikasiTambahBarang').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesTambahBarang')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/ProsesTambahBarang.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiTambahBarang').html(data);
            var NotifikasiTambahBarangBerhasil=$('#NotifikasiTambahBarangBerhasil').html();
            if(NotifikasiTambahBarangBerhasil=="Success"){
                $('#MenampilkanTabelBarang').html("Loading...");
                var ProsesBatas = $('#ProsesBatas').serialize();
                $('#MenampilkanTabelBarang').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/TabelBarang.php',
                    data 	    :  ProsesBatas,
                    success     : function(data){
                        $('#MenampilkanTabelBarang').html(data);
                        $('#ModalTambahBarang').modal('hide');
                        swal("Berhasil!", "Tambah Produk Berhasil!", "success");
                    }
                });
                $('#ProsesTambahBarang')[0].reset();
            }
        }
    });
});
//Detail Barang
$('#ModalDetailProduk').on('show.bs.modal', function (e) {
    var id_produk= $(e.relatedTarget).data('id');
    $('#FormDetailProduk').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormDetailProduk.php',
        data        : {id_produk: id_produk},
        success     : function(data){
            $('#FormDetailProduk').html(data);
        }
    });
});
//Modal Edit Produk
$('#ModalEditProduk').on('show.bs.modal', function (e) {
    var id_produk = $(e.relatedTarget).data('id');
    $('#FormEditProduk').html("Loading...");
    $('#NotifikasiUbahProduk').html('<span class="text-primary">Pastikan form terisi dengan benar</span>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormEditProduk.php',
        data        : {id_produk: id_produk},
        success     : function(data){
            $('#FormEditProduk').html(data);
        }
    });
});
//Proses Edit Produk
$('#ProsesEditProduk').submit(function(){
    $('#NotifikasiEditProduk').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesEditProduk')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/ProsesEditProduk.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiEditProduk').html(data);
            var NotifikasiEditProdukBerhasil=$('#NotifikasiEditProdukBerhasil').html();
            if(NotifikasiEditProdukBerhasil=="Success"){
                var ProsesBatas = $('#ProsesBatas').serialize();
                $('#MenampilkanTabelBarang').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/TabelBarang.php',
                    data 	    :  ProsesBatas,
                    success     : function(data){
                        $('#MenampilkanTabelBarang').html(data);
                        $('#ModalEditProduk').modal('hide');
                        swal("Berhasil!", "Edit Produk Berhasil!", "success");
                    }
                });
            }
        }
    });
});
//Modal ubah foto produk
$('#ModalUbahFotoProduk').on('show.bs.modal', function (e) {
    var id_produk = $(e.relatedTarget).data('id');
    $('#NotifikasiUbahFotoProduk').html('<span class="text-primary">Pastikan foto produk terisi dengan benar</span>');
    $('#PutIdProdukForEditFoto').val(id_produk);
});
//Proses Ubah Foto Produk
$('#ProsesUbahFotoProduk').submit(function(){
    $('#NotifikasiUbahFotoProduk').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesUbahFotoProduk')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/ProsesUbahFotoProduk.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiUbahFotoProduk').html(data);
            var NotifikasiUbahFotoProdukBerhasil=$('#NotifikasiUbahFotoProdukBerhasil').html();
            if(NotifikasiUbahFotoProdukBerhasil=="Success"){
                $('#MenampilkanTabelBarang').html("Loading...");
                var ProsesBatas = $('#ProsesBatas').serialize();
                $('#MenampilkanTabelBarang').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/TabelBarang.php',
                    data 	    :  ProsesBatas,
                    success     : function(data){
                        $('#MenampilkanTabelBarang').html(data);
                        $('#ModalUbahFotoProduk').modal('hide');
                        swal("Berhasil!", "Ubah Foto Produk Berhasil!", "success");
                    }
                });
                $('#ProsesUbahFotoProduk')[0].reset();
            }
        }
    });
});
//Modal Hapus produk
$('#ModalHapusProduk').on('show.bs.modal', function (e) {
    var id_produk = $(e.relatedTarget).data('id');
    $('#NotifikasiHapusProduk').html('<span class="text-primary">Apakah anda yakin akan menghapus data produk ini?</span>');
    $('#PutIdProdukForDelete').val(id_produk);
});
//Proses Hapus Produk
$('#ProsesHapusProduk').submit(function(){
    $('#NotifikasiHapusProduk').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesHapusProduk')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/ProsesHapusProduk.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiHapusProduk').html(data);
            var NotifikasiHapusProdukBerhasil=$('#NotifikasiHapusProdukBerhasil').html();
            if(NotifikasiHapusProdukBerhasil=="Success"){
                var ProsesBatas = $('#ProsesBatas').serialize();
                $('#MenampilkanTabelBarang').html('Loading...');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/TabelBarang.php',
                    data 	    :  ProsesBatas,
                    success     : function(data){
                        $('#MenampilkanTabelBarang').html(data);
                        $('#ModalHapusProduk').modal('hide');
                        swal("Berhasil!", "Hapus Produk Berhasil!", "success");
                    }
                });
            }
        }
    });
});
//Modal Tambah Galeri
$('#ModalTambahGaleri').on('show.bs.modal', function (e) {
    var id_barang = $(e.relatedTarget).data('id');
    $('#FormTambahGaleri').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormTambahGaleri.php',
        data        : {id_barang: id_barang},
        success     : function(data){
            $('#FormTambahGaleri').html(data);
            //Proses Edit Kategori
            $('#ProsesTambahGaleri').submit(function(){
                $('#NotifikasiTambahGaleri').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                var form = $('#ProsesTambahGaleri')[0];
                var data = new FormData(form);
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/ProsesTambahGaleri.php',
                    data 	    :  data,
                    cache       : false,
                    processData : false,
                    contentType : false,
                    enctype     : 'multipart/form-data',
                    success     : function(data){
                        $('#NotifikasiTambahGaleri').html(data);
                        var NotifikasiTambahGaleriBerhasil=$('#NotifikasiTambahGaleriBerhasil').html();
                        if(NotifikasiTambahGaleriBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Modal Hapus Galeri
$('#ModalHapusGaleri').on('show.bs.modal', function (e) {
    var id_barang_foto = $(e.relatedTarget).data('id');
    $('#FormDeleteGaleri').html("Loading...");
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/FormDeleteGaleri.php',
        data        : {id_barang_foto: id_barang_foto},
        success     : function(data){
            $('#FormDeleteGaleri').html(data);
            //Konfirmasi Hapus Galeri
            $('#KonfirmasiHapusGaleri').click(function(){
                $('#NotifikasiHapusGaleri').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/ProsesHapusGaleri.php',
                    data        : {id_barang_foto: id_barang_foto},
                    success     : function(data){
                        $('#NotifikasiHapusGaleri').html(data);
                        var NotifikasiHapusGaleriBerhasil=$('#NotifikasiHapusGaleriBerhasil').html();
                        if(NotifikasiHapusGaleriBerhasil=="Success"){
                            location.reload();
                        }
                    }
                });
            });
        }
    });
});
//Ketika Data Variant Muncul
$('#ModalVarianProduk').on('show.bs.modal', function (e) {
    var id_produk = $(e.relatedTarget).data('id');
    $('#PutIdProdukVarianProduk').val(id_produk);
    //Menampilkan List
    $('#ListVarian').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/TabelVarian.php',
        data        : {id_produk: id_produk},
        success     : function(data){
            $('#ListVarian').html(data);
        }
    });
});
//Ketika Variant Ditambahkan
$('#ProsesTambahVarianProduk').submit(function(){
    var id_produk = $('#PutIdProdukVarianProduk').val();
    $('#NotifikasiTambahVariant').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesTambahVarianProduk')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/ProsesTambahVarianProduk.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiTambahVariant').html(data);
            var NotifikasiTambahVariantBerhasil=$('#NotifikasiTambahVariantBerhasil').html();
            if(NotifikasiTambahVariantBerhasil=="Success"){
                $('#ListVarian').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/TabelVarian.php',
                    data        : {id_produk: id_produk},
                    success     : function(data){
                        $('#ListVarian').html(data);
                    }
                });
                $('#NotifikasiTambahVariant').html('<small class="text-primary">Pastikan data variant sudah terisi dengan benar</small>');
                $('#ProsesTambahVarianProduk')[0].reset();
            }
        }
    });
});
//Menampilkan Modal galeri
$('#ModalGaleriProduk').on('show.bs.modal', function (e) {
    var id_produk = $(e.relatedTarget).data('id');
    $('#PutIdProdukGaleriProduk').val(id_produk);
    //Menampilkan List
    $('#ListGaleri').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/TabelGaleri.php',
        data        : {id_produk: id_produk},
        success     : function(data){
            $('#ListGaleri').html(data);
        }
    });
});
//Ketika Galeri Ditambahkan
$('#ProsesTambahGaleriProduk').submit(function(){
    var id_produk = $('#PutIdProdukGaleriProduk').val();
    $('#NotifikasiTambahGaleri').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
    var form = $('#ProsesTambahGaleriProduk')[0];
    var data = new FormData(form);
    $.ajax({
        type 	    : 'POST',
        url 	    : '_Page/Barang/ProsesTambahGaleriProduk.php',
        data 	    :  data,
        cache       : false,
        processData : false,
        contentType : false,
        enctype     : 'multipart/form-data',
        success     : function(data){
            $('#NotifikasiTambahGaleri').html(data);
            var NotifikasiTambahGaleriBerhasil=$('#NotifikasiTambahGaleriBerhasil').html();
            if(NotifikasiTambahGaleriBerhasil=="Success"){
                $('#ListGaleri').html('<div class="spinner-border text-secondary" role="status"><span class="sr-only"></span></div>');
                $.ajax({
                    type 	    : 'POST',
                    url 	    : '_Page/Barang/TabelGaleri.php',
                    data        : {id_produk: id_produk},
                    success     : function(data){
                        $('#ListGaleri').html(data);
                    }
                });
                $('#NotifikasiTambahGaleri').html('<small class="text-primary">Pastikan file galeri sudah sesuai</small>');
                $('#ProsesTambahGaleriProduk')[0].reset();
            }
            $('#PutIdProdukGaleriProduk').val(id_produk);
        }
    });
});