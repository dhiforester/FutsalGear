<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['id_produk'])){
        echo '<span>ID Produk Tidak Boleh Kosong!</span>';
    }else{
        $id_produk=$_POST['id_produk'];
?>
    <div class="table table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center"><b>No</b></th>
                    <th class="text-center"><b>ID Transaksi</b></th>
                    <th class="text-center"><b>Tanggal</b></th>
                    <th class="text-center"><b>Rating</b></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $JumlahData = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM reting WHERE id_produk='$id_produk'"));
                    if(empty($JumlahData)){
                        echo '<tr>';
                        echo '  <td colspan="3" class="text-center text-danger">Tidak ada data reting</td>';
                        echo '</tr>';
                    }else{
                        $no = 1;
                        //KONDISI PENGATURAN MASING FILTER
                        $JumlahRating=0;
                        $query = mysqli_query($Conn, "SELECT*FROM reting WHERE id_produk='$id_produk'");
                        while ($data = mysqli_fetch_array($query)) {
                            $id_reting= $data['id_reting'];
                            $id_transaksi= $data['id_transaksi'];
                            $reting= $data['reting'];
                            //Buka Detail Transaksi
                            $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
                            $DataTransaksi = mysqli_fetch_array($QryTransaksi);
                            $tanggal= $DataTransaksi['tanggal'];
                            //Menghitung Jumlah
                            $JumlahRating=$JumlahRating+$reting;
                            echo '<tr>';
                            echo '  <td class="text-center">'.$no.'</td>';
                            echo '  <td class="text-center">'.$id_transaksi.'</td>';
                            echo '  <td class="text-center">'.$tanggal.'</td>';
                            echo '  <td class="text-center">'.$reting.'</td>';
                            echo '</tr>';
                        }
                        $RataRata=$JumlahRating/$no;
                        $RataRata=round($RataRata);
                        echo '<tr>';
                        echo '  <td class="text-center" colspan="3"><b>JUMLAH TOTAL</b></td>';
                        echo '  <td class="text-center">'.$JumlahRating.'</td>';
                        echo '</tr>';
                        echo '<tr>';
                        echo '  <td class="text-center" colspan="3"><b>RATA-RATA</b></td>';
                        echo '  <td class="text-center">'.$RataRata.'</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
<?php
    }
?>