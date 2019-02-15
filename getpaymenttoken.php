<?php
 session_start();
 include("inc/cabecalho.inc");
  ?>
  <body>
    <div class="waitconfirmation">
      <h3>Processando Pagamento</h3>
      <h4>ID da Compra: <?php include("transaction_code.php"); ?></h4>
    </div>
  <div class="loader" id="loader"></div>
</body>
</html>
<script type='text/javascript'>var s=document.createElement('script');s.type='text/javascript';var v=parseInt(Math.random()*1000000);s.src='https://sandbox.gerencianet.com.br/v1/cdn/a44177e8cdfe392334de0cf988b19987/'+v;s.async=false;s.id='a44177e8cdfe392334de0cf988b19987';if(!document.getElementById('a44177e8cdfe392334de0cf988b19987')){document.getElementsByTagName('head')[0].appendChild(s);};$gn={validForm:true,processed:false,done:{},ready:function(fn){$gn.done=fn;}};</script>
<script type="text/javascript">
$gn.ready(function(checkout) {
var callback = function(error, response) {
  if(error) {
    // Trata o erro ocorrido
    console.error(error);
  } else {
    console.log(response);
var payment = response.data.payment_token;
    $.post("validarPagamento.php",
  {
    token: payment
  },function(result){
    getStatus();
      // alert(result);
      // window.location="baixa_estoque_mot.php";
  });
  }
};
checkout.getPaymentToken({
    brand: "<?php echo $_SESSION['brand']; ?>", // bandeira do cartão
    number: "<?php echo $_SESSION['number']; ?>", // número do cartão
    cvv: "<?php echo $_SESSION['cvv']; ?>", // código de segurança
    expiration_month: "<?php echo $_SESSION['expiration_month']; ?>", // mês de vencimento
    expiration_year: "<?php echo $_SESSION['expiration_year']; ?>" // ano de vencimento
  }, callback);

});

function getStatus(){
  setInterval(function(){  $.post("get_transaction_status.php",
  {},function(result){
    if(result === "1"){
      console.log("deucerto");
      console.log(result);
      alert("Pagamento Concluído com Sucesso!");
      window.location = "baixa_estoque_mot.php";

    }else{
      console.log(result);
      console.log("deu ruim");

    }

  });
}, 2000);
}
</script>
