<?php
    require_once '../class/Terapeuta.php';
    require_once '../class/Paciente.php';
    require_once '../class/Terapia.php';
    require_once '../class/Notificacao.php';

    function getSituacao($cpf){
        try{
            $retorno;
            $db = new PDO("mysql:host=localhost; dbname=remind;charset=utf8", "root", "281295");
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
            $db = new PDO("mysql:host=localhost; dbname=remind;charset=utf8", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $idTerapeuta = $_GET['idTera'];
            $idDisciplina = $_GET['codigoMat'];
            $result = $db->query("INSERT INTO Matriculas (idTerapeuta,idDisciplina,situacao) VALUES ('$idTerapeuta','$idDisciplina','Não Aprovado')");
            header('Location: /minhasTurmasTerapeuta.php');
            die();

        } catch (PDOException $exception){
            echo $exception;
            unset($db);
            die();
        }
    }

    if(isset($_POST['confirmarTerapia']) && !empty($_POST['sala'])){
        try{
            $db = new PDO("mysql:host=localhost; dbname=remind;charset=utf8", "root", "281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $db->beginTransaction();
            $statement = $db->prepare("UPDATE Terapias SET estado = 'Em tratamento', sala = :sala WHERE id = :idTherapy");
            $statement->bindValue(":sala",$_POST['sala']);
            $statement->bindValue(":idTherapy",$_POST['idTherapy']);

            $Terapia = new Terapia();
            $Terapia->id = $_POST['idTherapy'];
            $Terapia->fillTerapia();
            $statement2 = $db->prepare("INSERT INTO Notificacoes (tipo, emissor, receptor, mensagem, estado, horaData) VALUES ('Mensagem','001',:idPacient,:mensagem,'Respondido',:horaData)");
            $statement2->bindValue(":idPacient",$Terapia->paciente->cpf);
            $statement2->bindValue(":horaData",date('Y-m-d H:m:s'));
            $mensagem = "Seu tratamento foi confirmado pelo terapeuta. Será ".$Terapia->dia." ás ".$Terapia->hora.".";
            $statement2->bindValue(":mensagem",$mensagem);

            $statement->execute();
            $statement2->execute();
            $db->commit();
            header('Location: /dashboardTerapeuta.php');
            die();
        }catch(PDOException $exception){
            $db->rollback();
            echo $exception;
            unset($db);
            die();
        }
    }

    if(isset($_POST['registroSessao']) && $_POST['registroSessao'] == 'atl'){
        try{
            $db = new PDO("mysql:host=localhost; dbname=remind;charset=utf8","root","281295");
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            $statement = $db->prepare("INSERT INTO Sessoes (descricao,horaData,idTerapia,categoria) VALUES (:descricao,:horaData,:idTerapia,:categoria)");
            $statement->bindValue(":descricao",$_POST['descricao']);
            $statement->bindValue(":horaData",date("Y-m-d H:m:s"));
            $statement->bindValue(":idTerapia",$_POST['idTherapy']);
            $statement->bindValue(":categoria",$_POST['categoria']);
            $statement->execute();
            header('Location: /verSessoes.php?id='.$_POST['idTherapy']);
            die();
        } catch(PDOException $exception){
            unset($db);
            echo $exception;
            die();
        }
    }

    if(isset($_POST['dia']) && isset($_POST['horario'])){
        try{
            $db = new PDO("mysql:host=localhost; dbname=remind;charset=utf8", "root", "281295");
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