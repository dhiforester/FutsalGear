<?php
    if(!empty($_POST['keyword_by_export'])){
        $keyword_by_export=$_POST['keyword_by_export'];
        if($keyword_by_export=="datetime_daftar"||$keyword_by_export=="datetime_update"){
            echo '<label for="keyword_export">Tanggal</label>';
            echo '<input type="date" name="keyword_export" id="keyword_export" class="form-control">';
        }else{
            
        }
    }else{

    }
?>