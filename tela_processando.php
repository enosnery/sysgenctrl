<?php
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
<script type="text/javascript">
function getStatus(){
  setInterval(function(){  $.post("get_transaction_status.php",
  {},function(result){
    if(result === "1"){
      console.log("deucerto");
      console.log(result);
      alert("Pagamento Concluído com Sucesso!");
      window.location = "index.php";

    }else{
      console.log(result);
      console.log("deu ruim");

    }

  });
}, 2000);
}
</script>
