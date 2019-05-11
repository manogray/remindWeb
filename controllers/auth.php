<?php
    session_start();
    require_once "../class/Terapeuta.php";
    require_once "../class/Paciente.php";

    if(isset($_POST['cpf']) && isset($_POST['senha'])){
        if($_POST['tipo'] == 'terapeuta'){
            $usuarioSuspeito = new Terapeuta();
            $usuarioSuspeito->cpf = $_POST['cpf'];
            $usuarioSuspeito->setPasswd($_POST['senha']);
            if($usuarioSuspeito->auth()){
                $_SESSION['terapeuta'] = $usuarioSuspeito->cpf;
                header('Location: /dashboard');
                die();
            }else{
                echo "<script>alert('Não foi possível autenticar!')</script>";
                echo "<meta http-equiv='refresh' content='0, url=/login/0'>";
                
            }
        }

        if($_POST['tipo'] == 'paciente'){
            $usuarioSuspeito = new Paciente();
            $usuarioSuspeito->cpf = $_POST['cpf'];
            $usuarioSuspeito->setPasswd($_POST['senha']);
            if($usuarioSuspeito->auth()){
                $_SESSION['paciente'] = $usuarioSuspeito->cpf;
                header('Location: /paciente');
                die();
            }else {
                echo "<script>alert('Não foi possível autenticar!')</script>";
                echo "<meta http-equiv='refresh' content='0, url=/login/1'>";
                
            }
        }
    }    

?>