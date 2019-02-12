<?php
session_start();
include("inc/conectar.inc");


 $data = json_decode($_POST['items'], true);
 $ids = json_decode($_POST['ids'], true);
 $idmotorista = $_SESSION['$motorista'];

$quantidade = 0;
for($j=0; $j < count($ids); $j++){

  for ($i=0; $i < count($data) ; $i++) {
      if($data[$i]['item'] == $ids[$j] )
      {
        $quantidade++;
      }
}
if($quantidade != 0){
$update = "UPDATE estoque_motorista SET quantidade_atual = quantidade_atual - $quantidade WHERE idmotorista = $idmotorista and id_produto = $ids[$j];";
$result = pg_query($conexao, $update);
}
$quantidade = 0;

}


?>
