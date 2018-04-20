#!/usr/bin/php
<?php
// => Obtem usuario e senha da linha de comando
echo "[geraSenhaHash.php] => BEGIN !!!";
if($argc == 3)
{
	$usuario=$argv[1];
	$senha=$argv[2];
	echo "\n[geraSenhaHash.php] => USUARIO[".$usuario."] | SENHA[".$senha."] FORNECIDOS !!!\n";
	echo "\n[geraSenhaHash.php] => APLICANDO HASH A SENHA...\n";
	$senhaCrypt = password_hash($senha, PASSWORD_DEFAULT);
	echo "\n[geraSenhaHash.php] => SENHA HASH[".$senhaCrypt."] !!!\n";
}
else
{
	echo "\n[geraSenhaHash.php] => Parametros <usuario> e <senha> devem ser fornecidos !!!\n";
}
echo "[geraSenhaHash.php] => END !!!";
