<?php

if(session_status() !== PHP_SESSION_ACTIVE){
    //session has not started
    session_start();
}
include("inc/conectar.inc");
// include("envia_foto.php");
include("inc/verifica_sessao.inc");

function randomString($length = 6) {
	$str = "";
	$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return $str;
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$login = strtolower($_POST['login']);
$codigo = randomString();
$cpf = $_POST['cpf'];
$senha = isset($_POST['senha']) ? $_POST['senha'] : null ;

if ($senha !== null) {
  $produtos = "INSERT INTO usuario (nome, email, senha, login, cpf, codigo_motorista, is_motorista) VALUES  ($1, $2, $3, $4, $5, $6, true);";
  $resultado = pg_prepare($conexao, "query_insert_moto", $produtos);
  $resultado = pg_execute($conexao, "query_insert_moto", array($nome, $email, $senha, $login, $cpf, $codigo));
  $num_linhas = pg_affected_rows($resultado);
}



if ($num_linhas > 0)
	{
    echo "Motorista cadastrado com sucesso!";}
    else{
    echo "Ocorreu um problema com a inclusão do Usuário.";
    }


?>
