<?php
    require_once '../class/Terapeuta.php';

    function getSituacao($cpf){
        try{
            $retorno;
            $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $result = $db->query("SELECT situacao FROM Terapeutas WHERE cpf = '$cpf'");
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $retorno = $row->situacao;
            }
        } catch (PDOException $exception){
            echo $exception;
            unset($db);
        }
        unset($db);

        return $retorno;
    }

    if(isset($_GET['codigoMat'])){
        try{
            $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $idTerapeuta = $_GET['idTera'];
            $idDisciplina = $_GET['codigoMat'];
            $result = $db->query("INSERT INTO Matriculas (idTerapeuta,idDisciplina,situacao) VALUES ('$idTerapeuta','$idDisciplina','naoAprovado')");
            header('Location: /minhasTurmasTerapeuta.php');
            die();

        } catch (PDOException $exception){
            echo $exception;
            unset($db);
            die();
        }
    }

    if(isset($_POST['dia']) && isset($_POST['horario'])){
        try{
            $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $cpfTera = $_POST['cpfTera'];
            $cpfPacient = $_POST['cpfPacient'];
            $db->beginTransaction();
            //ALTERAR ESTADO DO PACIENTE
            $statement = $db->prepare("UPDATE Pacientes SET estado = 'Em contato' WHERE cpf = :cpfPacient");
            $statement->bindValue(':cpfPacient',$cpfPacient);
            //CRIA INSTANCIA DE NOTIFICACAO
            $statement2 = $db->prepare("INSERT INTO Notificacoes (tipo, dia, horario, emissor, receptor, horaData, estado) VALUES ('Agendar',:dia,:horario,:emissor,:receptor,:horaData,'Pendente')");
            $statement2->bindValue(':dia',$_POST['dia']);
            $statement2->bindValue(':horario',$_POST['horario']);
            $statement2->bindValue(':emissor',$cpfTera);
            $statement2->bindValue(':receptor',$cpfPacient);
            $statement2->bindValue(':horaData',date('Y-m-d H:m:s'));


            $statement->execute();
            $statement2->execute();
            $db->commit();

            header('Location: /dashboardTerapeuta.php');
            die();
        } catch (PDOException $exception){
            echo $exception;
            $db->rollback();
            unset($db);
            die();
        }
    }

?>