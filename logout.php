<?php
//Encerando a sessao e liberando o usu�rio
session_start();
$_SESSION = array();
setcookie("login_id", "", time()-3600);
session_destroy();
header("Location: index.php");
?>
