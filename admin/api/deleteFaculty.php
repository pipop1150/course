<?php
session_start();

include "adminSession.php";
require "../../config/database.php";

header('Content-Type: application/json');

if (!isset($_POST['facultyId']) || !isset($_POST['facultyNameTH']) || !isset($_POST['facultyNameEN'])) {
    $result = array(
        'success' => false,
        'message' => 'Require facultyId, facultyNameTH and facultyNameEN'
    );

    echo json_encode($result);
    exit;
}

$facultyId = $_POST['facultyId'];
$facultyNameTH = $_POST['facultyNameTH'];
$facultyNameEN = $_POST['facultyNameEN'];

$sql = "DELETE FROM faculty WHERE facultyId = $facultyId";
$query = mysql_query($sql, $conn);
if (!$query) {
    echo json_encode(array("success" => false, "message" => "Error, please contact system admin for checking Admin Login."));
    exit;
}

$result = array(
    'success' => true,
    'message' => 'ลบข้อมูลคณะ: ' . $facultyNameTH . ' สำเร็จ'
);

echo json_encode($result);
?>