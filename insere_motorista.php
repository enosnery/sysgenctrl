<?php

if(session_status() !== PHP_SESSION_ACTIVE){
    //session has not started
    session_start();
}
include("inc/conectar.inc");
// include("envia_foto.php");
//include("/inc/verifica_sessao.inc");

$nome = $_POST['nome'];
$email = $_POST['email'];
$login = $_POST['login'];
$senha = isset($_POST['senha']) ? $_POST['senha'] : null ;

if ($senha !== null) {
  $produtos = "INSERT INTO usuario (nome, email, senha, login, is_motorista) VALUES  ($1, $2, $3, $4, true);";
  $resultado = pg_prepare($conexao, "query_insert_moto", $produtos);
  $resultado = pg_execute($conexao, "query_insert_moto", array($nome, $email, $senha, $login));
  $num_linhas = pg_affected_rows($resultado);
}



if ($num_linhas > 0)
	{
    echo "Usuário cadastrado com sucesso!";}
    else{
    echo "Ocorreu um problema com a inclusão do Usuário.";
    }


?>
