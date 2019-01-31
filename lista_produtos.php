<?php
include("inc/conectar.inc");
//include("/inc/verifica_sessao.inc");

//query que seleciona o usuario e a senha do login informados
$produtos = "SELECT id, descricao, picture_url, valor FROM produtos ORDER BY id;";

$resultado = pg_query($conexao, $produtos);

//verifica se a query retornou algum resultado
//print odbc_errormsg($conexao);
$num_linhas = pg_num_rows($resultado);

//echo $num_linhas." - Linhas</br>";
//echo $res." - Resultado</br>"
 // $result = $pg_fetch_all($resultado);
//$login = $resultado['LOGIN'];

//se retonou algum resultado, executar o registro do usuario
if ($num_linhas > 0)
	{
echo "<table id=cadprodTable>";
echo "<tr>";
$i = 0 ;
  while ($row = pg_fetch_assoc($resultado)) {
		$i++;
  $imagem = $row['picture_url'];
	$id = $row['id'];
	$value = number_format($row['valor'], 2, '.', '');
  echo "<td class='col-md-6 centAlign'> ";
	echo "<table>";
	echo "<tr>";
	echo "<td style='width:10%'>";
  echo "<span class='centAlign iconeplus glyphicon glyphicon-plus-sign' onclick='addItem($i)'>";
	echo "</span>";
	echo "</td>";
	echo "<td>";
	echo "<input id='product-id-$i' type='hidden' value='$id'>";
	echo "<input id='product-value-$i' type='hidden' value='$value'>";
  echo "<img style='width:80%' class='centAlign productsImage img-responsive' src='$imagem' />";
	echo "<span style='font-size:11px;	'>R$ $value";
	echo "</span>";
	echo "</td>";
	echo "<td style='width:10%'>";
	echo "<span class='centAlign iconeminus glyphicon glyphicon-minus-sign' onclick='removeItem($i)'>";
	echo "</span>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
  echo "</td>";
  if ($i%2==0) {
  echo "</tr>";
  echo "<tr>";
}
      }
echo "</table>";

}

?>
