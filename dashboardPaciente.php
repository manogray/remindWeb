<?php

    session_start();
    if(!isset($_SESSION['paciente'])){
        header('Location: login.php?t=1');
        die();
    }

    require_once("class/Terapeuta.php");
    require_once("class/Paciente.php");
    require_once("class/Notificacao.php");

    $PacienteAtual = new Paciente();
    $PacienteAtual->cpf = $_SESSION['paciente'];
    $PacienteAtual->fillPaciente();
    $Notificacoes = $PacienteAtual->listarNotificacoes();
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

            <h2 class="titulo-paciente" style="top: 0; margin-top: 25px;">Minhas Notificações</h2>

            <?php
                if(count($Notificacoes) != 0){
            ?>

            <table class="tabelaCode" style="top: 0;">
                <thead>
                    <th>Tipo</th>
                    <th>Remetente</th>
                    <th>Mensagem</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th></th>
                </thead>
                <?php
                    foreach ($Notificacoes as $not){
                ?>
                <tr>
                    <td><?=$not->tipo?></td>
                    <td><?=$not->emissor->nome?></td>
                    <td>
                        <?php
                            if($not->tipo == 'Agendar'){
                        ?>
                        Gostaria de marcar suas sessões para <?=$not->dia?> as <?=$not->horario?>
                        <?php
                            }else {
                        ?>
                        <?=$not->mensagem?>
                        <?php
                            }
                        ?>
                    </td>
                    <td><?=$not->estado?></td>
                    <td><?=$not->horaData?></td>
                    
                    <td>
                        <?php
                            if($not->estado != 'Respondido'){
                        ?>
                        <div class="tabelaCode_buttonGroup">
                            <a title="Responder" onClick="responderTera(<?=$not->id?>)"><i class="fas fa-share"></i></a>
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
            
            <div class="alertPadrao">
                <span style="position: relative; float: left; left: 48%; cursor: pointer;" onClick="this.parentElement.style.display = 'none'"><i class="far fa-times-circle"></i></span>
                <p>Você deseja confimar o dia e horário de suas sessões? Esse será o horário de todas as suas sessões até o final do tratamento.</p>
                <div class="alertButtons">
                    <a class="botaoPadrao" id="confirmaBtn">Confirmar</a>
                    <a class="botaoPadrao" id="respondeBtn">Responder</a>
                </div>
            </div>

            <?php
                }else {
            ?>
            <h5 style="position: relative; float: left; width: 100%; margin-top: 25px;">Sem notificações</h5>
            <?php
                }
            ?>
           
        </section>
    </body>
</html>