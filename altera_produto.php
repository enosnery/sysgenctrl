<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    //session has not started
    session_start();
}
include("inc/conectar.inc");
include("/inc/verifica_sessao.inc");
$id = $_POST['index'];
$nome = $_POST['nome'];
$valor = $_POST['valor'];
$codigo = $_POST['codigo'];

$produtos = "UPDATE produtos SET descricao = $1, valor = $2, codigo = $3 WHERE id = $4;";
$resultado = pg_prepare($conexao, "query_login", $produtos);
$resultado = pg_execute($conexao, "query_login", array($nome, $valor, $codigo, $id));
$num_linhas = pg_affected_rows($resultado);

if ($num_linhas > 0)
	{
    header('Location: cad_produto_detail.php');}


?>
