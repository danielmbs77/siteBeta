#!/usr/bin/php
<?php
// => DEFINEs dos dados de conexao
define( 'MYSQL_HOST', 'localhost' );
define( 'MYSQL_USER', 'daniel' );
define( 'MYSQL_PASSWORD', 'daniel' );
define( 'MYSQL_DB_NAME', 'igrejaonline' );

// => Obtem os arquivos *.json das duas principais entidades necessarias para a criacao do "workspace" inicial
echo "[criaWorkspaceInicial.php] => BEGIN !!!";
if($argc == 3)
{
	// => Obter os parametros <arqIg.json> e <arqMemb.json>
	$arqIg=$argv[1];
	$arqMemb=$argv[2];

	// => Log de teste dos parametros
	echo "\n[criaWorkspaceInicial.php] => ARQIG[".$arqIg."] | ARQMEMB[".$arqMemb."] FORNECIDOS !!!\n";

	// => Abrir os arquivos e popular objetos Json respectivos
	$arqIgJson  = file_get_contents($arqIg);
	$oArqIgJson = json_decode($arqIgJson);
	
	$arqMembJson  = file_get_contents($arqMemb);
	$oArqMembJson = json_decode($arqMembJson);

	// => Logs de verificacao dos objetos Json instanciados
	echo "\n[criaWorkspaceInicial.php] => CHECK DE OBJS JSON => IG => NOME[".$oArqIgJson->NOME."] | DENOMINACAO[".$oArqIgJson->DENOMINACAO."] | ENDERECO[".$oArqIgJson->ENDERECO."] | NUMERO[".$oArqIgJson->NUMERO."] | BAIRRO[".$oArqIgJson->BAIRRO."] | CIDADE[".$oArqIgJson->CIDADE."] | ESTADO[".$oArqIgJson->ESTADO."] | CEP[".$oArqIgJson->CEP."] | PAIS[".$oArqIgJson->PAIS."] | CATEGORIA[".$oArqIgJson->CATEGORIA."] | HISTORICO[".$oArqIgJson->HISTORICO."] !!!\n";
	
	echo "\n[criaWorkspaceInicial.php] => CHECK DE OBJS JSON => MEMB => ID_IG[".$oArqMembJson->ID_IG."] | NOME[".$oArqMembJson->NOME."] | STATUS[".$oArqMembJson->STATUS."] | CARGO[".$oArqMembJson->CARGO."] | SEXO[".$oArqMembJson->SEXO."] | DATA_NASCIMENTO[".$oArqMembJson->DATA_NASCIMENTO."] | ESTADO_CIVIL[".$oArqMembJson->ESTADO_CIVIL."] | ENDERECO[".$oArqMembJson->ENDERECO."] | NUMERO[".$oArqMembJson->NUMERO."] | BAIRRO[".$oArqMembJson->BAIRRO."] | CIDADE[".$oArqMembJson->CIDADE."] | ESTADO[".$oArqMembJson->ESTADO."] | CEP[".$oArqMembJson->CEP."] | PAIS[".$oArqMembJson->PAIS."] | HISTORICO [".$oArqMembJson->HISTORICO."] !!!\n";

	// => Insercoes no Bco. a partir dos objetos Json instanciados - TODO
}
else
{
	echo "\n[criaWorkspaceInicial.php] => Parametros <arqIg.json> e <arqMemb.json> devem ser fornecidos !!!\n";
}
echo "\n[criaWorkspaceInicial.php] => END !!!\n";
