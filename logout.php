<?php
//Encerando a sessao e liberando o usu�rio
session_start();
$_SESSION = array();
session_destroy();
header("Location: index.php");
?>