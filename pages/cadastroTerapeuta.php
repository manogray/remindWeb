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
            <h2 class="titulo_cadastro">Cadastre-se como um terapeuta da Clínica Escola</h2>
            <form method="POST" class="register-form" id="register-form" action="../controllers/register.php">
                <div class="form-row">
                    <div class="form-group">

                        <div class="form-input">
                            <label for="nome" class="required">Nome Completo</label>
                            <input style="width: 400px;" type="text" required name="nome" id="nome">
                        </div>

                        <div class="form-input">
                            <label for="telefone" class="required">CPF</label>
                            <input type="text" required name="cpf" id="telefone">
                        </div>

                        <div class="form-input">
                                <label for="fezTerapia" class="required">Tipo de registro</label>
                                <input class="radio-area" type="radio" required name="crp" id="matricula" value="true"/>CRP
                                <br>
                                <input class="radio-area" type="radio" required name="matricula" id="matricula" value="false"/>Matrícula
                            </div>

                        <div class="form-input">
                            <label class="required">Registro</label>
                            <input type="text" name="matricula" id="matricula">
                        </div>

                        <div class="form-input">
                            <label for="email" class="required">Email</label>
                            <input style="width: 400px;" type="email" required name="email" id="email">
                        </div>
                        <div class="form-input">
                            <label for="telefone" class="required">Telefone</label>
                            <input type="text" required name="telefone" id="telefone">
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
                            <input type="password" required name="senha" id="senha">
                        </div>

                        <div class="form-input">
                            <label for="confirmar" class="required">Confirmar Senha</label>
                            <input type="password" required name="confimar" id="confirmar">
                        </div>
                </div>
                <div class="form-submit">
                    <input style="margin-bottom: 25px;" type="submit" value="Salvar cadastro" class="submit" id="submit" name="submit">
                </div>
            </form>
        </div>
    </div>
            
</body>

</html>