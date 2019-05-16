<?php

    session_start();
    if(!isset($_SESSION['professor'])){
        header('Location: /login/2');
        die();
    }

    function listarMatriculas(){
        try{
            $lista = [];
            $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $codigo = $_GET['codigo'];
            $result = $db->query("SELECT * FROM Matriculas WHERE idDisciplina='codigo'");
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

    function pegarTerapeuta($idTerapeuta){
        try{
            $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $nomeTerapeuta = $db->query("SELECT nome FROM Usuarios WHERE cpf='$idTerapeuta'");
        } catch (PDOException $exception){
            echo $exception;
            unset($db);
        }
        unset($db);

        return $nomeTerapeuta;
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
            <?php include("includes/headerProfessor.php") ?>
        </header>

        <section class="main-content">

        <h2 class="titulo-paciente">Matrículas</h2>

        <?php
            if(count($Matriculas) > 0){
        ?>
        <table>
            <tr>
                <th>Aluno</th>
                <th>Solicitação de matrícula</th>
            </tr>
            <?php 
                foreach ($Matriculas as $mat) {
            ?>
            <tr>
                <td><?=pegarTerapeuta($mat->id)?></td>                
                <td><?=$mat->situacao?></td>
            </tr>
            <?php
                }
            ?>
        </table>
        <?php
            }else {
        ?>
        <h5 style="text-align: center;">Sem solicitações de matrícula</h5>
        <?php
            }
        ?>
        <a style="margin-top: 10px;" class="botaoPadrao" href="professor/cadastrodisciplinas">Nova Disciplina</a>
          
        </section>
    </body>
</html>