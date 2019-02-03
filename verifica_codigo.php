<?php
session_start();
include("inc/conectar.inc");
// include("inc/verifica_sessao.inc");
//recebendo as variaveis do formulario
$codigo = strtolower($_POST['codigo']);

//query que seleciona o usuario e a senha do login informados
// $login_usuario = "CREATE TABLE \"usuarios\"(id integer);";
$verificacod = "SELECT idusuario FROM usuario  WHERE is_motorista AND codigo_motorista = $1 ";

$resultado = pg_prepare($conexao, "query_produtos", $verificacod);
$resultado = pg_execute($conexao, "query_produtos", array($codigo));
$num_linhas = pg_num_rows($resultado);


//se retonou algum resultado, executar o registro do usuario
if ($num_linhas > 0){
while ($row = pg_fetch_assoc($resultado)) {
			$_SESSION['$motorista']=$row['idusuario'];
			echo 0;
			}
		}else{
      echo 1;
    }
?>
