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
                            <input type="text" name="senha" id="senha">
                        </div>

                        <div class="form-input">
                            <label for="confirmar" class="required">Confirmar Senha</label>
                            <input type="text" name="confimar" id="confirmar">
                        </div>

                        <div class="form-input">
                            <label for="fezTerapia" class="required">Já fez terapia?</label>
                            <input class="radio-area" type="checkbox" name="check" id="check" value="true"/>Sim
                            <br>
                            <input class="radio-area" type="checkbox" name="check" id="check" value="true"/>Não
                        </div>

                        <div class="form-input">
                            <label for="vinculoResidencial" class="required">Como quem você vive?</label>
                            <textarea class="text-area" rows="8" cols="35" maxlength="500"></textarea>
                        </div>

                        <div class="form-input">
                            <label for="demanda" class="required">Por que gostaria de fazer a psicoterapia?</label>
                            <textarea class="text-area" rows="8" cols="35" maxlength="500"></textarea>
                        </div>

                        <div class="form-input">
                            <label for="demanda" class="required">Como soube do serviço?</label>
                            <textarea class="text-area" rows="8" cols="35" maxlength="500"></textarea>
                        </div>

                        <div class="form-input" style="visibility: hidden;" id="opcao">
                            <label for="demanda" class="required">Local onde fez terapia</label>
                            <textarea class="text-area" rows="8" cols="35" maxlength="500"></textarea>
                        </div>

                    </div>
                </div>
                <div class="form-submit">
                    <input style="margin-bottom: 25px;" type="submit" value="Cadastrar" class="submit" id="submit" name="submit">
                </div>

                <script>
                    $("#check").click(function(){
                        if($(this).val()=="true"){
                            $("#opcao").css("visibility","visible");
                            $(this).val("false");
                            }
                            else{
                                $("#opcao").css("visibility","hidden");
                                $(this).val("true");
                            }
                        });
                </script>   
            </form>
        </div>
    </div>
            
</body>

</html>