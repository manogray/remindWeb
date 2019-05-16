<?php
    session_start();
    require_once "../class/Terapeuta.php";
    require_once "../class/Paciente.php";
    require_once "../class/Professor.php";
    require_once "../controllers/terapeuta.php";

    if(isset($_POST['cpf']) && isset($_POST['senha'])){
        if($_POST['tipo'] == 'terapeuta'){
            $usuarioSuspeito = new Terapeuta();
            $usuarioSuspeito->cpf = $_POST['cpf'];
            $usuarioSuspeito->setPasswd($_POST['senha']);
            if($usuarioSuspeito->auth()){
                $_SESSION['terapeuta'] = $usuarioSuspeito->cpf;
                header('Location: /dashboardTerapeuta.php');
                die();
            }else{
                echo "<script>alert('Não foi possível autenticar!')</script>";
                echo "<meta http-equiv='refresh' content='0, url=login.php?t=0'>";
                
            }
        }

        if($_POST['tipo'] == 'paciente'){
            $usuarioSuspeito = new Paciente();
            $usuarioSuspeito->cpf = $_POST['cpf'];
            $usuarioSuspeito->setPasswd($_POST['senha']);
            if($usuarioSuspeito->auth()){
                $_SESSION['paciente'] = $usuarioSuspeito->cpf;
                header('Location: /dashboardPaciente.php');
                die();
            }else {
                echo "<script>alert('Não foi possível autenticar!')</script>";
                echo "<meta http-equiv='refresh' content='0, url=login.php?t=1'>";
                
            }
        }

        if($_POST['tipo'] == 'professor'){
            $usuarioSuspeito = new Professor();
            $usuarioSuspeito->cpf = $_POST['cpf'];
            $usuarioSuspeito->setPasswd($_POST['senha']);
            if($usuarioSuspeito->auth()){
                $_SESSION['professor'] = $usuarioSuspeito->cpf;
                header('Location: /dashboardProfessor.php');
                die();
            }else {
                echo "<script>alert('Não foi possível autenticar!')</script>";
                echo "<meta http-equiv='refresh' content='0, url=login.php?t=2'>";
            }
        }
    }    

?>