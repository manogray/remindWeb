<?php

    session_start();
    if(!isset($_SESSION['terapeuta'])){
        header('Location: login.php?t=0');
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
            <?php include("includes/headerTerapeuta.php") ?>
        </header>

        <section class="main-content">

        <h2 class="titulo-paciente">Minhas Turmas</h2>

        <table>
            <tr>
                <th>Código</th>
                <th>Turma</th>
                <th>Disciplina</th>
                <th>Status</th>
                <th>Período</th>
                <th>Dia</th>
                <th>Horário</th>
            </tr>
            <tr>
                <td><a class="nome-paciente" href="">ICE245</a></td>
                <td>1</td>
                <td>Estágio II</td>
                <td>ativo</td>
                <td>2019/1</td>
                <td>Segunda-Quarta</td>
                <td>10-11hrs</td>
            </tr>
        </table>

        <a href="novaMatricula.php" class="botaoPadrao">Nova Matrícula</a>
          
        </section>
    </body>
</html>