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
            <form method="POST" class="register-form" id="register-form" action="controllers/register.php">
                <div class="form-row">
                    <div class="form-group">
                        <div class="form-input">
                            <label for="nome" class="required">Nome Completo</label>
                            <input style="width: 400px;" type="text" name="nome" id="nome" required>
                        </div>
                        <div class="form-input">
                            <label for="cpf" class="required">CPF</label>
                            <input style="width: 200px;" type="text" name="cpf" id="cpf" required>
                        </div>
                        <div class="form-input">
                            <label for="nascimento" class="required">Nascimento</label>
                            <input type="date" name="nascimento" id="nascimento" required>
                        </div>

                        <div class="form-input">
                            <label for="sexo" class="required">Sexo</label>
                            <input class="radio-area" type="radio" name="sexo" required value="masculino">Masculino
                            <input class="radio-area" type="radio" name="sexo" required value="feminino">Feminino
                        </div>

                        
                        <div class="form-input">
                            <label for="endereco" class="required">Endereço</label>
                            <input style="width: 400px;" type="text" name="endereco" id="endereco" required>
                        </div>

                        

                        <div class="form-input">
                            <label for="email" class="required">Email</label>
                            <input style="width: 400px;" type="email" name="email" id="email" required>
                        </div>
                        <div class="form-input">
                            <label for="telefone" class="required">Telefone</label>
                            <input type="text" name="telefone" id="telefone" required>
                        </div>                       

                        <div class="cafe"> 
                            <div class="form-input">
                                <label for="fezTerapia" class="required">Já fez terapia?</label>
                                <input class="radio-area" type="radio" required name="fezTerapia" id="sim" value="true"/>Sim
                                <br>
                                <input class="radio-area" type="radio" required name="fezTerapia" id="nao" value="false"/>Não
                            </div>

                            <div class="form-input alinha" id="opcao" style="display:none" >
                                <label for="demanda" class="required">Local onde fez terapia</label>
                                <input type="text" name="localTerapia" id="localTerapia" required>
                            </div>
                        </div>

                        <div class="form-input">
                            <label for="vinculoResidencial" class="required">Com quem você vive?</label>
                            <textarea name="vinculoResidencial" required class="text-area" rows="5" cols="35" maxlength="500"></textarea>
                        </div>

                        <div class="form-input">
                            <label for="demanda" class="required">Por que gostaria de fazer a psicoterapia?</label>
                            <textarea class="text-area" name="demanda" required rows="5" cols="35" maxlength="500"></textarea>
                        </div>

                        <div class="quadroHorarios">
                            <label class="required" style="width: 100%;">Disponibilidade</label>
                            <div class="dia">
                                <span>Segunda-feira</span>
                                <div style="display: flex;">
                                    <input type="time" name="timeSegIni">
                                    <span style="margin: 0px 6px;">às</span>
                                    <input type="time" name="timeSegFim">
                                </div>
                            </div>
                            <div class="dia">
                                <span>Terça-feira</span>
                                <div style="display: flex;">
                                    <input type="time" name="timeTerIni">
                                    <span style="margin: 0px 6px;">às</span>
                                    <input type="time" name="timeTerFim">
                                </div>
                            </div>
                            <div class="dia">
                                <span>Quarta-feira</span>
                                <div style="display: flex;">
                                    <input type="time" name="timeQuaIni">
                                    <span style="margin: 0px 6px;">às</span>
                                    <input type="time" name="timeQuaFim">
                                </div>
                            </div>
                            <div class="dia">
                                <span>Quinta-feira</span>
                                <div style="display: flex;">
                                    <input type="time" name="timeQuiIni">
                                    <span style="margin: 0px 6px;">às</span>
                                    <input type="time" name="timeQuiFim">
                                </div>
                            </div>
                            <div class="dia">
                                <span>Sexta-feira</span>
                                <div style="display: flex;">
                                    <input type="time" name="timeSexIni">
                                    <span style="margin: 0px 6px;">às</span>
                                    <input type="time" name="timeSexFim">
                                </div>
                            </div>
                        </div>

                        <div class="form-input">
                            <label for="senha" class="required">Senha</label>
                            <input type="password" name="senha" id="senha" required>
                        </div>

                        <div class="form-input">
                            <label for="confirmar" class="required">Confirmar Senha</label>
                            <input type="password" name="confimar" id="confirmar" required>
                        </div>

                    </div>
                </div>
                <div class="form-submit">
                    <input style="margin-bottom: 25px;" type="submit" value="Salvar cadastro" class="submit" id="submit" name="submit">
                </div>   
            </form>
        </div>
    </div>
    <script>
        $("#sim").change(function(){
            if($(this).prop("checked")){
                $("#opcao").css("display","block");
            }else {
                $("#opcao").css("display","none");
            }
        });
        $("#nao").change(function(){
            if($(this).prop("checked")){
                $("#opcao").css("display","none");
            }else {
                $("#opcao").css("display","block");
            }
        });
    </script>
</body>

</html>