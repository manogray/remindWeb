<?php
    
    include("apiauth.php");
    require_once("../class/Paciente.php");

    $resquestMethod = $_SERVER['REQUEST_METHOD'];

    if($resquestMethod == 'GET'){
        if(apiauth($_GET['key'])){
            if(isset($_GET['cpf'])){
                //LISTA UM PACIENTE
                $pacienteEscolhido = new Paciente();
                $pacienteEscolhido->cpf = $_GET['cpf'];
                $pacienteEscolhido->fillPaciente();

                header('Content-Type: application/json');
                echo json_encode($pacienteEscolhido);
            }else {
                //LISTA TODO MUNDO
                $listaPacientes = listarPacientes();

                header('Content-Type: application/json');
                echo json_encode($listaPacientes);
            }

        }else {
            header("HTTP/1.0 401 Acesso Negado");
        }
    }

    if($resquestMethod == 'POST'){
        if(apiauth($_GET['key'])){
            $usuarioGenerico = json_decode(file_get_contents("php://input"));

            $novoPaciente = new Paciente();
            $novoPaciente->cpf                 = $usuarioGenerico->cpf;
            $novoPaciente->nome                = $usuarioGenerico->nome;
            $novoPaciente->setPasswd($usuarioGenerico->senha);
            $novoPaciente->email               = $usuarioGenerico->email;
            $novoPaciente->telefone            = $usuarioGenerico->telefone;
            $novoPaciente->endereco            = $usuarioGenerico->endereco;
            $novoPaciente->disponibilidade     = $usuarioGenerico->disponibilidade;
            $novoPaciente->sexo                = $usuarioGenerico->sexo;
            $novoPaciente->nascimento          = $usuarioGenerico->nascimento;
            $novoPaciente->vinculoResidencial  = $usuarioGenerico->vinculoResidencial;
            $novoPaciente->fezTerapia          = $usuarioGenerico->fezTerapia;
            $novoPaciente->localTerapia        = $usuarioGenerico->localTerapia;
            $novoPaciente->demanda             = $usuarioGenerico->demanda;
            $novoPaciente->gravidade           = 'Não Avaliado';//$usuarioGenerico->gravidade;
            $novoPaciente->prioridade          = 0;//$usuarioGenerico->prioridade;
            $novoPaciente->estado              = 'Disponível';

            $novoPaciente->register();

            $resposta = [
                'status' => TRUE,
                'mensagem' => ''
            ];

            header('Content-Type: application/json');
            echo json_encode($resposta);
        }else {
            header('HTTP/1.0 401 Acesso Negado');
        }
    }

    if($resquestMethod == 'PUT'){
        if(apiauth($_GET['key'])){
            $usuarioGenerico = json_decode(file_get_contents("php://input"));

            $pacienteAtualizado = new Paciente();
            $pacienteAtualizado->cpf                 = $usuarioGenerico->cpf;
            $pacienteAtualizado->nome                = $usuarioGenerico->nome;
            $pacienteAtualizado->email               = $usuarioGenerico->email;
            $pacienteAtualizado->telefone            = $usuarioGenerico->telefone;
            $pacienteAtualizado->endereco            = $usuarioGenerico->endereco;
            $pacienteAtualizado->sexo                = $usuarioGenerico->sexo;
            $pacienteAtualizado->nascimento          = $usuarioGenerico->nascimento;
            $pacienteAtualizado->vinculoResidencial  = $usuarioGenerico->vinculoResidencial;

            $pacienteAtualizado->updatePaciente();
        }else {
            header('HTTP/1.0 401 Acesso Negado');
        }
    }

?>