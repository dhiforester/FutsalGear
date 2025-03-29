<?php
    //Koneksi
    include "../../_Config/Connection.php";
    if(empty($_POST['id_transaksi'])){
        echo '<span class="text-danger">ID Transaksi Tidak Boleh Kosong!</span>';
    }else{
        $id_transaksi=$_POST['id_transaksi'];
        //Buka data Pembayaran
        $QryPembayaran = mysqli_query($Conn,"SELECT * FROM transaksi_pembayaran WHERE id_transaksi='$id_transaksi'")or die(mysqli_error($Conn));
        $DataPembayaran = mysqli_fetch_array($QryPembayaran);
        if(empty($DataPembayaran['id_pembayaran'])){
            echo '<span class="text-danger">ID Pembayaran Tidak Valid!</span>';
        }else{
            $id_pembayaran= $DataPembayaran['id_pembayaran'];
            $MetodePembayaran= $DataPembayaran['metode'];
            $server_key= $DataPembayaran['server_key'];
            $production= $DataPembayaran['production'];
            $order_id= $DataPembayaran['order_id'];
            $tagihan= $DataPembayaran['tagihan'];
            $first_name= $DataPembayaran['first_name'];
            $last_name= $DataPembayaran['last_name'];
            $email= $DataPembayaran['email'];
            $kontak= $DataPembayaran['kontak'];
            $snap_token= $DataPembayaran['snap_token'];
            $StatusPembayaran= $DataPembayaran['status'];
?>
    <input type="hidden" name="id_pembayaran" value="<?php echo $id_pembayaran;?>">
    <div class="row">
        <div class="col-md-12 mt-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo "$email"; ?>">
        </div>
        <div class="col-md-12 mt-3">
            <label for="tagihan">Tagihan</label>
            <input type="text" name="tagihan" class="form-control" value="<?php echo "$tagihan"; ?>">
        </div>
        <div class="col-md-12 mt-3">
            <label for="metode">Metode Pembayaran</label>
            <select name="metode" class="form-control">
                <option <?php if($MetodePembayaran==""){echo "selected";} ?> value="">Pilih</option>
                <option <?php if($MetodePembayaran=="Transfer"){echo "selected";} ?> value="Transfer">Transfer</option>
                <option <?php if($MetodePembayaran=="Cash"){echo "selected";} ?> value="Cash">Cash</option>
                <option <?php if($MetodePembayaran=="Payment Gateway"){echo "selected";} ?> value="Payment Gateway">Payment Gateway</option>
            </select>
        </div>
        <div class="col-md-12 mt-3">
            <label for="status">Status Pembayaran</label>
            <select name="status" class="form-control">
                <option <?php if($StatusPembayaran==""){echo "selected";} ?> value="">Pilih</option>
                <option <?php if($StatusPembayaran=="Pending"){echo "selected";} ?> value="Pending">Pending</option>
                <option <?php if($StatusPembayaran=="Lunas"){echo "selected";} ?> value="Lunas">Lunas</option>
                <option <?php if($StatusPembayaran=="Expired"){echo "selected";} ?> value="Expired">Expired</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3" id="NotifikasiUbahPembayaran">
            <span class="text-primary">Pastikan Informasi Pembayaran Sudah Sesuai</span>
        </div>
    </div>
<?php
        }
    }
?>