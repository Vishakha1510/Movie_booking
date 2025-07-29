<?php
require_once("../../../Config.php");
$config = new Config();

$booking_id = $_GET['booking_id'] ?? null;
if ($booking_id && $config->delete_booking($booking_id)) {
    echo json_encode(["success" => true, "message" => "Booking deleted successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Delete failed"]);
}
?>
