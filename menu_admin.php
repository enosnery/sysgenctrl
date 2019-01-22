<?php
include('inc/cabecalho.inc');
?>
<body>
         <div id="appBody">
           <div class="list-group">
             <div class="menuHeader list-group-item list-group-item-action" >
               <span class="customIcon glyphicon glyphicon-menu-left" onclick="voltar();"></span>
               <button type="button" >Menu Administrador</button>
               <img class="logoadm img-responsive" src="<?php include('get_logo.php');?>"/>
             </div>
             <div class="list-group-item list-group-item-action" onclick="redirectTo('cadproduto');">
               <span class="customIcon glyphicon glyphicon-shopping-cart" ></span>
               <button type="button">Cadastro de Produtos</button>
             </div>
             <div class="list-group-item list-group-item-action" onclick="redirectTo('cadrepresentante');">
               <span class="customIcon glyphicon glyphicon-briefcase" ></span>
               <button type="button">Cadastro de Representantes</button>
             </div>
             <div class="list-group-item list-group-item-action" onclick="redirectTo('cadusuario');">
               <span class="customIcon glyphicon glyphicon-user" ></span>
               <button type="button">Cadastro de Usuários</button>
             </div>
             <div class="list-group-item list-group-item-action" onclick="redirectTo('cadmotorista');">
               <span class="customIcon glyphicon glyphicon-phone"></span>
               <button type="button">Cadastro de Motoristas</button>
             </div>
             <div class="list-group-item list-group-item-action" >
               <span class="customIcon glyphicon glyphicon-transfer" onclick="voltar();"></span>
               <button type="button">Estoque/Transferência</button>
             </div>
             <div class="list-group-item list-group-item-action" >
               <span class="customIcon glyphicon glyphicon-list-alt" onclick="voltar();"></span>
               <button type="button">Relatórios</button>
             </div>
             <div class="list-group-item list-group-item-action" onclick="redirectTo('inserir_codigo');">
               <span class="customIcon glyphicon glyphicon-list-alt" ></span>
               <button type="button">Acessar como Usuário</button>
             </div>
           </div>
     </div>
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
