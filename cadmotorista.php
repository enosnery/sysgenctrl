<?php
session_start();
include('inc/cabecalho.inc');
?>
<body>
         <div id="appBody">
           <div class="list-group">
             <div class="menuHeader list-group-item list-group-item-action" >
               <span class="customIcon glyphicon glyphicon-menu-left" onclick="voltar();"></span>
               <button type="button">Motoristas</button>
               <img class="logoadm img-responsive" src="<?php include('get_logo.php');?>"/>
             </div>
           <div class="list-group-item list-group-item-action">
             <input id="pesquisa" type="text" placeholder="Pesquisar..." onkeyup="pesquisar();"/>
             <span class="searchBarPlus glyphicon glyphicon-plus" onclick="addNewDriver();"></span>
                <span class="searchBarIcon glyphicon glyphicon-search" onclick="focusPesquisa();"></span>
           </div>
           <div id="listaCadastro" class="listaCadastro">
             <?php include('cad_lista_motorista.php')?>
           </div>
   </div>


     </div>

  </body>
  <script type="text/javascript">
  function voltar() {
    window.location = "menu_admin.php";
  }
  function goToDetail(index) {
    $.post("redirect.php", {index: index}, function (result){ window.location="cad_mot_detail.php";});
  }
  function seeDetail(index) {
    $.post("redirect.php", {index: index}, function (result){ window.location="consulta_cad_mot_detail.php";});
  }
  function focusPesquisa(){
    $("#pesquisa").focus();
  }
  function removeDriver(index) {
    if(confirm("Deseja realmente remover esse motorista?")){
    $.post("exclude_motorista.php", {index: index}, function (result){
      alert(result);
      window.location="cadmotorista.php";
    });
    };
  }
  function addNewDriver(){
    window.location="add_new_driver.php";
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
