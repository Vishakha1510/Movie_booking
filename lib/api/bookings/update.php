<?php
require_once("../../../Config.php");
$config = new Config();

$data = json_decode(file_get_contents("php://input"));
if ($config->update_booking($data->booking_id, $data->user_id, $data->movie_id, $data->booking_date, $data->seats)) {
    echo json_encode(["success" => true, "message" => "Booking updated successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Update failed"]);
}
?>
