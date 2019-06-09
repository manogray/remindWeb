<?php
    session_start();
    require_once("class/Paciente.php");
    require_once("class/Terapeuta.php");
    if(!isset($_SESSION['terapeuta'])){
        header('Location: /login.php?t=0');
        die();
    }

    $terapeutaLogado = new Terapeuta();
    $terapeutaLogado->cpf = $_SESSION['terapeuta'];

    $Pacientes = $terapeutaLogado->matchMachine();

    $contador = 0;
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

        <h2 class="titulo-paciente">Pacientes Disponíveis</h2>
        <?php
            if(count($Pacientes) > 0){
        ?>  
            <table class="tabelaCode"> <!--CONTENT PACIENTES-->
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Gravidade</th>
                        <th>Demanada</th>
                        <th>Idade</th>
                        <th></th>
                    </tr>
                </thead>
             <?php
                foreach($Pacientes as $paciente){
                    $nascimentoVetor = explode("-",$paciente->nascimento);
                    $anoNascimento = $nascimentoVetor[0];
                    $anoAtual = date('Y');
                    $idade = $anoAtual - $anoNascimento;
            ?>
                <tr>    <!--ELEMENTO PACIENTE -->
                    <td><?=$paciente->nome?></a></td>
                    <td><?=$paciente->gravidade?></td>
                    <td><?=$paciente->demanda?></td>
                    <td><?=$idade?> anos</td>
                    <td>
                        <div class="tabelaCode_buttonGroup">
                            <a onClick="exibirDispo(<?=$contador?>)" title="Disponiblidade"><i class="far fa-clock"></i></a>
                            <a href="contatoPaciente.php?id=<?=$paciente->cpf?>" title="Entrar em contato"><i class="far fa-comments"></i></a>
                        </div>
                    </td>
                </tr>

            <div class="dispo">
                    <?php
                        if($paciente->disponibilidade->Seg->inicio != ''){
                    ?>
                    <div><span>Segunda</span><span><?=$paciente->disponibilidade->Seg->inicio?> - <?=$paciente->disponibilidade->Seg->fim?></span></div>
                    <?php
                        }else{
                            echo "<div><span>Segunda</span><span> - </span></div>";
                        }

                        if($paciente->disponibilidade->Ter->inicio != ''){
                    ?>
                        <div><span>Terça</span><span><?=$paciente->disponibilidade->Ter->inicio?> - <?=$paciente->disponibilidade->Ter->fim?></span></div>
                    <?php
                        }else{
                            echo "<div><span>Terça</span><span> - </span></div>";
                        }

                        if($paciente->disponibilidade->Qua->inicio != ''){
                    ?>
                        <div><span>Quarta</span><span><?=$paciente->disponibilidade->Qua->inicio?> - <?=$paciente->disponibilidade->Qua->fim?></span></div>
                    <?php
                        }else{
                            echo "<div><span>Quarta</span><span> - </span></div>";
                        }
                        
                        if($paciente->disponibilidade->Qui->inicio != ''){
                    ?>
                        <div><span>Quinta</span><span><?=$paciente->disponibilidade->Qui->inicio?> - <?=$paciente->disponibilidade->Qui->fim?></span></div>
                    <?php
                        }else{
                            echo "<div><span>Quinta</span><span> - </span></div>";
                        }

                        if($paciente->disponibilidade->Sex->inicio != ''){
                    ?>
                        <div><span>Sexta</span><span><?=$paciente->disponibilidade->Sex->inicio?> - <?=$paciente->disponibilidade->Sex->fim?></span></div>
                    <?php
                        }else{
                            echo "<div><span>Sexta</span><span> - </span></div>";
                        }
                    ?>
                    <span class="close" onClick="this.parentElement.style.display = 'none'">X</span>
            </div></div>

            <?php
                $contador = $contador + 1;
                }
            ?>
            
            </table>

        <?php
            }else {
        ?>
        <h5 style="margin-top: 25px;">Não há pacientes compatíveis com seus horários atuais.</h5>
        <?php
            }
        ?>
        </section>
    </body>
</html>