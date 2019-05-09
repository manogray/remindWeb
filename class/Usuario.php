<?php

  $target="Usuario.php";
  if(basename($_SERVER["PHP_SELF"])== $target){
    die("<meta charset='utf-8'><title></title><script>window.location=('/')</script>");
  }
  
  class Usuario{
    public $cpf;
    public $nome;
    public $senha;
    public $email;
    public $telefone;
    
    public function auth(){
        $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
        $statement = $db->prepare("SELECT * FROM Usuarios WHERE BINARY cpf = :cpf AND BINARY senha = :senha");
        $statement->bindValue(':cpf',$this->$cpf);
        $statement->bindValue(':senha',password_hash($this->$senha,PASSWORD_DEFAULT));
        $run = $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);
        unset($db);
    }
    
  }

?>