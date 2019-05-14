<?php

    session_start();
    if(!isset($_SESSION['professor'])){
        header('Location: /login/2');
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
            <?php include("includes/headerProfessor.php") ?>
        </header>

        <section class="main-content">

        <h2 class="titulo-paciente">Disciplinas</h2>

        <table>
            <tr>
                <th>Código</th>
                <th>Turma</th>
                <th>Disciplina</th>
                <th>Período</th>
            </tr>
            <tr>
                <td><a class="nome-paciente" href="">ICE245</a></td>
                <td>1</td>
                <td>Estágio II</td>
                <td>2019/1</td>
            </tr>
            <tr>
                <td><a class="nome-paciente" href="">FTL029</a></td>
                <td>6</td>
                <td>Estágio III</td>
                <td>2019/1</td>
            </tr>
            <tr>
                <td><a class="nome-paciente" href="">IEF022</a></td>
                <td>01</td>
                <td>Psicodiagnóstico</td>
                <td>2019/1</td>
            </tr>
        </table>

        <a style="margin-top: 10px;" class="botaoPadrao" href="professor/cadastrodisciplinas">Nova Disciplina</a>
          
        </section>
        
        <script src="../js/calendar.js"></script>
    </body>
</html>