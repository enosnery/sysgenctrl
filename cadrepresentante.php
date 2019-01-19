<?php
session_start();
include('inc/cabecalho.inc');
?>
<body>
         <div id="appBody">
           <div class="list-group">
             <div class="menuHeader list-group-item list-group-item-action" >
               <span class="customIcon glyphicon glyphicon-menu-left" onclick="voltar();"></span>
               <button type="button">Representantes</button>
               <img class="logoadm img-responsive" src="<?php include('get_logo.php');?>"/>
             </div>
           <div class="list-group-item list-group-item-action">
             <input type="text" placeholder="Pesquisar..." />
             <span class="searchBarPlus glyphicon glyphicon-plus" onclick="voltar();"></span>
                <span class="searchBarIcon glyphicon glyphicon-search" onclick="voltar();"></span>
           </div>
           <div class="listaCadastro">
             <?php include('cad_lista_representantes.php')?>
           </div>
   </div>


     </div>

  </body>
  <script type="text/javascript">
  function voltar() {
    window.location = "menu_admin.php";
  }
  function goToDetail(index) {
    $.post("redirect.php", {index: index}, function (result){ window.location="cad_rep_detail.php";});
  }
  </script>
  </html>
