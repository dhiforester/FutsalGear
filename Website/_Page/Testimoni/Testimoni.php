<!-- Categories Start -->
<div class="container-fluid pt-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Testimoni</span></h2>
    <div class="row px-xl-5 pb-3">
        <?php
            $JumlahTestimoni=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM testimoni WHERE status='Publish'"));
            if(empty( $JumlahTestimoni)){
                echo '<div class="col-md-12 col-md-3 text-center">';
                echo '  <div class="bg-light p-30 mb-30">';
                echo '      Belum Ada Testimoni Yang Ditampilkan!';
                echo '  </div>';
                echo '</div>';
            }else{
                //Menampilkan Kategori
                $query = mysqli_query($Conn, "SELECT*FROM testimoni WHERE status='Publish'");
                while ($data = mysqli_fetch_array($query)) {
                    $id_akses= $data['id_akses'];
                    $testimoni= $data['testimoni'];
                    $saran_kritik= $data['saran_kritik'];
                    $status= $data['status'];
                    //Tampilkan Data Pelanggan
                    $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                    $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
                    $nama= $DataDetailAkses['nama'];
                    $kontak= $DataDetailAkses['kontak'];
                    $email = $DataDetailAkses['email'];
                    $password= $DataDetailAkses['password'];
                    $akses= $DataDetailAkses['akses'];
                    if(empty($DataDetailAkses['foto'])){
                        $gambar="No-Image.png";
                    }else{
                        $gambar=$DataDetailAkses['foto'];
                    }

        ?>
            <div class="col col-4 col-md-4 pb-1">
                <a class="text-decoration-none" href="index.php?Page=Produk&brand=<?php echo "$nama_brand";?>">
                    <div class="cat-item d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100%;">
                            <img class="img-fluid" src="<?php echo "$base_url/assets/img/User/$gambar"; ?>" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6><?php echo "$nama"; ?></h6>
                            <p><small class="text-body"><?php echo "<b>Testimoni :</b> $testimoni"; ?></small></p>
                            <p><small class="text-body"><?php echo "<b>Saran & Kritik :</b> $saran_kritik"; ?></small></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php }} ?>
    </div>
</div>
<!-- Categories End -->