<?php
session_start();
$index = isset($_POST['index']) ? $_POST['index'] : null;
$_SESSION['prodIndex'] = $index;
?>
