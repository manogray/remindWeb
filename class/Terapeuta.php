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
    public $situacao;

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
        
        //CRIACAO DE TERAPEUTA
        $statement2 = $db->prepare("INSERT INTO Terapeutas (cpf,disponibilidade,crp,registroMatricula,situacao) VALUES (:cpf,:disponibilidade,:crp,:registroMatricula,:situacao)");
        $statement2->bindValue(':cpf',$this->cpf);
        $statement2->bindValue(':disponibilidade',$this->disponibilidade);
        $statement2->bindValue(':crp',$this->crp);
        $statement2->bindValue(':registroMatricula',$this->registroMatricula);
        $statement2->bindValue(':situacao',$this->situacao);
        
        $statement->execute();
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

    public function update(){
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
        
        //CRIACAO DE TERAPEUTA
        $statement2 = $db->prepare("INSERT INTO Terapeutas (cpf,disponibilidade,crp,registroMatricula,situacao) VALUES (:cpf,:disponibilidade,:crp,:registroMatricula,:situacao)");
        $statement2->bindValue(':cpf',$this->cpf);
        $statement2->bindValue(':disponibilidade',$this->disponibilidade);
        $statement2->bindValue(':crp',$this->crp);
        $statement2->bindValue(':registroMatricula',$this->registroMatricula);
        $statement2->bindValue(':situacao',$this->situacao);
        
        $statement->execute();
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

    public function verifica($cpf){
      try{
        $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
        $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $result = $db->query("SELECT cpf FROM Terapeutas WHERE cpf = '$cpf'");
        return $result->rowCount();
        unset($db);
      }catch (PDOException $exception){
        unset($db);
        echo $exception;
        die();
      }
    }

    function listarPacientes(){
      try{
          $lista = [];
          $db = new PDO("mysql:host=localhost; dbname=remind;charset=utf8", "root", "281295");
          $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
          $result = $db->query("SELECT * FROM Terapias WHERE idTerapeuta = '$this->cpf'");
          while($row = $result->fetch(PDO::FETCH_OBJ)){
              $resultUser = $db->query("SELECT * FROM Usuarios WHERE cpf = '$row->idPaciente'");
              $rowUser = $resultUser->fetch(PDO::FETCH_OBJ);

              $novoPaciente               = new Paciente();
              $novoPaciente->cpf          = $rowUser->cpf;
              $novoPaciente->nome         = $rowUser->nome;
              $novoPaciente->email        = $rowUser->email;
              $novoPaciente->telefone     = $rowUser->telefone;
              
              $resultPacient = $db->query("SELECT * FROM Pacientes WHERE cpf = '$row->idPaciente'");
              $rowPacient = $resultPacient->fetch(PDO::FETCH_OBJ);

              $novoPaciente->endereco                 = $rowPacient->endereco; 
              $novoPaciente->disponibilidade          = json_decode($rowPacient->disponibilidade); 
              $novoPaciente->sexo                     = $rowPacient->sexo; 
              $novoPaciente->nascimento               = $rowPacient->nascimento; 
              $novoPaciente->vinculoResidencial       = $rowPacient->vinculoResidencial; 
              $novoPaciente->fezTerapia               = $rowPacient->fezTerapia; 
              $novoPaciente->localTerapia             = $rowPacient->localTerapia; 
              $novoPaciente->demanda                  = $rowPacient->demanda; 
              $novoPaciente->gravidade                = $rowPacient->gravidade; 
              $novoPaciente->prioridade               = $rowPacient->prioridade;
              
              $lista[] = $novoPaciente;

          }
      } catch (PDOException $exception){
          echo $exception;
          unset($db);
          die();
      }
      unset($db);

      return $lista;
    }

    function matchMachine(){
      try{
        $lista = [];
        $db = new PDO("mysql:host=localhost; dbname=remind;charset=utf8", "root", "281295");
        $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $result = $db->query("SELECT * FROM Terapeutas WHERE cpf = '$this->cpf'");
        $row = $result->fetch(PDO::FETCH_OBJ);
        $this->disponibilidade = json_decode($row->disponibilidade);
        $resultPacient = $db->query("SELECT * FROM Pacientes WHERE estado = 'Disponível' AND gravidade != 'Não Avaliado'");
        while($rowPacient = $resultPacient->fetch(PDO::FETCH_OBJ)){ 
          $dispoPacient = json_decode($rowPacient->disponibilidade);
          if(is_array($dispoPacient)){
            continue;
          }
          
          $deuMatch = FALSE;

          if($dispoPacient->Seg->inicio != '' && $this->disponibilidade->Seg->inicio != ''){
            if( ($dispoPacient->Seg->inicio >= $this->disponibilidade->Seg->inicio) && ($dispoPacient->Seg->inicio < $this->disponibilidade->Seg->fim) ){
              $deuMatch = TRUE;
            }
          }

          if($dispoPacient->Ter->inicio != '' && $this->disponibilidade->Ter->inicio != ''){
            if(!$deuMatch && (($dispoPacient->Ter->inicio >= $this->disponibilidade->Ter->inicio) && ($dispoPacient->Ter->inicio < $this->disponibilidade->Ter->fim)) ){
              $deuMatch = TRUE;
            }
          }

          if($dispoPacient->Qua->inicio != '' && $this->disponibilidade->Qua->inicio != ''){
            if(!$deuMatch && (($dispoPacient->Qua->inicio >= $this->disponibilidade->Qua->inicio) && ($dispoPacient->Qua->inicio < $this->disponibilidade->Qua->fim)) ){
              $deuMatch = TRUE;
            }
          }

          if($dispoPacient->Qui->inicio != '' && $this->disponibilidade->Qui->inicio != ''){
            if(!$deuMatch && (($dispoPacient->Qui->inicio >= $this->disponibilidade->Qui->inicio) && ($dispoPacient->Qui->inicio < $this->disponibilidade->Qui->fim)) ){
              $deuMatch = TRUE;
            }
          }

          if($dispoPacient->Sex->inicio != '' && $this->disponibilidade->Sex->inicio != ''){
            if(!$deuMatch && (($dispoPacient->Sex->inicio >= $this->disponibilidade->Sex->inicio) && ($dispoPacient->Sex->inicio < $this->disponibilidade->Sex->fim)) ){
              $deuMatch = TRUE;
            }
          }

          if($deuMatch){
            $resultUser = $db->query("SELECT * FROM Usuarios WHERE cpf = '$rowPacient->cpf'");
            $rowUser = $resultUser->fetch(PDO::FETCH_OBJ);
            $pacienteMatch                        = new Paciente();
            $pacienteMatch->cpf                   = $rowUser->cpf; 
            $pacienteMatch->nome                  = $rowUser->nome; 
            $pacienteMatch->email                 = $rowUser->email; 
            $pacienteMatch->telefone              = $rowUser->telefone; 
            $pacienteMatch->endereco              = $rowPacient->endereco; 
            $pacienteMatch->disponibilidade       = $dispoPacient; 
            $pacienteMatch->sexo                  = $rowPacient->sexo; 
            $pacienteMatch->nascimento            = $rowPacient->nascimento; 
            $pacienteMatch->vinculoResidencial    = $rowPacient->vinculoResidencial; 
            $pacienteMatch->fezTerapia            = $rowPacient->fezTerapia; 
            $pacienteMatch->localTerapia          = $rowPacient->localTerapia; 
            $pacienteMatch->demanda               = $rowPacient->demanda; 
            $pacienteMatch->gravidade             = $rowPacient->gravidade; 
            $pacienteMatch->prioridade            = $rowPacient->prioridade; 
            $pacienteMatch->estado                = $rowPacient->estado; 
            $lista[] = $pacienteMatch;
          }

        }
      } catch (PDOException $exception){
        echo $exception;
        unset($db);
        die();
      }

      unset($db);
      return $lista;
    }

    public function buscaTerapeuta(){
      try{
        $terapeutaInfo = new Terapeuta();

        $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
        $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

        $idTerapeuta = $_SESSION['terapeuta'];

        $result = $db->query("SELECT * FROM Usuarios WHERE cpf = '$idTerapeuta'");
        $fromUsuarios = $result->fetch(PDO::FETCH_OBJ);
        
        $terapeutaInfo->nome = $fromUsuarios->nome;
        $terapeutaInfo->cpf = $fromUsuarios->cpf;
        $terapeutaInfo->senha = $fromUsuarios->senha;
        $terapeutaInfo->email = $fromUsuarios->email;
        $terapeutaInfo->telefone = $fromUsuarios->telefone;

        $result = $db->query("SELECT * FROM Terapeutas WHERE cpf = '$idTerapeuta'");
        $fromTerapeutas = $result->fetch(PDO::FETCH_OBJ); 

        $terapeutaInfo->registroMatricula = $fromTerapeutas->registroMatricula;
        $terapeutaInfo->situacao = $fromTerapeutas->situacao;
        $terapeutaInfo->disponibilidade = $fromTerapeutas->disponibilidade;

      } catch (PDOException $exception){
          echo $exception;
          unset($db);
      }
      unset($db);

      return $terapeutaInfo;
    }
    
    public function updateTerapeuta(){
      try {
        $db = new PDO("mysql:host=localhost; dbname=remind;charset=utf8", "root", "281295");
        $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $db->beginTransaction();
        //MANDANDO DADOS ATUALIZADOS
        $statement = $db->prepare("UPDATE Usuarios SET nome=:nome, email=:email, telefone=:telefone WHERE  cpf=:cpf");
        
        $statement->bindValue(':cpf',$this->cpf);
        $statement->bindValue(':nome',$this->nome);
        $statement->bindValue(':email',$this->email);
        $statement->bindValue(':telefone',$this->telefone);
        
        $statement->execute();
        
        $db->commit();
      } catch (PDOException $exception){
          $db->rollback();
          unset($db);
          echo $exception;
          die();
      }
      unset($db);
    }
  }
?>