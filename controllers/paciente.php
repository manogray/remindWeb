<?php
    require_once("../class/Notificacao.php");

    if(isset($_GET['idNot'])){
        $Notificacao = new Notificacao();
        $Notificacao->id = $_GET['idNot'];
        $Notificacao->confirmarAgendamento();
        header('Location: /dashboardPaciente.php');
    }

?>