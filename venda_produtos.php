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
              <span>Total: R$ <input type="text" id="valorTotal" value=0.0 readonly /></span>
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
  var s=document.createElement('script');s.type='text/javascript';
var v=parseInt(Math.random()*1000000);
s.src='https://sandbox.gerencianet.com.br/v1/cdn/a44177e8cdfe392334de0cf988b19987/'+v;
s.async=false;s.id='a44177e8cdfe392334de0cf988b19987';
if(!document.getElementById('a44177e8cdfe392334de0cf988b19987'))
{document.getElementsByTagName('head')[0].appendChild(s);
};
$gn={validForm:true,processed:false,done:{},ready:function(fn){$gn.done=fn;}};

var arrayIds = [];
var charge_id = null;

function isNull(i){
  if(i == null){
    return false;
  }else{
    return true;
  }
}

function criarTransacao(){
  var total = document.getElementById('valorTotal');
  $.post("criar_transacao.php",
  {
    total: total,
    items: JSON.stringify(arrayIds)
  },
  function(result){
    var transaction = JSON.parse(result);
    charge_id = transaction.data.charge_id;
    alert(transaction.data.charge_id);
  }

);
}

function validarPagamento(){
  $gn.ready(function(checkout) {

  var callback = function(error, response) {
    if(error) {
      // Trata o erro ocorrido
      console.error(error);
    } else {
      // Trata a resposta
      console.log(response);
    }
  };

  checkout.getPaymentToken({
    brand: 'visa', // bandeira do cartão
    number: '4012001038443335', // número do cartão
    cvv: '123', // código de segurança
    expiration_month: '05', // mês de vencimento
    expiration_year: '2018' // ano de vencimento
  }, callback);

});
  $.post("validarPagamento.php",
  {
    chargeid: charge_id
  },
  function(response){
      alert(response);
    });
}

function addItem(index){

  var total = document.getElementById("valorTotal");
  var itemValue = parseFloat(document.getElementById("product-value-"+index.toString()).value);
  var itemId = document.getElementById("product-id-"+index.toString()).value;
  var item = {item: itemId, value: itemValue};
  arrayIds.push(item);
  total.value = parseFloat(parseFloat(total.value) + itemValue).toFixed(2);
  console.log(arrayIds);
}

function removeItem(index){

  var total = document.getElementById("valorTotal");
  var itemValue = parseFloat(document.getElementById("product-value-"+index.toString()).value);
  var itemId = document.getElementById("product-id-"+index.toString()).value;
  arrayIds.splice(arrayIds.indexOf(itemId), 1);
  var temp = parseFloat(parseFloat(total.value) - itemValue).toFixed(2);
   total.value = (temp >= 0 )? temp : 0.0;
   console.log(arrayIds);
// }


}
  </script>

  </html>
