<?php

include("inc/conectar.inc");
include("/inc/verifica_sessao.inc");

//query que seleciona o usuario e a senha do login informados
$produtos = "SELECT id, descricao, picture_url FROM produtos ORDER BY id;";

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
$i = 0 ;
echo "<table id=cadprodTable>";
echo "<tr>";
  while ($row = pg_fetch_assoc($resultado)) {
		$i++;
  $imagem = $row['picture_url'];
	$id = $row['id'];
	$nome = $row['descricao'];
	echo "<td style='width:90vw'> ";
	echo "<table id='cadListItem'>";
	echo "<tr>";
	echo "<td id='cadProdImg'>";
	echo "<input id='product-id-$i' type='hidden' value='$id'>";
	echo "<input id='product-value-$i' type='hidden' value='$nome'>";
  echo "<img class='cadProductsImage img-responsive' src='$imagem' />";
	echo "</td>";
  echo "<td id='cadProdDesc'>";
	echo "<span class='nome'>$nome";
	echo "</span>";
	echo "</td>";
	echo "<td id='cadProdButton'>";
	echo "<a class='glyphicon glyphicon-pencil' onclick='goToDetail($id)'>";
	echo "</a>";
	echo "</td>";
	echo "<td id='cadProdButton'>";
	echo "<a class='glyphicon glyphicon-trash' onclick='removeProd($id)'>";
	echo "</a>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
	echo "</div>";
	echo "</tr>";
	echo "<tr>";
}
}


?>
