<?php
    //Koneksi
    include "../../_Config/Connection.php";
    if(empty($_POST['id_transaksi'])){
        echo '<span class="text-danger">ID Transaksi Tidak Boleh Kosong!</span>';
    }else{
        $id_transaksi=$_POST['id_transaksi'];
        //Buka data Transaksi
        $QryTransaksi = mysqli_query($Conn,"SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataTransaksi = mysqli_fetch_array($QryTransaksi);
        if(empty($DataTransaksi['id_transaksi'])){
            echo '<span class="text-danger">ID Transaksi Tidak Valid!</span>';
        }else{
            $metode= $DataTransaksi['metode'];
?>
    <div class="row">
        <div class="col-md-12">
            <label for="MetodeTransaksi">Metode Transaksi</label>
            <select name="MetodeTransaksi" id="MetodeTransaksi" class="form-control">
                <option value="">Pilih</option>
                <option value="Online">Online</option>
                <option value="Offline">Offline</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="NotifikasiEditMetodeTransaksi">
            <span class="text-danger">Pastikan metode Yang Anda Pilih Sudah Sesuai</span>
        </div>
    </div>
<?php
        }
    }
?>