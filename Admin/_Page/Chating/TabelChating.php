<?php
    //koneksi dan session
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //KategoriData
    if(!empty($_POST['KategoriData'])){
        $KategoriData=$_POST['KategoriData'];
    }else{
        $KategoriData="Semua";
    }
    if($KategoriData=="Semua"){
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT DISTINCT id_akses FROM chat"));
    }else{
        $jml_data = mysqli_num_rows(mysqli_query($Conn, "SELECT DISTINCT id_akses FROM chat WHERE kategori='To Admin' AND status='Terkirim'"));
    }
    if(empty($jml_data)){
        echo '<div class="col-md-12">';
        echo '  <div class="card">';
        echo '      <div class="card-body text-center text-danger">';
        echo '          Tidak Ada Pesan Percakapan';
        echo '      </div>';
        echo '  </div>';
        echo '</div>';
    }else{
        $no = 1;
        if($KategoriData=="Semua"){
            $query = mysqli_query($Conn, "SELECT DISTINCT id_akses FROM chat ORDER BY id_chat DESC");
        }else{
            $query = mysqli_query($Conn, "SELECT DISTINCT id_akses FROM chat WHERE kategori='To Admin' AND status='Terkirim' ORDER BY id_chat DESC");
        }
        while ($data = mysqli_fetch_array($query)) {
            $id_akses= $data['id_akses'];
            //Buka Detail Akses
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
            //Hitung Jumlah Chat Dengan Pelanggan Tersebut
            $JumlahChat = mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM chat WHERE id_akses='$id_akses'"));
            $JumlahChatBelumDibaca = mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM chat WHERE id_akses='$id_akses' AND kategori='To Admin' AND status='Terkirim'"));
            if(!empty($JumlahChatBelumDibaca)){
                $LabelPesanBelumDibaca='<small class="text text-danger"><i class="bi bi-inbox"></i> Ada '.$JumlahChatBelumDibaca.' Pesan Belum Dibaca</small>';
            }else{
                $LabelPesanBelumDibaca='<small class="text text-success"><i class="bi bi-check"></i> Semua Pesan Sudah Dibaca</small>';
            }
            echo '<div class="col-md-3 mb-2">';
            echo '  <div class="card">';
            echo '      <div class="card-header">';
            echo '          <b class="card-title">';
            echo '              '.$no.'. '.$nama.' ('.$JumlahChat.')';
            echo '          </b>';
            echo '      </div>';
            echo '      <div class="card-body">';
            echo '          <div class="row">';
            echo '              <div class="col-md-4">';
            echo '                  <img src="assets/img/User/'.$gambar.'" alt="" width="70px" height="70px" class="rounded-circle">';
            echo '              </div>';
            echo '              <div class="col-md-8">';
            echo '                 '.$LabelPesanBelumDibaca.'<br>';
            echo '                  <a href="javascript:void(0);" class="text-info"  data-bs-toggle="modal" data-bs-target="#ModalDetailChat" data-id="'.$id_akses.'">';
            echo '                      <small><small><i class="bi bi-envelope"></i> Lihat Detail</small></small>';
            echo '                  </a>';
            echo '              </div>';
            echo '          </div>';
            echo '      </div>';
            echo '  </div>';
            echo '</div>';
        }
    }
?>