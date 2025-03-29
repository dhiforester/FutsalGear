<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Berikut ini adalah data produk yang diurutkan berdasarkan rating.';
                echo '  Anda juga bisa melihat riwayat rating yang diberikan oleh pelanggan.';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
                //Menghitung dan menyimpan data rekapitulasi rating
                $Qry = mysqli_query($Conn, "SELECT*FROM produk");
                while ($DataProduk = mysqli_fetch_array($Qry)) {
                    $id_produk= $DataProduk['id_produk'];
                    //Jumlah Rating
                    $JumlahDataRating=mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM reting WHERE id_produk='$id_produk'"));
                    $TotalRating =0;
                    $query = mysqli_query($Conn, "SELECT*FROM reting WHERE id_produk='$id_produk'");
                    while ($data = mysqli_fetch_array($query)) {
                        $reting= $data['reting'];
                        $TotalRating =$TotalRating+$reting;
                    }
                    if(empty($JumlahDataRating)){
                        $Average=0;
                    }else{
                        if(empty($TotalRating)){
                            $Average=0;
                        }else{
                            $Average=$TotalRating/$JumlahDataRating;
                            $Average=round($Average);
                        }
                    }
                    //Apakah sudah ada
                    $ApakahSudahAda = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM reting_rank WHERE id_produk='$id_produk'"));
                    if(empty($ApakahSudahAda)){
                        //Insert
                        $entry="INSERT INTO reting_rank (
                            id_produk,
                            sum_reting,
                            frq_reting,
                            ave_reting
                        ) VALUES (
                            '$id_produk',
                            '$TotalRating',
                            '$JumlahDataRating',
                            '$Average'
                        )";
                        $Input=mysqli_query($Conn, $entry);
                    }else{
                        //Update
                        $UpdateRating = mysqli_query($Conn,"UPDATE reting_rank SET 
                            sum_reting='$TotalRating',
                            frq_reting='$JumlahDataRating',
                            ave_reting='$Average'
                        WHERE id_produk='$id_produk'") or die(mysqli_error($Conn)); 
                    }
                }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <b class="card-title">
                        <i class="bi bi-filter-circle"></i> Rating Produk
                    </b>
                </div>
                <div id="MenampilkanTabelRating">

                </div>
            </div>
            
        </div>
    </div>
</section>