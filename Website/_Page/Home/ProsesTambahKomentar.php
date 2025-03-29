<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    date_default_timezone_set('Asia/Jakarta');
    //Time Now Tmp
    $now=date('Y-m-d H:i');
    if(empty($_POST['id_barang'])){
        echo '<span class="text-center">';
        echo '  ID Barang Tidak Boleh Kosong!';
        echo '</span>';
    }else{
        if(empty($_POST['komentar'])){
            echo '<span class="text-center">';
            echo '  Isi Komentar Tidak Boleh Kosong!';
            echo '</span>';
        }else{
            if(empty($SessionIdPelanggan)){
                echo '<span class="text-center">';
                echo '  Silahkan login terlebih dulu!!';
                echo '</span>';
            }else{
                $id_barang=$_POST['id_barang'];
                $komentar=$_POST['komentar'];
                $JumlahKarakterKomentar=strlen($_POST['komentar']);
                if($JumlahKarakterKomentar>200){
                    echo '<span class="text-center">';
                    echo '  Komentar tidak boleh lebih dari 200 karakter!';
                    echo '</span>';
                }else{
                    //Buka item barang
                    $QryProduuk = mysqli_query($Conn,"SELECT * FROM barang WHERE id_barang='$id_barang'")or die(mysqli_error($Conn));
                    $DataProduk = mysqli_fetch_array($QryProduuk);
                    if(empty($DataProduk['id_barang'])){
                        echo '<span class="text-center">';
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
                        //Cek Data Komentar
                        $JumlahKomentar= mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM barang_komentar WHERE id_barang='$id_barang' AND id_pelanggan='$SessionIdPelanggan' AND komentar='$komentar' AND tanggal='$now'"));
                        //Validasi Dulikat
                        if(!empty($JumlahKomentar)){
                            echo '<span class="text-center">';
                            echo '  Komentar Tersebut sudah Ada!';
                            echo '</span>';
                        }else{
                            //Tambahkan ke data komentar
                            $EntryKomentar="INSERT INTO barang_komentar (
                                id_pelanggan,
                                id_barang,
                                tanggal,
                                komentar,
                                balas
                            ) VALUES (
                                '$SessionIdPelanggan',
                                '$id_barang',
                                '$now',
                                '$komentar',
                                ''
                            )";
                            $InputKomentar=mysqli_query($Conn, $EntryKomentar);
                            if($InputKomentar){
                                echo '<span class="text-success" id="NotifikasiKomentarBerhasil">Success</span>';
                            }else{
                                echo '<span class="text-center">';
                                echo '  Komentar Tersebut sudah Ada!';
                                echo '</span>';
                            }
                        }
                    }
                }
            }
        }
    }
?>