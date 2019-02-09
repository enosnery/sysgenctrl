<?php
  if($_SESSION['is_adm']==='t'){
    echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('estoque_adm');>";
    echo "<span class='customIcon fas fa-warehouse'></span>";
    echo "<button type='button'>Estoque</button>";
    echo "</div>";
    echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('estoque_rep_adm');>";
    echo "<span class='customIcon fas fa-user-tie'></span>";
    echo "<button type='button'>Estoque Representantes</button>";
    echo "</div>";
    echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('estoque_mot_adm');>";
    echo "<span class='customIcon fas fa-car-alt' ></span>";
    echo "<button type='button'>Estoque Motoristas</button>";
    echo "</div>";
    echo "</div>";
}else{
  if($_SESSION['is_rep']==='t'){
    echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('estoque_rep');>";
    echo "<span class='customIcon fas fa-warehouse'></span>";
    echo "<button type='button'>Estoque</button>";
    echo "</div>";
    echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('estoque_mot_rep');>";
    echo "<span class='customIcon fas fa-car-alt' ></span>";
    echo "<button type='button'>Estoque Motoristas</button>";
    echo "</div>";
    echo "</div>";
}else{
  echo "<div class='list-group-item list-group-item-action' onclick=redirectTo('estoque_mot');>";
  echo "<span class='customIcon fas fa-warehouse'></span>";
  echo "<button type='button'>Estoque</button>";
  echo "</div>";
  echo "</div>";
}
}


?>
