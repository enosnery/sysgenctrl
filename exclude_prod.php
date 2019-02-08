<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    //session has not started
    session_start();
}
include("inc/conectar.inc");
include("inc/verifica_sessao.inc");
$id = $_POST['index'];

$produtos = "DELETE FROM produtos WHERE id = $1;";
$resultado = pg_prepare($conexao, "query_delete_prod", $produtos);
$resultado = pg_execute($conexao, "query_delete_prod", array($id));
$num_linhas = pg_affected_rows($resultado);

if ($num_linhas > 0)
	{
    echo "Produto excluído com sucesso!";
  }else{
    echo "Não foi possível excluir esse produto.";
  }


?>
