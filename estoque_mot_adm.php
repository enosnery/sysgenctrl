<?php
session_start();
include('inc/cabecalho.inc');
?>
<body>
         <div id="appBody">
           <div class="list-group">
             <div class="menuHeader list-group-item list-group-item-action" >
               <span class="customIcon glyphicon glyphicon-menu-left" onclick="voltar();"></span>
               <button type="button" style="font-size:0.9em">Estoque Motoristas</button>
               <img class="logoadm img-responsive" src="<?php include('get_logo.php');?>"/>
             </div>
           <div class="list-group-item list-group-item-action">
             <input id="pesquisa" type="text" placeholder="Pesquisar..." onkeyup="pesquisar();"/>
                <span class="searchBarIcon glyphicon glyphicon-search" onclick="focusPesquisa();"></span>
           </div>
           <div id="listaCadastro" class="listaCadastro">
             <?php include('estoque_lista_motoristas.php')?>
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
  function goToEstoqueMoto(index) {
    $.post("estoque_redirect.php", {index: index}, function (result){ window.location="estoque_mot_detail.php";});
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
            li[i].parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.style.display = "";
        } else {
            li[i].parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.style.display = "none";
        }
    }
}
  </script>
  </html>
