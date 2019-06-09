<?php

    session_start();
    if(!isset($_SESSION['paciente'])){
        header('Location: login.php?t=1');
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
            <?php include("includes/headerPaciente.php") ?>
        </header>

        <section class="main-content2">

            <h2 class="titulo-paciente">Minhas Notificações</h2>
           
        </section>
    </body>
</html>