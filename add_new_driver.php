<?php
session_start();
include('inc/cabecalho.inc');
?>
<body>
         <div id="appBody">
           <div class="list-group">
             <div class="menuHeader list-group-item list-group-item-action" >
               <span class="customIcon glyphicon glyphicon-menu-left" onclick="voltar();"></span>
               <button type="button">Inserir Novo Usuário</button>
               <img class="logoadm img-responsive" src="<?php include('get_logo.php');?>"/>
             </div>
          </div>

           <div class="detalheProdutoContainer">
             <label for='nome'>Nome</label>
           	<input id='nome' name='nome' class='prodDetailInput centAlign'/>
             <label for='email'>Email</label>
           	 <input id='email' name='email' class='prodDetailInput centAlign' />
              <label for='login'>Login</label>
              <input id='login' name='login' class='prodDetailInput centAlign' />
                <label for='senha'>Senha</label>
          	     <input id="senha" type="password" name='senha' class='prodDetailInput centAlign'>
                  </input>
             <div class="detalheProdutoButtons">
               <button type='button' id="cancel" class="btn btn-link cancelButton" title="Voltar" onclick="voltar();">Voltar</button>
               <button type='button' class="btn btn-link seguirButton" title="Inserir" onclick="confirmaInclude();">Inserir</button>
             </div>
           </div>



     </div>

  </body>
  <script type="text/javascript">
  function confirmaInclude() {
    var nome = document.getElementById("nome").value;
    var senha = document.getElementById("senha").value;
    var login = document.getElementById("login").value;
    var email = document.getElementById("email").value;

    if(confirm("Confirma a inclusão do motorista " + nome + "?")){
    $.post("insere_motorista.php",
     {nome: nome,
      senha: senha,
      login: login,
      email: email
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
