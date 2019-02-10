<?php
session_start();
include('inc/cabecalho.inc');
include("inc/verifica_sessao.inc");
?>
<body>
         <div id="appBody">
           <div class="list-group">
             <div class="menuHeader list-group-item list-group-item-action" >
               <span class="customIcon glyphicon glyphicon-menu-left" onclick="voltar();"></span>
               <button type="button">Estoque</button>
               <img class="logoadm img-responsive" src="<?php include('get_logo.php');?>"/>
             </div>
             <div id="transferRepDiv" class="list-group-item list-group-item-action">
               <label id="teste" for="transfer_rep">Transferir para o Administrador</label><br>
               <label id="teste" for="transfer_rep">Representante:</label><br>
                  <?php include('user_transfer.php')?>
             </div>
   </div>


     </div>

  </body>
  <script type="text/javascript">
  var index;
  var quantidade;

  $(document).ready(function(){
      const url = new URL(window.location.href);
      index = url.searchParams.get("index");
      quantidade = parseInt(url.searchParams.get("qtde"));
  });

  function showTransferRep(){
    $("#buttonDivRep").fadeOut(400);
    $("#transferMotDiv").fadeOut(400);
    setTimeout(function (){
       $("#transferRepDiv").fadeIn();
       $("#buttonDivMoto").fadeIn();
     },450);
  }
  function showTransferMoto(){
    $("#buttonDivMoto").fadeOut(400);
    $("#transferRepDiv").fadeOut(400);
    setTimeout(function (){
      $("#transferMotDiv").fadeIn();
      $("#buttonDivRep").fadeIn();
  },450);
  }
  function voltar() {
    window.location = "estoque_rep_detail.php";
  }

  function transferRep() {
    var cod = document.getElementById('idusu').value;
    var qtde = parseInt(document.getElementById('qtderep').value);
    console.log(quantidade);
    if(qtde !== null || qtde === ''){
    if(qtde <= quantidade){
    $.post("transfer_adm_rep_query.php",
    {
      "idproduto": index,
      "idrep": cod,
      "qtde": qtde
    },
     function (result){
       alert(result);
       window.location="estoque_rep_detail.php";
   });
 }else{
   alert('Não é possível transferir uma quantidade maior que o estoque!');
 }
}else{
  alert('Preencha os campos corretamente!');
}
}

function transferMoto() {
  var cod = document.getElementById('idusu').value;
  var qtde = parseInt(document.getElementById('qtdemoto').value);
  console.log(quantidade);
  console.log(qtde);
  console.log(qtde )
  if(qtde !== null || qtde === ''){
  if(qtde <= quantidade){
  $.post("transfer_adm_rep_query.php",
  {
    "idproduto": index,
    "idrep": cod,
    "qtde": qtde
  },
   function (result){
     alert(result);
     window.location="estoque_rep_detail.php";
 });
}else{
 alert('Não é possível transferir uma quantidade maior que o estoque!');
}
}else{
alert('Preencha os campos corretamente!');
}
}
  </script>
  </html>
