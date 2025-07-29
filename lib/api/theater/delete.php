<?php
require_once("../../../Config.php");
$obj = new Config();

$data = json_decode(file_get_contents("php://input"));

if (isset($data->theater_id)) {
    $result = $obj->delete_theater($data->theater_id);
    echo json_encode(["success" => $result]);
} else {
    echo json_encode(["error" => "Missing theater_id"]);
}
?>
