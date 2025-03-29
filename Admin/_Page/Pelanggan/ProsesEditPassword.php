<?php
    //Koneksi
    include "../../_Config/Connection.php";
    include "../../_Config/Session.php";
    //Time Zone
    date_default_timezone_set("Asia/Jakarta");
    //Time Now Tmp
    $now=date('Y-m-d H:i:s');
    //Id Akses
    if(empty($_POST['id_pelanggan'])){
        echo '<small class="text-danger">ID Pelanggan Tidak Boleh Kosong</small>';
    }else{
        $id_pelanggan=$_POST['id_pelanggan'];
        //Buka data askes
        $QryDetailAkses = mysqli_query($Conn,"SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'")or die(mysqli_error($Conn));
        $DataDetailAkses = mysqli_fetch_array($QryDetailAkses);
        $id_pelanggan= $DataDetailAkses['id_pelanggan'];
        //Validasi nama tidak boleh kosong
        if(empty($_POST['password1'])){
            echo '<small class="text-danger">Password Tidak Boleh Kosong</small>';
        }else{
            //Validasi kontak tidak boleh kosong
            if($_POST['password1']!==$_POST['password2']){
                echo '<small class="text-danger">Password yang anda masukan tidak sama</small>';
            }else{
                //Validasi jumlah dan jenis karakter password
                $JumlahKarakterPassword=strlen($_POST['password1']);
                if($JumlahKarakterPassword>20||$JumlahKarakterPassword<6||!preg_match("/^[a-zA-Z0-9]*$/", $_POST['password1'])){
                    echo '<small class="text-danger">Password hanya boleh terdiri dari 6-20 karakter</small>';
                }else{
                    $password1=$_POST['password1'];
                    $password1=MD5($password1);
                    $UpdateAkses = mysqli_query($Conn,"UPDATE pelanggan SET 
                        password='$password1',
                        datetime_update='$now'
                    WHERE id_pelanggan='$id_pelanggan'") or die(mysqli_error($Conn)); 
                    if($UpdateAkses){
                        // $_SESSION ["NotifikasiSwal"]="Edit Password Berhasil";
                        echo '<small class="text-success" id="NotifikasiEditPasswordBerhasil">Success</small>';
                    }else{
                        echo '<small class="text-danger">Terjadi kesalahan pada saat menyimpan data</small>';
                    }
                }
            }
        }
    }
?>