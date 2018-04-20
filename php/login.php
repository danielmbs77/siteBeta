<?php
	// => Parametros de conexao do Bco.de Dados
	define( 'MYSQL_HOST', 'localhost' );
	define( 'MYSQL_USER', 'daniel' );
	define( 'MYSQL_PASSWORD', 'daniel' );
	define( 'MYSQL_DB_NAME', 'igrejaonline' );
	
	// => Obter os valores dos campos login e senha do form
	$login = $_POST["login"];
	$senha = $_POST["senha"];

	// => Encriptar a senha fornecida
	//$senhaCrypt = password_hash($senha, PASSWORD_DEFAULT);

	// => Teste Only -> Exibir os dados login, senha e senhaCrypt
	//echo "<P>[login.php] => Dados => login[".$login."] | senha[".$senha."] | senhaCrypt[".$senhaCrypt."] !!!</P>";

	// => Verificar se ha no Bco. de Dados usuario com o login fornecido e neste caso, se a senhaCrypto confere com a senha do Banco.
	//echo "<P>[login.php] => CHECKPOINT 0 !!!</P>";

	// Conecta-se ao banco de dados MySQL
	$mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB_NAME);
	if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

	//echo "<P>[login.php] => CHECKPOINT 1 !!!</P>";

	// Executa uma consulta que pega cinco notícias
	$sql = "select login,senha from usuario where login = '".$login."' LIMIT 5";
	$query = $mysqli->query($sql);

	//echo "<P>[login.php] => CHECKPOINT 2 !!!</P>";

	$dados = $query->fetch_array();
	//echo "<P>[login.php] => QTDE. DE REGISTROS ENCONTRADOS[".$query->num_rows."] !!!</P>";
	//$contReg = 1;
	//while($contReg <= $query->num_rows)
	//{	
		//echo "<P>[login.php] => LOGIN[".$dados["login"]."] | SENHA[".$dados["senha"]."] !!!</P>";
		//$contReg++;
	//}

	$senhaBco = $dados["senha"];
	$loginBco = $dados["login"];
	//echo "<P>[login.php] => CHECKPOINT 3 !!!</P>";

	// => SE sucesso, redireciona para a pagina principal.php, caso contrario, redireciona para falhaLogin.php.
	//echo "<P>[login.php] => Dados do Bco. => login[".$loginBco."] | senha[".$senhaBco."] !!!</P>";

	// => Verificar se a senha do Bco. casa com a senha fornecida.
	$resultPwd = password_verify($senha, $senhaBco);
	if($resultPwd)
	{
		//echo "<P>[login.php] => SENHA CORRETA !!!</P>";
		header("location:main.php");
	}
	else
	{
		//echo "<P>[login.php] => SENHA INCORRETA !!!</P>";
		header("location:../iol.php");
	}


	// => Fechar conexao e finalizar todos os objetos.
	//echo "<P>[login.php] => CHECKPOINT 4 !!!</P>";
?>
