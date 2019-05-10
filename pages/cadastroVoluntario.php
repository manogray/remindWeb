<!DOCTYPE html>
<html>
<head>
    <?php include("includes/head.php") ?>
</head>

<body>
    <div class="conteiner-cadastro">
        <div class="box-imagem-left">
            <div class="mensagem">
                <span>"Nós poderíamos ser muito melhores se não quiséssemos ser tão bons."</span>
                <p style="color: white;">Sigmund Freud</p>
            </div>
        </div>
        <div class="box-form-rigth">
            <h2 class="titulo_cadastro">Faça seu cadastro</h2>
            <form method="POST" class="register-form" id="register-form" novalidate="novalidate">
                <div class="form-row">
                    <div class="form-group">
                        <div class="form-input">
                            <label for="senha" class="required">Matrícula</label>
                            <input type="password" name="matricula" id="matricula">
                        </div>

                        <div class="form-input">
                            <label for="confirmar" class="required">CRP</label>
                            <input type="text" name="crp" id="matricula">
                        </div>

                        <div class="form-input">
                            <label for="nome" class="required">Nome Completo</label>
                            <input style="width: 400px;" type="text" name="nome" id="nome">
                        </div>
                        <div class="form-input">
                            <label for="nascimento" class="required">Nascimento</label>
                            <input type="date" name="nascimento" id="nascimento">
                        </div>

                        <div class="form-input">
                            <label for="endereco" class="required">Endereço</label>
                            <input style="width: 400px;" type="text" name="endereco" id="endereco">
                        </div>

                        <div class="form-input">
                            <label for="sexo" class="required">Sexo</label>
                            <input class="radio-area" type="radio" name="opcao" value="opc1" id="sexo">Masculino
                            <input class="radio-area" type="radio" name="opcao" value="opc2" id="sexo">Feminino
                        </div>

                        <div class="form-input">
                            <label for="email" class="required">Email</label>
                            <input style="width: 400px;" type="email" name="email" id="email">
                        </div>
                        <div class="form-input">
                            <label for="telefone" class="required">Telefone</label>
                            <input type="text" name="telefone" id="telefone">
                        </div>

                        <div class="form-input">
                            <label for="senha" class="required">Senha</label>
                            <input type="password" name="senha" id="senha">
                        </div>

                        <div class="form-input">
                            <label for="confirmar" class="required">Confirmar Senha</label>
                            <input type="password" name="confimar" id="confirmar">
                        </div>

                    <div class="form-input">
                        
                </div>
                <div class="form-submit">
                    <input style="margin-bottom: 25px;" type="submit" value="Cadastrar" class="submit" id="submit" name="submit">
                </div>
            </form>
        </div>
    </div>
            
</body>

</html>