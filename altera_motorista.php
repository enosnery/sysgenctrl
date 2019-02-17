<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    //session has not started
    session_start();
}
include("inc/conectar.inc");
include("inc/verifica_sessao.inc");
$id = $_POST['index'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$pagamentoid = $_POST['pid'];
$pagamentosec = $_POST['psec'];
if ($senha === null) {
    $produtos = "UPDATE usuario SET nome = $1, email = $2, pagamento_id = $3, pagamento_secret = $4 WHERE idusuario = $5;";
    $resultado = pg_prepare($conexao, "query_login", $produtos);
    $resultado = pg_execute($conexao, "query_login", array($nome, $email, $pagamentoid, $pagamentosec,$id));
}else{
  $produtos = "UPDATE usuario SET nome = $1, email = $2, pagamento_id = $3, pagamento_secret = $4 ,senha = $5 WHERE idusuario = $6;";

  $resultado = pg_prepare($conexao, "query_login", $produtos);
  $resultado = pg_execute($conexao, "query_login", array($nome, $email, $pagamentoid, $pagamentosec, $senha, $id));
}

$num_linhas = pg_affected_rows($resultado);

if ($num_linhas > 0)
	{
    echo "Motorista alterado com sucesso!";
  }else{
    echo "Não foi possível alterar o Motorista.";
  }
?>
