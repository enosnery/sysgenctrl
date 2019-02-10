<?php
session_start();

if($_SESSION['is_adm']==='t'){
echo "<input type='checkbox' id='isadmin' name='isadmin'>É Administrador?</input>";
}
?>
