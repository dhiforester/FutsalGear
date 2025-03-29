<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    date_default_timezone_set('Asia/Jakarta');
    //Time Now Tmp
    $now=date('Y-m-d H:i');
    if(empty($_POST['id_mitra'])){
        echo '<span class="text-center">';
        echo '  ID Mitra Tidak Boleh Kosong!';
        echo '</span>';
    }else{
        if(empty($_POST['id_pelanggan'])){
            echo '<span class="text-center">';
            echo '  ID Pelanggan Tidak Boleh Kosong!';
            echo '</span>';
        }else{
            if(empty($_POST['pesan'])){
                echo '<span class="text-center">';
                echo '  Isi Pesan Tidak Boleh Kosong!';
                echo '</span>';
            }else{
                $id_mitra=$_POST['id_mitra'];
                $id_pelanggan=$_POST['id_pelanggan'];
                $pesan=$_POST['pesan'];
                $JumlahKarakterKomentar=strlen($_POST['pesan']);
                if($JumlahKarakterKomentar>200){
                    echo '<span class="text-center">';
                    echo '  Pesan tidak boleh lebih dari 200 karakter!';
                    echo '</span>';
                }else{
                    //Cek Data Chat
                    $DuplikatChat= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM chating WHERE idAksesMitra='$id_mitra' AND id_pelanggan='$id_pelanggan' AND pesan='$pesan' AND tanggal='$now'"));
                    //Validasi Dulikat
                    if(!empty($DuplikatChat)){
                        echo '<span class="text-center">';
                        echo '  Pesan Tersebut sudah Ada!';
                        echo '</span>';
                    }else{
                        //Tambahkan ke data Chat
                        $EntryChat="INSERT INTO chating (
                            kategori,
                            id_pelanggan,
                            idAksesAdmin,
                            idAksesMitra,
                            tanggal,
                            pesan,
                            status
                        ) VALUES (
                            'PelangganToMitra',
                            '$id_pelanggan',
                            '0',
                            '$id_mitra',
                            '$now',
                            '$pesan',
                            'Pending'
                        )";
                        $InputChat=mysqli_query($Conn, $EntryChat);
                        if($InputChat){
                            echo '<span class="text-success" id="NotifikasiKirimChatBerhasil">Success</span>';
                        }else{
                            echo '<span class="text-center">';
                            echo '  Kirim Pesan Gagal';
                            echo '</span>';
                        }
                    }
                }
            }
        }
    }
?>