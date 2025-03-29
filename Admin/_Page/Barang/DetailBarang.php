<?php
    //Koneksi
    date_default_timezone_set('Asia/Jakarta');
    //Tangkap id_mitra
    if(empty($_GET['id'])){
        echo '<div class="card">';
        echo '  <div class="card-header">';
        echo '      <h4 class="card-title">Detail Barang</h4>';
        echo '  </div>';
        echo '  <div class="card-body">';
        echo '      <div class="row">';
        echo '          <div class="col-md-12 mb-3 text-danger text-center">';
        echo '              ID Barang Tidak Ditemukan.';
        echo '          </div>';
        echo '      </div>';
        echo '  </div>';
        echo '  <div class="card-footer">';
        echo '      Error ID Null';
        echo '  </div>';
        echo '</div>';
    }else{
        $id_barang=$_GET['id'];
        //Buka data barang
        $QryBarang = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
        $DataBarang = mysqli_fetch_array($QryBarang);
        $id_barang= $DataBarang['id_barang'];
        $nama= $DataBarang['nama'];
        $kategori= $DataBarang['kategori'];
        $satuan= $DataBarang['satuan'];
        $harga= $DataBarang['harga'];
        $HargaRp = "Rp " . number_format($harga,0,',','.');
        $stok= $DataBarang['stok'];
        $foto= $DataBarang['foto'];
        //Detail Mitra
        $QryMitra = mysqli_query($Conn,"SELECT * FROM mitra WHERE id_mitra='$id_mitra'")or die(mysqli_error($Conn));
        $DataMitra = mysqli_fetch_array($QryMitra);
        $nama_mitra= $DataMitra['nama_mitra'];
        //Jumlah Galeri
        $JumlahGaleri = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_foto WHERE id_barang='$id_barang'"));
        $JumlahDiskon=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_diskon WHERE id_barang='$id_barang'"));
        $JumlahFavorit=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_favorit WHERE id_barang='$id_barang'"));
        $JumlahKomentar=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_komentar WHERE id_barang='$id_barang'"));
        $JumlahReting=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_reting WHERE id_barang='$id_barang'"));
?>
    <div class="row">
        <div class="col-md-12 mb-3">
            <a href="index.php?Page=Barang" class="btn btn-md btn-dark btn-rounded btn-block">
                <i class="bi bi-arrow-left-short"></i> Kembali
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="bi bi-info-circle"></i> Detail Barang
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            <img src="assets/img/Barang/<?php echo "$foto"; ?>" alt="" width="90%">
                        </div>
                        <div class="col-md-6">
                            <div class="row mt-2"> 
                                <div class="col-md-6"><dt>ID Barang</dt></div>
                                <div class="col-md-6"><?php echo "$id_barang"; ?></div>
                            </div>
                            <div class="row mt-2"> 
                                <div class="col-md-6"><dt>Nama Barang</dt></div>
                                <div class="col-md-6"><?php echo "$nama"; ?></div>
                            </div>
                            <div class="row mt-2"> 
                                <div class="col-md-6"><dt>Mitra</dt></div>
                                <div class="col-md-6"><?php echo "$nama_mitra"; ?></div>
                            </div>
                            <div class="row mt-2"> 
                                <div class="col-md-6"><dt>Kategori</dt></div>
                                <div class="col-md-6"><?php echo "$kategori"; ?></div>
                            </div>
                            <div class="row mt-2"> 
                                <div class="col-md-6"><dt>Stok</dt></div>
                                <div class="col-md-6"><?php echo "$stok $satuan"; ?></div>
                            </div>
                            <div class="row mt-2"> 
                                <div class="col-md-6"><dt>Harga</dt></div>
                                <div class="col-md-6"><?php echo "$HargaRp"; ?></div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-success btn-md btn-block" data-bs-toggle="modal" data-bs-target="#ModalEditBarang2" data-id="<?php echo "$id_barang"; ?>">
                        <i class="bi bi-pencil-square"></i> Edit Barang
                    </button>  
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="bi bi-image"></i> Galeri
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                        if(empty($JumlahGaleri)){
                            echo "Belum Ada Data Galeri";
                        }else{
                    ?>
                        <!-- Slides with captions -->
                        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <?php
                                    for ( $i=0; $i<=$JumlahGaleri; $i++ ){
                                        if($i<$JumlahGaleri){
                                            echo '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="'.$i.'" class="active" aria-label="Slide '.$i.'" aria-current="true"></button>';
                                        }
                                    }
                                ?>
                            </div>
                            <div class="carousel-inner">
                                <?php
                                    $query = mysqli_query($Conn, "SELECT*FROM barang_foto WHERE id_barang='$id_barang'");
                                    while ($data = mysqli_fetch_array($query)) {
                                        $id_barang_foto= $data['id_barang_foto'];
                                        $FotoGaleri= $data['foto'];
                                ?>
                                    <div class="carousel-item active" >
                                        <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#ModalHapusGaleri" data-id="<?php echo "$id_barang_foto"; ?>" title="Hapus Galeri">
                                            <img src="assets/img/Barang/<?php echo $FotoGaleri;?>" class="d-block w-100" alt="..." height="210px">
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                            <button class="carousel-control-prev btn-primary" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <i class="bi bi-arrow-left-circle"></i>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next btn-primary" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <i class="bi bi-arrow-right-circle"></i>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    <?php } ?>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary btn-md btn-block" data-bs-toggle="modal" data-bs-target="#ModalTambahGaleri" data-id="<?php echo "$id_barang"; ?>">
                        <i class="bi bi-plus"></i> Tambah Foto
                    </button>  
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informasi Lainnya</h5>
                    <!-- Default Tabs -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                                <i class="bi bi-gift"></i> Diskon (<?php echo "$JumlahDiskon"; ?>)
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false" tabindex="-1">
                                <i class="bi bi-heart"></i> Favorit (<?php echo "$JumlahFavorit"; ?>)
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false" tabindex="-1">
                                <i class="bi bi-star"></i> Reting (<?php echo "$JumlahReting"; ?>)
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="komentar-tab" data-bs-toggle="tab" data-bs-target="#komentar" type="button" role="tab" aria-controls="komentar" aria-selected="false" tabindex="-1">
                                <i class="bi bi-chat-dots"></i> Komentar (<?php echo "$JumlahKomentar"; ?>)
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2" id="myTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                        Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium distinctio omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio similique. Voluptate nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
                        </div>
                    </div><!-- End Default Tabs -->

                </div>
            </div>
        </div>
    </div>
<?php } ?>