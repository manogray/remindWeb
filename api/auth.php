<?php
    
    include("apiauth.php");
    require_once("../class/Paciente.php");

    $resquestMethod = $_SERVER['REQUEST_METHOD'];

    if($resquestMethod == 'POST'){
        if(apiauth($_GET['key'])){
            $usuarioGenerico = json_decode(file_get_contents("php://input"));
            
            $supostoPaciente = new Paciente();
            $supostoPaciente->cpf = $usuarioGenerico->cpf;
            $supostoPaciente->setPasswd($usuarioGenerico->senha);

            $resposta = [
                'status' => FALSE,
                'mensagem' => 'Não foi possível autenticar'
            ];

            if($supostoPaciente->auth() && $supostoPaciente->verifica($usuarioGenerico->cpf) > 0){
                $resposta = [
                    'status' => TRUE,
                    'mensagem' => ''
                ];
            }

            header('Content-Type: application/json');
            echo json_encode($resposta);

        }
    }

?>