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
              <input type="text" id="valorTotal" class="centAlign" value=0.0 readonly />
         </div>
         <div class="pagamentoContainer">
           <div class="centAlign pagarButton">
                 <input type="button" class="btn btn-success pagarButton centAlign" value="Pagar" onclick="validarPagamento();" />
               </div>
         </div>
      </div>
  </body>
  <script type="text/javascript">
var arrayIds = [];

function isNull(i){
  if(i == null){
    return false;
  }else{
    return true;
  }
}

function validarPagamento(){
  $.post("validarPagamento.php",
  {
    valorVenda:document.getElementById("valorTotal").value
  },
  function(data, status){
      alert("Data: " + data + "\nStatus: " + status);
    });
}

function addItem(index){

  var total = document.getElementById("valorTotal");
  var itemValue = parseFloat(document.getElementById("product-value-"+index.toString()).value);
  var itemId = document.getElementById("product-id-"+index.toString()).value;
  arrayIds.push(itemId);
  total.value = parseFloat(parseFloat(total.value) + itemValue).toFixed(2);
}

function removeItem(index){

  var total = document.getElementById("valorTotal");
  var itemValue = parseFloat(document.getElementById("product-value-"+index.toString()).value);
  var itemId = document.getElementById("product-id-"+index.toString()).value;
  var temp = parseFloat(parseFloat(total.value) - itemValue).toFixed(2);
   total.value = (temp >= 0 )? temp : 0.0;
// }


}
  </script>
  </html>
