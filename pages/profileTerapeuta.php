<!DOCTYPE html>
<html>
    <head>
        <?php include("includes/head.php"); ?>
    </head>

    <body>
        <header>
            <?php include("includes/headerTerapeuta.php") ?>
        </header>

        <section class="main-content">
        <div class="box-profile">
            <h2 class="titulo_cadastro">Seu Perfil</h2>
            <form method="POST" class="register-form" id="register-form" novalidate="novalidate">
                <div class="form-row">
                    <div class="form-group">
                        <div class="form-input">
                            <label for="nome" >Nome Completo</label>
                            <input style="width: 400px;" type="text" name="nome" id="nome">
                        </div>
                        <div class="form-input">
                            <label for="nascimento" >Nascimento</label>
                            <input type="date" name="nascimento" id="nascimento">
                        </div>

                        
                        <div class="form-input">
                            <label for="endereco" >Endereço</label>
                            <input style="width: 400px;" type="text" name="endereco" id="endereco">
                        </div>

                        <div class="form-input">
                            <label for="sexo" >Sexo</label>
                            <input class="radio-area" type="radio" name="opcao" value="opc1" id="sexo">Masculino
                            <input class="radio-area" type="radio" name="opcao" value="opc2" id="sexo">Feminino
                        </div>

                        <div class="form-input">
                            <label for="email" >Email</label>
                            <input style="width: 400px;" type="email" name="email" id="email">
                        </div>
                        <div class="form-input">
                            <label for="telefone" >Telefone</label>
                            <input type="text" name="telefone" id="telefone">
                        </div> 

                        <div class="form-input">
                            <label for="senha" >Senha</label>
                            <input type="text" name="senha" id="senha">
                        </div>

                        <div class="form-input">
                            <label for="confirmar" >Confirmar Senha</label>
                            <input type="text" name="confimar" id="confirmar">
                        </div>
                    </div>
                </div>
                <div class="form-submit">
                    <input style="margin-bottom: 25px;" type="submit" value="Salvar" class="submit" id="submit" name="submit">
                </div>

                <script>
                    $("#check").click(function(){
                        if($(this).val()=="true"){
                            $("#opcao").css("visibility","visible");
                            $(this).val("false");

                        }else if($(this).val()=="false"){
                            "#opcao").css("visibility","hidden");
                            $(this).val("true");
                        }else{
                           // $("#opcao").css("visibility","hidden");
                           // $(this).val("true");
                        }
                    });
                </script>   
            </form>
        </div>
        </section>
        
        <script src="../js/calendar.js"></script>
    </body>
</html>