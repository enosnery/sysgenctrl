<?php
  if($_SESSION['is_adm']==='t'){
    echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('estoque');>";
    echo "<span class='customIcon glyphicon glyphicon-transfer'></span>";
    echo "<button type='button'>Estoque/Transferência</button>";
    echo "</div>";
    echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('cadmotorista');>";
    echo "<span class='customIcon glyphicon glyphicon-phone'></span>";
    echo "<button type='button'>Cadastro de Motoristas</button>";
    echo "</div>";
    echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('cadproduto');>";
    echo "<span class='customIcon glyphicon glyphicon-shopping-cart' ></span>";
    echo "<button type='button'>Cadastro de Produtos</button>";
    echo "</div>";
    echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('cadusuario');>";
    echo "<span class='customIcon glyphicon glyphicon-user' ></span>";
    echo "<button type='button'>Cadastro de Usuários</button>";
    echo "</div>";
    echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('cadrepresentante');>";
    echo "<span class='customIcon glyphicon glyphicon-briefcase' ></span>";
    echo "<button type='button'>Cadastro de Representantes</button>";
    echo "</div>";
    echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('inserir_codigo');>";
    echo "<span class='customIcon glyphicon glyphicon-list-alt' ></span>";
    echo "<button type='button'>Acessar como Usuário</button>";
    echo "</div>";
    echo "</div>";
}else{
  if($_SESSION['is_rep']==='t'){
    echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('estoque_rep');>";
      echo "<span class='customIcon glyphicon glyphicon-transfer'></span>";
      echo "<button type='button'>Estoque/Transferência</button>";
    echo "</div>";
    echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('cadproduto');>";
      echo "<span class='customIcon glyphicon glyphicon-shopping-cart' ></span>";
      echo "<button type='button'>Consulta de Produtos</button>";
    echo "</div>";
  echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('cadmotorista');>";
    echo "<span class='customIcon glyphicon glyphicon-phone'></span>";
    echo "<button type='button'>Consulta Motoristas</button>";
  echo "</div>";
}else{
  echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('estoque_mot');>";
    echo "<span class='customIcon glyphicon glyphicon-transfer'></span>";
    echo "<button type='button'>Estoque/Transferência</button>";
  echo "</div>";
  echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('cadproduto');>";
    echo "<span class='customIcon glyphicon glyphicon-shopping-cart' ></span>";
    echo "<button type='button'> Consulta Produtos</button>";
  echo "</div>";
}
}


?>
