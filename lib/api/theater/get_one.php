<?php
require_once("../../../Config.php");
$obj = new Config();

if (isset($_GET['theater_id'])) {
    $theater = $obj->fetch_single_theater($_GET['theater_id']);
    echo json_encode($theater);
} else {
    echo json_encode(["error" => "Missing theater_id"]);
}
?>
