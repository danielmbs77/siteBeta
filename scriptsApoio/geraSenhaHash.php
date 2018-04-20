#!/usr/bin/php
<?php
// => DEFINEs dos dados de conexao
define( 'MYSQL_HOST', 'localhost' );
define( 'MYSQL_USER', 'daniel' );
define( 'MYSQL_PASSWORD', 'daniel' );
define( 'MYSQL_DB_NAME', 'igrejaonline' );

// => Obtem usuario e senha da linha de comando
echo "[geraSenhaHash.php] => BEGIN !!!";
if($argc == 4)
{
	// => Obter os parametros <login> , <senha> e <id>
	$usuario=$argv[1];
	$senha=$argv[2];
	$id=$argv[3];

	// => Log de teste dos parametros
	echo "\n[geraSenhaHash.php] => USUARIO[".$usuario."] | SENHA[".$senha."] | ID[".$id."] FORNECIDOS !!!\n";
	echo "\n[geraSenhaHash.php] => APLICANDO HASH A SENHA...\n";

	// => Gerando o Hash da senha fornecida
	$senhaCrypt = password_hash($senha, PASSWORD_DEFAULT);
	echo "\n[geraSenhaHash.php] => SENHA HASH[".$senhaCrypt."] !!!\n";

	// => Conectando no banco para a insercao do registro de usuario
	echo "\n[geraSenhaHash.php] => CONECTANDO NO BANCO...\n";
	$mysqli = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB_NAME);
    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    // => Efetuar o INSERT do usuario passado com a senha criptografada
    $sql = "INSERT INTO usuario (id_igreja, id_membro, login, senha, perfil) VALUES (".$id.",1,'".$usuario."','".$senhaCrypt."','ADM')";
    $query = $mysqli->query($sql);
	if($query)
	{	
		echo "\n[geraSenhaHash.php] => INSERCAO DE USUARIO REALIZADA COM SUCESSO !!!\n";
	}
	else
	{
		echo "\n[geraSenhaHash.php] => INSERCAO DE USUARIO NAO REALIZADA !!!\n";
	}
}
else
{
	echo "\n[geraSenhaHash.php] => Parametros <usuario>, <senha> e <id> devem ser fornecidos !!!\n";
}
echo "\n[geraSenhaHash.php] => END !!!\n";
