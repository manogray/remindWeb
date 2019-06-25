<?php

  $target="Sessao.php";
  if(basename($_SERVER["PHP_SELF"])== $target){
    die("<meta charset='utf-8'><title></title><script>window.location=('/')</script>");
  }
  
  class Sessao{
    public $id;
    public $descricao;
    public $horaData;
    public $terapia;
    public $categoria;

  }
?>