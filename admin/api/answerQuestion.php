<?php
session_start();

include "adminSession.php";
require "../../config/database.php";

header('Content-Type: application/json');

if (!isset($_POST['questionId']) || !isset($_POST['answer'])) {
    $result = array(
        'success' => false,
        'message' => 'Require questionId, and answer'
    );

    echo json_encode($result);
    exit;
}

$questionId = $_POST['questionId'];
$answer = $_POST['answer'];

$sql = "UPDATE question SET isActive = false WHERE questionId = $questionId";
$query = mysql_query($sql, $conn);
if (!$query) {
    echo json_encode(array("success" => false, "message" => "Error[x001], please contact system admin for checking Admin Login."));
    exit;
}

$sql = "INSERT INTO answer(questionId, answer, status) VALUES('$questionId', '$answer', 1)";
$query = mysql_query($sql, $conn);
if (!$query) {
    echo json_encode(array("success" => false, "message" => "Error, please contact system admin for checking Admin Login."));
    exit;
}

$result = array(
    'success' => true,
    'message' => 'บันทึกการตอบคำถามแล้ว'
);

echo json_encode($result);
?>