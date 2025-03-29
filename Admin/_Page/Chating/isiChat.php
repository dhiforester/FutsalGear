<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['id_akses'])){
        echo '<span class="text-danger">ID Akses Tidak Boleh Kosong!</span>';
    }else{
        $id_akses=$_POST['id_akses'];
        $JumlahChat=mysqli_num_rows(mysqli_query($Conn, "SELECT * FROM chat WHERE id_akses='$id_akses'"));
        if(empty($JumlahChat)){
            echo '<span class="text-danger">Belum ada chat dengan pelanggan  tersebut!</span>';
        }else{
            $query = mysqli_query($Conn, "SELECT * FROM chat WHERE id_akses='$id_akses' ORDER BY id_chat ASC");
            while ($data = mysqli_fetch_array($query)) {
                $id_chat= $data['id_chat'];
                $kategori= $data['kategori'];
                $tanggal= $data['tanggal'];
                $pesan= $data['pesan'];
                $status= $data['status'];
                //Format Tanggal
                $strtotime=strtotime($tanggal);
                $tanggal=date('d/m/Y H:i', $strtotime);
                //Buka Nama Pelanggan
                $Qrypelanggan = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$id_akses'")or die(mysqli_error($Conn));
                $Datapelanggan = mysqli_fetch_array($Qrypelanggan);
                if(!empty($Datapelanggan['nama'])){
                    $nama= $Datapelanggan['nama'];
                }else{
                    $nama="None";
                }
                if($kategori=="To Admin"){
                    //Ubah Status Menjadi Dibaca
                    $UpdateStatus = mysqli_query($Conn,"UPDATE chat SET 
                        status='Dibaca'
                    WHERE id_chat='$id_chat'") or die(mysqli_error($Conn)); 
                    if($UpdateStatus){
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                        echo '  <b class="text text-primary">'.$nama.'</b><br>';
                        echo '  <small><small>'.$tanggal.'</small></small><br>';
                        echo '  <code class="text-dark">'.$pesan.'</code><br>';
                        echo '  <span class="badge badge-info">'.$status.'</span><br>';
                        echo '</div>';
                    }else{
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                        echo '  <b>Update Gagal</b><br>';
                    }
                }else{
                    echo '<div class="alert alert-info alert-dismissible fade show ml-4" role="alert">';
                    echo '  <b class="text text-grayish">Customer Service</b><br>';
                    echo '  <small><small>'.$tanggal.'</small></small><br>';
                    echo '  <code class="text-dark">'.$pesan.'</code><br>';
                    echo '  <span class="badge badge-success">'.$status.'</span><br>';
                    echo '</div>';
                }
            }
        }
    }
?>