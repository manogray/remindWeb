<?php
    session_start();
    if(!isset($_SESSION['terapeuta'])){
        header('Location: /login/0');
        die();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include("includes/head.php"); ?>
    </head>

    <body>
        <header>
            <?php include("includes/header.php") ?>
        </header>

        <section class="main-content">
            <div id="calendar"></div>
        </section>
        
        <script src="js/calendar.js"></script>
    </body>
</html>