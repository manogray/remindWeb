<?php

    session_start();
    require_once("class/Terapeuta.php");
    if(!isset($_SESSION['terapeuta'])){
        header('Location: /login.php?t=0');
        die();
    }

    $idTerapeuta = $_SESSION['terapeuta'];

    function listarDisciplinas(){
        try{
            $lista = [];
            $db = new PDO("mysql:host=localhost; dbname=remind; charset=utf8", "root", "281295");
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
            <?php include("includes/headerTerapeuta.php") ?>
        </header>

        <section class="main-content2">
        <h2 class="titulo_cadastro">Nova Matrícula</h2>
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
                <td class="solicitar">
                    <div class="a-solicitar">
                        <a href="controllers/terapeuta.php?codigoMat=<?=$dic->codigo?>&idTera=<?=$idTerapeuta?>">Solicitar Matricula</a>
                    </div>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>
        <?php
            }else {
        ?>
        <h5 style="text-align: center;">Sem disciplinas cadastradas!</h5>
        <?php
            }
        ?>   
        </section>
    </body>
</html>