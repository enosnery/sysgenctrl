<?php

include("inc/conectar.inc");
include("inc/verifica_sessao.inc");

$idmotorista = $_SESSION['id'];
//query que seleciona o usuario e a senha do login informados
$rep = "SELECT idusuario, nome FROM usuario where is_motorista;";

$resultrep = pg_query($conexao, $rep);

$num_linhasrep = pg_num_rows($resultrep);

//se retonou algum resultado, executar o registro do usuario
if ($num_linhasrep > 0)
	{
echo 	"<select id='transferMoto' class='form-control' data-show-icon='true'>";
echo  "<div class='list-group-item list-group-item-action'>";
while($row = pg_fetch_assoc($resultrep)){
	$idusu = $row['idusuario'];
	$nome = $row['nome'];
echo  "<option value='$idusu'>$nome</option>";
}
echo  "</div>";
echo "</select>";
echo "<br>";
echo "<label for='qtde'>Quantidade</label>";
echo "<input id='qtdemoto' name='qtde' class='prodDetailInput centAlign' placeholder='Quantidade' />";
echo "<button type='button' id='transfer' class='btn btn-sm btn-primary' title='Transferir para Motorista' onclick='transferMoto();''>Transferir</button>";
}

?>
