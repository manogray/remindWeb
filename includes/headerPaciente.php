<?php

    if(isset($_GET['logout'])){
        if($_GET['logout'] == '0'){
            session_start();
            unset($_SESSION['paciente']);
            header('Location: /');
            die();
        }
    }
?>

<div class="logoWrite">
    Re<span style="color: #01aef0;" >Mind</span>
</div>
<div class="optionsMenu">
    <a style="color:#ccc;"  href="profilePaciente.php"><div class="option"> <i style="margin-right: 9px;" class="far fa-id-badge"></i>  Meu Perfil</div></a>
    <a style="color:#ccc;"  href="dashboarPaciente.php"><div class="option"> <i style="margin-right: 9px;" class="far fa-list-alt"></i>  Minhas Notificações</div></a>
    <a style="color:#ccc;" href="dashboardPaciente.php?logout=0"><div class="option"> <i style="margin-right: 5px;" class="fas fa-sign-out-alt"></i> Sair</div></a>
</div>