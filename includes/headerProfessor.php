<?php

    if(isset($_GET['logout'])){
        if($_GET['logout'] == '0'){
            session_start();
            unset($_SESSION['professor']);
            header('Location: /');
            die();
        }
    }
?>

<div class="logoWrite">
    Re<span style="color: #01aef0;" >Mind</span>
</div>
<div class="optionsMenu">
    <a style="color:#ccc;"  href="/dashboardProfessor.php"><div class="option"> <i style="margin-right: 5px;" class="far fa-list-alt"></i>Disciplinas</div></a>
    <a style="color:#ccc;" href="/dashboardProfessor.php?logout=0"><div class="option"> <i style="margin-right: 5px;" class="fas fa-sign-out-alt"></i> Sair</div></a>
</div>