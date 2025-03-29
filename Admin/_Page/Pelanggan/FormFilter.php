<?php
    include "../../_Config/Connection.php";
    if(empty($_POST['KeywordBy'])){
        echo '<label for="FilterKeyword">Kata Kunci</label>';
        echo '<input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">';
    }else{
        $KeywordBy=$_POST['KeywordBy'];
        if($KeywordBy=="datetime_daftar"||$KeywordBy=="datetime_update"){
            echo '<label for="FilterKeyword">Kata Kunci</label>';
            echo '<input type="date" name="FilterKeyword" id="FilterKeyword" class="form-control">';
        }else{
            if($KeywordBy=="email"){
                echo '<label for="FilterKeyword">Kata Kunci</label>';
                echo '<input type="email" name="FilterKeyword" id="FilterKeyword" class="form-control" placeholder="email@domain.com">';
            }else{
                if($KeywordBy=="kontak"){
                    echo '<label for="FilterKeyword">Kata Kunci</label>';
                    echo '<input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control" placeholder="62">';
                }else{
                    echo '<label for="FilterKeyword">Kata Kunci</label>';
                    echo '<input type="text" name="FilterKeyword" id="FilterKeyword" class="form-control">';
                }
            }
        }
    }
?>