<?php
 session_start();
 include("inc/cabecalho.inc");
  ?>
  <body>
           <div id="appBody">
             <div class="list-group">
               <div class="menuHeader list-group-item list-group-item-action" >
                 <button type="button">Dados Para Pagamento</button>
                 <img class="logoadm img-responsive" src="<?php include('get_logo.php');?>"/>
               </div>
            </div>
            <form action="card_data.php" method="post">
             <div class="detalheProdutoContainer" style="height:70vh;overflow-y:scroll;">
               <label for="nome">Cartão</label>
               <input id="email" class="form-control" type="text" name="email" value=""></input>
               <label for="nome">Mês</label>
               <input id="token" class="form-control" type="text" name="token" value=""></input>
               </form>
               </div>
               <div class="detalheProdutoButtons">
                 <button class="btn btn-primary" type="button" onclick="gerartoken();">Continuar</button>
               </div>
               </body>
<script type="text/javascript">
function gerartoken(){
var email = document.getElementById('email').value;
var token = document.getElementById('token').value;
  alert("teste");
  $.post("http://ws.pagseguro.uol.com.br/v2/sessions?email="+email+"&token="+token,
{
  "email": email,
  "token": token
},
function(result){
  alert(result);
})
}
</script>

http://ws.pagseguro.uol.com.br/v2/checkout?currency=BRL&itemId1=0001&itemDescription1=Produto PagSeguroI&itemAmount1=99999.99&itemQuantity1=1&itemWeight1=1000&itemId2=0002&itemDescription2=Produto PagSeguroII&itemAmount2=99999.98&itemQuantity2=2&itemWeight2=750&reference=REF1234&senderName=Jose Comprador&senderAreaCode=99&senderPhone=999999999&senderEmail=comprador@uol.com.br&shippingType=1&shippingAddressRequired=true&shippingAddressStreet=Av. PagSeguro&shippingAddressNumber=9999&shippingAddressComplement=99o andar&shippingAddressDistrict=Jardim Internet&shippingAddressPostalCode=99999999&shippingAddressCity=Cidade Exemplo&shippingAddressState=SP&shippingAddressCountry=BRA&timeout=25&enableRecover=false


               </html>
