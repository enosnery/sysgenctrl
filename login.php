<?php
session_start();
include("inc/conectar.inc");
// include("inc/verifica_sessao.inc");
//recebendo as variaveis do formulario
$login = strtolower($_POST['login']);
$senha = strtolower($_POST['senha']);

//query que seleciona o usuario e a senha do login informados
// $login_usuario = "CREATE TABLE \"usuarios\"(id integer);";
$login_usuario = "SELECT login, senha, is_usuario_adm FROM usuario  WHERE login = $1 AND senha = $2 ";

$resultado = pg_prepare($conexao, "query_login", $login_usuario);
$resultado = pg_execute($conexao, "query_login", array($login, $senha));
$num_linhas = pg_num_rows($resultado);


//se retonou algum resultado, executar o registro do usuario
if ($num_linhas > 0){
while ($row = pg_fetch_assoc($resultado)) {
	if ($row['is_usuario_adm']==='t') {
			$_SESSION['$login']=$row['login'];
			$_SESSION['is_adm']=$row['is_usuario_adm'];
			echo 0;
			// header("Location: menu_admin.php");
			}else{
				$_SESSION['$login']=$row['login'];
				$_SESSION['is_adm']=$row['is_usuario_adm'];
				echo 1;
 			// header("Location: inserir_codigo.php");
			}
		}
} else {
		echo 2;
	}
?>
