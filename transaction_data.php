<?php
session_start();
$charge_id = isset($_POST['charge_id']) ? $_POST['charge_id'] : null;
$data = $_POST['items'];
$ids = $_POST['ids'];
$valortotal = $_POST['total'];
$_SESSION['charge_id'] = $charge_id;
$_SESSION['$data'] = $data;
$_SESSION['$ids'] = $ids;
$_SESSION['total'] = $valortotal;
?>
