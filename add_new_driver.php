<?php
session_start();
include('inc/cabecalho.inc');
?>
<body>
         <div id="appBody">
           <div class="list-group">
             <div class="menuHeader list-group-item list-group-item-action" >
               <span class="customIcon glyphicon glyphicon-menu-left" onclick="voltar();"></span>
               <button type="button">Inserir Novo Motorista</button>
               <img class="logoadm img-responsive" src="<?php include('get_logo.php');?>"/>
             </div>
          </div>

            <form action="insere_motorista.php" method="post" enctype="multipart/form-data">
           <div class="detalheProdutoContainer">
           <input id='foto' name='foto' class='form-control-file' style='margin-bottom:20px;' type='file' value=''>
             <label for='nome'>Nome</label>
           	<input id='nome' name='nome' class='prodDetailInput centAlign' value='' maxlength='40'/>
             <label for='email'>Email</label>
           	<input id='email' name='email' class='prodDetailInput centAlign' value='' maxlength='50'/>
             <label for='login'>Login</label>
             <input id='login' name='login' class='prodDetailInput centAlign' value='' />
             <label for='senha'>Senha</label>
             <input type='password' id='senha' name='senha' class='prodDetailInput centAlign' value='' />
             <label for='cpf'>CPF</label>
             <input id='cpf' name='cpf' class='prodDetailInput centAlign' value='' />
             <label for='cep'>CEP</label>
             <input id='cep' name='cep' class='prodDetailInput centAlign' value='' onblur='pesquisacep();' />
             <label for='street'>Endereço</label>
             <input id='street' name='street' class='prodDetailInput centAlign' value='' />
             <label for='street_number'>Número</label>
             <input id='street_number' name='street_number' class='prodDetailInput centAlign' value='' />
             <label for='neighborhood'>Bairro</label>
             <input id='neighborhood' name='neighborhood' class='prodDetailInput centAlign' value='' />
             <label for='city'>Cidade</label>
             <input id='city' name='city' class='prodDetailInput centAlign' value='' />
             <label for='state'>Estado</label>
             <select name='state' id='state' class='form-control'>
                <option value='AC'>Acre</option>
                <option value='AL'>Alagoas</option>
                <option value='AP'>Amapá</option>
                <option value='AM'>Amazonas</option>
                <option value='BA'>Bahia</option>
                <option value='CE'>Ceará</option>
                <option value='DF'>Distrito Federal</option>
                <option value='ES'>Espírito Santo</option>
                <option value='GO'>Goiás</option>
                <option value='MA'>Maranhão</option>
                <option value='MT'>Mato Grosso</option>
                <option value='MS'>Mato Grosso do Sul</option>
                <option value='MG'>Minas Gerais</option>
                <option value='PA'>Pará</option>
                <option value='PB'>Paraíba</option>
                <option value='PR'>Paraná</option>
                <option value='PE'>Pernambuco</option>
                <option value='PI'>Piauí</option>
                <option value='RJ'>Rio de Janeiro</option>
                <option value='RN'>Rio Grande do Norte</option>
                <option value='RS'>Rio Grande do Sul</option>
                <option value='RO'>Rondônia</option>
                <option value='RR'>Roraima</option>
                <option value='SC'>Santa Catarina</option>
                <option value='SP'>São Paulo</option>
                <option value='SE'>Sergipe</option>
                <option value='TO'>Tocantins</option>
             </select>
             <label for='pagamentoid'>ID Gerencianet</label>
             <input id='pagamentoid' name='pagamentoid' class='prodDetailInput centAlign' value='' />
             <label for='pagamentosecret'>Secret Gerencianet</label>
             <input id='pagamentosecret' name='pagamentosecret' class='prodDetailInput centAlign' value='' />

             <div class="detalheProdutoButtons">
               <button type='button' id="cancel" class="btn btn-link cancelButton" title="Voltar" onclick="voltar();">Voltar</button>
               <button type='submit' class="btn btn-link seguirButton" title="Inserir" >Inserir</button>
             </div>
           </div>
        </div>
    </form>

     </div>

  </body>
  <script type="text/javascript">
  $(document).ready(function(){
      $("#cep").mask('99999-999');
      $("#cpf").mask('999.999.999-99');

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


             var valor = document.getElementById("cep").value;
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

  function voltar() {
    window.location = "cadmotorista.php";
  }
  </script>
  </html>
