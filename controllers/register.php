<?php

    require_once "../class/Terapeuta.php";
    require_once "../class/Paciente.php";
    require_once "../class/Professor.php";

    //REGISTRO PACIENTE
    if(isset($_POST['senha']) && isset($_POST['vinculoResidencial'])){
        $terapia = 0;
        $prioridade = 0;
        if($_POST['fezTerapia'] == 't   rue'){
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
        $novoPaciente->gravidade           = 'Não Avaliado';//$_POST['gravidade'];
        $novoPaciente->prioridade          = $prioridade;//$_POST['prioridade'];
        $novoPaciente->estado              = 'Disponível';

        $novoPaciente->register();

        header('Location: /login.php?t=1');
        die();
    } 

    //REGISTRO TERAPEUTA
    if( isset($_POST['senha']) && isset($_POST['registro']) ){
        
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
        $novoTerapeuta->disponibilidade     = json_encode($Dispo);
        //CRP
        if($_POST['tRegistro'] == 'true'){
            $novoTerapeuta->crp                 = $_POST['registro'];
            $novoTerapeuta->registroMatricula   = NULL;
            $novoTerapeuta->situacao            = 'Não Aprovado';
        }
        //MR
        else{
            $novoTerapeuta->crp                 = NULL;
            $novoTerapeuta->situacao            = NULL;
            $novoTerapeuta->registroMatricula   = $_POST['registro'];
        }
        $novoTerapeuta->register();

        header('Location: /login.php?t=0');
        die();
    }
?>