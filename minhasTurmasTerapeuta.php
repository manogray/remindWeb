<?php

    session_start();
    require_once("class/Terapeuta.php");
    if(!isset($_SESSION['terapeuta'])){
        header('Location: login.php?t=0');
        die();
    }

    function listarMatriculas(){
        try{
            $lista = [];
            $db = new PDO("mysql:host=localhost; dbname=remind; charset=utf8", "root", "281295");
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
            $db = new PDO("mysql:host=localhost; dbname=remind; charset=utf8", "root", "281295");
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

        <section class="main-content2" id="TTerapeuta">

        <h2 class="titulo-paciente" style="top: 0;">Minhas Turmas</h2>

        <?php
            if(count($Matriculas) > 0){
        ?>

        <table class="dash">
            <tr>
                <th>Código</th>
                <th>Disciplina</th>
                <th>Situação</th>
            </tr>
            <?php 
                    foreach ($Matriculas as $mat) {
            ?>
            <tr>
                <td><a class="nome-paciente"><?=$mat->idDisciplina?></a></td>
                <td><?=pegarDisciplina($mat->idDisciplina)?></td>
                <td><?=$mat->situacao?></td>
            </tr>
            <?php
                    }
            ?>
        </table>

        <?php
            }else{
        ?>
            <h5 style="margin-top: 48px;">Você não está matriculado em nenhuma disciplina</h5>
        <?php
            }
        ?>
        <a href="novaMatricula.php" class="botaoPadrao" style="margin-top: 25px;">Nova Matrícula</a>
          
        </section>
    </body>
</html>