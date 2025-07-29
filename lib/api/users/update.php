<?php
require_once("../../../Config.php");
$config = new Config();
$data = json_decode(file_get_contents("php://input"));
if ($config->update_user($data->user_id, $data->name, $data->email, $data->password)) {
    echo json_encode(["success" => true, "message" => "User updated"]);
} else {
    echo json_encode(["success" => false, "message" => "Update failed"]);
}
?>
