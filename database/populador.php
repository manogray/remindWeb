<?php
    //CRIANDO USUÁRIOS DE TESTE

    $flag=1;

    if($flag==1){
        try {
            $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
            
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            
            $db->beginTransaction();

                //USER 01 - PACIENTE
                $senhaEncriptada=password_hash('mimimi',PASSWORD_DEFAULT);
                $resultado=$db->query("INSERT INTO Usuarios (cpf, senha, nome, email, telefone) VALUES ('123','$senhaEncriptada', 'Evaldo Patrik', 'evaldo@patrik.com', '11111-1111')");

                $disponibilidade=['disponibilidade'];
                $disponibilidade=json_encode($disponibilidade);
                $resultado=$db->query("INSERT INTO Pacientes (cpf, endereco, disponibilidade, sexo, nascimento, vinculoResidencial, fezTerapia, localTerapia, demanda, gravidade, prioridade, estado) VALUES ('123','CIDADE NOVA', '$disponibilidade', 'MASCULINO','1010-10-10', 'MAMÃE',0, '', 'PORQUE MAMÃE MANDOU', '', 0, Diponível)");
                
                //USER 02 - PACIENTE
                $senhaEncriptada=password_hash('carcaça',PASSWORD_DEFAULT);
                $resultado=$db->query("INSERT INTO Usuarios (cpf, senha, nome, email, telefone) VALUES ('234','$senhaEncriptada', 'Nader Naucher', 'nader@naucher.com', '22222-2222')");

                $disponibilidade=['disponibilidade'];
                $disponibilidade=json_encode($disponibilidade);
                $resultado=$db->query("INSERT INTO Pacientes (cpf, endereco, disponibilidade, sexo, nascimento, vinculoResidencial, fezTerapia, localTerapia, demanda, gravidade, prioridade, estado) VALUES ('234','SÃO JORGE', '$disponibilidade', 'MASCULINO','1111-11-11', 'PAPAI',1, '', 'PORQUE EU QUIS', '', 0, Disponível)");

                //USER 03 - TERAPEUTA ALUNO
                $senhaEncriptada=password_hash('soumodesto',PASSWORD_DEFAULT);
                $resultado=$db->query("INSERT INTO Usuarios (cpf, senha, nome, email, telefone) VALUES ('345','$senhaEncriptada', 'Luiz Gonzaga', 'luiz@gonzaga.com', '33333-3333')");

                $disponibilidade=['disponibilidade'];
                $disponibilidade=json_encode($disponibilidade);
                $resultado=$db->query("INSERT INTO Terapeutas (cpf, disponibilidade, crp, registroMatricula) VALUES ('345','$disponibilidade', NULL, '345345')");

                //USER 04 - TERAPEUTA VOLUNTARIO
                $senhaEncriptada=password_hash('cacheman',PASSWORD_DEFAULT);
                $resultado=$db->query("INSERT INTO Usuarios (cpf, senha, nome, email, telefone) VALUES ('456','$senhaEncriptada', 'Jonathas Kerber', 'jonathas@kerber.com', '44444-4444')");

                $disponibilidade=['disponibilidade'];
                $disponibilidade=json_encode($disponibilidade);
                $resultado=$db->query("INSERT INTO Terapeutas (cpf, disponibilidade, crp, registroMatricula) VALUES ('456','$disponibilidade','456456', NULL)");

                //USER 05 - PROFESSOR
                $senhaEncriptada=password_hash('coxinha',PASSWORD_DEFAULT);
                $resultado=$db->query("INSERT INTO Usuarios (cpf, senha, nome, email, telefone) VALUES ('567','$senhaEncriptada', 'Edson Filho', 'evaldo@patrik.com', '55555-5555')");

                $resultado=$db->query("INSERT INTO Professores (cpf) VALUES ('567')");

            $db->commit();

        } catch(PDOException $exception){
            $db->rollback();
            echo $exception;
            unset($db);
            return FALSE;
        }
        
        unset($db);
    }

?>


