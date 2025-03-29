<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    date_default_timezone_set('Asia/Jakarta');
    //Time Now Tmp
    $now=date('Y-m-d H:i');
    if(empty($_POST['id_barang'])){
        echo '<span class="text-danger">';
        echo '  ID Barang Tidak Boleh Kosong!';
        echo '</span>';
    }else{
        $id_barang=$_POST['id_barang'];
        //Buka item barang
        $QryProduuk = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
        $DataProduk = mysqli_fetch_array($QryProduuk);
        if(empty($DataProduk['id_barang'])){
            echo '<span class="text-danger">';
            echo '  ID Barang Yang Anda Pilih Tidak Valid!';
            echo '</span>';
        }else{
            $id_barang= $DataProduk['id_barang'];
            $id_mitra= $DataProduk['id_mitra'];
            $nama= $DataProduk['nama'];
            $kategori= $DataProduk['kategori'];
            $satuan= $DataProduk['satuan'];
            $harga= $DataProduk['harga'];
            $stok= $DataProduk['stok'];
            $foto= $DataProduk['foto'];
            echo '<input type="hidden" name="id_barang" id="id_barang" value="'.$id_barang.'">';
            //Cek Data Komentar
            $JumlahKomentar= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_komentar WHERE id_barang='$id_barang'"));
            //Apabila Stok tidak mencukupi
            if(empty($JumlahKomentar)){
                echo '<span class="text-danger">';
                echo '  Belum ada komentar untuk item barang ini!';
                echo '</span>';
            }else{
?>
            <div class="table table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <?php
                            $query = mysqli_query($Conn, "SELECT*FROM barang_komentar WHERE id_barang='$id_barang'  ORDER BY id_barang_komentar DESC LIMIT 10");
                            while ($data = mysqli_fetch_array($query)) {
                                $id_barang_komentar= $data['id_barang_komentar'];
                                $id_barang= $data['id_barang'];
                                $id_pelanggan= $data['id_pelanggan'];
                                $tanggal= $data['tanggal'];
                                $strtotime=strtotime($tanggal);
                                $TanggalFormat=date('d/m/Y',$strtotime);
                                $komentar= $data['komentar'];
                                $balas= $data['balas'];
                                //Buka Data Pelanggan
                                $QryPelanggan = mysqli_query($Conn,"SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'")or die(mysqli_error($Conn));
                                $DataPelanggan = mysqli_fetch_array($QryPelanggan);
                                if(empty($DataPelanggan['id_pelanggan'])){
                                    $nama_pelanggan="None";
                                }else{
                                    $nama_pelanggan= $DataPelanggan['nama'];
                                }
                                echo '<tr>';
                                echo '  <td>';
                                echo '      <b>'.$nama_pelanggan.'</b><br>';
                                echo '      <small>'.$TanggalFormat.'</small><br>';
                                echo '      <small>'.$komentar.'</small><br>';
                                echo '      <small>'.$balas.'</small>';
                                echo '  </td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <a href="index.php?Page=Produk&Sub=Detail&id=<?php echo "$id_barang"; ?>">Lihat Selengkapnya</a>
<?php
            }
        }
    }

?>