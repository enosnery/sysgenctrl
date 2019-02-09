<?php
session_start();
include("inc/conectar.inc");
include ("inc/verifica_sessao.inc");

$idproduto = $_POST['idproduto'];
$quantidade = $_POST['qtde'];
$idadmin = $_SESSION['id'];

$verificar = "SELECT id from estoque_adm where id_produto = $idproduto and idadmin = $idadmin;";
$result = pg_query($conexao, $verificar);
$isestoque = pg_num_rows($result);

if($isestoque > 0){
  $update = "UPDATE estoque_adm SET quantidade_atual = quantidade_atual + $1  WHERE id_produto = $2 and idadmin = $3;";

  $resultado = pg_prepare($conexao, "query_insert_user1", $update);
  $resultado = pg_execute($conexao, "query_insert_user1", array($quantidade, $idproduto, $idadmin));
  $num_linhas = pg_affected_rows($resultado);



if ($num_linhas > 0)
	{
    echo "Produto adicionado com sucesso ao estoque!";
}else{
    echo "Não foi Possível fazer a Transferência.";
  }
}else{
  $update = "INSERT INTO estoque_adm (quantidade_atual, id_produto, idadmin) VALUES ($1, $2, $3);";

  $resultado = pg_prepare($conexao, "query_insert_user1", $update);
  $resultado = pg_execute($conexao, "query_insert_user1", array($quantidade, $idproduto, $idadmin));
  $num_linhas = pg_affected_rows($resultado);

if ($num_linhas > 0)
  {
      echo "Produto adicionado com sucesso ao estoque!";}else{
    echo "Não foi Possível fazer a Transferência.";
}
}


?>
