<?php
    require_once '../class/Terapeuta.php';

    function getSituacao($cpf){
        try{
            $retorno;
            $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $result = $db->query("SELECT situacao FROM Terapeutas WHERE cpf = '$cpf'");
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $retorno = $row->situacao;
            }
        } catch (PDOException $exception){
            echo $exception;
            unset($db);
        }
        unset($db);

        return $retorno;
    }

    if(isset($_GET['codigoMat'])){
        try{
            $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $idTerapeuta = $_GET['idTera'];
            $idDisciplina = $_GET['codigoMat'];
            $result = $db->query("INSERT INTO Matriculas (idTerapeuta,idDisciplina,situacao) VALUES ('$idTerapeuta','$idDisciplina','naoAprovado')");
            header('Location: /minhasTurmasTerapeuta.php');
            die();

        } catch (PDOException $exception){
            echo $exception;
            unset($db);
        }
    }

?>