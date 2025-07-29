<?php
require_once("../../../Config.php");
$config = new Config();
$users = $config->fetch_all_users();
echo json_encode($users);
?>
