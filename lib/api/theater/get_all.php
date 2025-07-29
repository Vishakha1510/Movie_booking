<?php
require_once("../../../Config.php");
$obj = new Config();

$theaters = $obj->fetch_all_theaters();
echo json_encode($theaters);
?>
