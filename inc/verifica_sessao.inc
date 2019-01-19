<?php
//Verificando se o usuario está logado
if (!isset($_SESSION['$login'])) {
	echo "Efetue o Login no Site</br>";
	echo "<a href='index.php'> Login </a>";
	exit;
}
?>
