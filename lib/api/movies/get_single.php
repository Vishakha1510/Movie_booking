<?php
require_once("../../../Config.php");
$config = new Config();

$movie_id = $_GET['movie_id'] ?? null;
if ($movie_id) {
    $movie = $config->fetch_single_movie($movie_id);
    echo json_encode($movie);
} else {
    echo json_encode(["success" => false, "message" => "Movie ID is required"]);
}
?>
