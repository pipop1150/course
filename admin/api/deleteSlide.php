<?php
session_start();

include "adminSession.php";
require "../../config/database.php";

header('Content-Type: application/json');

if (!isset($_GET['id']) || !isset($_GET['name'])) {
    $result = array(
        'success' => false,
        'message' => 'Require image id'
    );

    echo json_encode($result);
    exit;
}

$id = $_GET['id'];
$webImgPath = $_GET['name'];
$slidePath = "../../".$webImgPath;
unlink($slidePath);

$sql = "DELETE FROM image_slide WHERE id = $id";
$query = mysql_query($sql, $conn);
if (!$query) {
    echo json_encode(array("success" => false, "message" => "Error, please contact system admin for checking Admin Login."));
    exit;
}

$result = array(
    'success' => true,
    'message' => 'ลบข้อมูลภาพชื่อ: ' . $name . ' สำเร็จ'
);

echo json_encode($result);
?>