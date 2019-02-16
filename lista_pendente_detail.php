<?php
session_start();
include("inc/conectar.inc");

$idmotorista = $_SESSION['id'];
$transaction_id = $_POST['transaction'];
//query que seleciona o usuario e a senha do login informados
$prodlist = "SELECT count(t.id_produto) as a, p.descricao as b, p.valor as c FROM transactions t LEFT JOIN produtos p on t.id_produto = p.id WHERE id_motorista = $idmotorista AND transaction_id = $transaction_id::text GROUP BY p.descricao, p.valor;";

$resultlist = pg_query($conexao, $prodlist);

$num_linhaslist = pg_num_rows($resultlist);


//se retonou algum resultado, executar o registro do usuario
if($num_linhaslist > 0){
	echo "<div id='dialog' class='contain' title='Produtos da Compra' style='display:none;'>";
	echo "<table id='tablependente'>";
	echo "<tr class='row' style='width:95%;margin-left:20px;border-bottom:1px solid black'>";
	echo "<th style='width:30vw;font-size:15px;'>Produto</th>";
	echo "<th style='width:30vw;font-size:15px;'>QTDE</th>";
	echo "<th style='width:30vw;font-size:15px;'>Total</th>";
	echo "</tr>";

  while ($row = pg_fetch_assoc($resultlist)) {
			echo "<tr class='row'>";
		$idcompra = $row['a'];
		$id = $row['b'];
		$valor = $row['c']*$idcompra;

		echo "<td style='font-size:13px;'>$id </td>";
		echo "<td style='font-size:13px;'>$idcompra </td>";
		echo "<td style='font-size:13px;'>".$valor."</td>";
		echo "</tr>";
}


		echo "</table>";
		echo "</div>";


}


?>
