<?php

    require_once "../class/Terapeuta.php";
    require_once "../class/Paciente.php";

    if(isset($_POST['cpf']) && isset($_POST['senha'])){
        if($_POST['tipo'] == 'terapeuta'){
            $usuarioSuspeito = new Terapeuta();
            $usuarioSuspeito->$cpf = $_POST['cpf'];
            $usuarioSuspeito->$senha = $_POST['senha'];
            $usuarioSuspeito->auth();
        }

        if($_POST['tipo'] == 'paciente'){
            $usuarioSuspeito = new Paciente();
            $usuarioSuspeito->$cpf = $_POST['cpf'];
            $usuarioSuspeito->$senha = $_POST['senha'];
            $usuarioSuspeito->auth();
        }
    }    

?>