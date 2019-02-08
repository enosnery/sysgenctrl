<?php
//Verificando se o usuario est� logado
if (!isset($_SESSION['$login'])||($_SESSION['is_adm']!=='t'&&$_SESSION['is_rep']!=='t'&&$_SESSION['is_mot']!=='t')) {
	header("Location: index.php");
	exit;
}
?>
