<?php

    session_start();
    if(!isset($_SESSION['professor'])){
        header('Location: login.php?t=2');
        die();
    }
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
        <h2 class="titulo_cadastro">Cadastro de Disciplinas</h2>
            <form method="POST" class="register-form" id="register-form" action="controllers/disciplina.php">
                <div class="form-row">
                    <div class="form-group">

                        <div class="form-input">
                            <label for="codigo" class="required">Código</label>
                            <input style="width: 100px;" type="text" required name="codigo" id="codigo">
                        </div>

                        <div class="form-input">
                            <label for="disciplina" class="required">Disciplina</label>
                            <input style="width: 300px;" type="text" required name="disciplina" id="disciplina">
                        </div>

                        <div class="form-input">
                            <label for="periodo" class="required">Período</label>
                            <input style="width: 100px;" type="text" required name="periodo" id="periodo">
                        </div>
                        <input type="hidden" name="new" value="true">
                        <input type="hidden" name="cpf" value="<?=$_SESSION['professor']?>">
                        
                    </div>
                </div>

                <div class="form-submit">
                    <input style="margin-bottom: 25px;" type="submit" value="Salvar cadastro" class="botaoPadrao" id="submit" name="submit">
                </div>
            </form>       
          
        </section>
    </body>
</html>