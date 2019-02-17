<?php
include('inc/cabecalho.inc');
?>
<body>
         <div id="appBody">
           <div class="clearfix"></div>
           <div class="d-flex logoContainer" alt="image">
               <img class="logo img-responsive" src="<?php include('get_logo.php');?>"/>
           </div>

              <div class="clearfix"></div>
                   <div class="codeTextContainer">
                     <span class="centAlign insertCodeText">Insira o c&oacute;digo do motorista, situado no encosto do banco ou porta-luvas do ve&iacute;culo:</span>
                   </div>

                   <div class="inputContainer">
                     <input id="codigo" class="centAlign codeInput" name="codigo" type="text"  value="" maxlength="11"  tabindex="1"/>
                   </div>
                   <div class="centAlign insertButtonContainer">
                         <button id="cancel" class="btn btn-link cancelButton" title="Voltar" onclick="voltar();">Voltar</button>
                         <button type="button" class="btn btn-link seguirButton" title="Seguir" onclick="verificarCodigo();">Seguir</button>
                       </div>
           </div>
  </body>
  <script type="text/javascript">
  function voltar(){
    window.location.href = "index.php";
  }

  function verificarCodigo() {
      var codigo1 = document.getElementById("codigo").value;
      if(!(codigo1 === null || codigo1 === "")){
      $.post("verifica_codigo.php",
        {
          codigo: codigo1,
        },
        function (result){
            if(result === '0'){
            window.location="venda_produtos.php";
          }
            if(result === '1'){
              alert("Motorista não Cadastrado. Verifique o Código e Tente Novamente!")
            }
        }

    );}else{
      alert("Preencha os campos Corretamente!");
    }
    }
  </script>
  </html>
