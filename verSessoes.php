<?php

    session_start();
    if(!isset($_SESSION['terapeuta'])){
        header('Location: /login.php?t=0');
        die();
    }

    require_once("class/Paciente.php");
    require_once("class/Terapeuta.php");
    require_once("class/Terapia.php");
    require_once("class/Sessao.php");

    if(!isset($_GET['id']) || empty($_GET['id'])){
        header('Location: /dashboardTerapeuta.php');
        die();
    }

    $Terapia = new Terapia();
    $Terapia->id = $_GET['id'];
    $Terapia->fillTerapia();

    $Sessoes = $Terapia->listarSessoes();
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
        <h2 class="titulo_cadastro">Minhas Sessões</h2>
        
        <div style="position: relative; float: left; width: 100%; margin: 9px;">
            <label>Paciente: <?=$Terapia->paciente->nome?></label>
        </div>

        <?php
            if(count($Sessoes) > 0){
        ?>
        <table class="tabelaCode">
            <thead>
                <th>Data</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th></th>
            </thead>
            <?php
                foreach($Sessoes as $sessa){
            ?>
            <tr>
                <td><?=$sessa->horaData?></td>
                <td><?=$sessa->descricao?></td>
                <td><?=$sessa->categoria?></td>
                <td>
                    
                    <div class="tabelaCode_buttonGroup">
                        <a title="Editar Sessão" href="#"><i class="fas fa-edit"></i></a>
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
        <h5 style="margin-top: 40px; "><br>Não há sessões cadastradas.</h5>
        <?php
            }
        ?>
          
        </section>
    </body>
</html>