<?php

    if(isset($_GET['logout'])){
        if($_GET['logout'] == '0'){
            session_start();
            unset($_SESSION['terapeuta']);
            header('Location: /');
            die();
        }
    }
?>

<div class="logoWrite">
    Re<span style="color: #01aef0;" >Mind</span>
</div>
<div class="optionsMenu">
    <a style="color:#ccc;"  href="/terapeuta/meuperfil"><div class="option"> <i style="margin-right: 9px;" class="far fa-id-badge"></i>  Meu Perfil</div></a>
    <a style="color:#ccc;"  href="/terapeuta"><div class="option"> <i style="margin-right: 5px;" class="far fa-list-alt"></i> Meus Pacientes</div></a>
    <a style="color:#ccc;"  href="/terapeuta/minhasturmas"><div class="option"> <i style="margin-right: 5px;" class="fas fa-notes-medical"></i> Minhas Turmas</div></a>
    <a style="color:#ccc;" href="/terapeuta/0"><div class="option"> <i style="margin-right: 5px;" class="fas fa-sign-out-alt"></i> Sair</div></a>
</div>