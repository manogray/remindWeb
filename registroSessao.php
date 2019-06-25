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
        <h2 class="titulo_cadastro">Registro de Sessão Terapêutica</h2>
            <form method="POST" class="register-form" id="register-form" action="controllers/terapeuta.php">
                <div class="form-row">
                    <div class="form-group">

                        <div style="position: relative; float: left; width: 100%; margin: 9px;">
                            <label>Paciente: <?=$Terapia->paciente->nome?></label>
                        </div>

                        <div style="position: relative; float: left; width: 100%; margin: 9px;">
                            <label>Data: <?=date("d/m/Y")?></label>
                        </div>

                        <div style="position: relative; float: left; width: 100%; margin: 9px;">
                            <label class="required">Categorize a Sessão</label>
                            <select class="selectPadrao" style="clear: both;" name="categoria" required>
                                <option value=""></option>
                                <option value="Regular">Sessão Regular</option>
                                <option value="Atípica">Sessão Atípica</option>
                                <option value="Falta notificada">Paciente avisou que não viria</option>
                                <option value="Falta não notificada">Paciente não apareceu</option>
                                <option value="Curta">Paciente teve que sair mais cedo</option>
                            </select>
                        </div>

                        <div class="form-input">
                            <label class="required">Descreva como foi a sessão</label>
                            <textarea class="text-area" name="descricao" rows="8" cols="60" maxlength="500"></textarea>
                        </div>


                        <input type="hidden" name="registroSessao" value="atl">
                        <input type="hidden" name="idTherapy" value="<?=$_GET['id']?>">
                        
                    </div>
                </div>
                
                <div class="form-submit">
                    <input style="margin-bottom: 25px;" type="submit" value="Salvar" class="botaoPadrao" id="submit" name="submit">
                </div>
            </form>
          
        </section>
    </body>
</html>