<?php

    //Chat Dengan Admin
    $JumlahChatAdmin = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM chat WHERE id_akses='$SessionIdAksesPelanggan'"));
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                <span class="breadcrumb-item active">Inbox</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Percakapan</span></h2>
    <div class="row px-xl-5">
        <div class="col-md-12">
            <div class="bg-light p-30">
                <a href="javascript:void(0);" class="btn btn-md btn-primary" data-bs-toggle="modal" data-bs-target="#ModalChatAdmin">
                    <i class="bi bi-plus"></i>  Tulis Pesan
                </a>
                <div class="row">
                    <div class="col-md-12 mt-4 mb-4 table table-responsive pre-scrollable">
                        <table class="table">
                            <tbody>
                                <?php
                                    //Menampilkan list Chat Pelanggan dengan mitra
                                    if(empty($JumlahChatAdmin)){
                                        echo '<tr>';
                                        echo '  <td colspan="3" class="text-center text-danger">Belum Ada Percakapan</td>';
                                        echo '</tr>';
                                    }else{
                                        //Buka data id_akses
                                        $QryChat = mysqli_query($Conn, "SELECT * FROM chat WHERE id_akses='$SessionIdAksesPelanggan' ORDER BY id_chat ASC");
                                        while ($DataChatPelangganDanAdmin = mysqli_fetch_array($QryChat)) {
                                            $id_chat= $DataChatPelangganDanAdmin['id_chat'];
                                            $TanggalChat= $DataChatPelangganDanAdmin['tanggal'];
                                            $kategori= $DataChatPelangganDanAdmin['kategori'];
                                            $IsiPesan= $DataChatPelangganDanAdmin['pesan'];
                                            $status= $DataChatPelangganDanAdmin['status'];
                                            //Format Tanggal
                                            $strtotime2=strtotime($TanggalChat);
                                            $TanggalFormat=date('d/m/Y H:i',$strtotime2);
                                            if($kategori=="From Admin"){
                                                //Ubah Status Menjadi Dibaca
                                                $UpdateStatus = mysqli_query($Conn,"UPDATE chat SET 
                                                    status='Dibaca'
                                                WHERE id_chat='$id_chat'") or die(mysqli_error($Conn)); 
                                                $Pengirim='<span class="text-info">Customer Service</span>';
                                            }else{
                                                $Pengirim='<span class="text-warning">Anda</span>';
                                            }
                                            echo '<tr>';
                                            echo '  <td>';
                                            echo '      <b>'.$Pengirim.'</b><br>';
                                            echo '      '.$IsiPesan.'<br>';
                                            echo '      <small>'.$TanggalFormat.'</small>';
                                            echo '  </td>';
                                            echo '</tr>';
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->