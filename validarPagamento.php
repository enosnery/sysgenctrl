<?php
session_start();
require __DIR__.'/vendor/autoload.php'; // caminho relacionado a SDK

use Gerencianet\Exception\GerencianetException;
use Gerencianet\Gerencianet;

$charge_id = $_POST['charge_id'];
$street = $_POST['street'];
$streetnumber = $_POST['street_number'];
$neighborhood = $_POST['neighborhood'];
$zipcode = $_POST['zipcode'];
$city = $_POST['city'];
$state = $_POST['state'];
$paymentToken = $_POST['token'];
$clientId = $_POST['pagamento_id']; // insira seu Client_Id, conforme o ambiente (Des ou Prod)
$clientSecret = $_POST['pagamento_secret']; // insira seu Client_Secret, conforme o ambiente (Des ou Prod)

$options = [
  'client_id' => $clientId,
  'client_secret' => $clientSecret,
  'sandbox' => true // altere conforme o ambiente (true = desenvolvimento e false = producao)
];

// $charge_id refere-se ao ID da transação gerada anteriormente
$params = [
  'id' => $charge_id
];

// $paymentToken = '6426f3abd8688639c6772963669bbb8e0eb3c319'; // payment_token obtido na 1ª etapa (através do Javascript único por conta Gerencianet)

$customer = [
  'name' => 'Cliente Sem Cadastro', // nome do cliente
  'cpf' => '94271564656' , // cpf do cliente
  'email' => 'email_do_cliente@servidor.com.br' , // endereço de email do cliente
  'phone_number' => '5144916523', // telefone do cliente
  'birth' => '1990-05-20' // data de nascimento do cliente
];

$billingAddress = [
  'street' => $street,
  'number' => $streetnumber,
  'neighborhood' => $neighborhood,
  'zipcode' => $zipcode,
  'city' => $city,
  'state' => $state,
];

$creditCard = [
  'installments' => 1, // número de parcelas em que o pagamento deve ser dividido
  'billing_address' => $billingAddress,
  'payment_token' => $paymentToken,
  'customer' => $customer
];


$payment = [
  'credit_card' => $creditCard // forma de pagamento (credit_card = cartão)
];
echo $payment;
$body = [
  'payment' => $payment
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
