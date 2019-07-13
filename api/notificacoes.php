<?php
    
    include("apiauth.php");
    require_once("../class/Paciente.php");
    require_once("../class/Terapeuta.php");
    require_once("../class/Notificacao.php");

    $resquestMethod = $_SERVER['REQUEST_METHOD'];

    if($resquestMethod == 'GET'){
        if(apiauth($_GET['key'])){
            if(isset($_GET['cpf'])){
                //LISTA NOTIFICACOES DE UM PACIENTE
                $pacienteEscolhido = new Paciente();
                $pacienteEscolhido->cpf = $_GET['cpf'];
                $pacienteEscolhido->fillPaciente();
                $listaNotificacao = $pacienteEscolhido->listarNotificacoes();

                header('Content-Type: application/json');
                echo json_encode($listaNotificacao);
            }

        }else {
            header("HTTP/1.0 401 Acesso Negado");
        }
    }

?>