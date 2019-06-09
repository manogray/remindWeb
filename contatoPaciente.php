<?php

    session_start();
    if(!isset($_SESSION['terapeuta'])){
        header('Location: /login.php?t=0');
        die();
    }

    require_once("class/Paciente.php");

    if(!isset($_GET['id']) || empty($_GET['id'])){
        header('Location: /dashboardTerapeuta.php');
        die();
    }

    $PacienteAtual = new Paciente();
    $PacienteAtual->cpf = $_GET['id'];
    $PacienteAtual->fillPaciente();
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
        <h2 class="titulo_cadastro">Contatar Paciente</h2>
            <form method="POST" class="register-form" id="register-form" action="controllers/terapeuta.php">
                <div class="form-row">
                    <div class="form-group">

                        <div class="form-input">
                            <label for="codigo" class="required">Nome</label>
                            <input type="text" disabled name="nome" value="<?=$PacienteAtual->nome?>" id="nome">
                        </div>

                        <div class="form-input">
                            <label for="disciplina" class="required">Dia</label>
                            <select name="dia" style="float: left; clear: left; padding: 3px 20px;" required>
                                <option value="Segunda">Segunda</option>
                                <option value="Segunda">Terça</option>
                                <option value="Segunda">Quarta</option>
                                <option value="Segunda">Quinta</option>
                                <option value="Segunda">Sexta</option>
                            </select>
                        </div>

                        <div class="form-input">
                            <label for="periodo" class="required">Horário</label>
                            <input style="width: 100px;" type="time" required name="horario" id="horario">
                        </div>
                        <input type="hidden" name="cpfPacient" value="<?=$_GET['id']?>">
                        <input type="hidden" name="cpfTera" value="<?=$_SESSION['terapeuta']?>">
                        
                    </div>
                </div>

                <div class="form-submit">
                    <input style="margin-bottom: 25px;" type="submit" value="Enviar" class="botaoPadrao" id="submit" name="submit">
                </div>
            </form>

            <table style="clear: left;">
                <thead>
                    <th>Segunda</th>
                    <th>Terça</th>
                    <th>Quarta</th>
                    <th>Quinta</th>
                    <th>Sexta</th>
                </thead>
                <tr>
                    <td><?=$PacienteAtual->disponibilidade->Seg->inicio?> - <?=$PacienteAtual->disponibilidade->Seg->fim?></td>
                    <td><?=$PacienteAtual->disponibilidade->Ter->inicio?> - <?=$PacienteAtual->disponibilidade->Ter->fim?></td>
                    <td><?=$PacienteAtual->disponibilidade->Qua->inicio?> - <?=$PacienteAtual->disponibilidade->Qua->fim?></td>
                    <td><?=$PacienteAtual->disponibilidade->Qui->inicio?> - <?=$PacienteAtual->disponibilidade->Qui->fim?></td>
                    <td><?=$PacienteAtual->disponibilidade->Sex->inicio?> - <?=$PacienteAtual->disponibilidade->Sex->fim?></td>
                </tr>   
            </table>
          
        </section>
    </body>
</html>