<?php
session_start();

include "adminSession.php";
require "../../config/database.php";

header('Content-Type: application/json');

if (!isset($_POST['answerId']) || !isset($_POST['answer']) || !isset($_POST['statusSelection'])) {
    $result = array(
        'success' => false,
        'message' => 'Require questionId, and answer'
    );

    echo json_encode($result);
    exit;
}

$answerId = $_POST['answerId'];
$answer = $_POST['answer'];
$statusSelection = $_POST['statusSelection'];

$sql = "UPDATE answer SET answer = '$answer', status = $statusSelection WHERE answerId = $answerId";
$query = mysql_query($sql, $conn);
if (!$query) {
    echo json_encode(array("success" => false, "message" => "Error[x001], please contact system admin for checking Admin Login.".$sql));
    exit;
}

$result = array(
    'success' => true,
    'message' => 'บันทึกการเปลี่ยนแปลงคำตอบแล้ว'
);

echo json_encode($result);
?>