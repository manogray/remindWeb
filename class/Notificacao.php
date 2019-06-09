<?php

  $target="Notificacao.php";
  if(basename($_SERVER["PHP_SELF"])== $target){
    die("<meta charset='utf-8'><title></title><script>window.location=('/')</script>");
  }
  
  class Notificacao{
    public $emissor;
    public $receptor;
    public $tipo;
    public $mensagem;
    public $dia;
    public $horario;
    public $horaData;
    public $estado;

  }
?>