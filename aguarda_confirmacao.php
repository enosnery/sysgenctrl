<?php
 session_start();
 include("inc/cabecalho.inc");
  ?>
  <body>
    <div class="waitconfirmation">
      <h3>Aguardando Confirmação do Motorista</h3>
      <h4>ID da Compra: <?php include("transaction_code.php"); ?></h4>
    </div>
  <div class="loader" id="loader"></div>
</body>
</html>
<script type="text/javascript">

  setInterval(function(){  $.post("getconfirmation.php",
  {},function(result){
    if(result === "1"){
      console.log("deucerto");
      console.log(result);
      window.location = "getpaymenttoken.php";

    }else{
      console.log(result);
      console.log("deu ruim");

    }

  });
}, 2000);

$( window ).unload(function() {
  alert("Deseja sair?")
  alert("Deseja Realmente Sair? Sua saída acarreta no cancelamento da transação!");
});

</script>
