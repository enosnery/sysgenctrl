<?php
session_start();
include('inc/cabecalho.inc');
?>
<body>
         <div id="appBody">
           <div class="list-group">
             <div class="menuHeader list-group-item list-group-item-action" >
               <span class="customIcon glyphicon glyphicon-menu-left" onclick="voltar();"></span>
               <button type="button">Inserir Novo Produto</button>
               <img class="logoadm img-responsive" src="<?php include('get_logo.php');?>"/>
             </div>
          </div>
          <form id="alteraProd" action="insere_produto.php" method="post">
           <div class="detalheProdutoContainer">
           	<input id='product-value-$i' class='form-control-file' style='margin-bottom:20px;' type='file' value='$nome'>
             <label for='nome'>Nome</label>
           	<input id='nome' name='nome' class='prodDetailInput centAlign'/>
             <label for='valor'>Valor</label>
           	<input id='valor' name='valor' class='prodDetailInput centAlign' />
             <label for='valor'>Código</label>
           	<input id='valor' name='codigo' class='prodDetailInput centAlign'/>
             <div class="detalheProdutoButtons">
               <button type='button' id="cancel" class="btn btn-link cancelButton" title="Voltar" onclick="voltar();">Voltar</button>
               <button type='submit' class="btn btn-link seguirButton" title="Alterar" >Alterar</button>
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
