<?php

    session_start();
    if(!isset($_SESSION['paciente'])){
        header('Location: login.php?t=1');
        die();
    }

    require_once("class/Paciente.php");
    
    $pacienteLogado = new Paciente();
    $pacienteLogado->cpf = $_SESSION['paciente'];

    $pacienteLogado->fillPaciente();

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
            <form method="POST" class="register-form" id="register-formP" action="controllers/update.php">
                <div class="form-row">
                    <div class="form-group">
                    <div class="form-input">
                            <label for="nome" class="required">Nome Completo</label>
                            <input style="width: 400px;" type="text" value="<?=$pacienteLogado->nome?>"name="nome" id="nome" required>
                        </div>
                        <div class="form-input">
                            <label for="cpf" class="required">CPF</label>
                            <input style="width: 200px;" type="text" value="<?=$pacienteLogado->cpf?>" name="cpf" id="cpf" disabled>
                        </div>
                        <div class="form-input">
                            <label for="nascimento" class="required">Nascimento</label>
                            <input type="date" value="<?=$pacienteLogado->nascimento?>" name="nascimento" id="nascimento" required>
                        </div>

                        <div class="form-input">
                            <label for="sexo" class="required">Sexo</label>
                            <input class="radio-area" type="radio" name="sexo" required value="MASCULINO" <?php echo ($pacienteLogado->sexo == "MASCULINO") ? "checked" : null; ?>/>Masculino
                            <input class="radio-area" type="radio" name="sexo" required value="FEMININO" <?php echo ($pacienteLogado->sexo == "FEMININO") ? "checked" : null; ?>/>Feminino
                            <input class="radio-area" type="radio" name="sexo" required value="OUTRO" <?php echo ($pacienteLogado->sexo == "OUTRO") ? "checked" : null; ?>/>Outro
                        </div>

                        
                        <div class="form-input">
                            <label for="endereco" class="required">Endereço</label>
                            <input style="width: 400px;" type="text" value="<?=$pacienteLogado->endereco?>"name="endereco" id="enderecoP" required>
                        </div>
                        
                        <div class="form-input">
                            <label for="email" class="required">Email</label>
                            <input style="width: 400px;" type="email" value="<?=$pacienteLogado->email?>" name="email" id="emailP" required>
                        </div>
                        <div class="form-input" id="tellP">
                            <label for="telefone" class="required">Telefone</label>
                            <input type="text" value="<?=$pacienteLogado->telefone?>" name="telefone" id="telefoneP" required>
                        </div>
                        <br>
                        <br><br>
                        <div class="text-area-form">
                            <div class="form-input">
                                <label for="vinculoResidencial" class="required">Com quem você vive?</label>
                                <textarea name="vinculoResidencial" required class="text-area" rows="5" cols="35" maxlength="500"><?=$pacienteLogado->vinculoResidencial?></textarea>
                            </div>

                            <div class="form-input">
                                <label for="demanda" >Por que gostaria de fazer a psicoterapia?</label>
                                <textarea class="text-area" name="demanda" disabled rows="5 " cols="35" maxlength="500"><?=$pacienteLogado->demanda?></textarea>
                            </div>
                        </div>
                        <div class="form-input" style="display: none;" id="opcao">
                            <label for="demanda" class="required">Local onde fez terapia</label>
                            <textarea class="text-area" name="localTerapia" rows="8" cols="35" maxlength="500"></textarea>
                        </div>

                        <div class="quadroHorarios">
                            <div class="barato-demais">
                                <label class="required" style="width: 100%;">Disponibilidade</label>
                                <div class="dia">
                                    <span class="semana">Segunda-feira</span>
                                    <div class="hora" style="display: flex;">
                                        <input class="time-input" type="time" value="<?=$pacienteLogado->disponibilidade->Seg->inicio?>" name="timeSegIni">
                                        <span class="semana" style="margin: 0px 6px;">às</span>
                                        <input class="time-input" type="time" value="<?=$pacienteLogado->disponibilidade->Seg->fim?>" name="timeSegFim">
                                    </div>
                                </div>
                                <div class="dia">
                                    <span class="semana">Terça-feira</span>
                                    <div class="hora" style="display: flex;">
                                        <input class="time-input" type="time" value="<?=$pacienteLogado->disponibilidade->Ter->inicio?>" name="timeTerIni">
                                        <span class="semana" style="margin: 0px 6px;">às</span>
                                        <input class="time-input" type="time" value="<?=$pacienteLogado->disponibilidade->Ter->fim?>" name="timeTerFim">
                                    </div>
                                </div>
                                <div class="dia">
                                    <span class="semana">Quarta-feira</span>
                                    <div class="hora" style="display: flex;">
                                        <input class="time-input" type="time" value="<?=$pacienteLogado->disponibilidade->Qua->inicio?>" name="timeQuaIni">
                                        <span class="semana" style="margin: 0px 6px;">às</span>
                                        <input class="time-input" type="time" value="<?=$pacienteLogado->disponibilidade->Qua->fim?>" name="timeQuaFim">
                                    </div>
                                </div>
                                <div class="dia">
                                    <span class="semana">Quinta-feira</span>
                                    <div class="hora" style="display: flex;">
                                        <input class="time-input" type="time" value="<?=$pacienteLogado->disponibilidade->Qui->inicio?>" name="timeQuiIni">
                                        <span class="semana" style="margin: 0px 6px;">às</span>
                                        <input class="time-input" type="time" value="<?=$pacienteLogado->disponibilidade->Qui->fim?>" name="timeQuiFim">
                                    </div>
                                </div>
                                <div class="dia">
                                    <span class="semana">Sexta-feira</span>
                                    <div class="hora" style="display: flex;">
                                        <input class="time-input" type="time" value="<?=$pacienteLogado->disponibilidade->Sex->inicio?>" name="timeSexIni">
                                        <span class="semana" style="margin: 0px 6px;">às</span>
                                        <input class="time-input" type="time" value="<?=$pacienteLogado->disponibilidade->Sex->fim?>" name="timeSexFim">
                                    </div>
                                </div>
                                <div class="dia">
                                    <span class="semana">Sábado</span>
                                    <div class="hora" style="display: flex;">
                                        <input class="time-input" type="time" value="<?=$pacienteLogado->disponibilidade->Sab->inicio?>" name="timeSabIni">
                                        <span class="semana" style="margin: 0px 6px;">às</span>
                                        <input class="time-input" type="time" value="<?=$pacienteLogado->disponibilidade->Sab->fim?>" name="timeSabFim">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <input type="hidden" name="updatePacient" value="ok">
                <div class="form-submit">
                    <input style="margin-bottom: 25px;" type="submit" value="Salvar" class="submit" id="submit" name="submit">
                </div>  
            </form>
        </div>
        </section>
    </body>
</html>