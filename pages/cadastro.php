<!DOCTYPE html>
<html>
<head>
    <?php include("../includes/head.php") ?>
</head>

<body>
    <div class="conteiner-cadastro">
        <div class="box-imagem-left">
            <div class="mensagem">
                <span>"Somos o que pensamos. Tudo o que somos surge com nossos  pensamentos. Com nossos pensamentos, fazemos o nosso mundo."</span>
                <p style="color: white;">Buda</p>
            </div>
        </div>
        <div class="box-form-rigth">
        <h2 class="titulo_cadastro">Faça seu cadastro</h2>
        <form method="POST" class="register-form" id="register-form" novalidate="novalidate">
            <div class="form-row">
                <div class="form-group">
                    <div class="form-input">
                        <label for="first_name" class="required">Nome Completo</label>
                        <input style="width: 400px;" type="text" name="nomeCompleto" id="first_name">
                    </div>
                    <div class="form-input">
                        <label for="company" class="required">Nascimento</label>
                        <input type="date" name="company" id="nascimento">
                    </div>
                    <div class="form-input">
                        <label for="company" class="required">Endereço</label>
                        <input type="text" name="company" id="endereco">
                    </div>
                    <div class="form-input">
                        <label for="email" class="required">Email</label>
                        <input type="email" name="email" id="email">
                    </div>
                    <div class="form-input">
                        <label for="phone_number" class="required">Numero de Telefone</label>
                        <input type="text" name="phone_number" id="phone_number">
                    </div>
                </div>
            </div>
            <div class="form-submit">
                <input type="submit" value="Enviar" class="submit" id="submit" name="submit">
            </div>
        </form>
    </div>
    </div>
            
</body>

</html>