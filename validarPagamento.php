<?php
require __DIR__.'/vendor/autoload.php'; // caminho relacionado a SDK

use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

$charge_id = $_POST['chargeid'];
$clientId = 'Client_Id_fcaded836d54be5a8597d1fb64a9d3c3be32dca9'; // insira seu Client_Id, conforme o ambiente (Des ou Prod)
$clientSecret = 'Client_Secret_b6b437aa7bccb47df2cb43eacffb6cd2782c9606'; // insira seu Client_Secret, conforme o ambiente (Des ou Prod)

$options = [
  'client_id' => $clientId,
  'client_secret' => $clientSecret,
  'sandbox' => true // altere conforme o ambiente (true = desenvolvimento e false = producao)
];

// $charge_id refere-se ao ID da transação gerada anteriormente
$params = [
  'id' => $charge_id
];

$paymentToken = '6426f3abd8688639c6772963669bbb8e0eb3c319'; // payment_token obtido na 1ª etapa (através do Javascript único por conta Gerencianet)

$customer = [
  'name' => 'Gorbadoc Oldbuck', // nome do cliente
  'cpf' => '94271564656' , // cpf do cliente
  'email' => 'email_do_cliente@servidor.com.br' , // endereço de email do cliente
  'phone_number' => '5144916523', // telefone do cliente
  'birth' => '1990-05-20' // data de nascimento do cliente
];

$billingAddress = [
  'street' => 'Street 3',
  'number' => 10,
  'neighborhood' => 'Bauxita',
  'zipcode' => '35400000',
  'city' => 'Ouro Preto',
  'state' => 'MG',
];

$creditCard = [
  'installments' => 1, // número de parcelas em que o pagamento deve ser dividido
  'billing_address' => $billingAddress,
  'payment_token' => $paymentToken,
  'customer' => $customer
];

$body = [
  'payment' => $payment
];

$payment = [
  'credit_card' => $creditCard // forma de pagamento (credit_card = cartão)
];

try {
    $api = new Gerencianet($options);
    $charge = $api->payCharge($params, $body);

    print_r($charge);
} catch (GerencianetException $e) {
    print_r($e->code);
    print_r($e->error);
    print_r($e->errorDescription);
} catch (Exception $e) {
    print_r($e->getMessage());
}?>
