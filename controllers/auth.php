<?php

    require_once "../class/Terapeuta.php";
    require_once "../class/Paciente.php";

    if(isset($_POST['cpf']) && isset($_POST['senha'])){
        if($_POST['tipo'] == 'terapeuta'){
            $usuarioSuspeito = new Terapeuta();
            $usuarioSuspeito->cpf = $_POST['cpf'];
            $usuarioSuspeito->setPasswd($_POST['senha']);
            if($usuarioSuspeito->auth()){
                //CRIAR SESSAO DO USER
                echo "<meta http-equiv='refresh' content='0,url=/dashboard'>";
            }
        }

        if($_POST['tipo'] == 'paciente'){
            $usuarioSuspeito = new Paciente();
            $usuarioSuspeito->cpf = $_POST['cpf'];
            $usuarioSuspeito->setPasswd($_POST['senha']);
            if($usuarioSuspeito->auth()){
                //CRIAR SESSAO DO USER
                echo "<meta http-equiv='refresh' content='0,url=/paciente'>";
            }
        }
    }    

?>