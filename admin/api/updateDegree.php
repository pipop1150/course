<?php
session_start();

include "adminSession.php";
require "../../config/database.php";

header('Content-Type: application/json');

if (!isset($_POST['degreeId']) || !isset($_POST['degreeNameTH']) || !isset($_POST['degreeNameEN'])) {
    $result = array(
        'success' => false,
        'message' => 'Require degreeId, degreeNameTH and degreeNameEN'
    );

    echo json_encode($result);
    exit;
}

$degreeId = $_POST['degreeId'];
$degreeNameTH = $_POST['degreeNameTH'];
$degreeNameEN = $_POST['degreeNameEN'];

$sql = "UPDATE degree SET degreeNameTH = '$degreeNameTH', degreeNameEN = '$degreeNameEN' WHERE degreeId = $degreeId";
$query = mysql_query($sql, $conn);
if (!$query) {
    echo json_encode(array("success" => false, "message" => "Error, please contact system admin for checking Admin Login."));
    exit;
}

$result = array(
    'success' => true,
    'message' => 'แก้ไขข้อมูลหลักสูตรเป็น: ' . $degreeNameTH . ' สำเร็จ'
);

echo json_encode($result);
?>