<?php
include('./inc/conectar.inc');
$getlogo = "SELECT picture_url
		                 FROM resources  WHERE nome = 'logo' ";

$resultado = pg_query($conexao, $getlogo);

while($row = pg_fetch_assoc($resultado)){
	echo $row['picture_url'];
}

?>
