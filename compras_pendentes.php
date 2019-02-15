<?php
if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
include('inc/cabecalho.inc');
include ('inc/verifica_sessao.inc');
?>
<body>
         <div id="appBody">
           <div class="list-group">
             <div class="menuHeader list-group-item list-group-item-action" >
               <span class="customIcon glyphicon glyphicon-menu-left" onclick="voltar();"></span>
               <button type="button">Compras Pendentes</button>
               <img class="logoadm img-responsive" src="<?php include('get_logo.php');?>"/>
             </div>
             <div class='menuHeader list-group-item list-group-item-action' style='min-height:2em;border-bottom:1px solid black'>
               <span style='font-size:15px;text-align:left;float:right' onclick="goToEstoque();">Ver Estoque <i class="fas fa-angle-right"></i></span>
            </div>
           <div id="listaCadastro" class="listaCadastro">
             <?php include('lista_compras_pendentes.php')?>
           </div>
   </div>


     </div>

  </body>
  <script type="text/javascript">
$(document).ready(function(){
  setInterval(function(){
    console.log("deu 1 refresh");
  $("#listaCadastro").load("compras_pendentes.php #listaCadastro");
},10000);
});
  function voltar() {
    if(confirm("Deseja Encerrar a Sessão?")){
  window.location = "logout.php";
}
  }

  function goToEstoque() {
    window.location = "estoque_mot.php";
  }

  function confirmar(index) {
    $.post("confirmar_transacao_mot.php",
    {index: index},
     function (result){
       alert(result);
       alert("Compra confirmada com Sucesso!");
       $("#listaCadastro").load("compras_pendentes.php #listaCadastro");
     });
  }
  function removeProd(index) {
    if(confirm("Deseja realmente remover esse produto?")){
    $.post("exclude_prod.php", {index: index}, function (result){
      alert(result);
      window.location="cadproduto.php";
    });
    };
  }

  </script>
  </html>
