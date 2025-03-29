<?php
    //Menangkap seasson kemudian menampilkannya
    session_start();
    if(!empty($_SESSION["IdAksesPelanggan"])){
        $SessionIdAksesPelanggan=$_SESSION ["IdAksesPelanggan"];
        //Inisiasi data akses dari database
        $QuerySessionAkses = mysqli_query($Conn,"SELECT * FROM akses WHERE id_akses='$SessionIdAksesPelanggan'")or die(mysqli_error($Conn));
        $DataSessionAkses = mysqli_fetch_array($QuerySessionAkses);
        //rincian profile user
        $SessionNama= $DataSessionAkses['nama'];
        $SessionEmail= $DataSessionAkses['email'];
        $SessionKontak= $DataSessionAkses['kontak'];
        $SessionPassword= $DataSessionAkses['password'];
        $SessionAkses= $DataSessionAkses['akses'];
        if(!empty($DataSessionAkses['foto'])){
            $SessionGambar= $DataSessionAkses['foto'];
        }else{
            $SessionGambar="No-Image.png";
        }
        //Buka Data Pelanggan
        $QrySessionPelanggan = mysqli_query($Conn,"SELECT * FROM pelanggan WHERE id_akses='$SessionIdAksesPelanggan'")or die(mysqli_error($Conn));
        $DataSessionPelanggan = mysqli_fetch_array($QrySessionPelanggan);
        $SessionIdOngkir= $DataSessionPelanggan['id_ongkir'];
        $SessionTanggalDaftar= $DataSessionPelanggan['tanggal_daftar'];
        $SessionAlamat= $DataSessionPelanggan['alamat_lengkap'];
    }
?>
