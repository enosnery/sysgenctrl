<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    //session has not started
    session_start();
}
include("inc/conectar.inc");
include("inc/verifica_sessao.inc");
$index = $_SESSION['prodIndex'];
//query que seleciona o usuario e a senha do login informados
$produtos = "SELECT idusuario, nome, email, login, cpf, pagamento_id, pagamento_secret FROM usuario WHERE idusuario = $index;";

$resultado = pg_query($conexao, $produtos);

//verifica se a query retornou algum resultado
//print odbc_errormsg($conexao);
$num_linhas = pg_num_rows($resultado);

//echo $num_linhas." - Linhas</br>";
//echo $res." - Resultado</br>"
 // $result = $pg_fetch_all($resultado);
//$login = $resultado['LOGIN'];

//se retonou algum resultado, executar o registro do usuario
if ($num_linhas > 0)
	{
$i = 0 ;
  while ($row = pg_fetch_assoc($resultado)) {
		$i++;
  $email = $row['email'];
	$id = $row['idusuario'];
	$nome = $row['nome'];
  $login = $row['login'];
  $cpf = $row['cpf'];
  $pagamentoid = $row['pagamento_id'];
  $pagamentosec = $row['pagamento_secret'];
	echo "<input id='index' name='index' type='hidden' value='$id'>";
  echo "<label for='nome'>Nome</label>";
	echo "<input id='nome' name='nome' class='prodDetailInput centAlign' value='$nome' maxlength='40'/>";
  echo "<label for='email'>Email</label>";
	echo "<input id='email' name='email' class='prodDetailInput centAlign' value='$email' maxlength='50'/>";
  echo "<label for='login'>Login</label>";
	echo "<input id='login' name='login' class='prodDetailInput centAlign' value='$login' readonly/>";
  echo "<label for='cpf'>Senha</label>";
	echo "<input type='password' id='btn-senha' name='senha' class='prodDetailInput centAlign' value='' maxlength='20' disabled>";
  echo "<a type='button' class='btn btn-primary' onclick='liberaSenha();'> Alterar Senha</a> ";
  echo "</input>";
  echo "<br>";
  echo "<br>";
  echo "<label for='cpf'>CPF</label>";
  echo "<input id='cpf' name='cpf' class='prodDetailInput centAlign' value='$cpf' readonly/>";
  echo "<label for='pag1'>ID Gerencianet</label>";
  echo "<input id='pag1' name='pag1' class='prodDetailInput centAlign' value='$pagamentoid'/>";
  echo "<label for='pags'>Sec Gerencianet</label>";
  echo "<input id='pags' name='pags' class='prodDetailInput centAlign' value='$pagamentosec'/>";

}
}


?>
