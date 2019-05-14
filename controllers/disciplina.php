<?php

    if($_POST['new'] == 'true'){
        $novaDisciplina                 =       new Disciplina();
        $novaDisciplina->codigo         =       $_POST['codigo'];
        $novaDisciplina->nome           =       $_POST['nome'];
        $novaDisciplina->periodo        =       $_POST['periodo'];
        $novaDisciplina->idProfessor    =       $_POST['idProfessor'];

        $novaDisciplina->new();

        header('Location: /professor');
    }


    function listarDisciplinas(){
        try{
            $lista = [];
            $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $result = $db->query("SELECT * FROM Disciplinas");
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $lista[] = $row;
            }
        } catch (PDOException $exception){
            echo $exception;
            unset($db);
        }
        unset($db);

        return $lista;
    }
?>