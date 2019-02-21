<?php
session_start();
include("inc/cabecalho.inc");

?>
<style>
input{
  border-bottom: 1px solid gainsboro;
}
</style>
<body>
         <div id="appBody">
           <div class="list-group">
             <div class="menuHeader list-group-item list-group-item-action" >
               <button type="button">Dados Para Pagamento</button>
               <img class="logoadm img-responsive" src="<?php include('get_logo.php');?>"/>
             </div>
          </div>
          <form action="card_data.php" method="post">
           <div class="dadosCartaoContainer" style="height:65vh;overflow-y:scroll;width: 90vw;margin: 0 auto;display: block;">
             <label for="nome">Cartão</label>
             <input id="number" class="form-control" type="text" name="number" value=""></input>
             <label for="nome">Mês</label>
             <select id="expiration_month" class="form-control" name="expiration_month" value="">
               <option value="01">01</option>
               <option value="02">02</option>
               <option value="03">03</option>
               <option value="04">04</option>
               <option value="05">05</option>
               <option value="06">06</option>
               <option value="07">07</option>
               <option value="08">08</option>
               <option value="09">09</option>
               <option value="10">10</option>
               <option value="11">11</option>
               <option value="12">12</option>
             </select>
             <label for="nome">Ano</label>
             <select id="expiration_year" class="form-control" name="expiration_year" value="">
               <option value="2019">2019</option>
               <option value="2020">2020</option>
               <option value="2021">2021</option>
               <option value="2022">2022</option>
               <option value="2023">2023</option>
               <option value="2024">2024</option>
               <option value="2025">2025</option>
               <option value="2026">2026</option>
               <option value="2027">2027</option>
               <option value="2028">2028</option>
               <option value="2029">2029</option>
               <option value="2030">2030</option>
             </select>

             <label for="nome">CVV</label>
             <input id="cvv" class="form-control" type="text" name="cvv" value=""></input>
             <label for="nome">Bandeira</label>
             <select id="brand" name="brand" class="form-control">
               <option value="visa">Visa</option>
               <option value="mastercard">MasterCard</option>
               <option value="elo">ELO</option>
               <option value="hipercard">Hipercard</option>
               <option value="diners">Diners</option>
               <option value="amex">American Express</option>
             </select>
             <label for="nome">CEP</label>
             <input id="zipcode" class="form-control" type="text" name="zipcode" value="" onblur="pesquisacep()"></input>
             <label for="nome">Cidade</label>
             <input id="city" class="form-control" type="text" name="city" value=""></input>
             <label for="nome">Estado</label>
             <select name="state" id="state" class="form-control">
	<option value="AC">Acre</option>
	<option value="AL">Alagoas</option>
	<option value="AP">Amapá</option>
	<option value="AM">Amazonas</option>
	<option value="BA">Bahia</option>
	<option value="CE">Ceará</option>
	<option value="DF">Distrito Federal</option>
	<option value="ES">Espírito Santo</option>
	<option value="GO">Goiás</option>
	<option value="MA">Maranhão</option>
	<option value="MT">Mato Grosso</option>
	<option value="MS">Mato Grosso do Sul</option>
	<option value="MG">Minas Gerais</option>
	<option value="PA">Pará</option>
	<option value="PB">Paraíba</option>
	<option value="PR">Paraná</option>
	<option value="PE">Pernambuco</option>
	<option value="PI">Piauí</option>
	<option value="RJ">Rio de Janeiro</option>
	<option value="RN">Rio Grande do Norte</option>
	<option value="RS">Rio Grande do Sul</option>
	<option value="RO">Rondônia</option>
	<option value="RR">Roraima</option>
	<option value="SC">Santa Catarina</option>
	<option value="SP">São Paulo</option>
	<option value="SE">Sergipe</option>
	<option value="TO">Tocantins</option>
</select>
             <label for="nome">Endereço</label>
             <input id="street" class="form-control" type="text" name="street" value=""></input>
             <label for="nome">Número</label>
             <input id="street_number" class="form-control" type="text" name="street_number" value=""></input>
             <label for="nome">Bairro</label>
             <input id="neighborhood" class="form-control" type="text" name="neighborhood" value=""></input>

           </div>
           <div class="detalheProdutoButtons" style="display:block;margin: 0 auto;margin-top: 2vh;margin-left: 5vw;">
             <button class="btn btn-primary" type="submit">Continuar</button>
           </div>
         </form>

     </div>

  </body>
<script type="text/javascript">
$(document).ready(function(){
  $("#cvv").mask('999');
  $("#number").mask('9999 9999 9999 9999');
  $("#zipcode").mask('99999-999');

});

function limpa_formulário_cep() {
           //Limpa valores do formulário de cep.
           document.getElementById("street").value=("");
           document.getElementById("neighborhood").value=("");
           document.getElementById("city").value=("");
           document.getElementById("state").value=("");

           document.getElementById("zipcode").value=("");


   }

   function buscacep(result) {
       if (!("erro" in result)) {
           //Atualiza os campos com os valores.
           document.getElementById("street").value=(result.address);
           document.getElementById("neighborhood").value=(result.district);
           document.getElementById("city").value=(result.city);
           document.getElementById("state").value=(result.state);


       } //end if.
       else {
           //CEP não Encontrado.
           limpa_formulário_cep();
           alert("CEP não encontrado.");
       }
   }

   function pesquisacep() {


       var valor = document.getElementById("zipcode").value;
       console.log(valor);
       //Nova variável "cep" somente com dígitos.
       var cep = valor.replace(/\D/g, '');

       //Verifica se campo cep possui valor informado.
       if (cep != "") {

           //Expressão regular para validar o CEP.
           var validacep = /^[0-9]{8}$/;

           //Valida o formato do CEP.
           if(validacep.test(cep)) {

               //Preenche os campos com "..." enquanto consulta webservice.
               document.getElementById("street").value="...";
               document.getElementById("neighborhood").value="...";
               document.getElementById("city").value="...";

                //Cria um elemento javascript.
               $.get("http://apps.widenet.com.br/busca-cep/api/cep.json", { code: cep },
               function(result){
                   if( result.status!=1 ){
                      alert(result.message || "Houve um erro desconhecido");
                      return;
                   }
                   console.log("vai chamar o buscacep");
               buscacep(result);
               });

           } //end if.
           else {
               //cep é inválido.
               limpa_formulário_cep();
               alert("Formato de CEP inválido.");
           }
       } //end if.
       else {
           //cep sem valor, limpa formulário.
           limpa_formulário_cep();
       }
   };



</script>
