<?php

include("inc/conectar.inc");
include("inc/verifica_sessao.inc");

$idmotorista = $_SESSION['id'];
//query que seleciona o usuario e a senha do login informados
$produtos = "SELECT id, valor_total, transaction_id, is_pendente, is_pagamento_pendente, is_unpaid FROM compras_pendentes where id_motorista = $idmotorista and date_register > current_timestamp - interval '1 day' ORDER BY id DESC;";
$usuario = "SELECT idusuario, nome FROM usuario where idusuario = $idmotorista;";
$resultado = pg_query($conexao, $produtos);
$resultusu = pg_query($conexao, $usuario);

//verifica se a query retornou algum resultado
//print odbc_errormsg($conexao);
$num_linhas = pg_num_rows($resultado);
$num_linhasusu = pg_num_rows($resultusu);

//echo $num_linhas." - Linhas</br>";
//echo $res." - Resultado</br>"
 // $result = $pg_fetch_all($resultado);
//$login = $resultado['LOGIN'];

//se retonou algum resultado, executar o registro do usuario
if ($num_linhasusu > 0)
	{
$i = 0 ;
while($row = pg_fetch_assoc($resultusu)){
	$idusu = $row['idusuario'];
	$nome = $row['nome'];
echo  "<div class='menuHeader list-group-item list-group-item-action' style='min-height:2em;border-bottom:1px solid black'>";
echo "<a onclick='reload()' class='fas fa-sync-alt' style='float:right;margin-left:10px;'></a>";
echo  "<span style='font-size:15px;text-align:left;float:right'>Código: $idusu</span>" ;
echo  "<span style='font-size:15px;text-align:right;float:left'>Motorista: $nome</span>" ;
echo  "</div>";
echo "<table id=estoqueTable>";
echo "<tr>";
echo "<td style='width:90vw'> ";
echo "<table id='estoqueListItem'>";
echo "<tr>";
echo "<td id='estoquecodDesc' class='estoquecodDesc'>";
echo "<span style='margin-left:20px;'>ID Compra";
echo "</span>";
echo "</td>";
echo "<td id='estoquedescDesc' class='estoquedescDesc'>";
echo "<span>Valor Total";
echo "</span>";
echo "</td>";
echo "<td id='estoqueqtdDesc' class='estoqueqtdDesc'>";
echo "<span>Confirmar";
echo "</span>";
echo "</td>";
echo "</tr>";
echo "</table>";
echo "</div>";
echo "</tr>";
if($num_linhas > 0 ){
echo "<tr>";

  while ($row = pg_fetch_assoc($resultado)) {
		$i++;
		$idcompra = $row['id'];
	$id = $row['transaction_id'];
	$valor = $row['valor_total'];
	if($row['is_unpaid']==='t'){
		echo "<td class='green-div' style='width:90vw;background-color:#7C0A02;color:white'> ";
		echo "<table id='estoqueListItem'>";
		echo "<tr>";
	  echo "<td id='estoquecodDesc' class='estoquecodDesc'>";
		echo "<span style='margin-left:20px;'>$id <a id=$id style='font-size:20px;' onclick='historico($id);'><i class='fas fa-angle-down' style='color:#FFF'></i></a>";
		echo "</span>";
		echo "</td>";
		echo "<td id='estoquedescDesc' class='estoquedescDesc'>";
		echo "<span>$valor";
		echo "</span>";
		echo "</td>";
		echo "<td id='estoqueqtdDesc' class='estoqueqtdDesc' >";
		// echo "<a style='font-size:20px;' onclick='confirmar($idcompra);'><i class='fas fa-check-circle' style='color:#fff'></i></a>";
	} else if($row['is_pendente']==='t' || $row['is_pagamento_pendente']==='t'){

	echo "<td class='yellow-div' style='width:90vw;background-color:#FADA5E;'> ";
	echo "<table id='estoqueListItem'>";
	echo "<tr>";
  echo "<td id='estoquecodDesc' class='estoquecodDesc'>";
	echo "<span style='margin-left:20px;'>$id <a style='font-size:20px;' onclick='historico($id);'><i class='fas fa-angle-down' style='color:#FFF'></i></a>";
	echo "</span>";
	echo "</td>";
	echo "<td id='estoquedescDesc' class='estoquedescDesc'>";
	echo "<span>$valor";
	echo "</span>";
	echo "</td>";
	echo "<td id='estoqueqtdDesc' class='estoqueqtdDesc'>";
	echo "<a id=$idcompra class='confirmarpendencias' style='font-size:20px;' onclick='confirmar($idcompra, $id)'><i class='fas fa-check-circle' style='color:#000'></i></a>";
}else if($row['is_pendente']==='f' && $row['is_pagamento_pendente']==='f'){

	echo "<td class='green-div' style='width:90vw;background-color:#0B6623;color:white'> ";
	echo "<table id='estoqueListItem'>";
	echo "<tr>";
  echo "<td id='estoquecodDesc' class='estoquecodDesc'>";
	echo "<span style='margin-left:20px;'>$id <a style='font-size:20px;' onclick='historico($id);'><i class='fas fa-angle-down' style='color:#FFF'></i></a>";
	echo "</span>";
	echo "</td>";
	echo "<td id='estoquedescDesc' class='estoquedescDesc'>";
	echo "<span>$valor";
	echo "</span>";
	echo "</td>";
	echo "<td id='estoqueqtdDesc' class='estoqueqtdDesc' >";
	echo "<a  id=$id  style='font-size:20px;'><i class='fas fa-check-circle' style='color:#fff'></i></a>";
}
	echo "</td>";
	echo "</tr>";
	echo "</table>";
	echo "</tr>";

}
	echo "</table>";
}else{
	echo "<tr>";
	echo "<td id='estoqueqtdDesc' style='display:block;margin: 0 auto;padding-left:20px;'>";
	echo "NÃO EXISTEM COMPRAS PENDENTES!";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
}
}
}

?>
