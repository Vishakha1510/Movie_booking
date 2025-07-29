<?php
require_once("../../../Config.php");
$obj = new Config();

$seats = $obj->fetch_all_seats();
echo json_encode($seats);
?>
