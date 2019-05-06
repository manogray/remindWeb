<!DOCTYPE html>
<html lang="en">
<head>
	<title>ReMind</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-55">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "CPF válido: 123.456.789.00">
						<input class="input100" type="text" name="cpf" placeholder="CPF">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-user-alt"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Senha Requerida">
						<input class="input100" type="password" name="senha" placeholder="Senha">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-lock"></i>
						</span>
					</div>

					<div class="contact100-form-checkbox m-l-4">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="lembrar">
						<label class="label-checkbox100" for="ckb1">
							Lembrar de mim
						</label>
					</div>
					
					<div class="container-login100-form-btn p-t-25">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center w-full sem-cadastro">
						<span class="txt1">
							
						</span>

						<a class="txt1 bo1 hov1" href="cadastro.php">
							Cadastre-se Agora							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<script src="js/main.js"></script>

</body>
</html>