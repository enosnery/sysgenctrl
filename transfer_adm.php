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
               <label id="teste" for="transfer_rep">Transferir Para Representante</label><br>
                  <?php include('lista_reps.php')?>
             </div>
   </div>


     </div>

  </body>
  <script type="text/javascript">
  var idproduto;
  var quantidade;

  $(document).ready(function(){
      const url = new URL(window.location.href);
      idproduto = url.searchParams.get("index");
      quantidade = url.searchParams.get("qtde");
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
    window.location = "estoque_adm.php";
  }

  function transferRep() {
    var user = document.getElementById('transferRep');
    var cod = user.options[user.selectedIndex].value;
    var qtde = document.getElementById('qtderep').value;
    console.log(quantidade);
    if(qtde !== null){
    if(qtde <= quantidade){
    $.post("transfer_rep_query.php",
    {
      "idproduto": idproduto,
      "idrep": cod,
      "qtde": qtde
    },
     function (result){
       alert(result);
       window.location="estoque_adm.php";
   });
 }else{
   alert('Não é possível transferir uma quantidade maior que o estoque!');
 }
}else{
  alert('Preencha os campos corretamente!');
}
}

function transferMoto() {
  var user = document.getElementById('transferMoto');
  var cod = user.options[user.selectedIndex].value;
  var qtde = document.getElementById('qtdemoto').value;
  console.log(quantidade);
  console.log(qtde);
  console.log(qtde>=quantidade);
  if(qtde !== null){
  if(qtde <= quantidade){
  $.post("transfer_moto_query.php",
  {
    "idproduto": idproduto,
    "idrep": cod,
    "qtde": qtde
  },
   function (result){
     alert(result);
     window.location="estoque_adm.php";
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
