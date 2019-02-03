<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    //session has not started
    session_start();
}
include("inc/conectar.inc");
include("/inc/verifica_sessao.inc");
$id = $_POST['index'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = isset($_POST['senha']) ? $_POST['senha'] : null ;
if ($senha !== null) {
    $produtos = "UPDATE usuario SET nome = $1, email = $2 WHERE idusuario = $3;";
    $resultado = pg_prepare($conexao, "query_login", $produtos);
    $resultado = pg_execute($conexao, "query_login", array($nome, $email, $id));
}else{
  $produtos = "UPDATE usuario SET nome = $1, email = $2, senha =  $3 WHERE idusuario = $4;";

  $resultado = pg_prepare($conexao, "query_login", $produtos);
  $resultado = pg_execute($conexao, "query_login", array($nome, $email, $senha, $id));
}

$num_linhas = pg_affected_rows($resultado);

if ($num_linhas > 0)
	{
    header('Location: cad_detalhe_usuario.php');}
?>
