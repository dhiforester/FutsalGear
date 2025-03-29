<?php
    //Menghitung Pesan Dari Pelanggan Belum Dibaca
    $JumlahChatBelumDibaca = mysqli_num_rows(mysqli_query($Conn, "SELECT DISTINCT id_akses FROM chat WHERE kategori='To Admin' AND status='Terkirim'"));
?>
<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <?php
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">';
                echo '  Berikut ini adalah halaman pengelolaan data chating.';
                echo '  Pada halaman ini <i>Customer Service</i> dapat membalas pesan tersebut.';
                echo '  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '</div>';
            ?>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-3">
            <button type="button" class="btn btn-md btn-dark btn-block btn-rounded" title="Tampilkan Semua Pesan" id="SemuaPesan">
                <i class="bi bi-chat"></i> Semua Pesan
            </button>
        </div>
        <div class="col-lg-3">
            <button type="button" class="btn btn-md btn-success btn-block btn-rounded" title="Tampilkan Pesan Masuk Belum Dibaca" id="BelumDibaca">
                <i class="bi bi-chat-dots"></i> Belum Dibaca 
                <?php
                    //Apabila Ada Pesan Belum Dibaca Maka Beri tanda
                    if(!empty($JumlahChatBelumDibaca)){
                        echo '<span class="badge badge-pill badge-secondary">'.$JumlahChatBelumDibaca.'</span>';
                    }
                ?>
            </button>
        </div>
    </div>
    <div class="row" id="TabelChating">

    </div>
</section>