<?php

    session_start();
    if(!isset($_SESSION['professor'])){
        header('Location: /login.php?t=2');
        die();
    }

    function listarMatriculas(){
        try{
            $lista = [];
            $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $codigo = $_GET['codigo'];
            $result = $db->query("SELECT * FROM Matriculas WHERE idDisciplina='$codigo'");
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
            $result = $db->query("SELECT nome FROM Usuarios WHERE cpf='$idTerapeuta'");
            $nomeTerapeuta;
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $nomeTerapeuta = $row->nome;
            }
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

        <section class="main-content2">

        <h2 class="titulo-paciente" style="padding-bottom: 20px;">Matrículas</h2>

        <?php
            if(count($Matriculas) > 0){
        ?>
        <table>
            <tr>
                <th>Aluno</th>
                <th>Solicitação de matrícula</th>
                <th></th>
            </tr>
            <?php 
                foreach ($Matriculas as $mat) {
            ?>
            <tr>
                <td><?=pegarTerapeuta($mat->idTerapeuta)?></td>                
                <td><?=$mat->situacao?></td>

                <?php 
                    if($mat->situacao == 'aprovado'){
                ?>
                <td><a class="botaoPadrao" style="width: 100px; left: 50%; transform: translate(-50%);" href="controllers/professor.php?id=<?=$mat->id?>&op=0&codigo=<?=$mat->idDisciplina?>">Desaprovar</a></td>

                <?php
                    }else{
                ?>
                <td><a class="botaoPadrao" style="width: 100px; left: 50%; transform: translate(-50%);" href="controllers/professor.php?id=<?=$mat->id?>&op=1&codigo=<?=$mat->idDisciplina?>">Aprovar</a></td>

                <?php
                    }
                ?>
            </tr>
            <?php
                }
            ?>
        </table>
        <?php
            }else {
        ?>
        <h5 style="float: left; top: 20px !important; position: relative; width: 31%;"><br><br>Sem solicitações de matrícula</h5>
        <?php
            }
        ?>

              
        </section>
    </body>
</html>