<?php
require_once("../../../Config.php");
$obj = new Config();

$data = json_decode(file_get_contents("php://input"));

if (
    isset($data->show_id) &&
    isset($data->movie_id) &&
    isset($data->theater_id) &&
    isset($data->show_time)
) {
    $result = $obj->update_show($data->show_id, $data->movie_id, $data->theater_id, $data->show_time);
    echo json_encode(["success" => $result]);
} else {
    echo json_encode(["error" => "Missing required fields"]);
}
?>
