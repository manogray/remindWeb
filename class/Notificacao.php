<?php

  $target="Notificacao.php";
  if(basename($_SERVER["PHP_SELF"])== $target){
    die("<meta charset='utf-8'><title></title><script>window.location=('/')</script>");
  }
  
  class Notificacao{
    public $id;
    public $emissor;
    public $receptor;
    public $tipo;
    public $mensagem;
    public $dia;
    public $horario;
    public $horaData;
    public $estado;

    public function confirmarAgendamento(){
      try{
        $db = new PDO("mysql:host=localhost; dbname=remind;charset=utf8", "root", "281295");
        $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $resultNot = $db->query("SELECT * FROM Notificacoes WHERE id = '$this->id'");
        $fromNotificacao = $resultNot->fetch(PDO::FETCH_OBJ);
        $db->beginTransaction();
        $statement = $db->prepare("UPDATE Notificacoes SET estado = 'Respondido' WHERE id = :idNot");
        $statement->bindValue(":idNot",$this->id);

        $statement2 = $db->prepare("INSERT INTO Terapias (idTerapeuta, idPaciente, dia, hora, estado) VALUES (:idTera,:idPacient,:dia,:hora,'Não confirmado')");
        $statement2->bindValue(":idTera",$fromNotificacao->emissor);
        $statement2->bindValue(":idPacient",$fromNotificacao->receptor);
        $statement2->bindValue(":dia",$fromNotificacao->dia);
        $statement2->bindValue(":hora",$fromNotificacao->horario);

        $statement->execute();
        $statement2->execute();
        $db->commit();
      } catch (PDOException $exception){
        $db->rollback();
        echo $exception;
        unset($db);
        die();
      }
    }

  }
?>