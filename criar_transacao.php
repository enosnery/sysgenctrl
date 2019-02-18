<?php
session_start();
include ('inc/conectar.inc');
require __DIR__.'/vendor/autoload.php'; // caminho relacionado a SDK

use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

$data = json_decode($_POST['items'], true);
$idmotorista = $_SESSION['$motorista'];

$keyquery = "SELECT pagamento_id, pagamento_secret FROM usuario WHERE idusuario = $idmotorista;";
$resultado = pg_query($conexao, $keyquery);

$num_linhas = pg_num_rows($resultado);
if($num_linhas > 0){
  while($row = pg_fetch_assoc($resultado)){
$clientId = $row['pagamento_id'];
$_SESSION['pagamento_id'] = $row['pagamento_id']; // insira seu Client_Id, conforme o ambiente (Des ou Prod)
$clientSecret = $row['pagamento_secret']; // insira seu Client_Secret, conforme o ambiente (Des ou Prod)
$_SESSION = $row['pagamento_secret'];

$options = [
  'client_id' => $clientId,
  'client_secret' => $clientSecret,
  'sandbox' => true // altere conforme o ambiente (true = desenvolvimento e false = producao)
];

$items = [];
for ($i=0; $i < count($data) ; $i++) {
  $value['name'] = $data[$i]['item'];
  $value['value'] = intval($data[$i]['value']);
  $items[] = $value;
} {

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
$metadata = array('notification_url'=>'http://35.231.173.150/market/gn_confirma_transacao.php');

$body  =  [
    'items' => $items,
    'metadata' => $metadata

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
}
}else{
  echo "Não foi possível processar o pagamento. Tente Novamente!";
}
?>
