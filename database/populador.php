<?php
    //CRIANDO USUÁRIOS DE TESTE

    $flag=1;

    if($flag==1){
        try {
            $db = new PDO("mysql:host=localhost; dbname=remind", "root", "281295");
            
            $db->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            
            $db->beginTransaction();

                //USER 01
                $senhaEncriptada=password_hash('mimimi',PASSWORD_DEFAULT);
                $resultado=$db->query("INSERT INTO Usuarios (cpf, senha, nome, email, telefone) VALUES ('123','$senhaEncriptada', 'Evaldo Patrik', 'evaldo@patrik.com', '11111-1111')");
                
                //USER 02
                $senhaEncriptada=password_hash('carcaça',PASSWORD_DEFAULT);
                $resultado=$db->query("INSERT INTO Usuarios (cpf, senha, nome, email, telefone) VALUES ('234','$senhaEncriptada', 'Nader Naucher', 'nader@naucher.com', '22222-2222')");

                //USER 03
                $senhaEncriptada=password_hash('soumodesto',PASSWORD_DEFAULT);
                $resultado=$db->query("INSERT INTO Usuarios (cpf, senha, nome, email, telefone) VALUES ('345','$senhaEncriptada', 'Luiz Gonzaga', 'luiz@gonzaga.com', '33333-3333')");

                //USER 04
                $senhaEncriptada=password_hash('ggwp',PASSWORD_DEFAULT);
                $resultado=$db->query("INSERT INTO Usuarios (cpf, senha, nome, email, telefone) VALUES ('456','$senhaEncriptada', 'Jonathas Kerber', 'jonathas@kerber.com', '44444-4444')");

                //USER 05
                $senhaEncriptada=password_hash('coxinha',PASSWORD_DEFAULT);
                $resultado=$db->query("INSERT INTO Usuarios (cpf, senha, nome, email, telefone) VALUES ('567','$senhaEncriptada', 'Edson Filho', 'evaldo@patrik.com', '55555-5555')");

            $db->commit();

        } catch(PDOException $exception){
            $db->rollback();
            unset($db);
            return FALSE;
        }
        
        unset($db);
    }

?>


