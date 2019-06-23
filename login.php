<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head.php") ?>
</head>
<body> 
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form" method="POST" action="controllers/auth.php">
					<div class="logo-remind" style="color:#333; font-size: 45px; margin-bottom: 45px;">
                        Re<span style="color: #0092ca;" >Mind</span>
                    </div>

					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="text" name="cpf" placeholder="CPF" id="cpf">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-user-alt"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="password" name="senha" placeholder="Senha" id="senha">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-lock"></i>
						</span>
					</div>
					
					<!--
					<div class="contact100-form-checkbox m-l-4">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="lembrar">
						<label class="label-checkbox100" for="ckb1">
							Lembrar de mim
						</label>
					</div>-->
					
					<div class="container-login100-form-btn p-t-25">
						<input type="submit" class="login100-form-btn" value="LOGIN" id="loginBtt">
					</div>

					<div class="text-center w-full sem-cadastro">
						<span class="txt1">
							
						</span>

						
						<?php
							if($_GET['t'] == 0){
						?>
							<a class="txt1" style="color: #000; text-decoration: underline;" href="/cadastroTerapeuta.php">
								Terapeuta, cadastre-se aqui							
							</a>
							<input type="hidden" name="tipo" value="terapeuta">
						<?php
							}
							if($_GET['t'] == 1){
						?>
							<a class="txt1" style="color: #000; text-decoration: underline;" href="/cadastroPaciente.php">
								Faça sua inscrição aqui							
							</a>
							<input type="hidden" name="tipo" value="paciente">
						<?php
							}
							if($_GET['t'] ==2){
						?>
							<input type="hidden" name="tipo" value="professor">
						<?php
							}
						?>
						

					</div>

					
				</form>
			</div>
		</div>
	</div>
	<script>
		 $("#cpf").keyup(function(){
            var numero = $("#cpf").val();
            if(new CPF().validate(numero)){
				document.getElementById("cpf").style.borderColor = "#0092ca";
				$("#loginBtt").removeAttr("disabled");
            }else {
				document.getElementById("cpf").style.borderColor = "red";
				$("#loginBtt").attr("disabled","disabled");
            }
        });
	</script>
	<!--<script src="../js/main.js"></script>-->

</body>
</html>