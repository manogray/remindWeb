<?php
    require_once "../class/Disciplina.php";

    if($_POST['new'] == 'true'){
        $novaDisciplina                 =       new Disciplina();
        $novaDisciplina->codigo         =       $_POST['codigo'];
        $novaDisciplina->nome           =       $_POST['disciplina'];
        $novaDisciplina->periodo        =       $_POST['periodo'];
        $novaDisciplina->idProfessor    =       $_POST['cpf'];

        if($novaDisciplina->new()){
            header('Location: /professor');
            die();
        }
        
    }

?>