<?php

  $target="Terapeuta.php";
  if(basename($_SERVER["PHP_SELF"])== $target){
    die("<meta charset='utf-8'><title></title><script>window.location=('/')</script>");
  }

  require_once "Usuario.php";
  
  class Terapeuta extends Usuario{
    public $disponibilidade;
    public $crp;
    public $registroMatricula;

    public function register(){
      $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
      $db->beginTransaction();
      //CRIACAO DE USUARIO
      $statement = $db->prepare("INSERT INTO Usuarios (cpf,nome,senha,email,telefone) VALUES (:cpf,:nome,:senha,:email,:telefone)");
      $statement->bindValue(':cpf',parent::$cpf);
      $statement->bindValue(':nome',parent::$nome);
      $statement->bindValue(':senha',password_hash(parent::getPasswd(),PASSWORD_DEFAULT));
      $statement->bindValue(':email',parent::$email);
      $statement->bindValue(':telefone',parent::$telefone);
      $run = $statement->execute();
      if(!$run){
        $db->rollback();
      }
      //CRIACAO DE TERAPEUTA
      $statement2 = $db->prepare("INSERT INTO Terapeutas (cpf,disponibilidade,crp,registroMatricula) VALUES (:cpf,:disponibilidade,:crp,:registroMatricula)");
      $statement2->bindValue(':cpf',parent::$cpf);
      $statement2->bindValue(':disponibilidade',$this->disponibilidade);
      $statement2->bindValue(':crp',$this->crp);
      $statement2->bindValue(':registroMatricula',$this->registroMatricula);
      $run2 = $statement2->execute();
      if(!$run2){
        $db->rollback();
      }
      $db->commit();

      unset($db);
    }
  }

?>