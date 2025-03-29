<?php
    //Koneksi dan session
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Tangkap Variabel
    if(empty($_POST['id_akses'])){
        echo '<span class="text-danger">ID Akses Tidak Boleh Kosong!</span>';
    }else{
        $id_akses=$_POST['id_akses'];
        //Cek Keberadaan data
        $CekAccAkses = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM acc_akses WHERE id_akses='$id_akses'"));
        $CekAccAkun = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM acc_akun  WHERE id_akses='$id_akses'"));
        $CekAccBarang = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM acc_barang WHERE id_akses='$id_akses'"));
        $CekAccBatch = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM acc_batch WHERE id_akses='$id_akses'"));
        $CekAccDashboard = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM acc_dashboard WHERE id_akses='$id_akses'"));
        $CekAccForm = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM acc_form WHERE id_akses='$id_akses'"));
        $CekAccJadwal = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM acc_jadwal WHERE id_akses='$id_akses'"));
        $CekAccJurnal = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM acc_jurnal WHERE id_akses='$id_akses'"));
        $CekAccKomisi = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM acc_komisi WHERE id_akses='$id_akses'"));
        $CekAccKunjungan = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM acc_kunjungan WHERE id_akses='$id_akses'"));
        $CekAccLaporan = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM acc_laporan WHERE id_akses='$id_akses'"));
        $CekAccMitra = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM acc_mitra WHERE id_akses='$id_akses'"));
        $CekAccNakes = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM acc_nakes WHERE id_akses='$id_akses'"));
        $CekAccPasien = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM acc_pasien WHERE id_akses='$id_akses'"));
        $CekAccPembayaran = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM acc_pembayaran WHERE id_akses='$id_akses'"));
        $CekAccPengaturan = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM acc_pengaturan WHERE id_akses='$id_akses'"));
        $CekAccSupplier = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM acc_supplier WHERE id_akses='$id_akses'"));
        $CekAccTindakan = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM acc_tindakan WHERE id_akses='$id_akses'"));
        $CekAccTransaksi = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM acc_transaksi WHERE id_akses='$id_akses'"));
        $CekAccWilayah = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM acc_wilayah WHERE id_akses='$id_akses'"));
        $CekAccWhatsapp = mysqli_num_rows(mysqli_query($Conn, "SELECT*FROM acc_whatsapp WHERE id_akses='$id_akses'"));
        //1. Variabel Akses
        if(empty($_POST['acc_akses1'])){
            $acc_akses1="Tidak";
        }else{
            $acc_akses1=$_POST['acc_akses1'];
        }
        if(empty($_POST['acc_akses2'])){
            $acc_akses2="Tidak";
        }else{
            $acc_akses2=$_POST['acc_akses2'];
        }
        if(empty($_POST['acc_akses3'])){
            $acc_akses3="Tidak";
        }else{
            $acc_akses3=$_POST['acc_akses3'];
        }
        if(empty($_POST['acc_akses4'])){
            $acc_akses4="Tidak";
        }else{
            $acc_akses4=$_POST['acc_akses4'];
        }
        if(empty($_POST['acc_akses5'])){
            $acc_akses5="Tidak";
        }else{
            $acc_akses5=$_POST['acc_akses5'];
        }
        //2. Variabel Akun
        if(empty($_POST['acc_akun1'])){
            $acc_akun1="Tidak";
        }else{
            $acc_akun1=$_POST['acc_akun1'];
        }
        if(empty($_POST['acc_akun2'])){
            $acc_akun2="Tidak";
        }else{
            $acc_akun2=$_POST['acc_akun2'];
        }
        if(empty($_POST['acc_akun3'])){
            $acc_akun3="Tidak";
        }else{
            $acc_akun3=$_POST['acc_akun3'];
        }
        if(empty($_POST['acc_akun4'])){
            $acc_akun4="Tidak";
        }else{
            $acc_akun4=$_POST['acc_akun4'];
        }
        //3. Variabel Barang
        if(empty($_POST['acc_barang1'])){
            $acc_barang1="Tidak";
        }else{
            $acc_barang1=$_POST['acc_barang1'];
        }
        if(empty($_POST['acc_barang2'])){
            $acc_barang2="Tidak";
        }else{
            $acc_barang2=$_POST['acc_barang2'];
        }
        if(empty($_POST['acc_barang3'])){
            $acc_barang3="Tidak";
        }else{
            $acc_barang3=$_POST['acc_barang3'];
        }
        if(empty($_POST['acc_barang4'])){
            $acc_barang4="Tidak";
        }else{
            $acc_barang4=$_POST['acc_barang4'];
        }
        //4. Variabel Batch
        if(empty($_POST['acc_batch1'])){
            $acc_batch1="Tidak";
        }else{
            $acc_batch1=$_POST['acc_batch1'];
        }
        if(empty($_POST['acc_batch2'])){
            $acc_batch2="Tidak";
        }else{
            $acc_batch2=$_POST['acc_batch2'];
        }
        if(empty($_POST['acc_batch3'])){
            $acc_batch3="Tidak";
        }else{
            $acc_batch3=$_POST['acc_batch3'];
        }
        if(empty($_POST['acc_batch4'])){
            $acc_batch4="Tidak";
        }else{
            $acc_batch4=$_POST['acc_batch4'];
        }
        //5. Variabel Dashboard
        if(empty($_POST['acc_dashboard1'])){
            $acc_dashboard1="Tidak";
        }else{
            $acc_dashboard1=$_POST['acc_dashboard1'];
        }
        if(empty($_POST['acc_dashboard2'])){
            $acc_dashboard2="Tidak";
        }else{
            $acc_dashboard2=$_POST['acc_dashboard2'];
        }
        if(empty($_POST['acc_dashboard3'])){
            $acc_dashboard3="Tidak";
        }else{
            $acc_dashboard3=$_POST['acc_dashboard3'];
        }
        //6. Variabel Form
        if(empty($_POST['acc_form1'])){
            $acc_form1="Tidak";
        }else{
            $acc_form1=$_POST['acc_form1'];
        }
        if(empty($_POST['acc_form2'])){
            $acc_form2="Tidak";
        }else{
            $acc_form2=$_POST['acc_form2'];
        }
        if(empty($_POST['acc_form3'])){
            $acc_form3="Tidak";
        }else{
            $acc_form3=$_POST['acc_form3'];
        }
        if(empty($_POST['acc_form4'])){
            $acc_form4="Tidak";
        }else{
            $acc_form4=$_POST['acc_form4'];
        }
        //7. Variabel jadwal
        if(empty($_POST['acc_jadwal1'])){
            $acc_jadwal1="Tidak";
        }else{
            $acc_jadwal1=$_POST['acc_jadwal1'];
        }
        if(empty($_POST['acc_jadwal2'])){
            $acc_jadwal2="Tidak";
        }else{
            $acc_jadwal2=$_POST['acc_jadwal2'];
        }
        if(empty($_POST['acc_jadwal3'])){
            $acc_jadwal3="Tidak";
        }else{
            $acc_jadwal3=$_POST['acc_jadwal3'];
        }
        if(empty($_POST['acc_jadwal4'])){
            $acc_jadwal4="Tidak";
        }else{
            $acc_jadwal4=$_POST['acc_jadwal4'];
        }
        //8. Variabel jurnal
        if(empty($_POST['acc_jurnal1'])){
            $acc_jurnal1="Tidak";
        }else{
            $acc_jurnal1=$_POST['acc_jurnal1'];
        }
        if(empty($_POST['acc_jurnal2'])){
            $acc_jurnal2="Tidak";
        }else{
            $acc_jurnal2=$_POST['acc_jurnal2'];
        }
        if(empty($_POST['acc_jurnal3'])){
            $acc_jurnal3="Tidak";
        }else{
            $acc_jurnal3=$_POST['acc_jurnal3'];
        }
        if(empty($_POST['acc_jurnal4'])){
            $acc_jurnal4="Tidak";
        }else{
            $acc_jurnal4=$_POST['acc_jurnal4'];
        }
        //9. Variabel komisi
        if(empty($_POST['acc_komisi1'])){
            $acc_komisi1="Tidak";
        }else{
            $acc_komisi1=$_POST['acc_komisi1'];
        }
        if(empty($_POST['acc_komisi2'])){
            $acc_komisi2="Tidak";
        }else{
            $acc_komisi2=$_POST['acc_komisi2'];
        }
        //10. Variabel kunjungan
        if(empty($_POST['acc_kunjungan1'])){
            $acc_kunjungan1="Tidak";
        }else{
            $acc_kunjungan1=$_POST['acc_kunjungan1'];
        }
        if(empty($_POST['acc_kunjungan2'])){
            $acc_kunjungan2="Tidak";
        }else{
            $acc_kunjungan2=$_POST['acc_kunjungan2'];
        }
        if(empty($_POST['acc_kunjungan3'])){
            $acc_kunjungan3="Tidak";
        }else{
            $acc_kunjungan3=$_POST['acc_kunjungan3'];
        }
        if(empty($_POST['acc_kunjungan4'])){
            $acc_kunjungan4="Tidak";
        }else{
            $acc_kunjungan4=$_POST['acc_kunjungan4'];
        }
        if(empty($_POST['acc_kunjungan5'])){
            $acc_kunjungan5="Tidak";
        }else{
            $acc_kunjungan5=$_POST['acc_kunjungan5'];
        }
        if(empty($_POST['acc_kunjungan6'])){
            $acc_kunjungan6="Tidak";
        }else{
            $acc_kunjungan6=$_POST['acc_kunjungan6'];
        }
        if(empty($_POST['acc_kunjungan7'])){
            $acc_kunjungan7="Tidak";
        }else{
            $acc_kunjungan7=$_POST['acc_kunjungan7'];
        }
        if(empty($_POST['acc_kunjungan8'])){
            $acc_kunjungan8="Tidak";
        }else{
            $acc_kunjungan8=$_POST['acc_kunjungan8'];
        }
        if(empty($_POST['acc_kunjungan9'])){
            $acc_kunjungan9="Tidak";
        }else{
            $acc_kunjungan9=$_POST['acc_kunjungan9'];
        }
        //11. Variabel laporan
        if(empty($_POST['acc_laporan1'])){
            $acc_laporan1="Tidak";
        }else{
            $acc_laporan1=$_POST['acc_laporan1'];
        }
        if(empty($_POST['acc_laporan2'])){
            $acc_laporan2="Tidak";
        }else{
            $acc_laporan2=$_POST['acc_laporan2'];
        }
        if(empty($_POST['acc_laporan3'])){
            $acc_laporan3="Tidak";
        }else{
            $acc_laporan3=$_POST['acc_laporan3'];
        }
        if(empty($_POST['acc_laporan4'])){
            $acc_laporan4="Tidak";
        }else{
            $acc_laporan4=$_POST['acc_laporan4'];
        }
        if(empty($_POST['acc_laporan5'])){
            $acc_laporan5="Tidak";
        }else{
            $acc_laporan5=$_POST['acc_laporan5'];
        }
        if(empty($_POST['acc_laporan6'])){
            $acc_laporan6="Tidak";
        }else{
            $acc_laporan6=$_POST['acc_laporan6'];
        }
        //12. Variabel mitra
        if(empty($_POST['acc_mitra1'])){
            $acc_mitra1="Tidak";
        }else{
            $acc_mitra1=$_POST['acc_mitra1'];
        }
        if(empty($_POST['acc_mitra2'])){
            $acc_mitra2="Tidak";
        }else{
            $acc_mitra2=$_POST['acc_mitra2'];
        }
        if(empty($_POST['acc_mitra3'])){
            $acc_mitra3="Tidak";
        }else{
            $acc_mitra3=$_POST['acc_mitra3'];
        }
        if(empty($_POST['acc_mitra4'])){
            $acc_mitra4="Tidak";
        }else{
            $acc_mitra4=$_POST['acc_mitra4'];
        }
        if(empty($_POST['acc_mitra5'])){
            $acc_mitra5="Tidak";
        }else{
            $acc_mitra5=$_POST['acc_mitra5'];
        }
        //13. Variabel nakes
        if(empty($_POST['acc_nakes1'])){
            $acc_nakes1="Tidak";
        }else{
            $acc_nakes1=$_POST['acc_nakes1'];
        }
        if(empty($_POST['acc_nakes2'])){
            $acc_nakes2="Tidak";
        }else{
            $acc_nakes2=$_POST['acc_nakes2'];
        }
        if(empty($_POST['acc_nakes3'])){
            $acc_nakes3="Tidak";
        }else{
            $acc_nakes3=$_POST['acc_nakes3'];
        }
        if(empty($_POST['acc_nakes4'])){
            $acc_nakes4="Tidak";
        }else{
            $acc_nakes4=$_POST['acc_nakes4'];
        }
        //14. Variabel pasien
        if(empty($_POST['acc_pasien1'])){
            $acc_pasien1="Tidak";
        }else{
            $acc_pasien1=$_POST['acc_pasien1'];
        }
        if(empty($_POST['acc_pasien2'])){
            $acc_pasien2="Tidak";
        }else{
            $acc_pasien2=$_POST['acc_pasien2'];
        }
        if(empty($_POST['acc_pasien3'])){
            $acc_pasien3="Tidak";
        }else{
            $acc_pasien3=$_POST['acc_pasien3'];
        }
        if(empty($_POST['acc_pasien4'])){
            $acc_pasien4="Tidak";
        }else{
            $acc_pasien4=$_POST['acc_pasien4'];
        }
        if(empty($_POST['acc_pasien5'])){
            $acc_pasien5="acc_pasien5";
        }else{
            $acc_pasien5=$_POST['acc_pasien5'];
        }
        //15. Variabel pembayaran
        if(empty($_POST['acc_pembayaran1'])){
            $acc_pembayaran1="Tidak";
        }else{
            $acc_pembayaran1=$_POST['acc_pembayaran1'];
        }
        if(empty($_POST['acc_pembayaran2'])){
            $acc_pembayaran2="Tidak";
        }else{
            $acc_pembayaran2=$_POST['acc_pembayaran2'];
        }
        if(empty($_POST['acc_pembayaran3'])){
            $acc_pembayaran3="Tidak";
        }else{
            $acc_pembayaran3=$_POST['acc_pembayaran3'];
        }
        //16. Variabel pengaturan
        if(empty($_POST['acc_pengaturan1'])){
            $acc_pengaturan1="Tidak";
        }else{
            $acc_pengaturan1=$_POST['acc_pengaturan1'];
        }
        if(empty($_POST['acc_pengaturan2'])){
            $acc_pengaturan2="Tidak";
        }else{
            $acc_pengaturan2=$_POST['acc_pengaturan2'];
        }
        if(empty($_POST['acc_pengaturan3'])){
            $acc_pengaturan3="Tidak";
        }else{
            $acc_pengaturan3=$_POST['acc_pengaturan3'];
        }
        if(empty($_POST['acc_pengaturan4'])){
            $acc_pengaturan4="Tidak";
        }else{
            $acc_pengaturan4=$_POST['acc_pengaturan4'];
        }
        if(empty($_POST['acc_pengaturan5'])){
            $acc_pengaturan5="Tidak";
        }else{
            $acc_pengaturan5=$_POST['acc_pengaturan5'];
        }
        if(empty($_POST['acc_pengaturan6'])){
            $acc_pengaturan6="Tidak";
        }else{
            $acc_pengaturan6=$_POST['acc_pengaturan6'];
        }
        if(empty($_POST['acc_pengaturan7'])){
            $acc_pengaturan7="Tidak";
        }else{
            $acc_pengaturan7=$_POST['acc_pengaturan7'];
        }
        if(empty($_POST['acc_pengaturan8'])){
            $acc_pengaturan8="Tidak";
        }else{
            $acc_pengaturan8=$_POST['acc_pengaturan8'];
        }
        //17. Variabel supplier
        if(empty($_POST['acc_supplier1'])){
            $acc_supplier1="Tidak";
        }else{
            $acc_supplier1=$_POST['acc_supplier1'];
        }
        if(empty($_POST['acc_supplier2'])){
            $acc_supplier2="Tidak";
        }else{
            $acc_supplier2=$_POST['acc_supplier2'];
        }
        if(empty($_POST['acc_supplier3'])){
            $acc_supplier3="Tidak";
        }else{
            $acc_supplier3=$_POST['acc_supplier3'];
        }
        if(empty($_POST['acc_supplier4'])){
            $acc_supplier4="Tidak";
        }else{
            $acc_supplier4=$_POST['acc_supplier4'];
        }
        //18. Variabel tindakan
        if(empty($_POST['acc_tindakan1'])){
            $acc_tindakan1="Tidak";
        }else{
            $acc_tindakan1=$_POST['acc_tindakan1'];
        }
        if(empty($_POST['acc_tindakan2'])){
            $acc_tindakan2="Tidak";
        }else{
            $acc_tindakan2=$_POST['acc_tindakan2'];
        }
        if(empty($_POST['acc_tindakan3'])){
            $acc_tindakan3="Tidak";
        }else{
            $acc_tindakan3=$_POST['acc_tindakan3'];
        }
        if(empty($_POST['acc_tindakan4'])){
            $acc_tindakan4="Tidak";
        }else{
            $acc_tindakan4=$_POST['acc_tindakan4'];
        }
        //19. Variabel transaksi
        if(empty($_POST['acc_transaksi1'])){
            $acc_transaksi1="Tidak";
        }else{
            $acc_transaksi1=$_POST['acc_transaksi1'];
        }
        if(empty($_POST['acc_transaksi2'])){
            $acc_transaksi2="Tidak";
        }else{
            $acc_transaksi2=$_POST['acc_transaksi2'];
        }
        if(empty($_POST['acc_transaksi3'])){
            $acc_transaksi3="Tidak";
        }else{
            $acc_transaksi3=$_POST['acc_transaksi3'];
        }
        if(empty($_POST['acc_transaksi4'])){
            $acc_transaksi4="Tidak";
        }else{
            $acc_transaksi4=$_POST['acc_transaksi4'];
        }
        if(empty($_POST['acc_transaksi5'])){
            $acc_transaksi5="Tidak";
        }else{
            $acc_transaksi5=$_POST['acc_transaksi5'];
        }
        if(empty($_POST['acc_transaksi6'])){
            $acc_transaksi6="Tidak";
        }else{
            $acc_transaksi6=$_POST['acc_transaksi6'];
        }
        if(empty($_POST['acc_transaksi7'])){
            $acc_transaksi7="Tidak";
        }else{
            $acc_transaksi7=$_POST['acc_transaksi7'];
        }
        if(empty($_POST['acc_transaksi8'])){
            $acc_transaksi8="Tidak";
        }else{
            $acc_transaksi8=$_POST['acc_transaksi8'];
        }
        if(empty($_POST['acc_transaksi9'])){
            $acc_transaksi9="Tidak";
        }else{
            $acc_transaksi9=$_POST['acc_transaksi9'];
        }
        if(empty($_POST['acc_transaksi10'])){
            $acc_transaksi10="Tidak";
        }else{
            $acc_transaksi10=$_POST['acc_transaksi10'];
        }
        if(empty($_POST['acc_transaksi11'])){
            $acc_transaksi11="Tidak";
        }else{
            $acc_transaksi11=$_POST['acc_transaksi11'];
        }
        //20. Variabel wilayah
        if(empty($_POST['acc_wilayah1'])){
            $acc_wilayah1="Tidak";
        }else{
            $acc_wilayah1=$_POST['acc_wilayah1'];
        }
        if(empty($_POST['acc_wilayah2'])){
            $acc_wilayah2="Tidak";
        }else{
            $acc_wilayah2=$_POST['acc_wilayah2'];
        }
        if(empty($_POST['acc_wilayah3'])){
            $acc_wilayah3="Tidak";
        }else{
            $acc_wilayah3=$_POST['acc_wilayah3'];
        }
        if(empty($_POST['acc_wilayah4'])){
            $acc_wilayah4="Tidak";
        }else{
            $acc_wilayah4=$_POST['acc_wilayah4'];
        }
        //21. Variabel Whatsapp
        if(empty($_POST['acc_whatsapp1'])){
            $acc_whatsapp1="Tidak";
        }else{
            $acc_whatsapp1=$_POST['acc_whatsapp1'];
        }
        if(empty($_POST['acc_whatsapp2'])){
            $acc_whatsapp2="Tidak";
        }else{
            $acc_whatsapp2=$_POST['acc_whatsapp2'];
        }
        if(empty($_POST['acc_whatsapp3'])){
            $acc_whatsapp3="Tidak";
        }else{
            $acc_whatsapp3=$_POST['acc_whatsapp3'];
        }
        if(empty($_POST['acc_whatsapp4'])){
            $acc_whatsapp4="Tidak";
        }else{
            $acc_whatsapp4=$_POST['acc_whatsapp4'];
        }
        if(empty($_POST['acc_whatsapp5'])){
            $acc_whatsapp5="Tidak";
        }else{
            $acc_whatsapp5=$_POST['acc_whatsapp5'];
        }
        if(empty($_POST['acc_whatsapp6'])){
            $acc_whatsapp6="Tidak";
        }else{
            $acc_whatsapp6=$_POST['acc_whatsapp6'];
        }
        if(empty($_POST['acc_whatsapp7'])){
            $acc_whatsapp7="Tidak";
        }else{
            $acc_whatsapp7=$_POST['acc_whatsapp7'];
        }
        if(empty($_POST['acc_whatsapp8'])){
            $acc_whatsapp8="Tidak";
        }else{
            $acc_whatsapp8=$_POST['acc_whatsapp8'];
        }
        if(empty($_POST['acc_whatsapp9'])){
            $acc_whatsapp9="Tidak";
        }else{
            $acc_whatsapp9=$_POST['acc_whatsapp9'];
        }
        if(empty($_POST['acc_whatsapp10'])){
            $acc_whatsapp10="Tidak";
        }else{
            $acc_whatsapp10=$_POST['acc_whatsapp10'];
        }
        if(empty($_POST['acc_whatsapp11'])){
            $acc_whatsapp11="Tidak";
        }else{
            $acc_whatsapp11=$_POST['acc_whatsapp11'];
        }
        if(empty($_POST['acc_whatsapp12'])){
            $acc_whatsapp12="Tidak";
        }else{
            $acc_whatsapp12=$_POST['acc_whatsapp12'];
        }
        //1.acc_akses
        if(empty($CekAccAkses)){
            $entry="INSERT INTO acc_akses (
                id_akses,
                acc_akses1,
                acc_akses2,
                acc_akses3,
                acc_akses4,
                acc_akses5
            ) VALUES (
                '$id_akses',
                '$acc_akses1',
                '$acc_akses2',
                '$acc_akses3',
                '$acc_akses4',
                '$acc_akses5'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                $Validasi1="Berhasil";
            }else{
                $Validasi1="Terjadi kesalahan pada saat menyimpan data ijin akses";
            }
        }else{
            $UpdateIjinAkses = mysqli_query($Conn,"UPDATE acc_akses SET 
                acc_akses1='$acc_akses1',
                acc_akses2='$acc_akses2',
                acc_akses3='$acc_akses3',
                acc_akses4='$acc_akses4',
                acc_akses5='$acc_akses5'
            WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
            if($UpdateIjinAkses){
                $Validasi1="Berhasil";
            }else{
                $Validasi1="Terjadi kesalahan pada saat menyimpan data ijin akses";
            }
        }
        //2.acc_akun
        if(empty($CekAccAkun)){
            $entry="INSERT INTO acc_akun (
                id_akses,
                acc_akun1,
                acc_akun2,
                acc_akun3,
                acc_akun4
            ) VALUES (
                '$id_akses',
                '$acc_akun1',
                '$acc_akun2',
                '$acc_akun3',
                '$acc_akun4'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                $Validasi2="Berhasil";
            }else{
                $Validasi2="Terjadi kesalahan pada saat menyimpan data ijin akun";
            }
        }else{
            $Update = mysqli_query($Conn,"UPDATE acc_akun SET 
                acc_akun1='$acc_akun1',
                acc_akun2='$acc_akun2',
                acc_akun3='$acc_akun3',
                acc_akun4='$acc_akun4'
            WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
            if($Update){
                $Validasi2="Berhasil";
            }else{
                $Validasi2="Terjadi kesalahan pada saat menyimpan data ijin akun";
            }
        }
        //3.acc_barang
        if(empty($CekAccBarang)){
            $entry="INSERT INTO acc_barang (
                id_akses,
                acc_barang1,
                acc_barang2,
                acc_barang3,
                acc_barang4
            ) VALUES (
                '$id_akses',
                '$acc_barang1',
                '$acc_barang2',
                '$acc_barang3',
                '$acc_barang4'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                $Validasi3="Berhasil";
            }else{
                $Validasi3="Terjadi kesalahan pada saat menyimpan data ijin barang";
            }
        }else{
            $Update = mysqli_query($Conn,"UPDATE acc_barang SET 
                acc_barang1='$acc_barang1',
                acc_barang2='$acc_barang2',
                acc_barang3='$acc_barang3',
                acc_barang4='$acc_barang4'
            WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
            if($Update){
                $Validasi3="Berhasil";
            }else{
                $Validasi3="Terjadi kesalahan pada saat menyimpan data ijin barang";
            }
        }
        //4.acc_batch
        if(empty($CekAccBatch)){
            $entry="INSERT INTO acc_batch (
                id_akses,
                acc_batch1,
                acc_batch2,
                acc_batch3,
                acc_batch4
            ) VALUES (
                '$id_akses',
                '$acc_batch1',
                '$acc_batch2',
                '$acc_batch3',
                '$acc_batch4'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                $Validasi4="Berhasil";
            }else{
                $Validasi4="Terjadi kesalahan pada saat menyimpan data ijin batch";
            }
        }else{
            $Update = mysqli_query($Conn,"UPDATE acc_batch SET 
                acc_batch1='$acc_batch1',
                acc_batch2='$acc_batch2',
                acc_batch3='$acc_batch3',
                acc_batch4='$acc_batch4'
            WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
            if($Update){
                $Validasi4="Berhasil";
            }else{
                $Validasi4="Terjadi kesalahan pada saat menyimpan data ijin batch";
            }
        }
        //5.acc_dashboard
        if(empty($CekAccDashboard)){
            $entry="INSERT INTO acc_dashboard (
                id_akses,
                acc_dashboard1,
                acc_dashboard2,
                acc_dashboard3
            ) VALUES (
                '$id_akses',
                '$acc_dashboard1',
                '$acc_dashboard2',
                '$acc_dashboard3'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                $Validasi5="Berhasil";
            }else{
                $Validasi5="Terjadi kesalahan pada saat menyimpan data ijin Dashboard";
            }
        }else{
            $Update = mysqli_query($Conn,"UPDATE acc_dashboard SET 
                acc_dashboard1='$acc_dashboard1',
                acc_dashboard2='$acc_dashboard2',
                acc_dashboard3='$acc_dashboard3'
            WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
            if($Update){
                $Validasi5="Berhasil";
            }else{
                $Validasi5="Terjadi kesalahan pada saat menyimpan data ijin Dashboard";
            }
        }
        //6.acc_form
        if(empty($CekAccForm)){
            $entry="INSERT INTO acc_form (
                id_akses,
                acc_form1,
                acc_form2,
                acc_form3,
                acc_form4
            ) VALUES (
                '$id_akses',
                '$acc_form1',
                '$acc_form2',
                '$acc_form3',
                '$acc_form4'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                $Validasi6="Berhasil";
            }else{
                $Validasi6="Terjadi kesalahan pada saat menyimpan data ijin Form";
            }
        }else{
            $Update = mysqli_query($Conn,"UPDATE acc_form SET 
                acc_form1='$acc_form1',
                acc_form2='$acc_form2',
                acc_form3='$acc_form3',
                acc_form4='$acc_form4'
            WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
            if($Update){
                $Validasi6="Berhasil";
            }else{
                $Validasi6="Terjadi kesalahan pada saat menyimpan data ijin Form";
            }
        }
        //7.acc_jadwal
        if(empty($CekAccJadwal)){
            $entry="INSERT INTO acc_jadwal (
                id_akses,
                acc_jadwal1,
                acc_jadwal2,
                acc_jadwal3,
                acc_jadwal4
            ) VALUES (
                '$id_akses',
                '$acc_jadwal1',
                '$acc_jadwal2',
                '$acc_jadwal3',
                '$acc_jadwal4'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                $Validasi7="Berhasil";
            }else{
                $Validasi7="Terjadi kesalahan pada saat menyimpan data ijin Jadwal";
            }
        }else{
            $Update = mysqli_query($Conn,"UPDATE acc_jadwal SET 
                acc_jadwal1='$acc_jadwal1',
                acc_jadwal2='$acc_jadwal2',
                acc_jadwal3='$acc_jadwal3',
                acc_jadwal4='$acc_jadwal4'
            WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
            if($Update){
                $Validasi7="Berhasil";
            }else{
                $Validasi7="Terjadi kesalahan pada saat menyimpan data ijin Jadwal";
            }
        }
        //8.acc_jurnal
        if(empty($CekAccJurnal)){
            $entry="INSERT INTO acc_jurnal (
                id_akses,
                acc_jurnal1,
                acc_jurnal2,
                acc_jurnal3,
                acc_jurnal4
            ) VALUES (
                '$id_akses',
                '$acc_jurnal1',
                '$acc_jurnal2',
                '$acc_jurnal3',
                '$acc_jurnal4'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                $Validasi8="Berhasil";
            }else{
                $Validasi8="Terjadi kesalahan pada saat menyimpan data ijin Jurnal";
            }
        }else{
            $Update = mysqli_query($Conn,"UPDATE acc_jurnal SET 
                acc_jurnal1='$acc_jurnal1',
                acc_jurnal2='$acc_jurnal2',
                acc_jurnal3='$acc_jurnal3',
                acc_jurnal4='$acc_jurnal4'
            WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
            if($Update){
                $Validasi8="Berhasil";
            }else{
                $Validasi8="Terjadi kesalahan pada saat menyimpan data ijin Jurnal";
            }
        }
        //9.acc_komisi
        if(empty($CekAccKomisi)){
            $entry="INSERT INTO acc_komisi (
                id_akses,
                acc_komisi1,
                acc_komisi2
            ) VALUES (
                '$id_akses',
                '$acc_komisi1',
                '$acc_komisi2'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                $Validasi9="Berhasil";
            }else{
                $Validasi9="Terjadi kesalahan pada saat menyimpan data ijin Komisi";
            }
        }else{
            $Update = mysqli_query($Conn,"UPDATE acc_komisi SET 
                acc_komisi1='$acc_komisi1',
                acc_komisi2='$acc_komisi2'
            WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
            if($Update){
                $Validasi9="Berhasil";
            }else{
                $Validasi9="Terjadi kesalahan pada saat menyimpan data ijin Komisi";
            }
        }
        //10.acc_kunjungan
        if(empty($CekAccKunjungan)){
            $entry="INSERT INTO acc_kunjungan (
                id_akses,
                acc_kunjungan1,
                acc_kunjungan2,
                acc_kunjungan3,
                acc_kunjungan4,
                acc_kunjungan5,
                acc_kunjungan6,
                acc_kunjungan7,
                acc_kunjungan8,
                acc_kunjungan9
            ) VALUES (
                '$id_akses',
                '$acc_kunjungan1',
                '$acc_kunjungan2',
                '$acc_kunjungan3',
                '$acc_kunjungan4',
                '$acc_kunjungan5',
                '$acc_kunjungan6',
                '$acc_kunjungan7',
                '$acc_kunjungan8',
                '$acc_kunjungan9'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                $Validasi10="Berhasil";
            }else{
                $Validasi10="Terjadi kesalahan pada saat menyimpan data ijin Kunjungan";
            }
        }else{
            $Update = mysqli_query($Conn,"UPDATE acc_kunjungan SET 
                acc_kunjungan1='$acc_kunjungan1',
                acc_kunjungan2='$acc_kunjungan2',
                acc_kunjungan3='$acc_kunjungan3',
                acc_kunjungan4='$acc_kunjungan4',
                acc_kunjungan5='$acc_kunjungan5',
                acc_kunjungan6='$acc_kunjungan6',
                acc_kunjungan7='$acc_kunjungan7',
                acc_kunjungan8='$acc_kunjungan8',
                acc_kunjungan9='$acc_kunjungan9'
            WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
            if($Update){
                $Validasi10="Berhasil";
            }else{
                $Validasi10="Terjadi kesalahan pada saat menyimpan data ijin Kunjungan";
            }
        }
        //11.acc_laporan
        if(empty($CekAccLaporan)){
            $entry="INSERT INTO acc_laporan (
                id_akses,
                acc_laporan1,
                acc_laporan2,
                acc_laporan3,
                acc_laporan4,
                acc_laporan5,
                acc_laporan6
            ) VALUES (
                '$id_akses',
                '$acc_laporan1',
                '$acc_laporan2',
                '$acc_laporan3',
                '$acc_laporan4',
                '$acc_laporan5',
                '$acc_laporan6'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                $Validasi11="Berhasil";
            }else{
                $Validasi11="Terjadi kesalahan pada saat menyimpan data ijin Laporan";
            }
        }else{
            $Update = mysqli_query($Conn,"UPDATE acc_laporan SET 
                acc_laporan1='$acc_laporan1',
                acc_laporan2='$acc_laporan2',
                acc_laporan3='$acc_laporan3',
                acc_laporan4='$acc_laporan4',
                acc_laporan5='$acc_laporan5',
                acc_laporan6='$acc_laporan6'
            WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
            if($Update){
                $Validasi11="Berhasil";
            }else{
                $Validasi11="Terjadi kesalahan pada saat menyimpan data ijin Laporan";
            }
        }
        //12.acc_mitra
        if(empty($CekAccMitra)){
            $entry="INSERT INTO acc_mitra (
                id_akses,
                acc_mitra1,
                acc_mitra2,
                acc_mitra3,
                acc_mitra4,
                acc_mitra5
            ) VALUES (
                '$id_akses',
                '$acc_mitra1',
                '$acc_mitra2',
                '$acc_mitra3',
                '$acc_mitra4',
                '$acc_mitra5'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                $Validasi12="Berhasil";
            }else{
                $Validasi12="Terjadi kesalahan pada saat menyimpan data ijin Mitra";
            }
        }else{
            $Update = mysqli_query($Conn,"UPDATE acc_mitra SET 
                acc_mitra1='$acc_mitra1',
                acc_mitra2='$acc_mitra2',
                acc_mitra3='$acc_mitra3',
                acc_mitra4='$acc_mitra4',
                acc_mitra5='$acc_mitra5'
            WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
            if($Update){
                $Validasi12="Berhasil";
            }else{
                $Validasi12="Terjadi kesalahan pada saat menyimpan data ijin Mitra";
            }
        }
        //13.acc_nakes
        if(empty($CekAccNakes)){
            $entry="INSERT INTO acc_nakes (
                id_akses,
                acc_nakes1,
                acc_nakes2,
                acc_nakes3,
                acc_nakes4
            ) VALUES (
                '$id_akses',
                '$acc_nakes1',
                '$acc_nakes2',
                '$acc_nakes3',
                '$acc_nakes4'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                $Validasi13="Berhasil";
            }else{
                $Validasi13="Terjadi kesalahan pada saat menyimpan data ijin Nakes";
            }
        }else{
            $Update = mysqli_query($Conn,"UPDATE acc_nakes SET 
                acc_nakes1='$acc_nakes1',
                acc_nakes2='$acc_nakes2',
                acc_nakes3='$acc_nakes3',
                acc_nakes4='$acc_nakes4'
            WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
            if($Update){
                $Validasi13="Berhasil";
            }else{
                $Validasi13="Terjadi kesalahan pada saat menyimpan data ijin Nakes";
            }
        }
        //14.acc_pasien
        if(empty($CekAccPasien)){
            $entry="INSERT INTO acc_pasien (
                id_akses,
                acc_pasien1,
                acc_pasien2,
                acc_pasien3,
                acc_pasien4,
                acc_pasien5
            ) VALUES (
                '$id_akses',
                '$acc_pasien1',
                '$acc_pasien2',
                '$acc_pasien3',
                '$acc_pasien4',
                '$acc_pasien5'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                $Validasi14="Berhasil";
            }else{
                $Validasi14="Terjadi kesalahan pada saat menyimpan data ijin Pasien";
            }
        }else{
            $Update = mysqli_query($Conn,"UPDATE acc_pasien SET 
                acc_pasien1='$acc_pasien1',
                acc_pasien2='$acc_pasien2',
                acc_pasien3='$acc_pasien3',
                acc_pasien4='$acc_pasien4',
                acc_pasien5='$acc_pasien5'
            WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
            if($Update){
                $Validasi14="Berhasil";
            }else{
                $Validasi14="Terjadi kesalahan pada saat menyimpan data ijin Pasien";
            }
        }
        //15.acc_pembayaran
        if(empty($CekAccPembayaran)){
            $entry="INSERT INTO acc_pembayaran (
                id_akses,
                acc_pembayaran1,
                acc_pembayaran2,
                acc_pembayaran3
            ) VALUES (
                '$id_akses',
                '$acc_pembayaran1',
                '$acc_pembayaran2',
                '$acc_pembayaran3'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                $Validasi15="Berhasil";
            }else{
                $Validasi15="Terjadi kesalahan pada saat menyimpan data ijin Pembayaran";
            }
        }else{
            $Update = mysqli_query($Conn,"UPDATE acc_pembayaran SET 
                acc_pembayaran1='$acc_pembayaran1',
                acc_pembayaran2='$acc_pembayaran2',
                acc_pembayaran3='$acc_pembayaran3'
            WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
            if($Update){
                $Validasi15="Berhasil";
            }else{
                $Validasi15="Terjadi kesalahan pada saat menyimpan data ijin Pembayaran";
            }
        }
        //16.acc_pengaturan
        if(empty($CekAccPengaturan)){
            $entry="INSERT INTO acc_pengaturan (
                id_akses,
                acc_pengaturan1,
                acc_pengaturan2,
                acc_pengaturan3,
                acc_pengaturan4,
                acc_pengaturan5,
                acc_pengaturan6,
                acc_pengaturan7,
                acc_pengaturan8
            ) VALUES (
                '$id_akses',
                '$acc_pengaturan1',
                '$acc_pengaturan2',
                '$acc_pengaturan3',
                '$acc_pengaturan4',
                '$acc_pengaturan5',
                '$acc_pengaturan6',
                '$acc_pengaturan7',
                '$acc_pengaturan8'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                $Validasi16="Berhasil";
            }else{
                $Validasi16="Terjadi kesalahan pada saat menyimpan data ijin Pengaturan";
            }
        }else{
            $Update = mysqli_query($Conn,"UPDATE acc_pengaturan SET 
                acc_pengaturan1='$acc_pengaturan1',
                acc_pengaturan2='$acc_pengaturan2',
                acc_pengaturan3='$acc_pengaturan3',
                acc_pengaturan4='$acc_pengaturan4',
                acc_pengaturan5='$acc_pengaturan5',
                acc_pengaturan6='$acc_pengaturan6',
                acc_pengaturan7='$acc_pengaturan7',
                acc_pengaturan8='$acc_pengaturan8'
            WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
            if($Update){
                $Validasi16="Berhasil";
            }else{
                $Validasi16="Terjadi kesalahan pada saat menyimpan data ijin Pengaturan";
            }
        }
        //17.acc_supplier
        if(empty($CekAccSupplier)){
            $entry="INSERT INTO acc_supplier (
                id_akses,
                acc_supplier1,
                acc_supplier2,
                acc_supplier3,
                acc_supplier4
            ) VALUES (
                '$id_akses',
                '$acc_supplier1',
                '$acc_supplier2',
                '$acc_supplier3',
                '$acc_supplier4'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                $Validasi17="Berhasil";
            }else{
                $Validasi17="Terjadi kesalahan pada saat menyimpan data ijin Supplier";
            }
        }else{
            $Update = mysqli_query($Conn,"UPDATE acc_supplier SET 
                acc_supplier1='$acc_supplier1',
                acc_supplier2='$acc_supplier2',
                acc_supplier3='$acc_supplier3',
                acc_supplier4='$acc_supplier4'
            WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
            if($Update){
                $Validasi17="Berhasil";
            }else{
                $Validasi17="Terjadi kesalahan pada saat menyimpan data ijin Supplier";
            }
        }
        //18.acc_tindakan
        if(empty($CekAccTindakan)){
            $entry="INSERT INTO acc_tindakan (
                id_akses,
                acc_tindakan1,
                acc_tindakan2,
                acc_tindakan3,
                acc_tindakan4
            ) VALUES (
                '$id_akses',
                '$acc_tindakan1',
                '$acc_tindakan2',
                '$acc_tindakan3',
                '$acc_tindakan4'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                $Validasi18="Berhasil";
            }else{
                $Validasi18="Terjadi kesalahan pada saat menyimpan data ijin Tindakan";
            }
        }else{
            $Update = mysqli_query($Conn,"UPDATE acc_tindakan SET 
                acc_tindakan1='$acc_tindakan1',
                acc_tindakan2='$acc_tindakan2',
                acc_tindakan3='$acc_tindakan3',
                acc_tindakan4='$acc_tindakan4'
            WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
            if($Update){
                $Validasi18="Berhasil";
            }else{
                $Validasi18="Terjadi kesalahan pada saat menyimpan data ijin Tindakan";
            }
        }
        //19.acc_transaksi
        if(empty($CekAccTransaksi)){
            $entry="INSERT INTO acc_transaksi (
                id_akses,
                acc_transaksi1,
                acc_transaksi2,
                acc_transaksi3,
                acc_transaksi4,
                acc_transaksi5,
                acc_transaksi6,
                acc_transaksi7,
                acc_transaksi8,
                acc_transaksi9,
                acc_transaksi10,
                acc_transaksi11
            ) VALUES (
                '$id_akses',
                '$acc_transaksi1',
                '$acc_transaksi2',
                '$acc_transaksi3',
                '$acc_transaksi4',
                '$acc_transaksi5',
                '$acc_transaksi6',
                '$acc_transaksi7',
                '$acc_transaksi8',
                '$acc_transaksi9',
                '$acc_transaksi10',
                '$acc_transaksi11'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                $Validasi19="Berhasil";
            }else{
                $Validasi19="Terjadi kesalahan pada saat menyimpan data ijin Transaksi";
            }
        }else{
            $Update = mysqli_query($Conn,"UPDATE acc_transaksi SET 
                acc_transaksi1='$acc_transaksi1',
                acc_transaksi2='$acc_transaksi2',
                acc_transaksi3='$acc_transaksi3',
                acc_transaksi4='$acc_transaksi4',
                acc_transaksi5='$acc_transaksi5',
                acc_transaksi6='$acc_transaksi6',
                acc_transaksi7='$acc_transaksi7',
                acc_transaksi8='$acc_transaksi8',
                acc_transaksi9='$acc_transaksi9',
                acc_transaksi10='$acc_transaksi10',
                acc_transaksi11='$acc_transaksi11'
            WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
            if($Update){
                $Validasi19="Berhasil";
            }else{
                $Validasi19="Terjadi kesalahan pada saat menyimpan data ijin Transaksi";
            }
        }
        //20.acc_wilayah
        if(empty($CekAccWilayah)){
            $entry="INSERT INTO acc_wilayah (
                id_akses,
                acc_wilayah1,
                acc_wilayah2,
                acc_wilayah3,
                acc_wilayah4
            ) VALUES (
                '$id_akses',
                '$acc_wilayah1',
                '$acc_wilayah2',
                '$acc_wilayah3',
                '$acc_wilayah4'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                $Validasi20="Berhasil";
            }else{
                $Validasi20="Terjadi kesalahan pada saat menyimpan data ijin Wilayah";
            }
        }else{
            $Update = mysqli_query($Conn,"UPDATE acc_wilayah SET 
                acc_wilayah1='$acc_wilayah1',
                acc_wilayah2='$acc_wilayah2',
                acc_wilayah3='$acc_wilayah3',
                acc_wilayah4='$acc_wilayah4'
            WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
            if($Update){
                $Validasi20="Berhasil";
            }else{
                $Validasi20="Terjadi kesalahan pada saat menyimpan data ijin Wilayah";
            }
        }
        //21.acc_whatsapp
        if(empty($CekAccWhatsapp)){
            $entry="INSERT INTO acc_whatsapp (
                id_akses,
                acc_whatsapp1,
                acc_whatsapp2,
                acc_whatsapp3,
                acc_whatsapp4,
                acc_whatsapp5,
                acc_whatsapp6,
                acc_whatsapp7,
                acc_whatsapp8,
                acc_whatsapp9,
                acc_whatsapp10,
                acc_whatsapp11,
                acc_whatsapp12
            ) VALUES (
                '$id_akses',
                '$acc_whatsapp1',
                '$acc_whatsapp2',
                '$acc_whatsapp3',
                '$acc_whatsapp4',
                '$acc_whatsapp5',
                '$acc_whatsapp6',
                '$acc_whatsapp7',
                '$acc_whatsapp8',
                '$acc_whatsapp9',
                '$acc_whatsapp10',
                '$acc_whatsapp11',
                '$acc_whatsapp12'
            )";
            $Input=mysqli_query($Conn, $entry);
            if($Input){
                $Validasi21="Berhasil";
            }else{
                $Validasi21="Terjadi kesalahan pada saat menyimpan data ijin whatsapp";
            }
        }else{
            $Update = mysqli_query($Conn,"UPDATE acc_whatsapp SET 
                acc_whatsapp1='$acc_whatsapp1',
                acc_whatsapp2='$acc_whatsapp2',
                acc_whatsapp3='$acc_whatsapp3',
                acc_whatsapp4='$acc_whatsapp4',
                acc_whatsapp5='$acc_whatsapp5',
                acc_whatsapp6='$acc_whatsapp6',
                acc_whatsapp7='$acc_whatsapp7',
                acc_whatsapp8='$acc_whatsapp8',
                acc_whatsapp9='$acc_whatsapp9',
                acc_whatsapp10='$acc_whatsapp10',
                acc_whatsapp11='$acc_whatsapp11',
                acc_whatsapp12='$acc_whatsapp12'
            WHERE id_akses='$id_akses'") or die(mysqli_error($Conn)); 
            if($Update){
                $Validasi21="Berhasil";
            }else{
                $Validasi21="Terjadi kesalahan pada saat menyimpan data ijin whatsapp";
            }
        }
        //Hasil Akhir
        if($Validasi1=="Berhasil"){
            if($Validasi2=="Berhasil"){
                if($Validasi3=="Berhasil"){
                    if($Validasi4=="Berhasil"){
                        if($Validasi5=="Berhasil"){
                            if($Validasi6=="Berhasil"){
                                if($Validasi7=="Berhasil"){
                                    if($Validasi8=="Berhasil"){
                                        if($Validasi9=="Berhasil"){
                                            if($Validasi10=="Berhasil"){
                                                if($Validasi11=="Berhasil"){
                                                    if($Validasi12=="Berhasil"){
                                                        if($Validasi13=="Berhasil"){
                                                            if($Validasi14=="Berhasil"){
                                                                if($Validasi15=="Berhasil"){
                                                                    if($Validasi16=="Berhasil"){
                                                                        if($Validasi17=="Berhasil"){
                                                                            if($Validasi18=="Berhasil"){
                                                                                if($Validasi19=="Berhasil"){
                                                                                    if($Validasi20=="Berhasil"){
                                                                                        if($Validasi21=="Berhasil"){
                                                                                            $_SESSION ["NotifikasiSwal"]="Atur Akses Berhasil";
                                                                                            echo '<small class="text-success" id="NotifikasiAturIjinAksesBerhasil">Success</small>';
                                                                                        }else{
                                                                                            echo '<small class="text-danger">'.$Validasi21.'</small>';
                                                                                        }
                                                                                    }else{
                                                                                        echo '<small class="text-danger">'.$Validasi20.'</small>';
                                                                                    }
                                                                                }else{
                                                                                    echo '<small class="text-danger">'.$Validasi19.'</small>';
                                                                                }
                                                                            }else{
                                                                                echo '<small class="text-danger">'.$Validasi18.'</small>';
                                                                            }
                                                                        }else{
                                                                            echo '<small class="text-danger">'.$Validasi17.'</small>';
                                                                        }
                                                                    }else{
                                                                        echo '<small class="text-danger">'.$Validasi16.'</small>';
                                                                    }
                                                                }else{
                                                                    echo '<small class="text-danger">'.$Validasi15.'</small>';
                                                                }
                                                            }else{
                                                                echo '<small class="text-danger">'.$Validasi14.'</small>';
                                                            }
                                                        }else{
                                                            echo '<small class="text-danger">'.$Validasi13.'</small>';
                                                        }
                                                    }else{
                                                        echo '<small class="text-danger">'.$Validasi12.'</small>';
                                                    }
                                                }else{
                                                    echo '<small class="text-danger">'.$Validasi11.'</small>';
                                                }
                                            }else{
                                                echo '<small class="text-danger">'.$Validasi10.'</small>';
                                            }
                                        }else{
                                            echo '<small class="text-danger">'.$Validasi9.'</small>';
                                        }
                                    }else{
                                        echo '<small class="text-danger">'.$Validasi8.'</small>';
                                    }
                                }else{
                                    echo '<small class="text-danger">'.$Validasi7.'</small>';
                                }
                            }else{
                                echo '<small class="text-danger">'.$Validasi6.'</small>';
                            }
                        }else{
                            echo '<small class="text-danger">'.$Validasi5.'</small>';
                        }
                    }else{
                        echo '<small class="text-danger">'.$Validasi4.'</small>';
                    }
                }else{
                    echo '<small class="text-danger">'.$Validasi3.'</small>';
                }
            }else{
                echo '<small class="text-danger">'.$Validasi2.'</small>';
            }
        }else{
            echo '<small class="text-danger">'.$Validasi1.'</small>';
        }
    }
?>