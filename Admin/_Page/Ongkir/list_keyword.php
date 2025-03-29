<?php
    include "../../_Config/Connection.php";
    if(!empty($_POST['keyword_by'])){
        $keyword_by=$_POST['keyword_by'];
        $QryKeyword = mysqli_query($Conn, "SELECT DISTINCT $keyword_by FROM ongkir ORDER BY $keyword_by ASC");
        while ($DataKeyword = mysqli_fetch_array($QryKeyword)) {
            $KeywordList= $DataKeyword[$keyword_by];
            echo '<option value="'.$KeywordList.'">';
        }
    }
?>