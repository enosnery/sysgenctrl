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
               <label id="teste" for="transfer_rep">Transferir Para o Administrador</label><br>
               <label id="teste" for="transfer_rep">Motorista</label><br>
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

  function voltar() {
    window.location = "estoque_mot_detail.php";
  }

  function transferRep() {
    var cod = document.getElementById('idusu').value;
    var qtde = document.getElementById('qtderep').value;
    console.log(quantidade);
    if(qtde !== null || qtde === ''){
    if(qtde <= quantidade){
    $.post("transfer_adm_moto_query.php",
    {
      "idproduto": index,
      "idmoto": cod,
      "qtde": qtde
    },
     function (result){
       alert(result);
       window.location="estoque_rep_adm.php";
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
  var qtde = document.getElementById('qtdemoto').value;
  console.log(quantidade);
  if(qtde !== null || qtde === ''){
  if(qtde <= quantidade){
  $.post("transfer_adm_moto_query.php",
  {
    "idproduto": index,
    "idrep": cod,
    "qtde": qtde
  },
   function (result){
     alert(result);
     window.location="estoque_mot_adm.php";
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
