<?php
session_start();
include('inc/cabecalho.inc');
?>
<body>
         <div id="appBody">
           <div class="list-group">
             <div class="menuHeader list-group-item list-group-item-action" >
               <span class="customIcon glyphicon glyphicon-menu-left" onclick="voltar();"></span>
               <button type="button">Alterar Motorista</button>
               <img class="logoadm img-responsive" src="<?php include('get_logo.php');?>"/>
             </div>
          </div>
          <form action="altera_motorista.php" method="post" enctype="multipart/form-data">
           <div class="detalheProdutoContainer" style="min-height:70vh;width: 90vw;overflow-y:scroll;">
             <?php include('cad_detalhe_motorista.php')?>
           </div>
             <div class="detalheProdutoButtons" style="width:90vw;margin:0 auto;display:block;margin-top:2vh;">
               <button type='button' id="cancel" class="btn btn-link cancelButton" title="Voltar" onclick="voltar();">Voltar</button>
               <button type='submit' class="btn btn-link seguirButton" title="Alterar"  >Alterar</button>
             </div>
           </form>
           </div>
     </div>

  </body>
  <script type="text/javascript">
  $(document).ready(function(){
    $("#cep").mask('99999-999');

  });

  function liberaSenha(){
    $("#btn-senha").removeAttr("disabled");
    $("#btn-senha").css("background-color","white");
    $("#btn-senha").css("border-bottom","2px solid gainsboro");
  }
  // function alterarUsuario() {
  //   var index = document.getElementById("index").value;
  //   var nome = document.getElementById("nome").value;
  //   var email = document.getElementById("email").value;
  //   var senha = document.getElementById("btn-senha").value;
  //   var pagamentoid = document.getElementById("pagamentoid").value;
  //   var pagamentosecret = document.getElementById("pagamentosecret").value;
  //   if(confirm("Deseja realmente alterar esse motorista?")){
  //   $.post("altera_motorista.php",
  //   {
  //     "index": index,
  //     "nome": nome,
  //     "email": email,
  //     "senha": senha,
  //     "pid": pagamentoid,
  //     "psec": pagamentosecret
  //   }, function (result){
  //     alert(result);
  //     window.location="cadmotorista.php";
  //   });
  //   };
  // }
  function voltar() {
    window.location = "cadmotorista.php";
  }

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
  </script>
  </html>
