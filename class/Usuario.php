<?php

  $target="Usuario.php";
  if(basename($_SERVER["PHP_SELF"])== $target){
    die("<meta charset='utf-8'><title></title><script>window.location=('/')</script>");
  }
  
  class Usuario{
    public $cpf;
    public $nome;
    private $senha;
    public $email;
    public $telefone;

    public function setPasswd($senha){
      $this->senha = $senha;
    }
    
    public function getPasswd(){
      return $this->senha;
    }

    public function auth(){
      try {
        $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
        $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $statement = $db->prepare("SELECT senha FROM Usuarios WHERE cpf = :cpf");
        $statement->bindValue(':cpf',$this->cpf);
        $run = $statement->execute();
        $result = $statement->fetch();
        $senha = $this->senha;
        $hashed = $result['senha'];
        if(password_verify($senha,$hashed)){
          return TRUE;
        }else {
          return FALSE;
        }
      } catch(PDOException $exception){
        unset($db);
        echo $exception;
      }
        unset($db);
    }
    
  }

?>