<?php
session_start();
include("inc/conectar.inc");


 // $data = json_decode($_SESSION['$data'], true);
 // $ids = json_decode($_SESSION['$ids'], true);
 $transaction = $_GET['transaction_id'];

 $prodlist = "SELECT count(t.id_produto) as a, t.id_motorista as b, t.transaction_id as c, t.id_produto as d FROM transactions t WHERE transaction_id = $transaction::text GROUP BY t.id_motorista, t.transaction_id, t.id_produto;";
$result1 = pg_query($conexao, $prodlist);

while ($row = pg_fetch_assoc($result1)) {
  $quantidade = $row['a'];
  $idmotorista = $row['b'];
  $idproduto = $row['d'];

  $update = "UPDATE estoque_motorista SET quantidade_atual = quantidade_atual - $quantidade WHERE idmotorista = $idmotorista and id_produto = $idproduto;";
  $result = pg_query($conexao, $update);

}


echo $result;

// header("Location: index.php");

?>
