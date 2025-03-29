<?php
    $tahun_ini=date('Y');
    //menghitung Jumlah Produk
    $JumlahProduk = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM produk"));
    //Jumlah Pelanggan
    $JumlahPelanggan = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM pelanggan"));
    //Jumlah Transaksi
    $JumlahTransaksi = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi"));
    //Jumlah Diskon
    $JumlahDiskon = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM diskon"));
    //Jumlah Transaksi
    $Sum = mysqli_fetch_array(mysqli_query($Conn, "SELECT SUM(jumlah) AS jumlah FROM transaksi"));
    $jumlah_transaksi = $Sum['jumlah'];
    $jumlah_transaksi = "" . number_format($jumlah_transaksi,0,',','.');
?>
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card blue-card">
                        <div class="card-body">
                            <h5 class="card-title">Pelanggan</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?php echo $JumlahPelanggan;?></h6>
                                    <span class="text-muted small pt-2 ps-1">Orang</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Produk</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-box"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?php echo $JumlahProduk ;?></h6>
                                    <span class="text-muted small pt-2 ps-1">Item</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Diskon</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-gift"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?php echo $JumlahDiskon;?></h6>
                                    <span class="text-muted small pt-2 ps-1">Item</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Transaksi</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?php echo $jumlah_transaksi ;?></h6>
                                    <span class="text-muted small pt-2 ps-1">IDR</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Reports -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Transaksi <span>/ 7 hari Terakhir</span></h5>
                            <div id="reportsChart">
                                <!-- Line Chart -->
                            </div>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#reportsChart"), {
                                    series: [{
                                        name: 'Transaksi 7 Hari terakhir',
                                        data: [
                                                    <?php
                                                        date_default_timezone_set('UTC');
                                                        //7 hari kebelakang
                                                        $time_sekarang = time();
                                                        $AwalMinggu0=strtotime("-7 days", $time_sekarang);
                                                        $AwalMinggu1=strtotime("-6 days", $time_sekarang);
                                                        $AwalMinggu2=strtotime("-5 days", $time_sekarang);
                                                        $AwalMinggu3=strtotime("-4 days", $time_sekarang);
                                                        $AwalMinggu4=strtotime("-3 days", $time_sekarang);
                                                        $AwalMinggu5=strtotime("-2 days", $time_sekarang);
                                                        $AwalMinggu6=strtotime("-1 days", $time_sekarang);
                                                        $AwalMinggu7=$time_sekarang;
                                                        //Label
                                                        $LabelMinggu0=date('Y-m-d', $AwalMinggu0);
                                                        $LabelMinggu1=date('Y-m-d', $AwalMinggu1);
                                                        $LabelMinggu2=date('Y-m-d', $AwalMinggu2);
                                                        $LabelMinggu3=date('Y-m-d', $AwalMinggu3);
                                                        $LabelMinggu4=date('Y-m-d', $AwalMinggu4);
                                                        $LabelMinggu5=date('Y-m-d', $AwalMinggu5);
                                                        $LabelMinggu6=date('Y-m-d', $AwalMinggu6);
                                                        $LabelMinggu7=date('Y-m-d', $AwalMinggu7);
                                                        
                                                        // $LabelMinggu0=strtotime($LabelMinggu0);
                                                        // $LabelMinggu1=strtotime($LabelMinggu1);
                                                        // $LabelMinggu2=strtotime($LabelMinggu2);
                                                        // $LabelMinggu3=strtotime($LabelMinggu3);
                                                        // $LabelMinggu4=strtotime($LabelMinggu4);
                                                        // $LabelMinggu5=strtotime($LabelMinggu5);
                                                        // $LabelMinggu6=strtotime($LabelMinggu6);
                                                        // $LabelMinggu7=strtotime($LabelMinggu7);
                                                        //Hitung jumlah log
                                                        $JumlahLog1 = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal like '%$LabelMinggu1%'"));
                                                        $JumlahLog2 = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal like '%$LabelMinggu2%'"));
                                                        $JumlahLog3 = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal like '%$LabelMinggu3%'"));
                                                        $JumlahLog4 = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal like '%$LabelMinggu4%'"));
                                                        $JumlahLog5 = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal like '%$LabelMinggu5%'"));
                                                        $JumlahLog6 = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal like '%$LabelMinggu6%'"));
                                                        $JumlahLog7 = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM transaksi WHERE tanggal like '%$LabelMinggu7%'"));

                                                        echo ''.$JumlahLog1.', ';
                                                        echo ''.$JumlahLog2.', ';
                                                        echo ''.$JumlahLog3.', ';
                                                        echo ''.$JumlahLog4.', ';
                                                        echo ''.$JumlahLog5.', ';
                                                        echo ''.$JumlahLog6.', ';
                                                        echo ''.$JumlahLog7.' ';
                                                    ?>
                                                    // 31, 40, 28, 51, 42, 82, 90
                                                ],
                                            }, 
                                            // {
                                            //     name: 'Revenue',
                                            //     data: [11, 32, 45, 32, 34, 52, 41]
                                            // }, 
                                            // {
                                            //     name: 'Customers',
                                            //     data: [15, 11, 32, 18, 9, 24, 11]
                                            // }
                                        ],
                                    chart: {
                                    height: 350,
                                    type: 'area',
                                    toolbar: {
                                        show: false
                                    },
                                    },
                                    markers: {
                                    size: 4
                                    },
                                    colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                    fill: {
                                    type: "gradient",
                                    gradient: {
                                        shadeIntensity: 1,
                                        opacityFrom: 0.3,
                                        opacityTo: 0.4,
                                        stops: [0, 90, 100]
                                    }
                                    },
                                    dataLabels: {
                                    enabled: false
                                    },
                                    stroke: {
                                    curve: 'smooth',
                                    width: 2
                                    },
                                    xaxis: {
                                    type: 'text',
                                    categories: [
                                        <?php
                                            //7 hari kebelakang
                                            $time_sekarang = time();
                                            $AwalMinggu1=strtotime("-6 days", $time_sekarang);
                                            $AwalMinggu2=strtotime("-5 days", $time_sekarang);
                                            $AwalMinggu3=strtotime("-4 days", $time_sekarang);
                                            $AwalMinggu4=strtotime("-3 days", $time_sekarang);
                                            $AwalMinggu5=strtotime("-2 days", $time_sekarang);
                                            $AwalMinggu6=strtotime("-1 days", $time_sekarang);
                                            $AwalMinggu7=$time_sekarang;
                                            //Label
                                            $LabelMinggu1=date('d F', $AwalMinggu1);
                                            $LabelMinggu2=date('d F', $AwalMinggu2);
                                            $LabelMinggu3=date('d F', $AwalMinggu3);
                                            $LabelMinggu4=date('d F', $AwalMinggu4);
                                            $LabelMinggu5=date('d F', $AwalMinggu5);
                                            $LabelMinggu6=date('d F', $AwalMinggu6);
                                            $LabelMinggu7=date('d F', $AwalMinggu7);
                                            echo '"'.$LabelMinggu1.'", ';
                                            echo '"'.$LabelMinggu2.'", ';
                                            echo '"'.$LabelMinggu3.'", ';
                                            echo '"'.$LabelMinggu4.'", ';
                                            echo '"'.$LabelMinggu5.'", ';
                                            echo '"'.$LabelMinggu6.'", ';
                                            echo '"'.$LabelMinggu7.'", ';
                                        ?>
                                        // "2018-09-19T00:00:00.000Z", 
                                        // "2018-09-19T01:30:00.000Z", 
                                        // "2018-09-19T02:30:00.000Z", 
                                        // "2018-09-19T03:30:00.000Z", 
                                        // "2018-09-19T04:30:00.000Z", 
                                        // "2018-09-19T05:30:00.000Z", 
                                        // "2018-09-19T06:30:00.000Z"
                                    ]
                                    },
                                    tooltip: {
                                    x: {
                                        format: 'dd/MM/yy HH:mm'
                                    },
                                    }
                                }).render();
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Order Terbaru</h5>
                            <div class="activity">
                                <?php
                                    if(empty($JumlahTransaksi)){
                                        echo '<div class="activity-item d-flex">';
                                        echo '  Tidak Ada Transaksi';
                                        echo '</div>';
                                    }else{
                                        //Arraykan Transaksi
                                        $QryTransaksi = mysqli_query($Conn, "SELECT*FROM transaksi ORDER BY id_transaksi DESC LIMIT 6");
                                        while ($DataTransaksi = mysqli_fetch_array($QryTransaksi)) {
                                            $id_transaksi= $DataTransaksi['id_transaksi'];
                                            $tanggal= $DataTransaksi['tanggal'];
                                            $nama_pelanggan= $DataTransaksi['nama_pelanggan'];
                                            $status_pengiriman= $DataTransaksi['status_pengiriman'];
                                            $tanggal= strtotime($tanggal);
                                            $tanggal=date('d/m/y H:i', $tanggal);
                                            //Routing Status Pengiriman
                                            if($status_pengiriman=="Sampai Tujuan"){
                                                $LabelStatusPengiriman='<span class="text-success">Sampai Tujuan</span>';
                                            }else{
                                                $LabelStatusPengiriman='<span class="text-warning">'.$status_pengiriman.'</span>';
                                            }
                                            echo '<div class="activity-item d-flex">';
                                            echo '  <div class="activite-label">'.$tanggal.'</div>';
                                            echo '  <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>';
                                            echo '  <div class="activity-content">';
                                            echo '      <b>'.$nama_pelanggan.'</b><br>'.$LabelStatusPengiriman.'';
                                            echo '  </div>';
                                            echo '</div>';
                                        }
                                    }
                                ?>
                                
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="index.php?Page=Transaksi">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>