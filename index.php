<?php
include('inc/cabecalho.inc');
?>
<body>
         <div id="appBody">
           <div class="d-flex logoContainer" alt="image">
               <img class="logo img-responsive" src="<?php include('get_logo.php');?>"/>
           </div>
           <form class="" action="login.php" method="post">
              <div class="clearfix"></div>
                   <div class="inputContainer">
                     <input class="centAlign loginInput" name="login" type="text"  value="" maxlength="100"  tabindex="1" placeholder="Login"/>
                   </div>

                   <div class="inputContainer">
                     <input class="centAlign passInput" name="senha" type="password"  value="" maxlength="100"  tabindex="2"  placeholder="Senha"/>
                   </div>
                   <div class="centAlign loginButton">
                         <button class="btn btn-link loginButton centAlign" title="Entrar" tabindex="3">Entrar</button>
                       </div>
     </form>
     </div>
                   <div class="footer">
                     <span class="centAlign footerText">vers&atilde;o 1.0</span>
                   </div>

  </body>
  <script type="text/javascript">
  </script>
  </html>
