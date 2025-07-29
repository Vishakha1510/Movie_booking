<?php
require_once("../../../Config.php");
$obj = new Config();

$data = json_decode(file_get_contents("php://input"));

if (
    isset($data->seat_id) &&
    isset($data->show_id) &&
    isset($data->seat_number) &&
    isset($data->is_booked)
) {
    $result = $obj->update_seat($data->seat_id, $data->show_id, $data->seat_number, $data->is_booked);
    echo json_encode(["success" => $result]);
} else {
    echo json_encode(["error" => "Missing required fields"]);
}
?>
