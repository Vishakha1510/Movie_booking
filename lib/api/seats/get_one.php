<?php
require_once("../../../Config.php");
$obj = new Config();

if (isset($_GET['seat_id'])) {
    $seat = $obj->fetch_single_seat($_GET['seat_id']);
    echo json_encode($seat);
} else {
    echo json_encode(["error" => "Missing seat_id"]);
}
?>
