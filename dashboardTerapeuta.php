<?php

    session_start();
    if(!isset($_SESSION['terapeuta'])){
        header('Location: /login.php?t=0');
        die();
    }

    function listarPacientes(){
        try{
            $lista = [];
            $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $idTerapeuta = $_SESSION['terapeuta'];
            $result = $db->query("SELECT * FROM Terapias WHERE idTerapeuta = '$idTerapeuta'");
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $result = $db->query("SELECT * FROM Pacientes WHERE cpf = '$row->cpf'");
            }
        } catch (PDOException $exception){
            echo $exception;
            unset($db);
        }
        unset($db);

        return $lista;
    }

    $Pacientes;
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include("includes/head.php"); ?>
    </head>

    <body>
        <header>
            <?php include("includes/headerTerapeuta.php") ?>
        </header>

        <section class="main-content">

        <h2 class="titulo-paciente">Meus Pacientes</h2>

        <table>
            <tr>
                <th>Paciente</th>
                <th>status</th>
                <th>sessão</th>
                <th>Sala</th>
                <th>Dia</th>
                <th>Horário</th>
            </tr>
            <tr>
                <td><a class="nome-paciente" href="">Luis Mota</a></td>
                <td>Muito louco</td>
                <td>5421</td>
                <td>1</td>
                <td>Quarta-feira</td>
                <td>10-11hrs</td>
            </tr>
        </table>
          
        </section>
        
    </body>
</html>