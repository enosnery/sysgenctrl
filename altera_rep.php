<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    //session has not started
    session_start();
}
include("inc/conectar.inc");
include("inc/verifica_sessao.inc");
$id = $_POST['index'];
$nome = isset($_POST['nome']) ? $_POST['nome'] : null ;
$email = isset($_POST['email']) ? $_POST['email'] : null ;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null ;
$pagamentoid = isset($_POST['pag1']) ? $_POST['pag1'] : null ;
$pagamentosec = isset($_POST['pags']) ? $_POST['pags'] : null ;
if ($senha === null) {
  if($pag1 !== null)
    $produtos = "UPDATE usuario SET nome = $1, email = $2, pagamento_id = $3, pagamento_secret = $4  WHERE idusuario = $5;";
    $resultado = pg_prepare($conexao, "query_login", $produtos);
    $resultado = pg_execute($conexao, "query_login", array($nome, $email, $pagamentoid, $pagamento_secret, $id));
}else{
  $produtos = "UPDATE usuario SET nome = $1, email = $2, senha = $3, pagamento_id = $4, pagamento_secret = $5 WHERE idusuario = $6;";
  $resultado = pg_prepare($conexao, "query_login", $produtos);
  $resultado = pg_execute($conexao, "query_login", array($nome, $email, $senha,$pagamentoid, $pagamentosec, $id));
}

$num_linhas = pg_affected_rows($resultado);

if ($num_linhas > 0)
	{
    echo "Representante alterado com sucesso!";
  }else{
    echo "Não foi possível alterar o Representante";
  }
?>
