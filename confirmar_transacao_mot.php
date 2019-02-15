<?php
  session_start();
include("inc/conectar.inc");

$idcompra = isset($_POST['index']) ? $_POST['index'] : null;
$idmotorista = $_SESSION['id'];
$compras = "UPDATE compras_pendentes SET is_pendente = false where id_motorista = $idmotorista and id = $idcompra and is_pendente;";
$result = pg_query($conexao, $compras);

?>
