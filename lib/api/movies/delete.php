<?php
require_once("../../../Config.php");
$config = new Config();

$movie_id = $_GET['movie_id'] ?? null;
if ($movie_id && $config->delete_movie($movie_id)) {
    echo json_encode(["success" => true, "message" => "Movie deleted successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Delete failed"]);
}
?>
