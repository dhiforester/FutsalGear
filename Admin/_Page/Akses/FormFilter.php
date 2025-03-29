<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['KeywordBy'])){
        echo '<label for="FilterKeyword">Kata Kunci</label>';
        echo '<input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">';
    }else{
        $KeywordBy=$_POST['KeywordBy'];
        if($KeywordBy=="status"){
            echo '<label for="FilterKeyword">Kata Kunci</label>';
            echo '<select name="FilterKeyword" id="FilterKeyword" class="form-control">';
            echo '  <option>Pilih</option>';
            //Arraykan Data Status Akses
            $query = mysqli_query($Conn, "SELECT DISTINCT status FROM akses WHERE id_mitra='0'");
            while ($data = mysqli_fetch_array($query)) {
                if(!empty($data['status'])){
                    $status= $data['status'];
                    echo '  <option value="'.$status.'">'.$status.'</option>';
                }
            }
            echo '</select>';
        }else{
            if($KeywordBy=="akses"){
                echo '<label for="FilterKeyword">Kata Kunci</label>';
                echo '<select name="FilterKeyword" id="FilterKeyword" class="form-control">';
                echo '  <option value="">Pilih</option>';
                //Arraykan Data Status Akses
                $query = mysqli_query($Conn, "SELECT DISTINCT akses FROM akses WHERE id_mitra='0'");
                while ($data = mysqli_fetch_array($query)) {
                    if(!empty($data['akses'])){
                        $akses= $data['akses'];
                        echo '  <option value="'.$akses.'">'.$akses.'</option>';
                    }
                }
                echo '</select>';
            }else{
                echo '<label for="FilterKeyword">Kata Kunci</label>';
                echo '<input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">';
            }
        }
    }
?>