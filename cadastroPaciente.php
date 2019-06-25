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
                            <input class="input-color" style="width: 400px;" type="text" name="nome" id="nome" required>
                        </div>

                        <div class="form-input">
                            <label for="email" class="required">Email</label>
                            <input class="input-color" style="width: 400px;" type="email" name="email" id="email" required>
                        </div>
                        <div class="form-input">
                            <label for="cpf" class="required">CPF</label>
                            <input class="input-color" class="resp-cpf" type="text" name="cpf" id="cpf" required>
                        </div>
                        <div class="form-input">
                            <label for="nascimento" class="required">Nascimento</label>
                            <input class="input-color" type="date" name="nascimento" id="nascimento" required>
                        </div>

                        <div class="form-input">
                            <label for="sexo" class="required">Sexo</label>
                            <input class="radio-area input-color" type="radio" name="sexo" required value="MASCULINO">Masculino
                            <input class="radio-area input-color" type="radio" name="sexo" required value="FEMININO">Feminino
                            <input class="radio-area input-color" type="radio" name="sexo" required value="OUTRO">Outro
                        </div>

                        <div class="form-input">
                            <label for="telefone" class="required">Telefone</label>
                            <input class="input-color" type="text" name="telefone" id="telefone" required>
                        </div>  

                        <div class="form-input">
                            <label for="endereco" class="required">Endereço</label>
                            <input class="input-color" style="width: 400px;" type="text" name="endereco" id="endereco" required>
                        </div>

                        <div class="cafe"> 
                            <div class="form-input">
                                <label for="fezTerapia" class="required">Já fez terapia?</label>
                                <input class="radio-area" type="radio" required name="fezTerapia" id="sim" value="true"/>Sim
                                <br>
                                <input class="radio-area" type="radio" required name="fezTerapia" id="nao" value="false"/>Não
                            </div>

                            <div class="form-input alinha" id="opcao" style="display:none" >
                                <label for="demanda" >Local onde fez terapia</label>
                                <input class="input-color" type="text" name="localTerapia" id="localTerapia">
                            </div>
                        </div>
                        <div class="text-area-form">
                            <div class="form-input">
                                <label for="vinculoResidencial" class="required">Com quem você vive?</label>
                                <textarea name="vinculoResidencial" required class="text-area" rows="5" cols="40" maxlength="500"></textarea>
                            </div>

                            <div class="form-input">    
                                <label for="demanda" class="required">Por que gostaria de fazer a psicoterapia?</label>
                                <textarea class="text-area" name="demanda" required rows="5" cols="40" maxlength="500"></textarea>
                            </div>
                        </div>
                        <div class="form-input">
                            <label for="senha" class="required">Senha</label>
                            <input class="input-color" type="password" name="senha" id="senha" required>
                        </div>

                        <div class="form-input">
                            <label for="confirmar" class="required">Confirmar Senha</label>
                            <input class="input-color" type="password" name="confirmar" id="confirmar" required>
                        </div>

                        <div class="msgPass" id="msgPswd">
                            <ul style="list-style-type: circle;">
                                <li style="list-style-type: circle;" id="diffPass">Senhas diferentes</li>
                                <li style="list-style-type: circle;" id="minPass">Mínimo de 6 caracteres</li>
                            </ul>
                        </div>

                        <div class="quadroHorarios">
                            <div class="barato-demais">
                                <label class="required" style="width: 100%;">Disponibilidade</label>
                                <div class="dia">
                                    <span class="semana">Segunda-feira</span>
                                    <div class="hora" style="display: flex;">
                                        <input class="time-input" type="time" name="timeSegIni">
                                        <span class="semana" style="margin: 0px 6px;">às</span>
                                        <input class="time-input" type="time" name="timeSegFim">
                                    </div>
                                </div>
                                <div class="dia">
                                    <span class="semana">Terça-feira</span>
                                    <div class="hora" style="display: flex;">
                                        <input class="time-input" type="time" name="timeTerIni">
                                        <span class="semana" style="margin: 0px 6px;">às</span>
                                        <input class="time-input" type="time" name="timeTerFim">
                                    </div>
                                </div>
                                <div class="dia">
                                    <span class="semana">Quarta-feira</span>
                                    <div class="hora" style="display: flex;">
                                        <input class="time-input" type="time" name="timeQuaIni">
                                        <span class="semana" style="margin: 0px 6px;">às</span>
                                        <input class="time-input" type="time" name="timeQuaFim">
                                    </div>
                                </div>
                                <div class="dia">
                                    <span class="semana">Quinta-feira</span>
                                    <div class="hora" style="display: flex;">
                                        <input class="time-input" type="time" name="timeQuiIni">
                                        <span class="semana" style="margin: 0px 6px;">às</span>
                                        <input class="time-input" type="time" name="timeQuiFim">
                                    </div>
                                </div>
                                <div class="dia">
                                    <span class="semana">Sexta-feira</span>
                                    <div class="hora" style="display: flex;">
                                        <input class="time-input" type="time" name="timeSexIni">
                                        <span class="semana" style="margin: 0px 6px;">às</span>
                                        <input class="time-input" type="time" name="timeSexFim">
                                    </div>
                                </div>
                                <div class="dia">
                                    <span class="semana">Sábado</span>
                                    <div class="hora" style="display: flex;">
                                        <input class="time-input" type="time" name="timeQuiIni">
                                        <span class="semana" style="margin: 0px 6px;">às</span>
                                        <input class="time-input" type="time" name="timeQuiFim">
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                    </div>
                </div>
                <div class="form-submit" id="submitBtn">
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

