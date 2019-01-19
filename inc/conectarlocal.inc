<?php
//$servidor = '108.62.143.56';
$servidor = '127.0.0.1';
$usuario = 'root';
$senha = 'pass123';
$banco = 'prb';
$conexao = mysql_connect($servidor, $usuario, $senha);
mysql_select_db($banco);
//$servidor = '127.0.0.1';
//$usuario = 'root';
//$senha = '';
//$banco = 'nordil';
//$conexao = mysql_connect($servidor, $usuario, $senha);
//mysql_select_db($banco);
?>