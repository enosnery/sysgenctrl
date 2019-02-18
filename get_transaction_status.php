<?php
session_start();
include("inc/conectar.inc");

$idmotorista = $_POST['idmotorista'];
$transaction = $_POST['charge_id'];
//query que seleciona o usuario e a senha do login informados
$produtos = "SELECT id FROM compras_pendentes where id_motorista = $idmotorista and is_pagamento_pendente and transaction_id = '$transaction' ORDER BY id;";
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
	echo 0;
}else{
	echo 1;
}

?>
