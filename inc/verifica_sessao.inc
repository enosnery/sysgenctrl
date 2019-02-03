<?php
//Verificando se o usuario est� logado
if (!isset($_SESSION['$login'])||$_SESSION['is_adm']!=='t') {
	header("Location: index.php");
	exit;
}
?>
