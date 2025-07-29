<?php
require_once("../../../Config.php");
$obj = new Config();

$data = json_decode(file_get_contents("php://input"));

if (
    isset($data->show_id) &&
    isset($data->seat_number)
) {
    $result = $obj->insert_seat($data->show_id, $data->seat_number);
    echo json_encode(["success" => $result]);
} else {
    echo json_encode(["error" => "Missing required fields"]);
}
?>
