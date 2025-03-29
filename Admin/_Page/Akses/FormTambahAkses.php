<?php
    include "../../_Config/Connection.php";
?>
<div class="row">
    <div class="col-md-4 mb-3">
        <label for="nama">Nama Lengkap</label>
    </div>
    <div class="col-md-8 mb-3">
        <input type="text" name="nama" id="nama" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <label for="kontak">Nomor Kontak</label>
    </div>
    <div class="col-md-8 mb-3">
        <input type="text" name="kontak" id="kontak" class="form-control" placeholder="+62">
    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <label for="akses">Akses</label>
    </div>
    <div class="col-md-8 mb-3">
        <select name="akses" id="akses" class="form-control">
            <option value="">Pilih</option>
            <option value="Pemilik">Pemilik</option>
            <option value="Customer Service">Customer Service</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <label for="email">Email</label>
    </div>
    <div class="col-md-8 mb-3">
        <input type="email" name="email" id="email" class="form-control">
    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <label for="image_akses">Photo Profile</label>
    </div>
    <div class="col-md-8 mb-3">
        <input type="file" name="image_akses" id="image_akses" class="form-control">
        <small class="credit">Maximum File 2 Mb (PNG, JPG, JPEG, GIF)</small>
    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <label for="password1">Password</label>
    </div>
    <div class="col-md-8 mb-3">
        <input type="password" name="password1" id="password1" class="form-control">
        <small class="credit">Password hanya boleh terdiri dari 6-20 karakter angka dan huruf</small>
    </div>
</div>
<div class="row">
    <div class="col-md-4 mb-3">
        <label for="password2">Ulangi Password</label>
    </div>
    <div class="col-md-8 mb-3">
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
