<?php
session_start();

include "adminSession.php";
require "../../config/database.php";

header('Content-Type: application/json');

if (!isset($_POST['facultyId']) || !isset($_POST['branchNameTH']) || !isset($_POST['branchNameEN'])) {
    $result = array(
        'success' => false,
        'message' => 'Require facultyId, branchNameTH and branchNameEN'
    );

    echo json_encode($result);
    exit;
}

$facultyId = $_POST['facultyId'];
$branchNameTH = $_POST['branchNameTH'];
$branchNameEN = $_POST['branchNameEN'];

$sql = "INSERT INTO branch(branchNameTH, branchNameEN, facultyId) VALUES('$branchNameTH', '$branchNameEN', $facultyId)";
$query = mysql_query($sql, $conn);
if (!$query) {
    echo json_encode(array("success" => false, "message" => "Error, please contact system admin for checking Admin Login."));
    exit;
}

$result = array(
    'success' => true,
    'message' => 'เพิ่มข้อมูลสาขา: ' . $branchNameTH . ' สำเร็จ'
);

echo json_encode($result);
?>