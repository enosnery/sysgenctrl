<?php

include("inc/conectar.inc");
include("inc/verifica_sessao.inc");

$idmotorista = $_SESSION['id'];
//query que seleciona o usuario e a senha do login informados
$produtos = "SELECT p.id, p.descricao, e.quantidade_atual FROM produtos p inner join estoque_adm e on e.id_produto = p.id where e.idadmin = $idmotorista ORDER BY id;";
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
if ($num_linhas > 0 && $num_linhasusu > 0)
	{
$i = 0 ;
while($row = pg_fetch_assoc($resultusu)){
	$idusu = $row['idusuario'];
	$nome = $row['nome'];
echo  "<div class='menuHeader list-group-item list-group-item-action' style='min-height:2em;border-bottom:1px solid black'>";
echo  "<span class='fas fa-plus' style='font-size:1.2em;margin-left:10px;float:right' onclick='addToStock();'></span>" ;
echo  "<span style='font-size:15px;text-align:left;float:right'>Código: $idusu</span>" ;
echo  "<span style='font-size:15px;text-align:right;float:left'>Usuário: $nome</span>" ;
echo  "</div>";
echo "<table id=estoqueTable>";
echo "<tr>";
echo "<td style='width:90vw'> ";
echo "<table id='estoqueListItem'>";
echo "<tr>";
echo "<td id='estoquecodDesc' class='estoquecodDesc'>";
echo "<span style='margin-left:20px;'>Código";
echo "</span>";
echo "</td>";
echo "<td id='estoquedescDesc' class='estoquedescDesc'>";
echo "<span>Produto";
echo "</span>";
echo "</td>";
echo "<td id='estoqueqtdDesc' class='estoqueqtdDesc'>";
echo "<span>QTDE";
echo "</span>";
echo "</td>";
echo "<td id='estoqueqtdDesc' class='estoqueqtdDesc'>";
echo "<span>Transferir";
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
	$desc = $row['descricao'];
	$qtde = $row['quantidade_atual'];


	echo "<td style='width:90vw'> ";
	echo "<table id='estoqueListItem'>";
	echo "<tr>";
  echo "<td id='estoquecodDesc' class='estoquecodDesc'>";
	echo "<span style='margin-left:20px;'>$id";
	echo "</span>";
	echo "</td>";
	echo "<td id='estoquedescDesc' class='estoquedescDesc'>";
	echo "<span>$desc";
	echo "</span>";
	echo "</td>";
	echo "<td id='estoqueqtdDesc' class='estoqueqtdDesc' >";
	echo "<span>$qtde";
	echo "</span>";
	echo "</td>";
	echo "<td id='estoqueqtdDesc' class='estoqueqtdDesc' >";
	echo "<a style='font-size:20px;' onclick='transfer($id, $qtde);'><i class='fas fa-plus-circle'></i></a>";
	echo "</td>";
	echo "</tr>";
	echo "</table>";
	echo "</div>";
	echo "</tr>";
	echo "<tr>";
}
}
}

?>
