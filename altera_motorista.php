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
if(isset($_POST['nome']){$nome = $_POST['nome'];}else{  $nome = "";}
if(isset($_POST['email']){$email = $_POST['email'];}else{  $email = "";}
if(isset($_POST['senha']){$senha = $_POST['senha'];}else{  $senha = "";}
if(isset($_POST['street']){$street = $_POST['street'];}else{  $street = "";}
if(isset($_POST['street_number']){$street_number = $_POST['street_number'];}else{  $street_number = "";}
if(isset($_POST['neighborhood']){$neighborhood = $_POST['neighborhood'];}else{  $neighborhood = "";}
if(isset($_POST['city']){$city = $_POST['city'];}else{  $cada = "";}
if(isset($_POST['state']){$state = $_POST['state'];}else{  $state = "";}
if(isset($_POST['cep']){$nome = $_POST['nome'];}else{  $nome = "";}
if(isset($_POST['pagamentoid']){$nome = $_POST['nome'];}else{  $nome = "";}
if(isset($_POST['pagamentoid']){$nome = $_POST['psec'];}else{  $nome = "";}

$email = isset($_POST['email']) ? $_POST['email'] : "";
$senha = isset($_POST['senha']) ? $_POST['senha'] : null ;
$street = isset($_POST['street']) ? $_POST['street'] : "";
$street_number = isset($_POST['street_number']) ? $_POST['street_number'] : 0;
$neighborhood = isset($_POST['neighborhood']) ? $_POST['neighborhood'] : "";
$city = isset($_POST['city']) ? $_POST['city'] : "";
$state = isset($_POST['state']) ? $_POST['state'] : "";
$cep = isset($_POST['cep']) ? $_POST['cep'] : 1234234;
$pagamentoid = isset($_POST['pid']) ? $_POST['pid'] : "" ;
$pagamentosec = isset($_POST['psec']) ? $_POST['psec'] : "" ;
if ($senha === null) {
    $produtos = "UPDATE usuario SET nome = $1, email = $2, pagamento_id = $3, pagamento_secret = $4, cep = $5, street = $6, street_number = $7, neighborhood = $8, city = $9, state = $10, documento_url = $11 WHERE idusuario = $12;";
    $resultado = pg_prepare($conexao, "query_login", $produtos);
    echo $nome;
    echo "/";
    echo $email;
    echo "/";
    echo $pagamentoid;
    echo "/";
    echo $pagamentosec;
    echo "/";
    echo $cep;
    echo "/";
    echo $street;
    echo "/";
    echo $street_number;
    echo "/";
    echo $neighborhood;
    echo "/";
    echo $city;
    echo "/";
    echo $state;
    echo "/";
    echo $filepath;
    echo "/";
    echo $id;
    echo "/";

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
  }else{
    echo "Não foi possível alterar o Motorista.";
  }
?>
