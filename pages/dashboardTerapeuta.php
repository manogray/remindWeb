<?php
/*
    session_start();
    if(!isset($_SESSION['terapeuta'])){
        header('Location: /login/0');
        die();
    }*/
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include("includes/head.php"); ?>
    </head>

    <body>
        <header>
            <?php include("includes/headerTerapeuta.php") ?>
        </header>

        <section class="main-content">

        <h2 class="titulo-paciente">Pacientes</h2>

        <table>
            <tr>
                <th>Paciente</th>
                <th>status</th>
                <th>sessão</th>
                <th>Sala</th>
                <th>Dia</th>
                <th>Horário</th>
            </tr>
            <tr>
                <td><a class="nome-paciente" href="">Luis Mota</a></td>
                <td>Muito louco</td>
                <td>5421</td>
                <td>1</td>
                <td>Quarta-feira</td>
                <td>10-11hrs</td>
            </tr>
            <tr>
                <td><a class="nome-paciente" href="">Jhon Kerber</a></td>
                <td>Tá quase</td>
                <td>000.5</td>
                <td>2</td>
                <td>Quinta-feira</td>
                <td>08-09hrs</td>
            </tr>
            <tr>
                <td><a class="nome-paciente" href="">Evaldo Cardoso</a></td>
                <td>Com Fome</td>
                <td>566</td>
                <td>3</td>
                <td>Terça-feira</td>
                <td>05-06hrs</td>
            </tr>
        </table>
          
        </section>
        
        <script src="../js/calendar.js"></script>
    </body>
</html>