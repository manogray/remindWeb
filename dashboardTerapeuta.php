<?php
    session_start();
    require_once("class/Paciente.php");
    require_once("class/Terapeuta.php");
    require_once("class/Notificacao.php");
    if(!isset($_SESSION['terapeuta'])){
        header('Location: /login.php?t=0');
        die();
    }

    $terapeutaLogado = new Terapeuta();
    $terapeutaLogado->cpf = $_SESSION['terapeuta'];

    $Pacientes = $terapeutaLogado->listarPacientes();

    $NotificacoesPendentes = $terapeutaLogado->listarNotificacoesPendentes();
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

        <h2 class="titulo-paciente">Meus Pacientes</h2>
        <?php
            if(count($Pacientes) > 0){
        ?>
        <table>
            <tr>
                <th>Nome</th>
                <th>Gravidade</th>
                <th>Sexo</th>
                <th>Email</th>
            </tr>
            <?php
                foreach($Pacientes as $paciente){
            ?>
            <tr>
                <td><a class="nome-paciente" href=""><?=$paciente->nome?></a></td>
                <td><?=$paciente->gravidade?></td>
                <td><?=$paciente->sexo?></td>
                <td><?=$paciente->email?></td>
            </tr>
            <?php
                }
            ?>
        </table>
        <?php
            }else {
        ?>
        <h5 style="margin-top: 40px; "><br>Você não possui pacientes em tratamento.</h5>
        <?php
            }
        ?>

        <?php
            if(count($NotificacoesPendentes) > 0){
        ?>
        <h2 style="margin-top: 45px;" class="titulo-paciente">Pacientes em contato</h2>
        <table>
            <tr>
                <th>Nome</th>
                <th>Dia</th>
                <th>Horário</th>
                <th>Status</th>
            </tr>
            <?php
                foreach($NotificacoesPendentes as $not){
            ?>
            <tr>
                <td><a class="nome-paciente" href=""><?=$not->receptor->nome?></a></td>
                <td><?=$not->dia?></td>
                <td><?=$not->horario?></td>
                <td><?=$not->estado?></td>
            </tr>
            <?php
                }
            ?>
        </table>
        <?php
            }
        ?>

        <a href="matchTerapeutaPaciente.php" class="botaoPadrao" style="margin-top: 25px;">Novo Paciente</a>
        </section>
    </body>
</html>