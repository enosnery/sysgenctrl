<?php
session_start();
include("inc/conectar.inc");

$idmotorista = $_SESSION['$motorista'];
$transaction = $_SESSION['charge_id'];
$valortotal = $_SESSION['total'];
$brand = $_POST['brand'];
$number = $_POST['number'];
$cvv = $_POST['cvv'];
$expmon = $_POST['expiration_month'];
$expyear = $_POST['expiration_year'];
$street = $_POST['street'];
$streetnumber = $_POST['street_number'];
$neighborhood = $_POST['neighborhood'];
$zipcode = $_POST['zipcode'];
$city = $_POST['city'];
$state = $_POST['state'];
$_SESSION['brand'] = $brand;
$_SESSION['number'] = $number;
$_SESSION['cvv'] = $cvv;
$_SESSION['expiration_month'] = $expmon;
$_SESSION['expiration_year'] = $expyear;
$_SESSION['street'] = $street;
$_SESSION['street_number'] = $streetnumber;
$_SESSION['neighborhood'] = $neighborhood;
$_SESSION['zipcode'] = $zipcode;
$_SESSION['city'] = $city;
$_SESSION['state'] = $state;

$pendente = "INSERT INTO compras_pendentes (id_motorista, is_pendente, valor_total, transaction_id) VALUES ($idmotorista, TRUE, $valortotal, $transaction);";
$resultado = pg_query($conexao, $pendente);

if (pg_affected_rows($resultado)>0){
header("Location: aguarda_confirmacao.php");
}else{
  echo "Erro ao Criar a Transação!";
}
// header("Location: aguarda_confirmacao.php");
?>
