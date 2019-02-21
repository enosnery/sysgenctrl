<?php
session_start();
include('inc/conectar.inc');
require __DIR__.'/vendor/autoload.php'; // caminho relacionado a SDK

use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

$idmotorista = $_GET['idmotorista'];

$update = "SELECT pagamento_id, pagamento_secret FROM usuario WHERE idusuario = $idmotorista;";
$result = pg_query($conexao, $update);
while ($row = pg_fetch_assoc($result)) {
$clientId = $row['pagamento_id']; // insira seu Client_Id, conforme o ambiente (Des ou Prod)
$clientSecret = $row['pagamento_secret'];; // insira seu Client_Secret, conforme o ambiente (Des ou Prod
}
$options = [
  'client_id' => $clientId,
  'client_secret' => $clientSecret,
  'sandbox' => true // altere conforme o ambiente (true = desenvolvimento e false = producao)
];

/*
* Este token será recebido em sua variável que representa os parâmetros do POST
* Ex.: $_POST['notification']
*/
$token = $_POST['notification'];
echo "retorno \n";
echo $token;
echo "\n";



$params = [
  'token' => $token
];

try {
    $api = new Gerencianet($options);
    $chargeNotification = $api->getNotification($params, []);
  // Para identificar o status atual da sua transação você deverá contar o número de situações contidas no array, pois a última posição guarda sempre o último status. Veja na um modelo de respostas na seção "Exemplos de respostas" abaixo.

  // Veja abaixo como acessar o ID e a String referente ao último status da transação.

    // Conta o tamanho do array data (que armazena o resultado)
    $i = count($chargeNotification["data"]);
    // Pega o último Object chargeStatus
    $ultimoStatus = $chargeNotification["data"][$i-1];
    // Acessando o array Status
    $status = $ultimoStatus["status"];
    // Obtendo o ID da transação
    $charge_id = $ultimoStatus["identifiers"]["charge_id"];
    // Obtendo a String do status atual
    $statusAtual = $status["current"];

    if($statusAtual === 'paid'){
    $update = "UPDATE compras_pendentes SET is_pagamento_pendente = false, is_confirmacao_pendente = false where transaction_id = $charge_id::text";
    echo $update;
    $resultado = pg_query($conexao, $update);

    $prodlist = "SELECT count(t.id_produto) as a, t.id_motorista as b, t.transaction_id as c, t.id_produto as d FROM transactions t WHERE transaction_id = $charge_id::text GROUP BY t.id_motorista, t.transaction_id, t.id_produto;";
   $result1 = pg_query($conexao, $prodlist);

   while ($row = pg_fetch_assoc($result1)) {
     $quantidade = $row['a'];
     $idmotorista = $row['b'];
     $idproduto = $row['d'];

     $update = "UPDATE estoque_motorista SET quantidade_atual = quantidade_atual - $quantidade WHERE idmotorista = $idmotorista and id_produto = $idproduto;";
     $result = pg_query($conexao, $update);

   }

   $clear_data = "DELETE FROM temp_card_data WHERE idtransaction = $charge_id";
   $result = pg_query($conexao, $clear_data);
}
    if($statusAtual === 'unpaid'){
    $update = "UPDATE compras_pendentes SET is_unpaid = true where transaction_id = $charge_id::text";
    echo $update;
    $resultado = pg_query($conexao, $update);
    }
    // Com estas informações, você poderá consultar sua base de dados e atualizar o status da transação especifica, uma vez que você possui o "charge_id" e a String do STATUS

    echo "O id da transação é: ".$charge_id." seu novo status é: ".$statusAtual;

    // header("Location: baixa_estoque_mot.php?transaction_id=$charge_id");


    //print_r($chargeNotification);
} catch (GerencianetException $e) {
    print_r($e->code);
    print_r($e->error);
    print_r($e->errorDescription);
} catch (Exception $e) {
    print_r($e->getMessage());
}
