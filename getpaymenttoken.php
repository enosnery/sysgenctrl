<?php
 session_start();
 include ('inc/conectar.inc');
 include ('inc/cabecalho.inc');

 $charge_id = $_GET['transactionid'];
 $updatetrans = "SELECT tp.idmotorista as a, tp.idtransaction as b, tp.brand as c, tp.number as d,  tp.cvv as e, tp.expiration_month as f, tp.expiration_year as g, tp.street as h, tp.street_number as i, tp.neighboorhood as j, tp.zipcode as l,tp.city as m, tp.state as n, u.pagamento_id as o, u.pagamento_secret as p FROM temp_card_data tp LEFT JOIN usuario u ON u.idusuario = tp.idmotorista WHERE idtransaction = $charge_id;";
 $resultado = pg_query($conexao, $updatetrans);
 while ($row = pg_fetch_assoc($resultado)) {
 $idmotorista = $row['a'];
 $idtransaction = $row['b'];
 $brand = $row['c'];
 $number = $row['d'];
 $cvv = $row['e'];
 $expmon = $row['f'];
 $expyear = $row['g'];
 $street = $row['h'];
 $streetnumber = $row['i'];
 $neighborhood = $row['j'];
 $zipcode = $row['l'];
 $city = $row['m'];
 $state = $row['n'];
 $clientId = $row['o']; // insira seu Client_Id, conforme o ambiente (Des ou Prod)
 $clientSecret = $row['p']; // insira seu Client_Secret, conforme o ambiente (Des ou Prod)

}

$update = "UPDATE compras_pendentes SET is_confirmacao_pendente = false WHERE transaction_id = $charge_id::text;";
$result = pg_query($conexao, $update);

echo "<body>";
echo "<div style='display:none;'>";
    echo "<input type='hidden' id='street' value='$street'></input>";
    echo "<input type='hidden' id='street_number' value='$streetnumber'></input>";
    echo "<input type='hidden' id='neighborhood' value='$neighborhood'></input>";
    echo "<input type='hidden' id='city' value='$city'></input>";
    echo "<input type='hidden' id='state' value='$state'></input>";
    echo "<input type='hidden' id='zipcode' value='$zipcode'></input>";
    echo "<input type='hidden' id='clientId' value='$clientId'</input>";
    echo "<input type='hidden' id='clientSecret' value='$clientSecret'></input>";
    echo "<input type='hidden' id='chargeId' value='$charge_id'></input>";
    echo "<input type='hidden' id='brand' value='$brand'></input>";
    echo "<input type='hidden' id='cvv' value='$cvv'></input>";
    echo "<input type='hidden' id='number' value='$number'></input>";
    echo "<input type='hidden' id='expmon' value='$expmon'></input>";
    echo "<input type='hidden' id='expyear' value='$expyear'></input>";
    echo "<input type='hidden' id='idtransaction' value='$idtransaction'></input>";
    echo "<input type='hidden' id='idmotorista' value='$idmotorista'></input>";
echo "</div>";
  ?>
  <div class="waitconfirmation">
    <h3>Enviando dados para Pagamento</h3>
    <h4>ID da Compra: <?php  echo $_GET['transactionid']; ?></h4>
  </div>
<div class="loader" id="loader"></div>
</body>
<script type='text/javascript'>var s=document.createElement('script');s.type='text/javascript';var v=parseInt(Math.random()*1000000);s.src='https://sandbox.gerencianet.com.br/v1/cdn/a44177e8cdfe392334de0cf988b19987/'+v;s.async=false;s.id='a44177e8cdfe392334de0cf988b19987';if(!document.getElementById('a44177e8cdfe392334de0cf988b19987')){document.getElementsByTagName('head')[0].appendChild(s);};$gn={validForm:true,processed:false,done:{},ready:function(fn){$gn.done=fn;}};</script>
<script type="text/javascript">
var street = document.getElementById('street').value;
var street_number = document.getElementById('street_number').value;
var neighborhood = document.getElementById('neighborhood').value;
var zipcode = document.getElementById('zipcode').value;
var city = document.getElementById('city').value;
var state = document.getElementById('state').value;
var pagamento_id = document.getElementById('clientId').value;
var pagamento_secret = document.getElementById('clientSecret').value;
var charge_id = document.getElementById('idtransaction').value;
var brand = document.getElementById('brand').value;
var cvv = document.getElementById('cvv').value;
var number = document.getElementById('number').value;
var expmon = document.getElementById('expmon').value;
var expyear = document.getElementById('expyear').value;
var idmotorista = document.getElementById('idmotorista').value;
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
    token: payment,
    "street": street,
    "street_number": street_number,
    "neighborhood": neighborhood,
    "zipcode": zipcode,
    "city": city,
    "state": state,
    "pagamento_id": pagamento_id,
    "pagamento_secret": pagamento_secret,
    "charge_id": charge_id
  },function(result){
      window.location="compras_pendentes.php";
  });
  }
};
checkout.getPaymentToken({
    brand: brand, // bandeira do cartão
    number: number, // número do cartão
    cvv: cvv, // código de segurança
    expiration_month: expmon, // mês de vencimento
    expiration_year: expyear // ano de vencimento
  }, callback);

});

function getStatus(){
  setInterval(function(){  $.post("get_transaction_status.php",
  {
    idmotorista: idmotorista,
    charge_id: charge_id
  },function(result){
    if(result === "1"){
      console.log("deucerto");
      console.log(result);
      alert("Pagamento Concluído com Sucesso!");
      $.post("baixa_estoque_mot.php", {
        transaction_id: charge_id
      });
    }else{
      console.log(result);
      console.log("deu ruim");
    }
  });
}, 2000);
}
</script>
</html>
