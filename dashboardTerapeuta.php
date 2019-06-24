<?php
    session_start();
    require_once("class/Paciente.php");
    require_once("class/Terapeuta.php");
    require_once("class/Notificacao.php");
    require_once("class/Terapia.php");
    if(!isset($_SESSION['terapeuta'])){
        header('Location: /login.php?t=0');
        die();
    }

    $terapeutaLogado = new Terapeuta();
    $terapeutaLogado->cpf = $_SESSION['terapeuta'];
    $terapeutaLogado->fillTerapeuta();

    $Terapias = $terapeutaLogado->listarPacientes();

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

        <h2 class="titulo-paciente" style="top: 0;">Meus Pacientes</h2>

        <?php
            if(($terapeutaLogado->registroMatricula != NULL) || ($terapeutaLogado->crp != NULL && $terapeutaLogado->situacao == 'Aprovado')){
        ?>

        <?php
            if(count($Terapias) > 0){
        ?>
        <table class="tabelaCode">
            <thead>
                <th>Nome</th>
                <th>Gravidade</th>
                <th>Sexo</th>
                <th>Status</th>
                <th></th>
            </thead>
            <?php
                foreach($Terapias as $terapi){
            ?>
            <tr>
                <td><a class="nome-paciente" href=""><?=$terapi->paciente->nome?></a></td>
                <td><?=$terapi->paciente->gravidade?></td>
                <td><?=$terapi->paciente->sexo?></td>
                <td><?=$terapi->estado?></td>
                <td>
                    <?php
                        if($terapi->estado != 'Em tratamento'){
                    ?>
                    <div class="tabelaCode_buttonGroup">
                        <a title="Confirmar Sala" href="confirmarTerapia.php?id=<?=$terapi->id?>"><i class="fas fa-check"></i></a>
                    </div>
                    <?php
                        }else{
                    ?>
                    <div class="tabelaCode_buttonGroup">
                        <a title="Registrar Sessão" href="registroSessao.php?id=<?=$terapi->id?>"><i class="fas fa-file-medical-alt"></i></a>
                    </div>
                    <?php
                        }
                    ?>
                </td>
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
        <h2 style="margin-top: 45px; top: 0;" class="titulo-paciente">Pacientes em contato</h2>
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
        <?php
            }else {
        ?>
            <h5 style="margin-top: 40px; "><br>Você ainda não foi aprovado pela comissão técnica.</h5>
        <?php
            }
        ?>
        </section>
    </body>
</html>