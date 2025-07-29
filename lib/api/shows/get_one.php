<?php
require_once("../../../Config.php");
$obj = new Config();

if (isset($_GET['show_id'])) {
    $show = $obj->fetch_single_show($_GET['show_id']);
    echo json_encode($show);
} else {
    echo json_encode(["error" => "Missing show_id"]);
}
?>
