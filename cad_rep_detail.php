<?php
session_start();
include('inc/cabecalho.inc');
?>
<body>
         <div id="appBody">
           <div class="list-group">
             <div class="menuHeader list-group-item list-group-item-action" >
               <span class="customIcon glyphicon glyphicon-menu-left" onclick="voltar();"></span>
               <button type="button">Alterar Representante</button>
               <img class="logoadm img-responsive" src="<?php include('get_logo.php');?>"/>
             </div>
          </div>
          <form id="alteraProd" action="altera_rep.php" method="post">
           <div class="detalheProdutoContainer">
             <?php include('cad_detalhe_rep.php')?>
             <div class="detalheProdutoButtons">
               <button type='button' id="cancel" class="btn btn-link cancelButton" title="Voltar" onclick="voltar();">Voltar</button>
               <button type='submit' class="btn btn-link seguirButton" title="Alterar" >Alterar</button>
             </div>
           </div>
        </form>


     </div>

  </body>
  <script type="text/javascript">
  function liberaSenha(){
    $("#senha").toggle();
  }
  function voltar() {
    window.location = "cadrepresentante.php";
  }
  </script>
  </html>
