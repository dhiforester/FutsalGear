<?php
    //Menangkap Get
    if(empty($_GET['id_hairstylist'])){
        $id_hairstylist="";
        $id_mitra="";
        $nama_mitra="";
    }else{
        $id_hairstylist=$_GET['id_hairstylist'];
        //Buka Mitra
        $id_mitra=getDataDetail($Conn,'hairstylist','id_hairstylist',$id_hairstylist,'id_mitra');
        $nama_mitra=getDataDetail($Conn,'mitra','id_mitra',$id_mitra,'nama_mitra');
    }
?>
<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="index.php">Beranda</a>
                <span class="breadcrumb-item active">Booking</span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Contact Start -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3">Form Booking</span>
    </h2>
    <form action="javascript:void(0);" id="ProsesBooking">
        <div class="row px-xl-5">
            <div class="col col-12 p-30 bg-light">
                <div class="row mb-4">
                    <div class="col-md-3"><label for="id_mitra">Mitra Cukur Rambut</label></div>
                    <div class="col-md-9">
                        <select name="id_mitra" id="id_mitra" class="form-control" data-bs-toggle="modal" data-bs-target="#ModalPilihMitra">
                            <option value="">Pilih</option>
                            <?php
                                if(!empty($_GET['id_hairstylist'])){
                                    echo'<option selected value="'.$id_mitra.'">'.$nama_mitra.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3"><label for="id_hairstylist">Hairstyllist</label></div>
                    <div class="col-md-9">
                        <select name="id_hairstylist" id="id_hairstylist" class="form-control" data-bs-toggle="modal" data-bs-target="#ModalPilihHairstylist">
                            <option value="">Pilih</option>
                            <?php
                                if(!empty($_GET['id_hairstylist'])){
                                    $Qry = mysqli_query($Conn,"SELECT * FROM hairstylist WHERE id_hairstylist='$id_hairstylist'")or die(mysqli_error($Conn));
                                    $Data = mysqli_fetch_array($Qry);
                                    $NamaHairstylist= $Data['nama'];
                                    echo'<option selected value="'.$id_hairstylist.'">'.$NamaHairstylist.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3"><label for="id_mitra_layanan">Pilih Layanan</label></div>
                    <div class="col-md-9">
                        <select name="id_mitra_layanan" id="id_mitra_layanan" class="form-control" data-bs-toggle="modal" data-bs-target="#ModalPilihLayanan">
                            <option value="">Pilih</option>
                            <?php
                                if(!empty($_GET['id_layanan'])){
                                    $id_layanan=$_GET['id_layanan'];
                                    $Qry = mysqli_query($Conn,"SELECT * FROM mitra_layanan WHERE id_mitra='$id_mitra' AND id_layanan='$id_layanan'")or die(mysqli_error($Conn));
                                    $Data = mysqli_fetch_array($Qry);
                                    $id_mitra_layanan= $Data['id_mitra_layanan'];
                                    $nama_layanan=getDataDetail($Conn,'layanan','id_layanan',$id_layanan,'nama_layanan');
                                    echo'<option selected value="'.$id_mitra_layanan.'">'.$nama_layanan.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3"><label for="tanggal">Tanggal Booking</label></div>
                    <div class="col-md-9">
                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3"><label for="jam">Jam Layanan</label></div>
                    <div class="col-md-9">
                        <select name="jam" id="jam" class="form-control" data-bs-toggle="modal" data-bs-target="#ModalPilihJamLayanan">
                            <option value="">Pilih</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3"><label for="id_setting_bank">Metode Pembayaran</label></div>
                    <div class="col-md-9">
                        <select name="id_setting_bank" id="id_setting_bank" class="form-control">
                            <option value="">Pilih</option>
                            <?php
                                $QryBank = mysqli_query($Conn, "SELECT*FROM setting_bank ORDER BY nama_bank ASC");
                                while ($DataBank = mysqli_fetch_array($QryBank)) {
                                    $id_setting_bank= $DataBank['id_setting_bank'];
                                    $nama_bank= $DataBank['nama_bank'];
                                    echo '<option value="'.$id_setting_bank.'">'.$nama_bank.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-3"></div>
                    <div class="col-md-9" id="InformasiDetailSettingBank"></div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-4" id="NotifikasiBooking">
                        <span class="text-dark">
                            Pastikan informasi booking sudah sesuai.
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                        <button type="submit" class="btn btn-md btn-primary">
                            Lanjutkan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Contact End -->