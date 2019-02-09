<?php
session_start();
include('inc/cabecalho.inc');
include("inc/verifica_sessao.inc");
?>
<body>
         <div id="appBody">
           <div class="list-group">
             <div class="menuHeader list-group-item list-group-item-action" >
               <span class="customIcon glyphicon glyphicon-menu-left" onclick="voltar();"></span>
               <button type="button">Estoque</button>
               <img class="logoadm img-responsive" src="<?php include('get_logo.php');?>"/>
             </div>
           <div id="listaCadastro" class="listaCadastro">
             <?php include('lista_estoque_adm.php')?>
           </div>
   </div>


     </div>

  </body>
  <script type="text/javascript">
  function voltar() {
    window.location = "estoque.php";
  }
  function focusPesquisa(){
    $("#pesquisa").focus();
  }
  function transfer(index, qtde) {
       window.location="transfer_adm.php?index="+index+"&qtde="+qtde;
  }

  function addToStock(){
    window.location="add_to_stock.php";
  }

  function pesquisar() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("pesquisa");
    filter = input.value.toUpperCase();
    ul = document.getElementById("listaCadastro");
    li = ul.getElementsByTagName("span");
    for (i = 0; i < li.length; i++) {
        a = li[i];
        txtValue = a.outerText || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].parentElement.parentElement.style.display = "";
        } else {
            li[i].parentElement.parentElement.style.display = "none";
        }
    }
}
  </script>
  </html>
