<?php

include("inc/conectar.inc");
//include("/inc/verifica_sessao.inc");
//recebendo as variaveis do formulario
$login = strtolower($_POST['login']);
$senha = strtolower($_POST['senha']);

if(!empty( $login) && preg_match( '/^[\w\n\s]+$/i' , $login)){

//query que seleciona o usuario e a senha do login informados
// $login_usuario = "CREATE TABLE \"usuarios\"(id integer);";
//
$login_usuario = "SELECT login, senha
		                 FROM usuarios  WHERE login = $1 AND senha = $2 ";

$resultado = pg_prepare($conexao, "query_login", $login_usuario);
$resultado = pg_execute($conexao, "query_login", array($login, $senha));

$num_linhas = pg_num_rows($resultado);

//se retonou algum resultado, executar o registro do usuario
if ($num_linhas > 0){
while ($row = pg_fetch_assoc($resultado)) {
	if ($row['login']==='admin') {
			header("Location: menu_admin.php");
			}else{
 			header("Location: inserir_codigo.php");
			}
		}
} else {
		//caso o login seja inv�lido
		echo "Usuario não Cadastrado no Sistema</br>";
		//redireciona para o paggina de login
		echo "<a href='index.php'> Voltar </a>";
	}
} else {
	header("Location: verifica_campos.php");
}
?>
