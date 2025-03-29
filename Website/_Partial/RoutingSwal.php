<?php
    if(!empty($_SESSION['NotifikasiSwal'])){
        $NotifikasiSwal=$_SESSION['NotifikasiSwal'];
?>
    <!------- Notifikasi ------------>
    <?php if($NotifikasiSwal=="Login Berhasil"){ ?>
        <script>
            swal("Success!", "Selamat Datang Kembali", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Logout Berhasil"){ ?>
        <script>
            swal("Sampai Jumpa!", "Logout Akun Pelanggan Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Belum Punya Akun"){ ?>
        <script>
            swal("Maaf!", "Anda Belum Punya Akun, Silahkan Daftar Dulu", "warning");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Ubah Foto Profile Berhasil"){ ?>
        <script>
            swal("Success!", "Ubah Foto Profile Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Akses Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Access Successful", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Password Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Password Successful", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Edit Profile Berhasil"){ ?>
        <script>
            swal("Success!", "Edit Profile Successful", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Pendaftaran Berhasil"){ ?>
        <script>
            swal("Success!", "Pendaftaran Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Verifikasi Pelanggan Berhasil"){ ?>
        <script>
            swal("Success!", "Verifikasi Pelanggan Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Simpan Pembayaran Berhasil"){ ?>
        <script>
            swal("Success!", "Simpan Pembayaran Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Simpan Pengiriman Berhasil"){ ?>
        <script>
            swal("Success!", "Simpan Pengiriman Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Hapus Pengiriman Berhasil"){ ?>
        <script>
            swal("Success!", "Hapus Pengiriman Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Diskon Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Diskon Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Update Pembayaran Berhasil"){ ?>
        <script>
            swal("Success!", "Update Pembayaran Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Kirim Pesan Berhasil"){ ?>
        <script>
            swal("Success!", "Kirim Pesan Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Tambah Item Keranjang Berhasil"){ ?>
        <script>
            swal("Success!", "Tambah Booking Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Hapus Rincian Berhasil"){ ?>
        <script>
            swal("Success!", "Hapus Rincian Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Konfirmasi Pembayaran Berhasil"){ ?>
        <script>
            swal("Success!", "Konfirmasi Pembayaran Berhasil", "success");
        </script>
    <?php } ?>
    <?php if($NotifikasiSwal=="Konfirmasi Transaksi Berhasil"){ ?>
        <script>
            swal("Success!", "Konfirmasi Transaksi Berhasil", "success");
        </script>
    <?php } ?>
<?php 
    echo "$NotifikasiSwal";
    unset($_SESSION['NotifikasiSwal']);
    }
?>