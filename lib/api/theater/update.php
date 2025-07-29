<?php
require_once("../../../Config.php");
$obj = new Config();

$data = json_decode(file_get_contents("php://input"));

if (isset($data->theater_id) && isset($data->name) && isset($data->location)) {
    $result = $obj->update_theater($data->theater_id, $data->name, $data->location);
    echo json_encode(["success" => $result]);
} else {
    echo json_encode(["error" => "Missing required fields"]);
}
?>
