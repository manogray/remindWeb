<?php

  $target="Terapia.php";
  if(basename($_SERVER["PHP_SELF"])== $target){
    die("<meta charset='utf-8'><title></title><script>window.location=('/')</script>");
  }
  
  class Terapia{
    public $id;
    public $terapeuta;
    public $paciente;
    public $estado;
    public $sala;
    public $dia;
    public $hora;

    public function fillTerapia(){
        try{
            $db = new PDO("mysql:host=localhost; dbname=remind;charset=utf8", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $result = $db->query("SELECT * FROM Terapias WHERE id = '$this->id'");
            $row = $result->fetch(PDO::FETCH_OBJ);

            $Paciente = new Paciente();
            $Paciente->cpf = $row->idPaciente;
            $Paciente->fillPaciente();

            $Terapeuta = new Terapeuta();
            $Terapeuta->cpf = $row->idTerapeuta;
            $Terapeuta->fillTerapeuta();

            $this->terapeuta = $Terapeuta;
            $this->paciente = $Paciente;

            $this->sala = $row->sala;
            $this->estado = $row->estado;
            $this->dia = $row->dia;
            $this->hora = $row->hora;
        }catch (PDOException $exception){
            unset($db);
            echo $exception;
            die();
        }
    }

    public function salasDisponiveis($numeroDeSalas){
        try{
            $lista = range(1,$numeroDeSalas);
            $db = new PDO("mysql:host=localhost; dbname=remind;charset=utf8", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $result = $db->query("SELECT * FROM Terapias WHERE estado = 'Em tratamento' AND dia = '$this->dia' AND hora = '$this->hora'");
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                if($row->sala != NULL){
                    if (($key = array_search($row->sala, $lista)) !== false) {
                        unset($lista[$key]);
                    }
                }
            }
        }catch(PDOException $exception){
            echo $exception;
            unset($db);
            die();
        }

        return $lista;
    }

    public function listarSessoes(){
        try{
            $lista = [];
            $db = new PDO("mysql:host=localhost; dbname=remind;charset=utf8", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $result = $db->query("SELECT * FROM Sessoes WHERE idTerapia = '$this->id'");
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $SessaoAtual = new Sessao();
                $SessaoAtual->id = $row->id;
                $SessaoAtual->descricao = $row->descricao;
                $SessaoAtual->horaData = $row->horaData;
                $SessaoAtual->terapia = $this;
                $SessaoAtual->categoria = $row->categoria;

                $lista[] = $SessaoAtual;
            }
            unset($db);
            return $lista;

        }catch(PDOException $exception){
            unset($db);
            echo $exception;
            die();
        }
    }

  }
?>