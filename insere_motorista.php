<?php

if(session_status() !== PHP_SESSION_ACTIVE){
    //session has not started
    session_start();
}
include("inc/conectar.inc");
// include("envia_foto.php");
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
$nome = $_POST['nome'];
$codigo = $_POST['codigo'];
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
$codigo = randomString();
if(isset($_POST['street_number'])){$street_number = $_POST['street_number'];}else{  $street_number = "";}
if(isset($_POST['neighborhood'])){$neighborhood = $_POST['neighborhood'];}else{  $neighborhood = "";}
if(isset($_POST['city'])){$city = $_POST['city'];}else{  $cada = "";}
if(isset($_POST['state'])){$state = $_POST['state'];}else{  $state = "";}
if(isset($_POST['cep'])){$cep = $_POST['cep'];}else{  $cep = "";}
if(isset($_POST['pagamentoid'])){$pagamentoid = $_POST['pagamentoid'];}else{  $pagamentoid = "";}
if(isset($_POST['pagamentosecret'])){$pagamentosec = $_POST['pagamentosecret'];}else{  $pagamentosec = "";}

function randomString($length = 6) {
	$str = "";
	$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return $str;
}


  $produtos = "INSERT INTO usuario (nome, email, senha, login, cpf, codigo_motorista, is_motorista, cep, street, street_number, neighborhood, city, state, pagamento_id, pagamento_secret, documento_url) VALUES  ($1, $2, $3, $4, $5, $6, true, $7, $8, $9, $10, $11, $12, $13, $14, $15);";
  $resultado = pg_prepare($conexao, "query_insert_moto", $produtos);
  $resultado = pg_execute($conexao, "query_insert_moto", array($nome, $email, $senha, $login, $cpf, $codigo, $cep, $street, $street_number, $neighborhood, $city, $state, $pagamentoid, $pagamentosec, $filepath));
  $num_linhas = pg_affected_rows($resultado);


if ($num_linhas > 0)
	{
    echo "Motorista cadastrado com sucesso!";
    header("Location: cadmotorista.php");}
    else{
    echo "Ocorreu um problema com a inclusão do Usuário.";
    header("Refresh: 0");
    }


?>
