<?php

  $target="Disciplina.php";
  if(basename($_SERVER["PHP_SELF"])== $target){
    die("<meta charset='utf-8'><title></title><script>window.location=('/')</script>");
  }
  
  class Disciplina{
    public $codigo;
    public $nome;
    public $periodo;
    public $idProfessor;

    public function new(){
      $retorno = TRUE;
        try{
            $db = new PDO("mysql:host=localhost; dbname=remind; charset=utf8", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $statement = $db->prepare("INSERT INTO Disciplinas (codigo, nome, periodo, idProfessor) VALUES (:codigo,:nome,:periodo,:idProfessor)");
            $statement->bindValue(':codigo',$this->codigo);
            $statement->bindValue(':nome',$this->nome);
            $statement->bindValue(':periodo',$this->periodo);
            $statement->bindValue(':idProfessor',$this->idProfessor);
            $statement->execute();
        } catch (PDOException $exception){
            echo $exception;
            $retorno = FALSE;
            unset($db);
        }

        unset($db);
        return $retorno;
    }
  }
?>