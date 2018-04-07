<html>
<head>
	<!-- Definicoes do header - BEGIN -->
	<title> IoL - Igreja On Line </title>	
	<meta charset="utf-8" />
	<!-- Definicoes do header - END -->
	
	<!-- Inclusao de scripts e CSS -->
	<link href="css/estilo.css" rel="stylesheet" media="all"/>
	<script src="js/scripts.js"></script>
</head>
<body>
	<!-- <p> IoL - Igreja On Line </p> -->
	<form id="frmLogin">	
		<div>
			<label for="login">Login:</label>
			<input type="text" id="login" name="login" required="true" maxlength="30"/>
		</div>
		<div>
			<label for="senha">Senha:</label>
			<input type="password" id="senha" name="senha" required="true" maxlength="12" pattern="/^[a-zA-Z0-9!@#\$%\^\&*_=+-]{8,12}$/g"/>
		</div>
		<div class="button">
			<button type="button" onclick="validarLogin();">Efetuar login</button>
		</div>
	</form>	
</body>
</html>
