<?php
if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}
include('inc/cabecalho.inc');
// include('inc/verifica_sessao.inc');
?>
<style>
  .tabela-acoes{
    cursor:pointer;
    margin-left:0.5em;
  }
  .ui-dialog-titlebar-close {
    visibility: hidden;
}
.ui-dialog {
        position: fixed;
        top:2%;
        padding: .1em;
        overflow: hidden;
}
.header{
font-weight:bolder;
}
.hist-list{
padding:5px;
border-bottom:2px solid black;
}
</style>

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
     <div id="dialog-base" title='Produtos da Compra' >
     </div>
  </body>
  <script type="text/javascript">
  var isRequest = true;
$(document).ready(function(){
  setInterval(function(){
    console.log("deu 1 refresh");
  $("#listaCadastro").load("compras_pendentes.php #listaCadastro");
  },10000);
});

function reload(){
  $("#listaCadastro").load("compras_pendentes.php #listaCadastro");
}
  function voltar() {
    if(confirm("Deseja Encerrar a Sessão?")){
  window.location = "logout.php";
}
  }

  function goToEstoque() {
    window.location = "estoque_mot.php";
  }



  function confirmar(index, transaction) {
if(isRequest === true){
  isRequest = false;
    if(confirm("Deseja confirmar essa Compra?")){
    $.post("confirmar_transacao_mot.php",
    {index: index},
     function (result){
       alert("Compra confirmada com Sucesso!");
       alert("Enviando dados para confirmação de Pagamento...");
       var newwindow=window.open("getpaymenttoken.php?transactionid="+transaction,"ubervenda",'height=200,width=150');
       if (window.focus) {newwindow.focus()}
       console.log(transaction);
       isRequest = true;
       $("#listaCadastro").load("compras_pendentes.php #listaCadastro");
     });
  }
  }
  }
  function removeProd(index) {
    if(confirm("Deseja realmente remover esse produto?")){
    $.post("exclude_prod.php", {index: index}, function (result){
      alert(result);
      window.location="cadproduto.php";
    });
    };
  }

  function historico(index){
    $.post("lista_pendente_detail.php",
  {
    transaction: index
  },
  function(result){
  $("#dialog-base").append(result);
  openLista();
});
  }

  function openLista() {
         $( "#dialog" ).dialog({
                autoOpen: true,
                modal: true,
                width: 340,
                minWidth: 200,
                height: 400,
                minHeight:150,
                resizable: false,
                draggable: false,
                buttons: {
                Fechar: function() {
                $( this ).dialog( "close" );
                $("#dialog").remove();
                }
                },
                hide: {
                effect: "fade",
                duration: 400
                }
                });
                $( ".selector" ).dialog({
                closeOnEscape: true
                });
        }

  </script>
  </html>
