<?php
session_start();
include("inc/conectar.inc");
include ("inc/verifica_sessao.inc");

$idproduto = $_POST['idproduto'];
$idrep = $_POST['idrep'];
$quantidade = $_POST['qtde'];
$idadmin = $_SESSION['id'];

$verificar = "SELECT id from estoque_motorista where id_produto = $idproduto and idmotorista = $idrep;";
$result = pg_query($conexao, $verificar);
$isestoque = pg_num_rows($result);

if($isestoque > 0){
  $update = "UPDATE estoque_adm SET quantidade_atual = quantidade_atual + $1  WHERE id_produto = $2 and idadmin = $3;";

  $resultado = pg_prepare($conexao, "query_insert_user1", $update);
  $resultado = pg_execute($conexao, "query_insert_user1", array($quantidade, $idproduto, $idadmin));
  $num_linhas = pg_affected_rows($resultado);



if ($num_linhas > 0)
	{
    $update1 = "UPDATE estoque_motorista SET quantidade_atual = quantidade_atual - $1  WHERE idmotorista = $2;";
    $resultado1 = pg_prepare($conexao, "query_insert_user2", $update1);
    $resultado1 = pg_execute($conexao, "query_insert_user2", array($quantidade, $idrep));
    $num_linhas1 = pg_affected_rows($resultado1);
    if($num_linhas1 > 0){
    echo "Transfência feita com sucesso!";
  }else{
    $update1 = "UPDATE estoque_adm SET quantidade_atual = quantidade_atual - $1  WHERE idadmin = $2;";
    $resultado1 = pg_prepare($conexao, "query_insert_user3", $update);
    $resultado1 = pg_execute($conexao, "query_insert_user3", array($quantidade, $idadmin));
    $update4 = "UPDATE estoque_motorista SET quantidade_atual = quantidade_atual + $1  WHERE idmotorista = $2;";
    $resultado4 = pg_prepare($conexao, "query_insert_user2", $update4);
    $resultado4 = pg_execute($conexao, "query_insert_user2", array($quantidade, $idrep));
    $num_linhas4 = pg_affected_rows($resultado4);
    echo "Ocorreu um problema na Transferência!";
  }
}else{
    echo "Não foi Possível fazer a Transferência.";
  }
}else{
    echo "Não foi Possível fazer a Transferência.";
}

?>
