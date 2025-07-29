<?php
require_once("../../../Config.php");
$config = new Config();
$user_id = $_GET['user_id'];
$user = $config->fetch_single_user($user_id);
echo json_encode($user);
?>
