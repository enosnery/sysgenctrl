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
          <form id="novoMetodo" action="insere_produto.php" method="post" enctype="multipart/form-data">
           <div class="detalheProdutoContainer">
             <label for='foto'>Imagem</label>
            <input id='foto' name='foto' class='form-control-file' style='margin-bottom:20px;' type='file' value='$nome'>
             <label for='nome'>Nome</label>
           	<input id='nome' name='nome' class='prodDetailInput centAlign' maxlength="40"/>
             <label for='valor'>Valor</label>
           	<input id='valor' name='valor' class='prodDetailInput centAlign' />
            <label for='codigo'>Código</label>
           <input id='codigo' name='codigo' class='prodDetailInput centAlign' />
                    </form>
             <div class="detalheProdutoButtons">
               <button type='button' id="cancel" class="btn btn-link cancelButton" title="Voltar" onclick="voltar();">Voltar</button>
               <button type='submit' class="btn btn-link seguirButton" title="Inserir" onclick="confirmaInclude();">Inserir</button>
             </div>
           </div>
         </form>

     </div>

  </body>
  <script type="text/javascript">
  $(function() {
    $('#valor').maskMoney();
  });
  function confirmaInclude() {
    var nome = document.getElementById("nome").value;
    if(confirm("Confirma a inclusão do produto " + nome + "?")){
      $("#novoMetodo").submit(function(e) {
    // e.preventDefault();
    var formData = new FormData(this);

    $.post($(this).attr("action"), formData, function(data) {
        alert(data);
        window.location = "cadproduto.php";
    });
});
}
}

  function voltar() {
    window.location = "cadproduto.php";
  }
  </script>
  </html>
