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

if($_FILES["foto"]["name"] != null){
$bucket = $storage->bucket('cloudwebbucket');
$files = $_FILES["foto"]["name"];
$temp = $_FILES["foto"]["tmp_name"];
$ext = pathinfo($files, PATHINFO_EXTENSION);
if($ext !== 'jpg' && $ext !== 'jpeg' && $ext !== 'png'){
  exit;
}
$filename = "resources/".uniqid("motorista_").".".$ext;
$bucket -> upload(fopen($temp,'r'),[
          'name' => $filename
 ]);
}

 $filepath = "https://storage.googleapis.com/cloudwebbucket/".$filename;
$id = $_POST['index'];
if(isset($_POST['nome'])){$nome = $_POST['nome'];}else{$nome = "";}
if(isset($_POST['email'])){$email = $_POST['email'];}else{  $email = "";}
if(isset($_POST['senha'])){$senha = $_POST['senha'];}else{  $senha = "";}
if(isset($_POST['street'])){$street = $_POST['street'];}else{  $street = "";}
if(isset($_POST['street_number'])){$street_number = $_POST['street_number'];}else{  $street_number = "";}
if(isset($_POST['neighborhood'])){$neighborhood = $_POST['neighborhood'];}else{  $neighborhood = "";}
if(isset($_POST['city'])){$city = $_POST['city'];}else{  $cada = "";}
if(isset($_POST['state'])){$state = $_POST['state'];}else{  $state = "";}
if(isset($_POST['cep'])){$cep = $_POST['cep'];}else{  $cep = "";}
if(isset($_POST['pagamentoid'])){$pagamentoid = $_POST['pagamentoid'];}else{  $pagamentoid = "";}
if(isset($_POST['pagamentosecret'])){$pagamentosec = $_POST['pagamentosecret'];}else{  $pagamentosec = "";}
if ($senha === null) {
    $produtos = "UPDATE usuario SET nome = $1, email = $2, pagamento_id = $3, pagamento_secret = $4, cep = $5, street = $6, street_number = $7, neighborhood = $8, city = $9, state = $10, documento_url = $11 WHERE idusuario = $12;";
    $resultado = pg_prepare($conexao, "query_login", $produtos);
    $resultado = pg_execute($conexao, "query_login", array($nome, $email, $pagamentoid, $pagamentosec, $cep, $street, $street_number, $neighborhood, $city, $state, $filepath, $id));
}else{
  $produtos = "UPDATE usuario SET nome = $1, email = $2, pagamento_id = $3, pagamento_secret = $4, cep = $5, street = $6, street_number =$7, neighborhood = $8, city = $9, state = $10, documento_url = $11, senha = $12 WHERE idusuario = $13;";

  $resultado = pg_prepare($conexao, "query_login", $produtos);
  $resultado = pg_execute($conexao, "query_login", array($nome, $email, $pagamentoid, $pagamentosec, $cep, $street, $street_number, $neighborhood, $city, $state, $filepath, $senha, $id));
}

$num_linhas = pg_affected_rows($resultado);

if ($num_linhas > 0)
	{
    echo "Motorista alterado com sucesso!";
    header("Location: cad_mot_detail.php");
  }else{
    echo "Não foi possível alterar o Motorista.";
    header("Location: cad_mot_detail.php");
  }
?>
