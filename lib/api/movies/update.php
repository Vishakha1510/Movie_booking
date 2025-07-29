<?php
require_once("../../../Config.php");
$config = new Config();

$data = json_decode(file_get_contents("php://input"));
if ($config->update_movie($data->movie_id, $data->title, $data->description, $data->duration, $data->release_date)) {
    echo json_encode(["success" => true, "message" => "Movie updated successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Update failed"]);
}
?>
