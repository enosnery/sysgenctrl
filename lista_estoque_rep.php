<?php

include("inc/conectar.inc");
include("inc/verifica_sessao.inc");

$id = $_SESSION['id'];
//query que seleciona o usuario e a senha do login informados
$produtos = "SELECT p.id, p.descricao, e.quantidade_atual FROM produtos p inner join estoque_representante e on e.id_produto = p.id where e.idrepresentante = $id ORDER BY id;";

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
echo "<table id=cadRepTable>";
echo "<tr>";
echo "<td style='width:90vw'> ";
echo "<table id='cadListItem'>";
echo "<tr>";
echo "<td id='cadRepDesc' style='width:105px;'>";
echo "<span style='margin-left:20px;'>Código";
echo "</span>";
echo "</td>";
echo "<td id='cadRepDesc'>";
echo "<span style='margin-left:20px;'>Descrição";
echo "</span>";
echo "</td>";
echo "<td id='cadRepDesc'>";
echo "<span style='margin-left:20px;'>Quantidade";
echo "</span>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
echo "</tr>";
echo "<tr>";
  while ($row = pg_fetch_assoc($resultado)) {
		$i++;

	$id = $row['id'];
	$nome = $row['descricao'];
	$qtde = $row['quantidade_atual'];


	echo "<td style='width:90vw'> ";
	echo "<table id='cadListItem'>";
	echo "<tr>";
  echo "<td id='cadRepDesc' style='width:105px;'>";
	echo "<span style='margin-left:20px;'>$id";
	echo "</span>";
	echo "</td>";
	echo "<td id='cadRepDesc'>";
	echo "<span style='margin-left:20px;'>$nome";
	echo "</span>";
	echo "</td>";
	echo "<td id='cadRepDesc'>";
	echo "<span style='margin-left:20px;'>$qtde";
	echo "</span>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
	echo "</div>";
	echo "</tr>";
	echo "<tr>";
}
}


?>
