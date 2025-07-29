<?php
require_once("../../../Config.php");
$config = new Config();

$movies = $config->fetch_all_movies();
echo json_encode($movies);
?>
