<?php
require_once("../../../Config.php");
$obj = new Config();

$shows = $obj->fetch_all_shows();
echo json_encode($shows);
?>
