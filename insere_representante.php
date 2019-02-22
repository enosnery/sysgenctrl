<?php

if(session_status() !== PHP_SESSION_ACTIVE){
    //session has not started
    session_start();
}
include("inc/conectar.inc");
include("inc/verifica_sessao.inc");

require 'vendor/autoload.php';
use Google\Cloud\Storage\StorageClient;

$storage = new StorageClient([
  'projectId' => 'cloudweb',
  'keyFilePath' => './keys/cloudweb-62941891ca1d.json'
]);
$filepath = '';
if($_FILES["foto"]["name"] != null){
$bucket = $storage->bucket('cloudwebbucket');
$files = $_FILES["foto"]["name"];
$temp = $_FILES["foto"]["tmp_name"];
$ext = pathinfo($files, PATHINFO_EXTENSION);
if($ext !== 'jpg' && $ext !== 'jpeg' && $ext !== 'png'){
  exit;
}
$filename = "resources/".uniqid("produto_").".".$ext;
$valor = (float)str_replace(",", "",$_POST['valor']);
$bucket -> upload(fopen($temp,'r'),[
          'name' => $filename
 ]);
$filepath = "https://storage.googleapis.com/cloudwebbucket/".$filename;
}

if(isset($_POST['nome'])){$nome = $_POST['nome'];}else{$nome = "";}
if(isset($_POST['cpf'])){$cpf = $_POST['cpf'];}else{$cpf = "";}
if(isset($_POST['email'])){$email = $_POST['email'];}else{  $email = "";}
$login = strtolower($_POST['login']);
if(isset($_POST['senha'])){$senha = $_POST['senha'];}else{  $senha = "";}
if(isset($_POST['street'])){$street = $_POST['street'];}else{  $street = "";}
if(isset($_POST['street_number'])){$street_number = $_POST['street_number'];}else{  $street_number = "";}
if(isset($_POST['neighborhood'])){$neighborhood = $_POST['neighborhood'];}else{  $neighborhood = "";}
if(isset($_POST['city'])){$city = $_POST['city'];}else{  $cada = "";}
if(isset($_POST['state'])){$state = $_POST['state'];}else{  $state = "";}
if(isset($_POST['cep'])){$cep = $_POST['cep'];}else{  $cep = "";}
if(isset($_POST['pagamentoid'])){$pagamentoid = $_POST['pagamentoid'];}else{  $pagamentoid = "";}
if(isset($_POST['pagamentosecret'])){$pagamentosec = $_POST['pagamentosecret'];}else{  $pagamentosec = "";}

  $produtos = "INSERT INTO usuario (nome, email, senha, login, cpf, is_usuario_representante, cep, street, street_number, neighborhood, city, state, pagamento_id, pagamento_secret, documento_url) VALUES  ($1, $2, $3, $4, $5, true, $6, $7, $8, $9, $10, $11, $12, $13, $14);";
  $resultado = pg_prepare($conexao, "query_insert_rep", $produtos);
  $resultado = pg_execute($conexao, "query_insert_rep", array($nome, $email, $senha, $login, $cpf, $cep, $street, $street_number, $neighborhood, $city, $state, $pagamentoid, $pagamentosec, $filepath));
  echo $produtos;
  $num_linhas = pg_affected_rows($resultado);


if ($num_linhas > 0)
	{
    echo "Representante cadastrado com sucesso!";
    header("Location: cadrepresentante.php");}
  else{
    echo "Ocorreu um problema com a inclusão do Representante.";
    echo $produtos;
    }


?>
