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
                     <input class="centAlign codeInput" name="codigo" type="text"  value="" maxlength="200"  tabindex="1"/>
                   </div>
                   <div class="centAlign insertButtonContainer">
                         <button id="cancel" class="btn btn-link cancelButton" title="Voltar" onclick="voltar();">Voltar</button>
                         <form class="" action="verifica_codigo.php" method="post">
                         <button class="btn btn-link seguirButton" title="Seguir" >Seguir</button>
                       </div>
     </form>
                   <div class="footer">
                     <span class="centAlign footerText">vers&atilde;o 1.0</span>
                   </div>
           </div>
  </body>
  <script type="text/javascript">
  function voltar(){
    window.location.href = "index.php";
  }
  </script>
  </html>
