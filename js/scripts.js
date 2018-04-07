function teste()
{
	alert("Teste");
}

function validarLogin()
{
	// => Variáveis auxiliares
	var flagTudoOk = true;
	
	// => Obter os valores dos campos do form Login
	var login = document.getElementById("login");
	var senha = document.getElementById("senha");
	
	// => Obter a referencia para o form frmLogin
	var frmLogin = document.getElementById("frmLogin");
	
	// => Teste only -> Exibindo os valores digitados
	alert("[IoL] => [frmLogin] => login[" + login.value + "] | senha[" + senha.value + "] !!!");
	
	// => Campo login não pode ser vazio
	if (login.value == "")
	{
		alert("[IoL] => [frmLogin] => login invalido => vazio !!!");
		flagTudoOk = false;
	}
	
	// => Campo senha precisa conter pelo menos 1 número 0..9, uma letra maiúscula e um símbolo (@,#,%,$)
	if (senha.value == "")
	{
		alert("[IoL] => [frmLogin] => senha invalida => vazia !!!");
		flagTudoOk = false;
	}
	
	// => SE tudo ok, submeter o form para a página/script PHP de tratamento.
	if (flagTudoOk)
	{
		frmLogin.setAttribute("method", "post");
    	frmLogin.setAttribute("action", "php/login.php");
		frmLogin.submit();
	}
}