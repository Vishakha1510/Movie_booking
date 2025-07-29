<?php
require_once("../../../Config.php");
$config = new Config();

$bookings = $config->fetch_all_bookings();
echo json_encode($bookings);
?>
