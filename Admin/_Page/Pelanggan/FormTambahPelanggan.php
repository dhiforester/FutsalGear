<?php
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
?>
<div class="row">
    <div class="col-md-12 mt-3">
        <label for="nama">Nama Pelanggan</label>
        <input type="text" name="nama" id="nama" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col-md-6 mt-3">
        <label for="kontak">Kontak</label>
        <input type="text" name="kontak" id="kontak" class="form-control" placeholder="+62">
    </div>
    <div class="col-md-6 mt-3">
        <label for="email">Alamat Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="email@domain.com">
    </div>
</div>
<div class="row">
    <div class="col-md-6 mt-3">
        <label for="password1">Password</label>
        <input type="password" name="password1" id="password1" class="form-control">
        <small class="credit">Password hanya boleh terdiri dari 6-20 karakter angka dan huruf</small>
    </div>
    <div class="col-md-6 mt-3">
        <label for="password2">Ulangi Password</label>
        <input type="password" name="password2" id="password2" class="form-control">
        <small class="credit">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Tampilkan" id="TampilkanPassword" name="TampilkanPassword">
                <label class="form-check-label" for="TampilkanPassword">
                    Tampilkan Password
                </label>
            </div>
        </small>
    </div>
</div>
<div class="row">
    <div class="col-md-12 mt-3" id="NotifikasiTambahPelanggan">
        <small class="text-primary">Pastikan Data Yang Anda Input Sesuai</small>
    </div>
</div>