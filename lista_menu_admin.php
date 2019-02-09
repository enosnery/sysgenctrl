<?php
  if($_SESSION['is_adm']==='t'){
    echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('estoque');>";
    echo "<span class='customIcon fas fa-exchange-alt'></span>";
    echo "<button type='button'>Estoque/Transferência</button>";
    echo "</div>";
    echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('cadmotorista');>";
    echo "<span class='customIcon fas fa-car-alt'></span>";
    echo "<button type='button'>Cadastro de Motoristas</button>";
    echo "</div>";
    echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('cadproduto');>";
    echo "<span class='customIcon fas fa-shopping-basket' ></span>";
    echo "<button type='button'>Cadastro de Produtos</button>";
    echo "</div>";
    echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('cadusuario');>";
    echo "<span class='customIcon fas fa-users' ></span>";
    echo "<button type='button'>Cadastro de Usuários</button>";
    echo "</div>";
    echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('cadrepresentante');>";
    echo "<span class='customIcon fas fa-user-tie' ></span>";
    echo "<button type='button'>Cadastro de Representantes</button>";
    echo "</div>";
    echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('imagemcampanha');>";
    echo "<span class='customIcon fas fa-camera' ></span>";
    echo "<button type='button'>Alterar Imagem da Campanha</button>";
    echo "</div>";
    echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('inserir_codigo');>";
    echo "<span class='customIcon fas fa-user-check' ></span>";
    echo "<button type='button'>Acessar como Usuário</button>";
    echo "</div>";
    echo "</div>";
}else{
  if($_SESSION['is_rep']==='t'){
    echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('estoque');>";
      echo "<span class='customIcon fas fa-warehouse'></span>";
      echo "<button type='button'>Estoque/Transferência</button>";
    echo "</div>";
    echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('cadproduto');>";
      echo "<span class='customIcon fas fa-shopping-basket' ></span>";
      echo "<button type='button'>Consulta de Produtos</button>";
    echo "</div>";
  echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('cadmotorista');>";
    echo "<span class='customIcon fas fa-car-alt'></span>";
    echo "<button type='button'>Consulta Motoristas</button>";
  echo "</div>";
}else{
  echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('estoque_mot');>";
    echo "<span class='customIcon fas fa-warehouse'></span>";
    echo "<button type='button'>Estoque</button>";
  echo "</div>";
  echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('cadproduto');>";
    echo "<span class='customIcon fas fa-shopping-basket' ></span>";
    echo "<button type='button'> Consulta Produtos</button>";
  echo "</div>";
}
}


?>
