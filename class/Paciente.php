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
    public $estado;

    public function register(){
      try {
        $db = new PDO("mysql:host=localhost; dbname=remind;charset=utf8", "root", "281295");
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
        $statement2 = $db->prepare("INSERT INTO Pacientes (cpf,endereco,disponibilidade,sexo,nascimento,vinculoResidencial,fezTerapia,localTerapia,demanda,gravidade,prioridade,estado) VALUES (:cpf,:endereco,:disponibilidade,:sexo,:nascimento,:vinculoResidencial,:fezTerapia,:localTerapia,:demanda,:gravidade,:prioridade,:estado)");
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
        $statement2->bindValue(':estado',$this->estado);
        
        $statement->execute();
        $statement2->execute();
        $db->commit();
      } catch (PDOException $exception){
        $db->rollback();
        unset($db);
        //echo $exception;
        echo "<script>alert('ERRO: CPF já cadastrado!')</script>";
        echo "<meta http-equiv='refresh' content='0, url=../cadastroPaciente.php?t=0'>";
        die();
      }
      unset($db);
    }

    public function verifica($cpf){
      try{
        $db = new PDO("mysql:host=localhost; dbname=remind;charset=utf8", "root", "281295");
        $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $result = $db->query("SELECT cpf FROM Pacientes WHERE cpf = '$cpf'");
        return $result->rowCount();
        unset($db);
      }catch (PDOException $exception){
        unset($db);
        echo $exception;
        die();
      }
    }

    public function fillPaciente(){
      try{
        $db = new PDO("mysql:host=localhost; dbname=remind;charset=utf8", "root", "281295");
        $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $resultUser = $db->query("SELECT * FROM Usuarios WHERE cpf = '$this->cpf'");
        $rowUser = $resultUser->fetch(PDO::FETCH_OBJ);
        $this->nome = $rowUser->nome;
        $this->email = $rowUser->email;
        $this->telefone = $rowUser->telefone;

        $resultPacient = $db->query("SELECT * FROM Pacientes WHERE cpf = '$this->cpf'");
        $rowPacient = $resultPacient->fetch(PDO::FETCH_OBJ);
        $this->endereco = $rowPacient->endereco;
        $this->disponibilidade = json_decode($rowPacient->disponibilidade);
        $this->sexo = $rowPacient->sexo;
        $this->nascimento = $rowPacient->nascimento;
        $this->vinculoResidencial = $rowPacient->vinculoResidencial;
        $this->fezTerapia = $rowPacient->fezTerapia;
        $this->localTerapia = $rowPacient->localTerapia;
        $this->demanda = $rowPacient->demanda;
        $this->gravidade = $rowPacient->gravidade;
        $this->prioridade = $rowPacient->prioridade;
        $this->estado = $rowPacient->estado;
      }catch (PDOException $exception){
        unset($db);
        echo $exception;
        die();
      }
    }
    
    public function updatePaciente(){
      try {
        $db = new PDO("mysql:host=localhost; dbname=remind;charset=utf8", "root", "281295");
        $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $db->beginTransaction();
        //MANDANDO DADOS ATUALIZADOS
        $statement1 = $db->prepare("UPDATE Usuarios SET nome=:nome, email=:email, telefone=:telefone WHERE cpf=:cpf");       
        
        $statement1->bindValue(':cpf',$this->cpf);
        $statement1->bindValue(':nome',$this->nome);
        $statement1->bindValue(':email',$this->email);
        $statement1->bindValue(':telefone',$this->telefone);

        $statement2 = $db->prepare("UPDATE Pacientes SET endereco=:endereco, vinculoResidencial=:vinculoResidencial, demanda=:demanda, sexo=:sexo, nascimento=:nascimento WHERE cpf=:cpf");
        
        $statement2->bindValue(':cpf',$this->cpf);
        $statement2->bindValue(':endereco',$this->endereco);
        $statement2->bindValue(':vinculoResidencial',$this->vinculoResidencial);
        $statement2->bindValue(':demanda',$this->demanda);
        $statement2->bindValue(':sexo',$this->sexo);
        $statement2->bindValue(':nascimento',$this->nascimento);

        $statement1->execute();
        $statement2->execute();        
        $db->commit();
      } catch (PDOException $exception){
        $db->rollback();
        unset($db);
        echo $exception;
        die();
      }
      unset($db);
    }

    public function listarNotificacoes(){
      try{
        $lista = [];
        $db = new PDO("mysql:host=localhost; dbname=remind;charset=utf8", "root", "281295");
        $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $result = $db->query("SELECT * FROM Notificacoes WHERE receptor = '$this->cpf' ORDER BY id DESC");
        while($row = $result->fetch(PDO::FETCH_OBJ)){
          $notificacao = new Notificacao();
          $notificacao->id = $row->id;
          $notificacao->tipo = $row->tipo;
          $notificacao->dia = $row->dia;
          $notificacao->horario = $row->horario;
          $notificacao->horaData = $row->horaData;
          $notificacao->estado = $row->estado;
          $notificacao->mensagem = $row->mensagem;
          $notificacao->receptor = $this;  
          $resultTera = $db->query("SELECT * FROM Usuarios WHERE cpf = '$row->emissor'");
          $rowTera = $resultTera->fetch(PDO::FETCH_OBJ);
          $paciente = new Terapeuta();
          $paciente->nome = $rowTera->nome;
          $paciente->email = $rowTera->email;
          $paciente->telefone = $rowTera->telefone;
          $notificacao->emissor = $paciente;

          $lista[] = $notificacao;
        }

      } catch (PDOException $exception){
        echo $exception;
        unset($db);
        die();
      }

      return $lista;
    }
  }

?>