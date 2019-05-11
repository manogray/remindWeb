<?php

    require_once "../class/Terapeuta.php";
    require_once "../class/Paciente.php";

    //REGISTRO PACIENTE
    if(isset($_POST['senha']) && isset($_POST['vinculoResidencial'])){
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

        $novoPaciente = new Paciente();
        $novoPaciente->cpf                 = $_POST['cpf'];
        $novoPaciente->nome                = $_POST['nome'];
        $novoPaciente->setPasswd($_POST['senha']);
        $novoPaciente->email               = $_POST['email'];
        $novoPaciente->telefone            = $_POST['telefone'];
        $novoPaciente->endereco            = $_POST['endereco'];
        $novoPaciente->disponibilidade     = json_encode($Dispo);
        $novoPaciente->sexo                = $_POST['sexo'];
        $novoPaciente->nascimento          = $_POST['nascimento'];
        $novoPaciente->vinculoResidencial  = $_POST['vinculoResidencial'];
        $novoPaciente->fezTerapia          = $terapia;
        $novoPaciente->localTerapia        = $_POST['localTerapia'];
        $novoPaciente->demanda             = $_POST['demanda'];
        $novoPaciente->gravidade           = "desconhecido";//$_POST['gravidade'];
        $novoPaciente->prioridade          = $prioridade;//$_POST['prioridade'];

        $novoPaciente->register();

        header('Location: /login/0');
        die();
    } 

    //REGISTRO TERAPEUTA
    if(isset($_POST['senha']) && (isset($_POST['registroMatricula']) || isset($_POST['crp']))){
        
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

        $novoTerapeuta = new Terapeuta();
        $novoTerapeuta->cpf                 = $_POST['cpf'];
        $novoTerapeuta->nome                = $_POST['nome'];
        $novoTerapeuta->setPasswd($_POST['senha']);
        $novoTerapeuta->email               = $_POST['email'];
        $novoTerapeuta->telefone            = $_POST['telefone'];
        $novoTerapeuta->crp                 = $_POST['crp'];
        $novoTerapeuta->disponibilidade     = json_encode($Dispo);
        $novoTerapeuta->registroMatricula    = $_POST['registroMatricula'];

        $novoTerapeuta->register();

        header('Location: /login/1');
        die();
    }
?>