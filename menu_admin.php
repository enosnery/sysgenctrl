<?php
include('inc/cabecalho.inc');
include("inc/verifica_sessao.inc");
?>
<body>
         <div id="appBody">

           <div class="list-group">
             <div class="menuHeader list-group-item list-group-item-action" >
               <span class="customIcon glyphicon glyphicon-menu-left" onclick="voltar();"></span>
               <button type="button" >Menu Administrador</button>
               <img class="logoadm img-responsive" src="<?php include('get_logo.php');?>"/>
             </div>
             <?php include("lista_menu_admin.php") ?>
  </body>
  <script type="text/javascript">
  function voltar() {
    window.location = "index.php";
  }
  function redirectTo(page) {
    var redirect = page + ".php";
    window.location = redirect;
  }
  </script>
  </html>
