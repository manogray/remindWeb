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
            <?php include("includes/headerTeach.php") ?>
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
            <tr>
                <td><a class="nome-paciente" href="">FTL029</a></td>
                <td>6</td>
                <td>Estágio III</td>
                <td>Fechado</td>
                <td>2019/1</td>
                <td>Terça-Quinta</td>
                <td>08-09hrs</td>
            </tr>
            <tr>
                <td><a class="nome-paciente" href="">IEF022</a></td>
                <td>01</td>
                <td>Psicodianóstico</td>
                <td>Fechado</td>
                <td>2019/1</td>
                <td>Terça-Quinta</td>
                <td>05-06hrs</td>
            </tr>
        </table>
          
        </section>
        
        <script src="../js/calendar.js"></script>
    </body>
</html>