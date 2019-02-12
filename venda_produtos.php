<?php
include('inc/cabecalho.inc');

?>
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
              <span>Total: R$<input type="text" id="valorTotal" value=0 readonly /></span>
            </div>
         </div>
         <div class="pagamentoContainer">
           <div class="centAlign pagarButton">
                 <input type="button" class="btn btn-success pagarButton centAlign" value="Pagar" onclick="criarTransacao();" />
               </div>
         </div>
      </div>
  </body>
  <script type="text/javascript">
  $(document).ready(function(){
    $('#valorTotal').maskMoney();
  });
  var s=document.createElement('script');s.type='text/javascript';
var v=parseInt(Math.random()*1000000);
s.src='https://sandbox.gerencianet.com.br/v1/cdn/a44177e8cdfe392334de0cf988b19987/'+v;
s.async=false;s.id='a44177e8cdfe392334de0cf988b19987';
if(!document.getElementById('a44177e8cdfe392334de0cf988b19987'))
{document.getElementsByTagName('head')[0].appendChild(s);
};
$gn={validForm:true,processed:false,done:{},ready:function(fn){$gn.done=fn;}};

var arrayIds = [];
var uniqueIds = [];
var charge_id = null;

function isNull(i){
  if(i == null){
    return false;
  }else{
    return true;
  }
}

function criarTransacao(){
  var total = document.getElementById('valorTotal').value;
  var totalitens = arrayIds.length;
  var myjson =  JSON.stringify(arrayIds);
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
    charge_id = transaction.data.charge_id;
    validarPagamento(charge_id);
  });
}
}

function baixaEstoque(){
  var total = document.getElementById('valorTotal').value;
  var totalitens = arrayIds.length;
  var myjson1 =  JSON.stringify(arrayIds);
  var myjson2 =  JSON.stringify(uniqueIds);

  console.log(myjson1);
  console.log(myjson2);
  if(arrayIds.length > 0){
  $.post('baixa_estoque_mot.php',
  {
    "items": myjson1,
    "ids": myjson2
  },
  function(result){
    alert(result);
    setTimeout(function(){window.location="index.php"},500);
  });
}
  }
}

function validarPagamento(chargeid){
  $gn.ready(function(checkout) {

  var callback = function(error, response) {
    if(error) {
      // Trata o erro ocorrido
      console.error(error);
    } else {
      // Trata a resposta
      console.log("entrou aqui");
      console.log(response);
      $.post("validarPagamento.php",
      {
        chargeid: charge_id,
        token: payment
      },
      function(response){
          alert(response);
        });
    }
  };

var  payment = checkout.getPaymentToken({
    brand: 'mastercard', // bandeira do cartão
    number: '5401056120155722', // número do cartão
    cvv: '630', // código de segurança
    expiration_month: '11', // mês de vencimento
    expiration_year: '2025' // ano de vencimento
  }, callback);

});

}

function addItem(index, idproduto, stock){
  var count = 0;
for(var i = 0; i < arrayIds.length; ++i){
    if(arrayIds[i]['item'] == idproduto)
        count++;
}
  if(count < stock){
  var total = document.getElementById("valorTotal");
  var tmpValue = parseFloat(document.getElementById("product-value-"+index.toString()).value);
  var itemValue = tmpValue.toString().replace(".","");
  var itemId = document.getElementById("product-id-"+index.toString()).value;
  total.value = parseFloat(parseFloat(total.value) + tmpValue).toFixed(2);
  var item = {item: itemId, value: itemValue};
  arrayIds.push(item);
  if(!(uniqueIds.includes(itemId))){
    uniqueIds.push(itemId);
  }
    console.log("0");
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
  var total = document.getElementById("valorTotal");
  var itemValue = parseFloat(document.getElementById("product-value-"+index.toString()).value);
  var itemId = document.getElementById("product-id-"+index.toString()).value;
  removeFromArray(itemId, arrayIds);
  // arrayIds.splice(search(itemId, arrayIds), 1);
  var temp = parseFloat(parseFloat(total.value) - itemValue).toFixed(2);
   total.value = (temp > 0 )? temp : 0.0;
  }
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
