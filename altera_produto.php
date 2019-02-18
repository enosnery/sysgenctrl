<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    //session has not started
    session_start();
}
require 'vendor/autoload.php';
use Google\Cloud\Storage\StorageClient;
include("inc/conectar.inc");

$id = $_POST['index'];
$nome = $_POST['nome'];
$valor = $_POST['valor'];
$codigo = $_POST['codigo'];


$storage = new StorageClient([
  'projectId' => 'cloudweb',
  'keyFilePath' => './keys/cloudweb-62941891ca1d.json'
]);

if($_FILES["fotog"]["name"] != null){
$bucket = $storage->bucket('cloudwebbucket');
$files = $_FILES["fotog"]["name"];
$temp = $_FILES["fotog"]["tmp_name"];
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


$produtos = "UPDATE produtos SET descricao = $1, valor = $2, picture_url = $3, codigo = $4 WHERE id = $5;";
$resultado = pg_prepare($conexao, "query_login", $produtos);
$resultado = pg_execute($conexao, "query_login", array($nome, $valor, $filepath, $codigo, $id));
$num_linhas = pg_affected_rows($resultado);

if ($num_linhas > 0)
	{
    header('Location: cadproduto.php');}
  }else{
    $produtos = "UPDATE produtos SET descricao = $1, valor = $2, codigo = $3 WHERE id = $4;";
    $resultado = pg_prepare($conexao, "query_login", $produtos);
    $resultado = pg_execute($conexao, "query_login", array($nome, $valor, $codigo, $id));
    $num_linhas = pg_affected_rows($resultado);

    if ($num_linhas > 0)
    	{
        echo $filepath;
        // header('Location: cadproduto.php');}

  }
}


?>
