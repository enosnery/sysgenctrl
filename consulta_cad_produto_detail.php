<?php
if(session_status() !== PHP_SESSION_ACTIVE){
    //session has not started
    session_start();
}
include('inc/cabecalho.inc');
?>
<body>
         <div id="appBody">
           <div class="list-group">
             <div class="menuHeader list-group-item list-group-item-action" >
               <span class="customIcon glyphicon glyphicon-menu-left" onclick="voltar();"></span>
               <button type="button">Consulta Produto</button>
               <img class="logoadm img-responsive" src="<?php include('get_logo.php');?>"/>
             </div>
          </div>
          <form id="alteraProd" action="altera_produto.php" method="post">
           <div class="detalheProdutoContainer">
             <?php include('consulta_detalhe_cadastro_produto.php')?>
             <div class="detalheProdutoButtons">
               <button type='button' id="cancel" class="btn btn-link cancelButton" title="Voltar" onclick="voltar();">Voltar</button>
             </div>
           </div>
        </form>


     </div>

  </body>
  <script type="text/javascript">
  $(function() {
    $('#valor').maskMoney();
  })
  function voltar() {
    window.location = "cadproduto.php";
  }
  </script>
  </html>
