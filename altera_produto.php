<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    //session has not started
    session_start();
}
include("inc/conectar.inc");
//include("/inc/verifica_sessao.inc");
$id = $_POST['index'];
$nome = $_POST['nome'];
$valor = $_POST['valor'];

echo $id;
echo "<br>";
echo $nome;
echo "<br>";
echo $valor;
//query que seleciona o usuario e a senha do login informados
$produtos = "UPDATE produtos SET nome = '$nome', valor = '$valor' WHERE id = $id;";

$resultado = pg_query($conexao, $produtos);


//verifica se a query retornou algum resultado
//print odbc_errormsg($conexao);
$num_linhas = pg_num_rows($resultado);
//
// //echo $num_linhas." - Linhas</br>";
// //echo $res." - Resultado</br>"
//  // $result = $pg_fetch_all($resultado);
// //$login = $resultado['LOGIN'];
//
// //se retonou algum resultado, executar o registro do usuario
if ($num_linhas > 0)
	{
    header('Location: cad_produto_detail.php');}
// $i = 0 ;
//   while ($row = pg_fetch_assoc($resultado)) {
// 		$i++;
//   $imagem = $row['picture_url'];
// 	$id = $row['id'];
// 	$nome = $row['nome'];
// 	$valor = $row['valor'];
// 	echo "<div class='prodDetailImg'>";
// 	echo "<input id='$' type='hidden' value='$id'>";
// 	echo "<input id='product-value-$i' type='hidden' value='$nome'>";
//   echo "<img class='prodDetailImg img-responsive' src='$imagem' />";
// 	echo "</div>";
// 	echo "<input id='product-value-$i' class='form-control-file' style='font-sizemargin-bottom:20px;' type='file' value='$nome'>";
//   echo "<div class='input-group'>";
//   echo "<div class='input-group-addon'>Nome</div> ";
//   echo "<input name='nome' class='prodDetailInput centAlign' value='$nome' />";
//   echo "</div>";
// 	echo "<input name='valor' class='prodDetailInput centAlign' value='$valor' />";
// }
// }


?>
