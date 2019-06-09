<?php

    require_once "../class/Terapeuta.php";
    require_once "../class/Paciente.php";
    require_once "../class/Professor.php";


    //UPDATE PACIENTE
    if(isset($_POST['nascimento'])){
        $terapia = 0;
        $prioridade = 0;
        if($_POST['fezTerapia'] == 'true'){
            $terapia = 1;
        }

        $Dispo = [
            'Seg' => [
                'inicio' => $_POST['timeSegIni'],
                'fim' => $_POST['timeSegFim'],
            ],
            'Ter' => [
                'inicio' => $_POST['timeTerIni'],
                'fim' => $_POST['timeTerFim'],
            ],
            'Qua' => [
                'inicio' => $_POST['timeQuaIni'],
                'fim' => $_POST['timeQuaFim'],
            ],
            'Qui' => [
                'inicio' => $_POST['timeQuiIni'],
                'fim' => $_POST['timeQuiFim'],
            ],
            'Sex' => [
                'inicio' => $_POST['timeSexIni'],
                'fim' => $_POST['timeSexFim'],
            ],
        ];

        $atualPaciente = new Paciente();
        $atualPaciente->cpf                 = $_POST['cpf'];
        $atualPaciente->nome                = $_POST['nome'];
        $atualPaciente->email               = $_POST['email'];
        $atualPaciente->telefone            = $_POST['telefone'];
        $atualPaciente->endereco            = $_POST['endereco'];
        //$atualPaciente->disponibilidade     = json_encode($Dispo);
        $atualPaciente->sexo                = $_POST['sexo'];
        $atualPaciente->nascimento          = $_POST['nascimento'];
        $atualPaciente->vinculoResidencial  = $_POST['vinculoResidencial'];
        $atualPaciente->fezTerapia          = $terapia;
        $atualPaciente->localTerapia        = $_POST['localTerapia'];
        $atualPaciente->demanda             = $_POST['demanda'];
        $atualPaciente->estado              = 'Disponível';

        $atualPaciente->updatePaciente();

        //header('Location: /profilePaciente.php?t=1');
        echo "<script>alert('Dados atualizador com sucesso!')</script>";
        echo "<meta http-equiv='refresh' content='0, url=../profilePaciente.php?t=0'>";
        die();
    } 

    //UPDATE TERAPEUTA
    if( isset($_POST['crp']) || isset($_POST['registroMatricula']) ){
        
        /*$Dispo = [
            'Seg' => [
                'inicio' => $_POST['timeSegIni'],
                'fim' => $_POST['timeSegFim'],
            ],
            'Ter' => [
                'inicio' => $_POST['timeTerIni'],
                'fim' => $_POST['timeTerFim'],
            ],
            'Qua' => [
                'inicio' => $_POST['timeQuaIni'],
                'fim' => $_POST['timeQuaFim'],
            ],
            'Qui' => [
                'inicio' => $_POST['timeQuiIni'],
                'fim' => $_POST['timeQuiFim'],
            ],
            'Sex' => [
                'inicio' => $_POST['timeSexIni'],
                'fim' => $_POST['timeSexFim'],
            ],
        ];*/
        

        $atualTerapeuta = new Terapeuta();
        $atualTerapeuta->cpf                 = $_POST['cpf'];
        $atualTerapeuta->nome                = $_POST['nome'];
        $atualTerapeuta->email               = $_POST['email'];
        $atualTerapeuta->telefone            = $_POST['telefone'];
        //$atualTerapeuta->disponibilidade     = json_encode($Dispo);
    

        $atualTerapeuta->updateTerapeuta();

        echo "<script>alert('Dados atualizador com sucesso!')</script>";
        echo "<meta http-equiv='refresh' content='0, url=../profileTerapeuta.php?t=0'>";
        die();
    }
?>