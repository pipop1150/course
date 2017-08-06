<?php
session_start();

include "adminSession.php";
require "../../config/database.php";

header('Content-Type: application/json');

if (!isset($_POST['questionId'])) {
    $result = array(
        'success' => false,
        'message' => 'Require questionId'
    );

    echo json_encode($result);
    exit;
}

$questionId = $_POST['questionId'];

$sql = "DELETE FROM question WHERE questionId = $questionId";
$query = mysql_query($sql, $conn);
if (!$query) {
    echo json_encode(array("success" => false, "message" => "Error, please contact system admin for checking Admin Login."));
    exit;
}

$result = array(
    'success' => true,
    'message' => 'ลบคำถามสำเร็จ'
);

echo json_encode($result);
?>