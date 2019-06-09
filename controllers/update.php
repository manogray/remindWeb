<?php

    require_once "../class/Terapeuta.php";
    require_once "../class/Paciente.php";
    require_once "../class/Professor.php";

    $excep="HALOU ACABOU DE ENTRAR NO PHP";
    echo $excep;

    //UPDATE PACIENTE
    /*if(isset($_POST['senha']) && isset($_POST['vinculoResidencial'])){
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
        $novoPaciente->gravidade           = 'Não Avaliado';//$_POST['gravidade'];
        $novoPaciente->prioridade          = $prioridade;//$_POST['prioridade'];
        $novoPaciente->estado              = 'Disponível';

        $novoPaciente->register();

        header('Location: /login.php?t=1');
        die();
    }*/ 

    //UPDATE TERAPEUTA
    $excep="HALOU ANTES DE VERIFICAR SE ATUALIZA TERAPEUTA COM VALOR DE CPF";
    echo $excep;
    echo $_POST['cpf'];
    if( isset($_POST['cpf']) ){
        
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
        
        $excep="HALOU DE CRIAR O OBJETO";
        echo $excep;

        $atualTerapeuta = new Terapeuta();
        $atualTerapeuta->cpf                 = $_POST['cpf'];
        $atualTerapeuta->nome                = $_POST['nome'];
        $atualTerapeuta->email               = $_POST['email'];
        $atualTerapeuta->telefone            = $_POST['telefone'];
        //$atualTerapeuta->disponibilidade     = json_encode($Dispo);
        
        $excep="HALOU ANTES DE CHAMAR METODO UPDATE";
        echo $excep;

        $atualTerapeuta->updateTerapeuta();

        
        header('Location: ../profileTerapeuta.php?t=0');
        die();
    }
?>