<script>
        $("#cpf").keyup(function(){
            var numero = $("#cpf").val();
            if(new CPF().validate(numero)){
                document.getElementById("cpf").style.borderColor = "#0092ca";
            }else {
                document.getElementById("cpf").style.borderColor = "red";
            }
        });

        $("#confirmar").keyup(function(){
            if($("#confirmar").val() == $("#senha").val() && ($("#senha").val() != "" && $("#confirmar").val() != "")){
                document.getElementById("diffPass").style.display = "none";
                if($("#senha").val().length >= 6){
                    document.getElementById("submitBtn").style.display = "block";
                    
                    document.getElementById("senha").style.borderColor = "#0092ca";
                    document.getElementById("confirmar").style.borderColor = "#0092ca";

                    document.getElementById("msgPswd").style.display = "none";
                }else {
                    document.getElementById("submitBtn").style.display = "none";
                    
                    document.getElementById("senha").style.borderColor = "red";
                    document.getElementById("confirmar").style.borderColor = "red";

                    document.getElementById("msgPswd").style.display = "flex";
                }
            }else {
                document.getElementById("submitBtn").style.display = "none";

                document.getElementById("senha").style.borderColor = "red";
                document.getElementById("confirmar").style.borderColor = "red";

                document.getElementById("diffPass").style.display = "list-item";
                document.getElementById("msgPswd").style.display = "flex";
            }
        })

        $("#senha").keyup(function(){
            if($("#senha").val() == $("#confirmar").val() && ($("#senha").val() != "" && $("#confirmar").val() != "")){
                if($("#senha").val().length >= 6){
                    document.getElementById("submitBtn").style.display = "block";
                    
                    document.getElementById("senha").style.borderColor = "#0092ca";
                    document.getElementById("confirmar").style.borderColor = "#0092ca";

                    document.getElementById("msgPswd").style.display = "none";
                }else {
                    document.getElementById("submitBtn").style.display = "none";
                    
                    document.getElementById("senha").style.borderColor = "red";
                    document.getElementById("confirmar").style.borderColor = "red";

                    document.getElementById("msgPswd").style.display = "flex";
                }
            }else {
                document.getElementById("submitBtn").style.display = "none";

                document.getElementById("senha").style.borderColor = "red";
                document.getElementById("confirmar").style.borderColor = "red";

                document.getElementById("diffPass").style.display = "list-item";
                document.getElementById("msgPswd").style.display = "flex";
            }
        })
    </script>
</body>

</html>