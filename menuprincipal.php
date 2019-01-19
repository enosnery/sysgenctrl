<?php
//session_start();
include('inc/conectar.inc');
include('inc/cabecalho.inc');
include ('inc/verifica_sessao.inc');
?>
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>


<div class="menu">
<table id="menuprincipal" align="center">
<!--inicio do cabeï¿½alho da tabela -->
<?php 
echo "<tbody>";
echo "<tr>";
if ($_SESSION['$nivel'] == '3') {
	

echo "<td class=txttabela>Cadastro de Filiados</td>";
echo "<td class=txttabela>Cadastro de Usuários</td>";
echo "</tr>";
echo "<tr align=center>";
echo "<td class=menuprincipal><a href=cadastro_form.php onmouseout=MM_swapImgRestore() onmouseover=MM_swapImage('cadastrarfiliados','','imagens/cadastro1.png',1)><img src=imagens/cadastrosel.png alt=Cadastrar Filiados name=cadastrarfiliados width=184 height=130 border=0 id=cadastrarfiliado /></a></td>";     
echo "<td class=menuprincipal><a href=cadastro_usuarios_form.php onmouseout=MM_swapImgRestore() onmouseover=MM_swapImage('cadastrouser','','imagens/usersel.png',1)><img src=imagens/user1.png alt=Cadastrar Filiados name=cadastrouser width=184 height=130 border=0 id=cadastrarfiliado /></a></td>";
echo "</tr></tbody>";
echo "</table>";
echo "<table id=menuprincipal align=center>";
echo "<tr align=center>";
echo "<td class=txttabela>Relatórios</td>";
echo "</tr>";
echo "</tbody>";
echo "</table>";
echo "<table id=menuprincipal align=center>";
echo "<tbody>";
echo "<tr align=center>";
echo "<td class=menuprincipal><a href=relatorio.php onmouseout=MM_swapImgRestore() onmouseover=MM_swapImage('relatorios','','imagens/relatorio1.png',1)><img src=imagens/relatorio2.png alt=Relatórios name=relatorios width=140 height=140 border=0 id=relatorios /></a></td></tr>";

echo "</tbody>";
echo "</table>";
echo "<br/>";
echo "</div>";
}
if ($_SESSION['$nivel'] == '2'){
	echo "<td class=txttabela>Cadastro de Filiados</td>";
	echo "<tr align=center>";
	echo "<td class=menuprincipal><a href=cadastro_form.php onmouseout=MM_swapImgRestore() onmouseover=MM_swapImage('cadastrarfiliados','','imagens/cadastro1.png',1)><img src=imagens/cadastrosel.png alt=Cadastrar Filiados name=cadastrarfiliados width=184 height=130 border=0 id=cadastrarfiliado /></a></td>";
	echo "</tr></tbody>";
	echo "</table>";
	echo "<table id=menuprincipal align=center>";
	echo "<tr align=center>";
	echo "<td class=txttabela>Relatórios</td>";
	echo "</tr>";
	echo "</tbody>";
	echo "</table>";
	echo "<table id=menuprincipal align=center>";
	echo "<tbody>";
	echo "<tr align=center>";
	echo "<td class=menuprincipal><a href=relatorio.php onmouseout=MM_swapImgRestore() onmouseover=MM_swapImage('relatorios','','imagens/relatorio1.png',1)><img src=imagens/relatorio2.png alt=Relatórios name=relatorios width=140 height=140 border=0 id=relatorios /></a></td></tr>";
echo "</tbody>";
echo "</table>";
echo "<br/>";
echo "</div>";
}
if ($_SESSION['$nivel'] == '1'){
	echo "<td class=txttabela>Cadastro de Filiados</td>";
	echo "<tr align=center>";
	echo "<td class=menuprincipal><a href=cadastro_form.php onmouseout=MM_swapImgRestore() onmouseover=MM_swapImage('cadastrarfiliados','','imagens/cadastro1.png',1)><img src=imagens/cadastrosel.png alt=Cadastrar Filiados name=cadastrarfiliados width=184 height=130 border=0 id=cadastrarfiliado /></a></td>";
	echo "</tr></tbody>";
	echo "</table>";
echo "<br/>";
echo "</div>";
}


?>
<?php
include("./inc/rodape.inc");
?>