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
            $status= $DataTransaksi['status'];
?>
    <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi;?>">
    <div class="row">
        <div class="col-md-12">
            <label for="StatusTransaksi">Status Transaksi</label>
            <select name="StatusTransaksi" id="StatusTransaksi" class="form-control">
                <option <?php if($status==""){echo "selected";} ?> value="">Pilih</option>
                <option <?php if($status=="Selesai"){echo "selected";} ?> value="Selesai">Selesai</option>
                <option <?php if($status=="Pending"){echo "selected";} ?> value="Pending">Pending</option>
                <option <?php if($status=="Batal"){echo "selected";} ?> value="Batal">Batal</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3" id="NotifikasiEditStatusTransaksi">
            <span class="text-primary">Pastikan Status Yang Anda Pilih Sudah Sesuai</span>
        </div>
    </div>
<?php
        }
    }
?>