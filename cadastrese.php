<?php

include('inc/cabecalho.inc');
?>
<body>
         <div id="appBody">
           <div class="list-group">
             <div class="menuHeader list-group-item list-group-item-action" >
               <button type="button">Novo Cadastro</button>
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
    if(!(login === null || login === "" || senha === null || senha === "" || nome === null || nome === "" || email === null || email === ""  )){
    if(confirm("Deseja finalizar o cadastro?")){
    $.post("insere_usuario.php",
     {nome: nome,
      senha: senha,
      login: login,
      email: email
    }, function (result){
      alert(result);
      window.location="index.php";
    });
    };
  }else{
    alert("Preencha os Campos Corretamente!");
  }
}
  function voltar() {
    window.location = "index.php";
  }
  </script>
  </html>
