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
           <div class="detalheProdutoContainer" style="overflow-y:scroll;">
             <?php include('cad_detalhe_motorista.php')?>
           </div>
             <div class="detalheProdutoButtons">
               <button type='button' id="cancel" class="btn btn-link cancelButton" title="Voltar" onclick="voltar();">Voltar</button>
               <button type='button' class="btn btn-link seguirButton" title="Alterar" onclick="alterarUsuario()">Alterar</button>
             </div>
           </div>
     </div>

  </body>
  <script type="text/javascript">
  function liberaSenha(){
    $("#btn-senha").removeAttr("disabled");
    $("#btn-senha").css("background-color","white");
    $("#btn-senha").css("border-bottom","2px solid gainsboro");
  }
  function alterarUsuario() {
    var index = document.getElementById("index").value;
    var nome = document.getElementById("nome").value;
    var email = document.getElementById("email").value;
    var senha = document.getElementById("btn-senha").value;
    var pagamentoid = document.getElementById("pagamentoid").value;
    var pagamentosecret = document.getElementById("pagamentosecret").value;
    if(confirm("Deseja realmente alterar esse motorista?")){
    $.post("altera_motorista.php",
    {
      "index": index,
      "nome": nome,
      "email": email,
      "senha": senha,
      "pid": pagamentoid,
      "psec": pagamentosecret
    }, function (result){
      alert(result);
      window.location="cadmotorista.php";
    });
    };
  }
  function voltar() {
    window.location = "cadmotorista.php";
  }
  </script>
  </html>
