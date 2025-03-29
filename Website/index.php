<!DOCTYPE html>
<html lang="en">
    <?php
        include "_Config/Connection.php";
        include "_Config/Session.php";
        include "_Config/SettingGeneral.php";
        include "_Partial/Head.php";
    ?>
    <body class="bg-secondary">
        <?php
            include "_Partial/TopBar.php";
            include "_Partial/Navbar.php";
            include "_Partial/RoutingPage.php";
            include "_Partial/RoutingModal.php";
            include "_Partial/Footer.php";
            include "_Partial/JsFooter.php";
        ?>
    </body>
</html>
