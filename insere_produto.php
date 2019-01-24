<?php

if(session_status() !== PHP_SESSION_ACTIVE){
    //session has not started
    session_start();
}
include("inc/conectar.inc");
// include("envia_foto.php");
//include("/inc/verifica_sessao.inc");

$nome = $_POST['nome'];
$valor = (float)str_replace(",", "",$_POST['valor']);
$codigo = $_POST['codigo'];



$produtos = "INSERT INTO produtos (descricao, valor, codigo) VALUES  ($1, $2, $3);";
$resultado = pg_prepare($conexao, "query_insere", $produtos);
$resultado = pg_execute($conexao, "query_insere", array($nome, $valor, $codigo));
$num_linhas = pg_affected_rows($resultado);

if ($num_linhas > 0)
	{
    echo "Produto Cadastrado com Sucesso!";}
    else{
      echo "Ocorreu um problema com a inclusão do Produto.";
    }


?>
