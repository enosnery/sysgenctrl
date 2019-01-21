<?php
include('./inc/conectar.inc');
$getlogo = "SELECT url
		                 FROM recursos  WHERE nome = 'logo' ";

$resultado = pg_query($conexao, $getlogo);

while($row = pg_fetch_assoc($resultado)){
	echo $row['url'];
}

?>
