<?php
include("inc/conectar.inc");

$nome = $_POST['nome'];
$email = $_POST['email'];
$login = strtolower($_POST['login']);
$senha = isset($_POST['senha']) ? $_POST['senha'] : null ;

  $produtos = "INSERT INTO usuario (nome, email, senha, login, is_motorista, is_usuario_adm) VALUES  ($1, $2, $3, $4, false, false);";
  $resultado = pg_prepare($conexao, "query_insert_user", $produtos);
  $resultado = pg_execute($conexao, "query_insert_user", array($nome, $email, $senha, $login));
  $num_linhas = pg_affected_rows($resultado);

if ($num_linhas > 0)
	{
    echo "Usuário cadastrado com sucesso!";}
    else{
    echo "Ocorreu um problema com a inclusão do Usuário.";
    }


?>
