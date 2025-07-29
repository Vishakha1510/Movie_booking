<?php
require_once '../../config/Config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $config = new Config();
        $result = $config->insert_user($name, $email, $password);

        if ($result) {
            echo json_encode(['status' => true, 'message' => 'User inserted successfully']);
        } else {
            echo json_encode(['status' => false, 'message' => 'User insertion failed']);
        }
    } else {
        echo json_encode(['status' => false, 'message' => 'Missing required fields']);
    }
} else {
    echo json_encode(['status' => false, 'message' => 'Invalid request']);
}
?>
