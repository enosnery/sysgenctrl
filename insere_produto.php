<?php

if(session_status() !== PHP_SESSION_ACTIVE){
    //session has not started
    session_start();
}
include("inc/conectar.inc");
require 'vendor/autoload.php';
use Google\Cloud\Storage\StorageClient;

$storage = new StorageClient([
  'projectId' => 'cloudweb',
  'keyFilePath' => './keys/cloudweb-62941891ca1d.json'
]);

if($_FILES["foto"]["name"] != null){
  echo "entrou na foto";
$bucket = $storage->bucket('cloudwebbucket');
$files = $_FILES["foto"]["name"];
$temp = $_FILES["foto"]["tmp_name"];
$ext = pathinfo($files, PATHINFO_EXTENSION);
$filename = "resources/".uniqid("produto_").".".$ext;
$nome = $_POST['nome'];
$valor = (float)str_replace(",", "",$_POST['valor']);
$codigo = $_POST['codigo'];
$bucket -> upload(fopen($temp,'r'),[
          'name' => $filename
 ]);

 $filepath = "https://storage.googleapis.com/cloudwebbucket/".$filename;
 $produtos = "INSERT INTO produtos (descricao, valor, codigo, picture_url) VALUES  ($1, $2, $3, $4);";
 $resultado = pg_prepare($conexao, "query_insere", $produtos);
 $resultado = pg_execute($conexao, "query_insere", array($nome, $valor, $codigo, $filepath));
 $num_linhas = pg_affected_rows($resultado);

 if ($num_linhas > 0)
 	{
     echo "Produto Cadastrado com Sucesso!";}
     else{
       echo "Ocorreu um problema com a inclusão do Produto.";
     }

}else{
  $nome = $_POST['nome'];
  $valor = (float)str_replace(",", "",$_POST['valor']);
  $codigo = $_POST['codigo'];
  $produtos = "INSERT INTO produtos (descricao, valor, codigo) VALUES  ($1, $2, $3);";
  $resultado = pg_prepare($conexao, "query_insere", $produtos);
  $resultado = pg_execute($conexao, "query_insere", array($nome, $valor, $codigo));
  $num_linhas = pg_affected_rows($resultado);

  if ($num_linhas > 0)
  	{
      header("cadproduto.php");}
      else{
        header("cadproduto");
      }

}




?>
