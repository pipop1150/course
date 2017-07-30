<?php
session_start();

session_destroy();

header('Content-Type: application/json');
$result = array(
    'success' => true,
    'message' => 'Logout is successful'
);

echo json_encode($result);

?>