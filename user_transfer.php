<?php

include("inc/conectar.inc");
include("inc/verifica_sessao.inc");

$idmotorista = $_SESSION['idusuarioestoque'];
//query que seleciona o usuario e a senha do login informados
$usuario = "SELECT idusuario, nome FROM usuario where idusuario = $idmotorista;";
$resultusu = pg_query($conexao, $usuario);

//verifica se a query retornou algum resultado
//print odbc_errormsg($conexao);
$num_linhasusu = pg_num_rows($resultusu);

//echo $num_linhas." - Linhas</br>";
//echo $res." - Resultado</br>"
 // $result = $pg_fetch_all($resultado);

if ($num_linhasusu > 0)
	{
$i = 0 ;
while($row = pg_fetch_assoc($resultusu)){
	$idusu = $row['idusuario'];
	$nome = $row['nome'];
echo  "<div class='menuHeader list-group-item list-group-item-action' style='min-height:2em;border-bottom:1px solid black'>";
echo  "<span style='font-size:15px;text-align:right;float:left'>Motorista: $nome</span>" ;
echo  "<input id='idusu' type='hidden' value='$idusu' ></input>" ;
echo  "</div>";
echo "</select>";
echo "<br>";
echo "<label for='qtde'>Quantidade</label>";
echo "<input id='qtdemoto' name='qtde' class='prodDetailInput centAlign' placeholder='Quantidade' />";
echo "<button type='button' id='transfer' class='btn btn-sm btn-primary' title='Transferir para Motorista' onclick='transferMoto();''>Transferir</button>";
echo  "</div>";
}
}
?>
