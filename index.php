<?php
include('inc/cabecalho.inc');
//clear session from globals
$_SESSION = array();
// $_SESSION['$login'] = null;
//clear session from disk
session_destroy();
?>
<style>
#nocaddiv{
  display:none;
}
</style>

<body>
         <div id="appBody">
           <div class="d-flex logoContainer" alt="image">
               <img class="logo img-responsive" src="<?php include('get_logo.php');?>"/>
           </div>

              <div class="clearfix"></div>
              <div id="logindiv">
                   <div class="inputContainer">
                     <input id="login" class="centAlign loginInput" name="login" type="text"  value="" maxlength="100"  tabindex="1" placeholder="Login"/>
                   </div>

                   <div class="inputContainer">
                     <input id="senha" class="centAlign passInput" name="senha" type="password"  value="" maxlength="100"  tabindex="2"  placeholder="Senha"/>
                   </div>
                   <div class="centAlign loginButton">
                         <button id="buttonlogin" type="button" class="btn btn-link loginButton centAlign" title="Entrar" tabindex="3" onclick="logar();">Entrar</button>
                   </div>
                   <div class="centAlign loginButton">
                         <button id="nocad" type="button" class="btn btn-link loginButton centAlign" title="Entrar" tabindex="4" onclick="semcadastro();">Não Possui Cadastro?</button>
                   </div>
              </div>
              <div id="nocaddiv">
                   <div class="centAlign loginButton">
                         <button id="cadnew" type="button" class="btn btn-link loginButton centAlign" title="Entrar" onclick="criarCadastro();">Cadastrar-se</button>
                   </div>
                   <div class="centAlign loginButton">
                         <button id="nologin" type="button" class="btn btn-link loginButton centAlign" title="Entrar" onclick="insertcod();">Entrar Sem Cadastro</button>
                   </div>
                 </div>

     </div>
                   <div class="footer">
                     <span class="centAlign footerText">vers&atilde;o 1.0</span>
                   </div>

  </body>
  <script type="text/javascript">
$(document).ready(function() {
  $("#nocaddiv").hide();
});

  function insertcod(){
    window.location = "inserir_codigo.php";
  }

  function criarCadastro(){
    window.location = "cadastrese.php";
  }

  function semcadastro(){
    $("#logindiv").fadeOut(400);
    setTimeout(function (){ $("#nocaddiv").fadeIn();},450);
  }

function logar() {
    var login1 = document.getElementById("login").value;
    var senha1 = document.getElementById("senha").value;
    if(!(login1 === null || login1 === "" || senha1 === null || senha1 === "")){
    $.post("login.php",
      {
        login: login1,
        senha: senha1
      },
      function (result){
          if(result === '0'){
          window.location="menu_admin.php";}
          if(result === '1'){
            window.location="inserir_codigo.php";
          }
          if(result === '2'){
            alert("Usuário não Cadastrado no Sistema");
          }
      }

  );}else{
    alert("Preencha os campos Corretamente!");
  }
  }

  </script>
  </html>
