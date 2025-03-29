<?php
    //Connection
    include "../../_Config/Connection.php";
    if(empty($_POST['id_testimoni'])){
        echo '<span class="text-danger">ID Testimoni tidak dapat ditangkap oleh sistem</span>';
    }else{
        if(empty($_POST['status'])){
            echo '<span class="text-danger">Status tidak dapat ditangkap oleh sistem</span>';
        }else{
            $id_testimoni=$_POST['id_testimoni'];
            $status=$_POST['status'];
            //Proses hapus data
            $UpdateTestimoni = mysqli_query($Conn,"UPDATE testimoni SET 
                status='$status'
            WHERE id_testimoni='$id_testimoni'") or die(mysqli_error($Conn)); 
            if($UpdateTestimoni){
                echo '<span class="text-success" id="NotifikasiEditTestimoniBerhasil">Success</span>';
            }else{
                echo '<span class="text-danger">Update Data Gagal</span>';
            }
        }
    }
?>