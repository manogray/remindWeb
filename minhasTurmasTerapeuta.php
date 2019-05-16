<?php

    session_start();
    if(!isset($_SESSION['terapeuta'])){
        header('Location: login.php?t=0');
        die();
    }

    function listarMatriculas(){
        try{
            $lista = [];
            $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $idTera = $_SESSION['terapeuta'];
            $result = $db->query("SELECT * FROM Matriculas WHERE idTerapeuta = '$idTera'");
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

    function pegarDisciplina($idDisciplina){
        try{
            $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $result = $db->query("SELECT nome FROM Disciplinas WHERE codigo='$idDisciplina'");
            $nomeDisciplina;
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $nomeDisciplina = $row->nome;
            }
        } catch (PDOException $exception){
            echo $exception;
            unset($db);
        }
        unset($db);

        return $nomeDisciplina;
    }

    $Matriculas = listarMatriculas();
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
                <th>Disciplina</th>
                <th>Situacao</th>
            </tr>
            <?php
                if(count($Matriculas) > 0){ 
                    foreach ($Matriculas as $mat) {
            ?>
            <tr>
                <td><a class="nome-paciente"><?=$mat->idDisciplina?></a></td>
                <td><?=pegarDisciplina($mat->idDisciplina)?></td>
                <td><?=$mat->situacao?></td>
            </tr>
            <?php
                    }
                }
            ?>
        </table>

        <a href="novaMatricula.php" class="botaoPadrao">Nova Matrícula</a>
          
        </section>
    </body>
</html>