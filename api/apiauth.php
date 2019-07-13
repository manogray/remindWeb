<?php
    //key A72BCAA68639C0760076536483E1BB67E00B02DA17651CCBD30B04580B994514

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: *');

    function apiauth($apiKey){
        try{
            $resposta = FALSE;
            $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $statement = $db->prepare("SELECT * FROM Devs WHERE apiKey = :apiKey");
            $statement->bindValue(':apiKey',$apiKey);
            $statement->execute();
            if(count($statement->fetchAll()) == 1){
                $resposta = TRUE;
            }
            unset($db);
            return $resposta;
        }catch(PDOException $exception){
            echo $exception;
            unset($db);
            die();
        }
    }
?>