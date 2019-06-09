<?php

    session_start();
    if(!isset($_SESSION['paciente'])){
        header('Location: login.php?t=1');
        die();
    }

    require_once("class/Paciente.php");
    
    $pacienteLogado = new Paciente();
    $pacienteLogado->cpf = $_SESSION['paciente'];

    $pacienteInfo = $pacienteLogado->buscaPaciente();

?>
<!DOCTYPE html>
<html>
    <head>
        <?php include("includes/head.php"); ?>
    </head>

    <body>
        <header>
            <?php include("includes/headerPaciente.php") ?>
        </header>

        <section class="main-content">
        <div class="box-profile">
            <h2 class="titulo_cadastro">Meu Perfil</h2>
            <form method="POST" class="register-form" id="register-form" action="controllers/update.php">
                <div class="form-row">
                    <div class="form-group">
                    <div class="form-input">
                            <label for="nome" class="required">Nome Completo</label>
                            <input style="width: 400px;" type="text" value="<?=$pacienteInfo->nome?>"name="nome" id="nome" required>
                        </div>
                        <div class="form-input">
                            <label for="cpf" class="required">CPF</label>
                            <input style="width: 200px;" type="text" value="<?=$pacienteInfo->cpf?>" name="cpf" id="cpf" required>
                        </div>
                        <div class="form-input">
                            <label for="nascimento" class="required">Nascimento</label>
                            <input type="date" value="<?=$pacienteInfo->nascimento?>" name="nascimento" id="nascimento" required>
                        </div>

                        <div class="form-input">
                            <label for="sexo" class="required">Sexo</label>
                            <input class="radio-area" type="radio" name="sexo" required value="MASCULINO" <?php echo ($pacienteInfo->sexo == "MASCULINO") ? "checked" : null; ?>/>Masculino
                            <input class="radio-area" type="radio" name="sexo" required value="FEMININO" <?php echo ($pacienteInfo->sexo == "FEMININO") ? "checked" : null; ?>/>Feminino
                        </div>

                        
                        <div class="form-input">
                            <label for="endereco" class="required">Endereço</label>
                            <input style="width: 400px;" type="text" value="<?=$pacienteInfo->endereco?>"name="endereco" id="endereco" required>
                        </div>
                        
                        <div class="form-input">
                            <label for="email" class="required">Email</label>
                            <input style="width: 400px;" type="email" value="<?=$pacienteInfo->email?>" name="email" id="email" required>
                        </div>
                        <div class="form-input">
                            <label for="telefone" class="required">Telefone</label>
                            <input type="text" value="<?=$pacienteInfo->telefone?>" name="telefone" id="telefone" required>
                        </div>

                        <div class="form-input">
                            <label for="vinculoResidencial" class="required">Com quem você vive?</label>
                            <textarea name="vinculoResidencial" required class="text-area" rows="5" cols="35" maxlength="500"><?=$pacienteInfo->vinculoResidencial?></textarea>
                        </div>

                        <div class="form-input">
                            <label for="demanda" >Por que gostaria de fazer a psicoterapia?</label>
                            <textarea class="text-area" name="demanda" required rows="5 " cols="35" maxlength="500"><?=$pacienteInfo->demanda?></textarea>
                        </div>

                        <div class="form-input" style="display: none;" id="opcao">
                            <label for="demanda" class="required">Local onde fez terapia</label>
                            <textarea class="text-area" name="localTerapia" rows="8" cols="35" maxlength="500"></textarea>
                        </div>

                        <div class="quadroHorarios">
                            <label style="width: 100%;">Disponibilidade</label>
                            <div class="dia">
                                <span>Segunda-feira</span>
                                <div style="display: flex;">
                                    <input type="time" name="timeSegIni">
                                    <span style="margin: 0px 6px;">às</span>
                                    <input type="time" name="timeSegFim">
                                </div>
                            </div>
                            <div class="dia">
                                <span>Terça-feira</span>
                                <div style="display: flex;">
                                    <input type="time" name="timeTerIni">
                                    <span style="margin: 0px 6px;">às</span>
                                    <input type="time" name="timeTerFim">
                                </div>
                            </div>
                            <div class="dia">
                                <span>Quarta-feira</span>
                                <div style="display: flex;">
                                    <input type="time" name="timeQuaIni">
                                    <span style="margin: 0px 6px;">às</span>
                                    <input type="time" name="timeQuaFim">
                                </div>
                            </div>
                            <div class="dia">
                                <span>Quinta-feira</span>
                                <div style="display: flex;">
                                    <input type="time" name="timeQuiIni">
                                    <span style="margin: 0px 6px;">às</span>
                                    <input type="time" name="timeQuiFim">
                                </div>
                            </div>
                            <div class="dia">
                                <span>Sexta-feira</span>
                                <div style="display: flex;">
                                    <input type="time" name="timeSexIni">
                                    <span style="margin: 0px 6px;">às</span>
                                    <input type="time" name="timeSexFim">
                                </div>
                            </div>
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