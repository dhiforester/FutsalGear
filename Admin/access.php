<?php
    include "_Config/Connection.php";
    //Session
    include "_Config/Function.php";
    include "_Config/SettingGeneral.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>No Access</title>
    </head>
    <body>
        Silahkan Perbaharui Aplikasi Anda
        <?php
            echo "<br>Pesan : $message";
        ?>
    </body>
</html>