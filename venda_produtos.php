<?php
include('inc/cabecalho.inc');

?>
<style>
.ui-dialog-titlebar {
  display: none;
    visibility: hidden;
}
.ui-dialog-titlebar-close {
    visibility: hidden;
}

input{
  border:1px solid gainsboro;
}
</style>
<body>
         <div id="appBody">
           <div class="clearfix"></div>
           <div class="d-flex logoContainer" alt="image">
               <img class="logo img-responsive" src="<?php include('get_logo.php');?>"/>
           </div>
           <div class="productsContainer">
             <?php include('lista_produtos.php'); ?>
           </div>
           <div class="totalContainer">
             <div class="wrapper centAlign">
              <span>Total: R$<input type="text" id="valorTotal" step=0.01 value=0.00 readonly /></span>
            </div>
         </div>
         <div class="pagamentoContainer">
           <div class="centAlign pagarButton">
                 <input type="button" class="btn btn-success pagarButton centAlign" value="Pagar" onclick="criarTransacao();" />
               </div>
         </div>
      </div>
      <div id="dadoscartao" style="display:none">
        <?php include("dadoscartao.php"); ?>
      </div>
  </body>

  <script type="text/javascript">


  var arrayIds = [];
  var uniqueIds = [];
  var charge_id = null;
  var total;
  $(document).ready(function(){
    $('#valorTotal').maskMoney();
    total = 0;
  });



function isNull(i){
  if(i == null){
    return false;
  }else{
    return true;
  }
}

function criarTransacao(){
  total = document.getElementById('valorTotal').value;
  var totalitens = arrayIds.length;
  var myjson =  JSON.stringify(arrayIds);
  var myjson2 =  JSON.stringify(uniqueIds);
  console.log(myjson);
  if(confirm("Valor Total: R$ " + total + "\nTotal de Itens: " + totalitens + "\nDeseja finalizar a compra?" )){
  if(arrayIds.length > 0){
  $.post('criar_transacao.php',
  {
    "items": myjson
  },
  function(result){
    var transaction = JSON.parse(result);
    console.log(transaction);
    console.log(total);
     var charge_id = transaction.data.charge_id;
     createTransactionData(myjson, myjson2, total, charge_id );
  });
}
}
}

function createTransactionData(myjson, myjson2, total, charge_id){
$.post("transaction_data.php",
{
"charge_id": charge_id,
"items": myjson,
  "ids": myjson2,
  "total": total
},
function(response){
// alert(response);
window.location="dadoscartao.php";
}
);
}

function addItem(index, idproduto, stock){
  var count = 0;
for(var i = 0; i < arrayIds.length; ++i){
    if(arrayIds[i]['item'] == idproduto)
        count++;
}
  if(count < stock){
  total = document.getElementById("valorTotal");
  var tmpValue = parseFloat(document.getElementById("product-value-"+index.toString()).value);
  var itemValue = tmpValue;
  var itemId = document.getElementById("product-id-"+index.toString()).value;
  total.value = (parseFloat(parseFloat(total.value) + tmpValue/100).toFixed(2));
  var item = {item: itemId, value: itemValue};
  arrayIds.push(item);
  if(!(uniqueIds.includes(itemId))){
    uniqueIds.push(itemId);
  }
    console.log(arrayIds);
    console.log(uniqueIds);
}else{
  return;
}
}

function removeItem(index, idproduto){
  var count = 0;
  for(var i = 0; i < arrayIds.length; ++i){
    if(arrayIds[i]['item'] == idproduto)
        count++;
  }
  if(count > 0){
  total = document.getElementById("valorTotal");
  var itemValue = parseFloat(document.getElementById("product-value-"+index.toString()).value)/100;
  var itemId = document.getElementById("product-id-"+index.toString()).value;
  removeFromArray(itemId, arrayIds);
  // arrayIds.splice(search(itemId, arrayIds), 1);
  var temp = parseFloat(parseFloat(total.value) - itemValue).toFixed(2);
   total.value = (temp > 0 )? temp : 0.0;
  }
  console.log(arrayIds);
}

function removeFromArray(nameKey, myArray){
let result = myArray.filter(o=> o.item === nameKey).pop();
for( var i = 0; i < myArray.length; i++){
   if ( myArray[i] === result) {
     myArray.splice(i, 1);
   }
}
}
  </script>
  </html>
