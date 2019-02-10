<?php


include("inc/conectar.inc");
// include("inc/verifica_sessao.inc");
require 'vendor/autoload.php';
use Google\Cloud\Storage\StorageClient;

$storage = new StorageClient([
  'projectId' => 'cloudweb',
  'keyFilePath' => './keys/cloudweb-62941891ca1d.json'
]);

if($_FILES["foto"]["name"] != null){
  echo $_FILES["foto"]["name"];
$bucket = $storage->bucket('cloudwebbucket');
$files = $_FILES["foto"]["name"];
$temp = $_FILES["foto"]["tmp_name"];
$ext = pathinfo($files, PATHINFO_EXTENSION);
if($ext !== 'jpg' && $ext !== 'jpeg' && $ext !== 'png'){
  header ("Location: imagemcampanha.php");
  exit;
}
$filename = "resources/".uniqid("recurso_").".".$ext;
$bucket -> upload(fopen($temp,'r'),[
          'name' => $filename
 ]);

 $filepath = "https://storage.googleapis.com/cloudwebbucket/".$filename;
 echo $filepath;
 $produtos = "UPDATE recursos SET url = ($1) WHERE nome = 'logo';";
 $resultado = pg_prepare($conexao, "query_insere", $produtos);
 $resultado = pg_execute($conexao, "query_insere", array($filepath));
 $num_linhas = pg_affected_rows($resultado);

 if ($num_linhas > 0)
 	{
    header("Location: menu_admin.php");
  }else{
       header("Refresh:0");
     }

}





?>
