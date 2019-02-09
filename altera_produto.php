<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    //session has not started
    session_start();
}
include("inc/conectar.inc");
include("inc/verifica_sessao.inc");
$id = $_POST['index'];
$nome = $_POST['nome'];
$valor = $_POST['valor'];

$produtos = "UPDATE produtos SET descricao = $1, valor = $2 WHERE id = $3;";
$resultado = pg_prepare($conexao, "query_login", $produtos);
$resultado = pg_execute($conexao, "query_login", array($nome, $valor, $id));
$num_linhas = pg_affected_rows($resultado);

if ($num_linhas > 0)
	{
    header('Location: cadproduto.php');}


?>
