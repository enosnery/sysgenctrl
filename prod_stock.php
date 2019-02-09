<?php

include("inc/conectar.inc");
include("inc/verifica_sessao.inc");

$idmotorista = $_SESSION['id'];
//query que seleciona o usuario e a senha do login informados
$rep = "SELECT id, descricao FROM produtos;";

$resultrep = pg_query($conexao, $rep);

$num_linhasrep = pg_num_rows($resultrep);

//se retonou algum resultado, executar o registro do usuario
if ($num_linhasrep > 0)
	{
echo 	"<select id='addStock' class='form-control' data-show-icon='true'>";
echo  "<div class='list-group-item list-group-item-action'>";
while($row = pg_fetch_assoc($resultrep)){
	$idusu = $row['id'];
	$nome = $row['descricao'];
echo  "<option value='$idusu'>$nome</option>";
}
echo  "</div>";
echo "</select>";
echo "<br>";
echo "<label for='qtde'>Quantidade</label>";
echo "<input id='addprod' name='qtde' class='prodDetailInput centAlign' placeholder='Quantidade' />";
echo "<button type='button' id='transfer' class='btn btn-sm btn-primary' title='Voltar' onclick='addStock();''>Adicionar</button>";
}

?>
