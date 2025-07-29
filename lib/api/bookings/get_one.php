<?php
require_once("../../../Config.php");
$config = new Config();

$booking_id = $_GET['booking_id'] ?? null;
if ($booking_id) {
    $booking = $config->fetch_single_booking($booking_id);
    echo json_encode($booking);
} else {
    echo json_encode(["success" => false, "message" => "Booking ID is required"]);
}
?>
