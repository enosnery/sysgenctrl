<?php
//$servidor = '108.62.143.56';
// $servidor = '127.0.0.1';
// $usuario = 'root';
// $senha = '';
// $banco = 'servidor';
// $conexao = new mysqli($servidor, $usuario, $senha, $banco);
$conexao = pg_pconnect("host=35.232.23.81 port=5432 dbname=Market user=postgres password=postgres")
//$servidor = '127.0.0.1';
//$usuario = 'root';
//$senha = '';
//$banco = 'nordil';
//$conexao = mysql_connect($servidor, $usuario, $senha);
//mysql_select_db($banco);
?>
