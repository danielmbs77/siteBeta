<?php
	// => Parametros de conexao do Bco.de Dados
	//define( 'MYSQL_HOST', 'localhost' );
	//define( 'MYSQL_USER', 'daniel' );
	//define( 'MYSQL_PASSWORD', 'daniel' );
	//define( 'MYSQL_DB_NAME', 'igrejaonline' );
	//$MYSQL_HOST = 'localhost';
	//$MYSQL_USER = 'daniel';
	//$MYSQL_PASSWORD = 'daniel';
	//$MYSQL_DB_NAME = 'igrejaonline';
	
	// => Obter os valores dos campos login e senha do form
	$login = $_POST["login"];
	$senha = $_POST["senha"];

	// => Encriptar a senha fornecida
	$senhaCrypt = password_hash($senha, PASSWORD_DEFAULT);

	// => Teste Only -> Exibir os dados login, senha e senhaCrypt
	echo "<P>[login.php] => Dados => login[".$login."] | senha[".$senha."] | senhaCrypt[".$senhaCrypt."] !!!</P>";

	// Senha para "daniel" -> $2y$10$jQ5Ii9Zv0EfD5CVHQAoFbuRz1L7RdZIGAQGwpXuLE2p.SVtWcP.1e

	// => Verificar se ha no Bco. de Dados usuario com o login fornecido e neste caso, se a senhaCrypto confere com a senha do Banco.
	echo "<P>[login.php] => CHECKPOINT 0 !!!</P>";

	// Conecta-se ao banco de dados MySQL
	$mysqli = new mysqli('localhost', 'root', 'root', 'igrejaonline');
	// Caso algo tenha dado errado, exibe uma mensagem de erro
	if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

	echo "<P>[login.php] => CHECKPOINT 1 !!!</P>";

	// Executa uma consulta que pega cinco notícias
	$sql = "select LOGIN,SENHA from USUARIO LIMIT 5";
	$query = $mysqli->query($sql);

	echo "<P>[login.php] => CHECKPOINT 2 !!!</P>";

	$dados = $query->fetch_array();
	echo "<P>[login.php] => QTDE. DE REGISTROS ENCONTRADOS[".$query->num_rows."] !!!</P>";
	$contReg = 1;
	while($contReg <= $query->num_rows)
	{	
		echo "<P>[login.php] => LOGIN[".$dados["LOGIN"]."] | SENHA[".$dados["SENHA"]."] !!!</P>";
		$contReg++;
	}

	$senhaBco = $dados["SENHA"];
	$loginBco = $dados["LOGIN"];
	echo "<P>[login.php] => CHECKPOINT 3 !!!</P>";

	// => SE sucesso, redireciona para a pagina principal.php, caso contrario, redireciona para falhaLogin.php.
	echo "<P>[login.php] => Dados do Bco. => login[".$loginBco."] | senha[".$senhaBco."] !!!</P>";

	// => Fechar conexao e finalizar todos os objetos.
	echo "<P>[login.php] => CHECKPOINT 4 !!!</P>";
?>
