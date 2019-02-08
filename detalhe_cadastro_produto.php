<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    //session has not started
    session_start();
}
include("inc/conectar.inc");
include("inc/verifica_sessao.inc");
$index = $_SESSION['prodIndex'];
//query que seleciona o usuario e a senha do login informados
$produtos = "SELECT id, descricao, picture_url, valor FROM produtos WHERE id = $index;";

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
  while ($row = pg_fetch_assoc($resultado)) {
		$i++;
  $imagem = $row['picture_url'];
	$id = $row['id'];
	$nome = $row['descricao'];
	$valor = number_format($row['valor'], 2, '.', '');
	echo "<div class='prodDetailImg'>";
  echo "<img class='prodDetailImg img-responsive' src='$imagem' />";
	echo "</div>";
	echo "<input id='product-value-$i' class='form-control-file' style='margin-bottom:20px;' type='file' value='$nome'>";
	echo "<input id='index' name='index' type='hidden' value='$id'>";
  echo "<label for='nome'>Nome</label>";
	echo "<input id='nome' name='nome' class='prodDetailInput centAlign' value='$nome' />";
  echo "<label for='valor'>Valor</label>";
	echo "<input id='valor' name='valor' class='prodDetailInput centAlign' value='$valor' />";
}
}


?>
