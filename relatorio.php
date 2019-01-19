<?php
//session_start();
include("./inc/cabecalho.inc");
include("./inc/conectar.inc");

include("./inc/verifica_sessao.inc");
?>

<br>
<!--<script type="text/javascript">
    $(document).ready(function () {
        $('table#listarcas tbody tr:odd').addClass('impar');
        $('th').css('font-size','16px').css('background-color','royalblue').css('color','white');
        $('td').css('height','12px').css('vertical-align','50px');
        $('input#email').css('height','25px').css('border','1px solid blue');
    });
</script> -->
<?php
//recebendo as variaveis do formulario
if (!isset( $_GET['nome'])){
            $_GET['nome'] = '';
            $nome   = '';
} else {
            $nome = strtoupper($_GET['nome']);

}
?>
<form method="GET" action="relatorio.php">

<div id="duas">    
    <div id="esquerda">
Nome&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="nome"  class="form-control2"> 
<input type="submit" value="Pesquisar" class="btn btn-primary" style="margin-top:-3px;">             
    </div>
</form>    
   
</div>  


   
<?php 

	$quantidade = 10;
	$pagina = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
	$inicio = ($quantidade * $pagina) - $quantidade;

	$sql = "SELECT
        filiados.fili_id     AS IDENTIFICACAO,
        filiados.fili_nomecompleto AS NOME
        FROM filiados
        WHERE filiados.fili_nomecompleto LIKE '%$nome%'
        ORDER BY IDENTIFICACAO;";
        //limit $inicio, $quantidade;";
	$qr = mysql_query($sql) or die (mysql_error());

		
//monta o cabe�alho da tabela
echo "<table id=listarcas align=center class='table table-striped' >";
//inicio do cabe�alho da tabela -->
echo "<tbody>";
echo "<tr>";
echo "<th class=txttabela>ID</th>";
echo "<th class=txttabela>Nome</th>";
echo "</tr>";


//formata o resultado para exibi��o
while($mostra = mysql_fetch_assoc($qr)){		
//exibe os resultados
echo "<tr>";
echo "<td class=center>".$mostra['IDENTIFICACAO']."</td>";
echo "<td class=left><a href=relat_detalhe.php?ID=".$mostra['IDENTIFICACAO'].">".$mostra['NOME']."</a></td>";
echo "</tr>";
}
//encerra a tabela
echo "</tbody>";
echo "</table><br>";

	$sqlTotal = "SELECT * FROM filiados WHERE filiados.fili_nomecompleto LIKE '%$nome%'";
	$reg_por_pagina = "SELECT *
        FROM filiados
        WHERE filiados.fili_nomecompleto LIKE '%$nome%'
        ORDER BY fili_nomecompleto;";
        //limit $inicio, $quantidade;";	
	$rpp = mysql_query($reg_por_pagina) or die (mysql_error());	
	$qrTotal = mysql_query($sqlTotal) or die (mysql_error());
	$numTotal = mysql_num_rows($qrTotal);
	$numTotalpp = mysql_num_rows($rpp);
	$totalPagina = ceil($numTotal/$quantidade);
?>
<div id="pageNavPosition" class="esquerda1"></div>
<br>
<br>
<div id="paginacao" style="text-align:center; font-size: 20px;">
<?php
echo "<p>Total de Filiados -  $numTotal / Total da Página - $numTotalpp</p>";
//echo "Página(s)";
//echo '<span class=button_pagina><a href="?pagina-1">Primeira P�gina</a></span>';
   // for ($i = 1; $i <= $totalPagina; $i++){
	//if($i == $pagina){
	//	echo "<span class='btn btn-primary'>$i</span>";
      //  }else{
		//echo "<span>  <a href=\"?pagina=$i&nome=$nome\">$i</a></span> ";
        //}
   // }
//echo "<span class=button_pagina><a href=\"?pagina=$totalPagina\">�ltima P�gina</a></span>"
?>
</div>

<?php
//$endereco   = $_SERVER['SCRIPT_NAME'];
//$page       = $pagina;
//
//$_SESSION['$page']       = $page;
//$_SESSION['$endereco']   = $endereco;
//$_SESSION['$usuario'] = $nome;
//
////echo $page."</br>";
////echo $endereco;
//?>

<script type="text/javascript">
    var pager = new Pager('listarcas', 15); 
    pager.init(); 
    pager.showPageNav('pager', 'pageNavPosition'); 
    pager.showPage(1);


    
</script>


<?php
include("./inc/rodape.inc");
?>