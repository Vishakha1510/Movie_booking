<?php
require_once("../../../Config.php");
$config = new Config();
$user_id = $_GET['user_id'];
if ($config->delete_user($user_id)) {
    echo json_encode(["success" => true, "message" => "User deleted"]);
} else {
    echo json_encode(["success" => false, "message" => "Delete failed"]);
}
?>
