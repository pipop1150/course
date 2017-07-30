<?php
session_start();
require "../../application/config/config.php";
header('Content-Type: application/json');

if (!isset($_SESSION['isAdminUser'])) {
    $result = array(
        'success' => false,
        'message' => 'You have no right to access to admin APIs'
    );

    echo json_encode($result);
    exit;
}
?>