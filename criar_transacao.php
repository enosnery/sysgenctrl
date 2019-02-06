<?php

require __DIR__.'/vendor/autoload.php'; // caminho relacionado a SDK

use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

$data = json_decode(file_get_contents('php://input'), true);

$clientId = 'Client_Id_fcaded836d54be5a8597d1fb64a9d3c3be32dca9'; // insira seu Client_Id, conforme o ambiente (Des ou Prod)
$clientSecret = 'Client_Secret_b6b437aa7bccb47df2cb43eacffb6cd2782c9606'; // insira seu Client_Secret, conforme o ambiente (Des ou Prod)

$options = [
  'client_id' => $clientId,
  'client_secret' => $clientSecret,
  'sandbox' => true // altere conforme o ambiente (true = desenvolvimento e false = producao)
];

$i = 0;
foreach ($data['items'] as $key => $value) {
  $item['name'] = $value['item'];
  $item['value'] = $value['value'];
  $items[$i++] = $item;
}
// $item_1 = [
//     'name' => 'Item 1', // nome do item, produto ou serviço
//     'amount' => 1, // quantidade
//     'value' => 1000 // valor (1000 = R$ 10,00)
// ];
//
// $item_2 = [
//     'name' => 'Item 2', // nome do item, produto ou serviço
//     'amount' => 2, // quantidade
//     'value' => 2000 // valor (2000 = R$ 20,00)
// ];
//
// $items =  [
//     $item_1,
//     $item_2
// ];

// Exemplo para receber notificações da alteração do status da transação.
// $metadata = ['notification_url'=>'sua_url_de_notificacao_.com.br']
// Outros detalhes em: https://dev.gerencianet.com.br/docs/notificacoes

// Como enviar seu $body com o $metadata
// $body  =  [
//    'items' => $items,
//    'metadata' => $metadata
// ];

$body  =  [
    'items' => $items
];

try {
    $api = new Gerencianet($options);
    $charge = $api->createCharge([], $body);

    echo json_encode($charge);

} catch (GerencianetException $e) {
    print_r($e->code);
    print_r($e->error);
    print_r($e->errorDescription);
} catch (Exception $e) {
    print_r($e->getMessage());
}
