<?php
 /*
    session_start();
    if(!isset($_SESSION['professor'])){
        header('Location: login.php?t=2');
        die();
    } */

    function listarDisciplinas(){
        try{
            $lista = [];
            $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $result = $db->query("SELECT * FROM Disciplinas");
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $lista[] = $row;
            }
        } catch (PDOException $exception){
            echo $exception;
            unset($db);
        }
        unset($db);

        return $lista;
    }

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

        <section class="main-content2">

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
                <td>
                <a class="nome-paciente" href="detalhesDisciplina.php?codigo=<?=$dic->codigo?>"><?=$dic->codigo?></a></td>
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
        <h5 style="margin-top:22px;"><br><br> disciplinas cadastradas</h5>
        <?php
            }
        ?>
        <a style="margin-top: 10px;" class="botaoPadrao" href="cadastroDisciplinas.php">Nova Disciplina</a>
          
        </section>
    </body>
</html>