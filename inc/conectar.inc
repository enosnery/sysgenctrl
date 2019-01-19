<?php
//$servidor = '108.62.143.56';
// $servidor = '127.0.0.1';
// $usuario = 'root';
// $senha = '';
// $banco = 'servidor';
// $conexao = new mysqli($servidor, $usuario, $senha, $banco);
$conexao = pg_pconnect("host=127.0.0.1 port=9432 dbname=servidor user=postgres password=postgres")
//$servidor = '127.0.0.1';
//$usuario = 'root';
//$senha = '';
//$banco = 'nordil';
//$conexao = mysql_connect($servidor, $usuario, $senha);
//mysql_select_db($banco);
?>
