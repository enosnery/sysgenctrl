<?php
session_start();
include('inc/conectar.inc');
include('inc/cabecalho.inc');
include ('inc/verifica_sessao.inc');
?>
<script type="text/javascript" src="./js/jquery.maskedinput.js"></script>

<div class="container" >

<div class="logo">
	<img src="./imagens/PRB-logo.png" width="256" height="179">
</div>
<div class="titulo">
	<img src="./imagens/titulo.png" class="titulo" width="712" height="45" >

</div>
<div class="logout">
   <a class="link1 btn-danger btn-lg" href="index.php">Logout</a>
</div>

</div>
<div class="txttabela">Ficha de Filiação Partidária</div>
<div class="menu" >


<table id="menuprincipal">
<form method="post" action="cadastro.php" id="cadastro">
<tbody>
<tr id="borda3">
  <td class="left1">Nome Completo: <input type="text" style="border:2px solid black" id="nome" name="nome" size="120em"></input></td>
</tr>
</tbody>
</table>

<script type="text/javascript">
  function toUpper(x){
   x.value = x.value.toUpperCase();

}

</script>
