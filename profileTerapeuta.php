<?php

    session_start();
    if(!isset($_SESSION['terapeuta'])){
        header('Location: login.php?t=0');
        die();
    }

    require_once("class/Terapeuta.php");
    
    $terapeutaLogado = new Terapeuta();
    $terapeutaLogado->cpf = $_SESSION['terapeuta'];

    $terapeutaInfo = $terapeutaLogado->buscaTerapeuta();


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
        <div class="box-profile">
            <h2 class="titulo_cadastro">Meu Perfil</h2>
            <form method="POST" class="register-form" id="register-form" action="controllers/update.php">
                <div class="form-row">
                    <div class="form-group">
                        <div class="form-input">
                            <label for="nome" class="required">Nome Completo</label>
                            <input style="width: 400px;" type="text" value="<?=$terapeutaInfo->nome?>" required name="nome" id="nome">
                        </div>

                        <div class="form-input">
                            <label for="telefone" class="required">CPF</label>
                            <input type="text" value="<?=$terapeutaInfo->cpf?>" required name="cpf" id="telefone">
                        </div>

                        <div class="form-input">
                            <label for="registroMatricula" >Registro de Matrícula</label>
                            <input readonly type="text" value="<?=$terapeutaInfo->registroMatricula?>"name="registroMatricula" id="registroMatricula">
                        </div>

                        <div class="form-input">
                            <label for="crp">CRP</label>
                            <input readonly type="text" value="<?=$terapeutaInfo->crp?>" name="crp" id="crp">
                        </div>

                        <div class="form-input">
                            <label for="telefone" class="required">Telefone</label>
                            <input type="text" value="<?=$terapeutaInfo->telefone?>"required name="telefone" id="telefone">
                        </div>                      

                        <div class="form-input">
                            <label for="email" class="required">Email</label>
                            <input style="width: 400px;" type="email" value="<?=$terapeutaInfo->email?>"required name="email" id="email">
                        </div>                         
                    </div>
                </div>
                <div class="form-submit">
                    <input style="margin-bottom: 25px;" type="submit" value="Salvar" class="submit" id="submit" name="submit">
                </div>
            </form>
        </div>
        </section>
    </body>
</html>