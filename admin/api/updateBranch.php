<?php
session_start();

include "adminSession.php";
require "../../config/database.php";

header('Content-Type: application/json');

if (!isset($_POST['branchId']) || !isset($_POST['branchNameTH']) || !isset($_POST['branchNameEN'])) {
    $result = array(
        'success' => false,
        'message' => 'Require branchId, branchNameTH and branchNameEN'
    );

    echo json_encode($result);
    exit;
}

$branchId = $_POST['branchId'];
$branchNameTH = $_POST['branchNameTH'];
$branchNameEN = $_POST['branchNameEN'];

$sql = "UPDATE branch SET branchNameTH = '$branchNameTH', branchNameEN = '$branchNameEN' WHERE branchId = $branchId";
$query = mysql_query($sql, $conn);
if (!$query) {
    echo json_encode(array("success" => false, "message" => "Error, please contact system admin for checking Admin Login."));
    exit;
}

$result = array(
    'success' => true,
    'message' => 'แก้ไขข้อมูลสาขาเป็น: ' . $branchNameTH . ' สำเร็จ'
);

echo json_encode($result);
?>