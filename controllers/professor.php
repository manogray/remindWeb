<?php
    $codigo = $_GET['codigo'];
    $id = $_GET['id'];
    if($_GET['op'] == 0){ //DESAPROVAR
        try{
            $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $result = $db->query("UPDATE Matriculas SET situacao = 'nao aprovado' WHERE id='$id'");
            header("Location: /detalhesDisciplina.php?codigo=$codigo");
        }catch(PDOException $exception){
            echo $exception;
            unset($db);
        }
        unset($db);
    }

    if($_GET['op'] == 1){ //APROVAR
        try{
            $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $result = $db->query("UPDATE Matriculas SET situacao = 'aprovado' WHERE id='$id'");
            header("Location: /detalhesDisciplina.php?codigo=$codigo");
        }catch(PDOException $exception){
            echo $exception;
            unset($db);
        }
        unset($db);
    }

?>