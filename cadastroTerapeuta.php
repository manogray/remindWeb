<!DOCTYPE html>
<html>
<head>
    <?php include("includes/head.php") ?>
</head>

<body>
    <div class="conteiner-cadastro">
        <div class="box-imagem-left">
            <div class="mensagem">
                <span>"Não me pergunte quem sou e não me diga para permanacer o mesmo."</span>
                <p style="color: white;">Michel Foucault</p>
            </div>
        </div>
        <div class="box-form-rigth">
            <h2 class="titulo_cadastro">Cadastre-se como um terapeuta da Clínica Escola</h2>
            <form method="POST" class="register-form" id="register-form" action="controllers/register.php">
                <div class="form-row">
                    <div class="form-group">

                        <div class="form-input">
                            <label for="nome" class="required">Nome Completo</label>
                            <input style="width: 400px;" type="text" minlength="4" required name="nome" id="nome">
                        </div>

                        <div class="form-input">
                            <label for="telefone" class="required">CPF <span id="cpfAlert"></span></label>
                            <input type="text" required name="cpf" id="cpf">
                        </div>

                        <div class="form-input">
                            <label for="fezTerapia" class="required">Tipo de registro</label>
                            <input class="radio-area" type="radio" required name="tRegistro" value="true"/>CRP
                            <br>
                            <input class="radio-area" type="radio" required name="tRegistro" value="false"/>Matrícula
                        </div>

                        <div class="form-input" id="regisT">
                            <label class="required">Registro</label>
                            <input type="text" name="registro" required>
                        </div>


                        <div class="form-input" id="emailT">
                            <label for="email" class="required">Email</label>
                            <input style="width: 400px;" type="email" required name="email" id="email">
                        </div>
                        <div class="form-input" id="tellT">
                            <label for="telefone" class="required">Telefone</label>
                            <input type="text" required name="telefone" id="telefoneT">
                        </div>

                        <div class="form-input">
                            <label for="senha" class="required">Senha</label>
                            <input type="password" minlength="6" required name="senha" id="senha">
                        </div>

                        <div class="form-input">
                            <label for="confirmar" class="required">Confirmar Senha</label>
                            <input type="password" minlength="6" required name="confirmar" id="confirmar">
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
                <div class="form-submit" id="submitBtn">
                    <input style="margin-bottom: 25px;" type="submit" value="Salvar cadastro" class="submit" id="submit" name="submit">
                </div>
            </form>
        </div>
    </div>

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