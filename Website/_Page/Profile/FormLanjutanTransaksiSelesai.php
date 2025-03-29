<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['id_transaksi'])){
        echo '<span class="text-danger">ID Transaksi Tidak Boleh Kosong!</span>';
    }else{
        if(empty($_POST['status_transaksi'])){
            echo '<span class="text-danger">Status Transaksi Tidak Boleh Kosong!</span>';
        }else{
            $id_transaksi=$_POST['id_transaksi'];
            $status_transaksi=$_POST['status_transaksi'];
            if($status_transaksi=="Selesai"){
                echo '<div class="row mb-4">';
                echo '  <div class="col-md-12">';
                echo '      <label for=""><b>Beri Nilai Produk Kami</b></label>';
                $no=1;
                $query = mysqli_query($Conn, "SELECT*FROM rincian WHERE id_transaksi='$id_transaksi'");
                while ($data = mysqli_fetch_array($query)) {
                    $id_produk= $data['id_produk'];
                    //Buka Nama Produk
                    $QryProduk = mysqli_query($Conn,"SELECT * FROM produk WHERE id_produk='$id_produk'")or die(mysqli_error($Conn));
                    $DataProduk = mysqli_fetch_array($QryProduk);
                    $nama_produk=$DataProduk['nama_produk'];
                    echo '<input type="hidden" name="id_produk[]" value="'.$id_produk.'">';
                    echo '<div class="row mb-2">';
                    echo '  <div class="col-md-12">';
                    echo '      <label for="reting'.$id_produk.'">'.$no.'. '.$nama_produk.'</label>';
                    echo '      <select class="form-control" name="reting'.$id_produk.'" id="reting'.$id_produk.'">';
                    echo '          <option value="">Pilih</option>';
                    echo '          <option value="1">Sangat Kurang</option>';
                    echo '          <option value="2">Kurang</option>';
                    echo '          <option value="3">Sedang</option>';
                    echo '          <option value="4">Baik</option>';
                    echo '          <option value="5">Sangat Baik</option>';
                    echo '      </select>';
                    echo '  </div>';
                    echo '</div>';
                }
                echo '  </div>';
                echo '</div>';
                echo '<div class="row mb-4">';
                echo '  <div class="col-md-12">';
                echo '      <label for="testimoni"><b>Testimoni</b></label>';
                echo '      <textarea name="testimoni" id="testimoni" class="form-control"></textarea>';
                echo '      <small>Tulis pengalaman anda atas layanan kami</small>';
                echo '  </div>';
                echo '</div>';
                echo '<div class="row mb-4">';
                echo '  <div class="col-md-12">';
                echo '      <label for="saran_kritik"><b>Saran & Kritik</b></label>';
                echo '      <textarea name="saran_kritik" id="saran_kritik" class="form-control"></textarea>';
                echo '      <small>Bantu kami dengan saran dan kritik anda</small>';
                echo '  </div>';
                echo '</div>';
            }else{
                echo '<div class="row mb-4">';
                echo '  <div class="col-md-12">';
                echo '      <label for="keterangan"><b>Alasan Pengembalian</b></label>';
                echo '      <textarea name="keterangan" id="keterangan" class="form-control"></textarea>';
                echo '  </div>';
                echo '</div>';
                echo '<div class="row mb-4">';
                echo '  <div class="col-md-12">';
                echo '      <label for="bukti"><b>Bukti Kerusakan/Ketidak Seuaian</b></label>';
                echo '      <input type="file" name="bukti" id="bukti" class="form-control">';
                echo '  </div>';
                echo '</div>';
            }
        }
    }
?>