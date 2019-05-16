<?php

  $target="Paciente.php";
  if(basename($_SERVER["PHP_SELF"])== $target){
    die("<meta charset='utf-8'><title></title><script>window.location=('/')</script>");
  }

  require_once "Usuario.php";
  
  class Paciente extends Usuario{
    public $endereco;
    public $disponibilidade;
    public $sexo;
    public $nascimento;
    public $vinculoResidencial;
    public $fezTerapia;
    public $localTerapia;
    public $demanda;
    public $gravidade;
    public $prioridade;

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

        //CRIACAO DE PACIENTE
        $statement2 = $db->prepare("INSERT INTO Pacientes (cpf,endereco,disponibilidade,sexo,nascimento,vinculoResidencial,fezTerapia,localTerapia,demanda,gravidade,prioridade) VALUES (:cpf,:endereco,:disponibilidade,:sexo,:nascimento,:vinculoResidencial,:fezTerapia,:localTerapia,:demanda,:gravidade,:prioridade)");
        $statement2->bindValue(':cpf',$this->cpf);
        $statement2->bindValue(':endereco',$this->endereco);
        $statement2->bindValue(':disponibilidade',$this->disponibilidade);
        $statement2->bindValue(':sexo',$this->sexo);
        $statement2->bindValue(':nascimento',$this->nascimento);
        $statement2->bindValue(':vinculoResidencial',$this->vinculoResidencial);
        $statement2->bindValue(':fezTerapia',$this->fezTerapia);
        $statement2->bindValue(':localTerapia',$this->localTerapia);
        $statement2->bindValue(':demanda',$this->demanda);
        $statement2->bindValue(':gravidade',$this->gravidade);
        $statement2->bindValue(':prioridade',$this->prioridade);
        
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

    public function verifica($cpf){
      try{
        $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
        $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $result = $db->query("SELECT cpf FROM Pacientes WHERE cpf = '$cpf'");
        return $result->rowCount();
        unset($db);
      }catch (PDOException $exception){
        unset($db);
        echo $exception;
      }
    }
  }

?>