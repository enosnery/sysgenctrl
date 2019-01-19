<?php
include("conectar.inc");
$login = $_SESSION['$login'];
$municipio = $_SESSION['$municipio'];
echo "<hr id='roda'>";
echo "<form method=POST action='logout.php'>";
echo "<h4>Usuário: ".$_SESSION['$login']." Município: ".$_SESSION['$municipio'];

echo "<p class=botao_rodape>  
	  <input id=menubutton type='button' class='btn btn-default btn-sm' value='Menu Principal' onClick=javascript:location.href='./menuprincipal.php'; />
	  <input id=voltar type=button class='btn btn-default btn-sm' value=Voltar onClick=javascript:window.history.go(-1)>
	 <input id=sair type=submit class='btn btn-default btn-sm' value=Sair>
	  </p>"."</h5>";
include('time.inc');
echo "version: 1.0.0 &copy 2015 - SoftStudio"; 
echo "</form>";
mysql_close($conexao);
?>
</body>
</html>