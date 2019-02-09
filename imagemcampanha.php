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
               <button type="button">Alterar Imagem</button>
               <img class="logoadm img-responsive" src="<?php include('get_logo.php');?>"/>
             </div>
          </div>
           <div class="detalheProdutoContainer">
          <img class="logo img-responsive" src="<?php include('get_logo.php');?>"/>
            <form id="novoMetodo" action="altera_imagem.php" method="post" enctype="multipart/form-data">
              <div class="detalheProdutoContainer">
                <label for='foto'>Alterar Imagem</label>
               <input id='foto' name='foto' class='form-control-file' style='margin-bottom:20px;' type='file' value='$nome'>
             <div class="detalheProdutoButtons">
               <button type='button' id="cancel" class="btn btn-link cancelButton" title="Voltar" onclick="voltar();">Voltar</button>
               <button type='submit' class="btn btn-link seguirButton" title="Alterar" >Alterar</button>
             </div>
           </div>
        </form>


     </div>

  </body>
  <script type="text/javascript">
  function voltar() {
    window.location = "menu_admin.php";
  }
  </script>
  </html>
