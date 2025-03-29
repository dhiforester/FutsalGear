<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM brand"));
?>

<div class="news">
    <?php
        if(empty($jml_data)){
            echo '<div class="col-md-12 text-center text-danger">';
            echo '  Tidak ada data brand barang yang ditampilkan.';
            echo '</div>';
        }else{
            $no = 1;
            //KONDISI PENGATURAN MASING FILTER
            $query = mysqli_query($Conn, "SELECT*FROM brand ORDER BY nama_brand ASC");
            while ($data = mysqli_fetch_array($query)) {
                $id_brand= $data['id_brand'];
                $nama_brand= $data['nama_brand'];
                $deskripsi= $data['deskripsi'];
                $logo= $data['logo'];
                $jumlah_karakter = strlen($deskripsi);
                //Routing Berdasarkan jumlah Karakter\
                if($jumlah_karakter<100){
                    $FormatDeskripsi=$deskripsi;
                }else{
                    $potong_kalimat = substr($deskripsi, 0, 100);
                    $FormatDeskripsi="$potong_kalimat...";
                }
                //Hitung Jumlah Item Barang
                $JumlahItemBarang = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM produk WHERE id_brand='$id_brand'"));
    ?>
        <div class="post-item clearfix border-1 border-bottom mb-4">
            <img src="assets/img/Brand/<?php echo $logo; ?>" alt="">
            <h4>
                <a href="javascript:void(0);"  data-bs-toggle="modal" data-bs-target="#ModalDetailBrand" data-id="<?php echo "$id_brand"; ?>">
                    <?php echo "$no. $nama_brand ($JumlahItemBarang)"; ?>
                </a>
            </h4>
            <p><?php echo "$FormatDeskripsi"; ?></p>
            <p>
                <a href="javascript:void(0);" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#ModalEditBrand" data-id="<?php echo "$id_brand"; ?>" title="Ubah Brand">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <a href="javascript:void(0);" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#ModalEditLogoBrand" data-id="<?php echo "$id_brand"; ?>" title="Ubah Logo">
                    <i class="bi bi-image"></i>
                </a>
                <a href="javascript:void(0);" class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#ModalHapusBrand" data-id="<?php echo "$id_brand"; ?>" title="Hapus Brand">
                    <i class="bi bi-x"></i>
                </a>
            </p>
        </div>
    <?php $no++;}} ?>
</div>