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
        try{
            $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $statement = $db->prepare("INSERT INTO Disciplinas (codigo, nome, periodo, idProfessor) VALUES (:codigo,:nome,:periodo,:idProfessor)");
            $statement->bindValue(':codigo',$this->codigo);
            $statement->bindValue(':codigo',$this->nome);
            $statement->bindValue(':codigo',$this->periodo);
            $statement->bindValue(':codigo',$this->idProfessor);
            $statement->execute();
        } catch (PDOException $exception){
            echo $exception;
            unset($db);
        }

        unset($db);
    }
  }
?>