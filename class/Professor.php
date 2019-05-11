<?php

  $target="Professor.php";
  if(basename($_SERVER["PHP_SELF"])== $target){
    die("<meta charset='utf-8'><title></title><script>window.location=('/')</script>");
  }

  require_once "Usuario.php";
  
  class Professor extends Usuario{

    public function register(){
      try {
        $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
        $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $db->beginTransaction();
        //CRIACAO DE USUARIO
        $statement = $db->prepare("INSERT INTO Usuarios (cpf,nome,senha,email,telefone) VALUES (:cpf,:nome,:senha,:email,:telefone)");
        $statement->bindValue(':cpf',$this->cpf);
        $statement->bindValue(':nome',$this->nome);
        $hashPass = password_hash($this->getPasswd(),PASSWORD_DEFAULT);
        $statement->bindValue(':senha',$hashPass);
        $statement->bindValue(':email',$this->email);
        $statement->bindValue(':telefone',$this->telefone);
        
        //CRIACAO DE TERAPEUTA
        $statement2 = $db->prepare("INSERT INTO Professores (cpf) VALUES (:cpf)");
        $statement2->bindValue(':cpf',$this->cpf);
        
        $statement->execute();
        $statement2->execute();

        $db->commit();
      } catch (PDOException $exception){
        $db->rollback();
        unset($db);
        echo $exception;
      }

      unset($db);
    }
  }

?>