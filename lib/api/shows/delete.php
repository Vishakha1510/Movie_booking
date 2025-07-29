<?php
require_once("../../../Config.php");
$obj = new Config();

$data = json_decode(file_get_contents("php://input"));

if (isset($data->show_id)) {
    $result = $obj->delete_show($data->show_id);
    echo json_encode(["success" => $result]);
} else {
    echo json_encode(["error" => "Missing show_id"]);
}
?>
