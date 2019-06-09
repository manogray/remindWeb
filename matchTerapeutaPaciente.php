<?php
    session_start();
    require_once("class/Paciente.php");
    require_once("class/Terapeuta.php");
    if(!isset($_SESSION['terapeuta'])){
        header('Location: login.php?t=0');
        die();
    }

    $terapeutaLogado = new Terapeuta();
    $terapeutaLogado->cpf = $_SESSION['terapeuta'];

    $Pacientes = $terapeutaLogado->matchMachine();
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

        <section class="main-content2">

        <h2 class="titulo-paciente">Pacientes Disponíveis</h2>
        <?php
            if(count($Pacientes) > 0){
        ?>
        <table>
            <tr>
                <th>Nome</th>
                <th>Gravidade</th>
                <th>Demanda</th>
                <th>Email</th>
            </tr>
            <tr>
                <?php
                    foreach($Pacientes as $paciente){
                ?>
                <td><a class="nome-paciente" href=""><?=$paciente->nome?></a></td>
                <td><?=$paciente->gravidade?></td>
                <td><?=$paciente->demanda?></td>
                <td><?=$paciente->email?></td>
                <?php
                    }
                ?>
            </tr>
        </table>
        <?php
            }else {
        ?>
        <h5 style="margin-top: 40px;"><br>Não há pacientes compatíveis com seus horários atuais.</h5>
        <?php
            }
        ?>
        </section>
    </body>
</html>