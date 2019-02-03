<?php
include('inc/cabecalho.inc');
include("inc/verifica_sessao.inc");
?>
<body>
         <div id="appBody">
           <div class="list-group">
             <div class="menuHeader list-group-item list-group-item-action" >
               <span class="customIcon glyphicon glyphicon-menu-left" onclick="voltar();"></span>
               <button type="button" >Estoque</button>
               <img class="logoadm img-responsive" src="<?php include('get_logo.php');?>"/>
             </div>
             <div class="list-group-item list-group-item-action" onclick="redirectTo('estoque_adm');">
               <span class="customIcon glyphicon glyphicon-home" ></span>
               <button type="button">Estoque</button>
             </div>
             <div class="list-group-item list-group-item-action" onclick="redirectTo('estoque_rep');">
               <span class="customIcon glyphicon glyphicon-briefcase" ></span>
               <button type="button">Estoque Representantes</button>
             </div>
             <div class="list-group-item list-group-item-action" onclick="redirectTo('estoque_mot');">
               <span class="customIcon glyphicon glyphicon-inbox"></span>
               <button type="button">Estoque Motoristas</button>
             </div>
             <div class="list-group-item list-group-item-action" onclick="redirectTo('transfer')">
               <span class="customIcon glyphicon glyphicon-transfer"></span>
               <button type="button">Transferência</button>
             </div>
           </div>
     </div>
  </body>
  <script type="text/javascript">
  function voltar() {
    window.location = "menu_admin.php";
  }
  function redirectTo(page) {
    var redirect = page + ".php";
    window.location = redirect;
  }
  </script>
  </html>
