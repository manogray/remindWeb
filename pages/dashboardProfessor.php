<?php

    session_start();
    if(!isset($_SESSION['professor'])){
        header('Location: /login/2');
        die();
    }

    require_once("controllers/disciplina.php");
    $Disciplinas = listarDisciplinas();
?>
<!DOCTYPE html> 
<html>
    <head>
        <?php include("includes/head.php"); ?>
    </head>

    <body>
        <header>
            <?php include("includes/headerProfessor.php") ?>
        </header>

        <section class="main-content">

        <h2 class="titulo-paciente">Disciplinas</h2>

        <?php
            if(count($Disciplinas) > 0){
        ?>
        <table>
            <tr>
                <th>Código</th>
                <th>Disciplina</th>
                <th>Período</th>
            </tr>
            <?php 
                foreach ($Disciplinas as $dic) {
            ?>
            <tr>
                <td><a class="nome-paciente" href=""><?=$dic->codigo?></a></td>
                <td><?=$dic->nome?></td>
                <td><?=$dic->periodo?></td>
            </tr>
            <?php
                }
            ?>
        </table>
        <?php
            }else {
        ?>
        <h5 style="text-align: center;">Sem disciplinas cadastradas</h5>
        <?php
            }
        ?>
        <a style="margin-top: 10px;" class="botaoPadrao" href="professor/cadastrodisciplinas">Nova Disciplina</a>
          
        </section>
        
        <script src="../js/calendar.js"></script>
    </body>
</html>