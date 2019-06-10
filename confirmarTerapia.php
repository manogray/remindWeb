<?php

    session_start();
    if(!isset($_SESSION['terapeuta'])){
        header('Location: /login.php?t=0');
        die();
    }

    require_once("class/Paciente.php");
    require_once("class/Terapeuta.php");
    require_once("class/Terapia.php");

    if(!isset($_GET['id']) || empty($_GET['id'])){
        header('Location: /dashboardTerapeuta.php');
        die();
    }

    $Terapia = new Terapia();
    $Terapia->id = $_GET['id'];
    $Terapia->fillTerapia();

    $numeroDeSalas = 4;
    $salasDisponiveis = $Terapia->salasDisponiveis($numeroDeSalas);
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
        <h2 class="titulo_cadastro">Terapia</h2>
            <form method="POST" class="register-form" id="register-form" action="controllers/terapeuta.php">
                <div class="form-row">
                    <div class="form-group">

                        <div class="form-input">
                            <label class="required">Nome</label>
                            <input type="text" disabled name="nome" value="<?=$Terapia->paciente->nome?>" id="nome">
                        </div>

                        <div class="form-input">
                            <label class="required">Dia</label>
                            <input type="text" disabled name="dia" value="<?=$Terapia->dia?>" id="nome">
                        </div>

                        <div class="form-input">
                            <label class="required">Horário</label>
                            <input type="text" disabled name="hora" value="<?=$Terapia->hora?>" id="nome">
                        </div>

                        <div class="form-input">
                            <?php
                                if(count($salasDisponiveis) > 0){
                            ?>
                            <label class="required">Sala</label>
                            <select name="sala">
                                <?php
                                    foreach ($salasDisponiveis as $sala){
                                ?>
                                <option value="<?=$sala?>">Sala <?=$sala?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            <?php
                                }else {
                            ?>
                            <label>Sem salas disponíveis</label>
                            <?php
                                }
                            ?>
                        </div>
                        <input type="hidden" name="confirmarTerapia" value="atl">
                        <input type="hidden" name="idTherapy" value="<?=$_GET['id']?>">
                        
                    </div>
                </div>
                <?php
                    if(count($salasDisponiveis) > 0){
                ?>
                <div class="form-submit">
                    <input style="margin-bottom: 25px;" type="submit" value="Enviar" class="botaoPadrao" id="submit" name="submit">
                </div>
                <?php
                    }
                ?>
            </form>
          
        </section>
    </body>
</html>