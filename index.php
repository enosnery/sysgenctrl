<?php
include('inc/cabecalho.inc');
?>
<body>
         <div id="appBody">
           <div class="d-flex logoContainer" alt="image">
               <img class="logo img-responsive" src="<?php include('get_logo.php');?>"/>
           </div>

              <div class="clearfix"></div>
                   <div class="inputContainer">
                     <input id="login" class="centAlign loginInput" name="login" type="text"  value="" maxlength="100"  tabindex="1" placeholder="Login"/>
                   </div>

                   <div class="inputContainer">
                     <input id="senha" class="centAlign passInput" name="senha" type="password"  value="" maxlength="100"  tabindex="2"  placeholder="Senha"/>
                   </div>
                   <div class="centAlign loginButton">
                         <button id="loginbutton" type="button" class="btn btn-link loginButton centAlign" title="Entrar" tabindex="3" >Entrar</button>
                   </div>
                   <div class="centAlign loginButton">
                         <button id="no-reg-button" type="button" class="btn btn-link loginButton centAlign" title="Entrar" tabindex="3" >Entrar</button>
                   </div>
                   <div class="centAlign loginButton">
                         <button id="usuáro dbutton" type="button" class="btn btn-link loginButton centAlign" title="Entrar" tabindex="3" >Entrar</button>
                   </div>

     </div>
                   <div class="footer">
                     <span class="centAlign footerText">vers&atilde;o 1.0</span>
                   </div>

  </body>
  <script type="text/javascript">
  $("#button").click(function () {
    var login1 = document.getElementById("login").value;
    var senha1 = document.getElementById("senha").value;
    var result1 = 0;
    if(!(login1 === null || login1 === "" || senha1 === null || senha1 === "")){
    $.post("login.php",
      {
        'login': login1,
        'senha', Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.: senha1
      }

  );}else{
    alert("Preencha os campos Corretamente!");
  }
  });

  </script>
  </html>
