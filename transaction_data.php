<?php
session_start();
include('inc/conectar.inc');
$charge_id = isset($_POST['charge_id']) ? $_POST['charge_id'] : null;
$data = $_POST['items'];
$ids = $_POST['ids'];
$valortotal = $_POST['total'];
$idmotorista = $_SESSION['$motorista'];
$_SESSION['charge_id'] = $charge_id;
$_SESSION['$data'] = $data;
$_SESSION['$ids'] = $ids;
$_SESSION['total'] = $valortotal;

for ($i=0; $i < count($data) ; $i++) {
  $idproduto = $data[$i]['item'];
  $insert = "INSERT INTO transactions (transaction_id, id_produto, id_motorista) VALUES ($charge_id, $idproduto, $idmotorista);";
  $result = pg_query($conexao, $insert);


}

?>
