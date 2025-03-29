<?php
    if(empty($_POST['CreatNewMember'])){
        $CreatNewMember="";
    }else{
        $CreatNewMember=$_POST['CreatNewMember'];
    }
    if($CreatNewMember=="Yes"){
?>
    <div class="row">
        <div class="col-md-6 mt-3">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="">Pilih..</option>
                <option value="Active">Active</option>
                <option value="Pending">Pending</option>
                <option value="Block">Block</option>
            </select>
        </div>
        <div class="col-md-6 mt-3">
            <label for="image_akses">Photo Profile</label>
            <input type="file" name="image_akses" id="image_akses" class="form-control">
            <small class="credit">Maximum File 2 Mb (PNG, JPG, JPEG, GIF)</small>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-3">
            <label for="password1">Password</label>
            <input type="password" name="password1" id="password1" class="form-control">
            <small class="credit">Consists of 6-20 characters letters or numbers</small>
        </div>
        <div class="col-md-6 mt-3">
            <label for="password2">Ulangi Password</label>
            <input type="password" name="password2" id="password2" class="form-control">
            <small class="credit">Consists of 6-20 characters letters or numbers</small>
        </div>
    </div>
<?php } ?>