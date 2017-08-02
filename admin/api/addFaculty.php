<?php
session_start();

include "adminSession.php";
require "../../config/database.php";

header('Content-Type: application/json');

if (!isset($_POST['degreeId']) || !isset($_POST['facultyNameTH']) || !isset($_POST['facultyNameEN'])) {
    $result = array(
        'success' => false,
        'message' => 'Require degreeId, facultyNameTH and facultyNameEN'
    );

    echo json_encode($result);
    exit;
}

$degreeId = $_POST['degreeId'];
$facultyNameTH = $_POST['facultyNameTH'];
$facultyNameEN = $_POST['facultyNameEN'];

/*$sql = "INSERT INTO faculty(facultyId, facultyNameTH, facultyNameEN, degreeId) VALUES(
    (SELECT CASE WHEN MAX(facultyId) IS NULL THEN 1 ELSE MAX(facultyId)+1 END FROM (SELECT * FROM facultyId) aliasFaculty)
, '$facultyNameTH', '$facultyNameEN', $degreeId)";*/
$sql = "INSERT INTO faculty(facultyNameTH, facultyNameEN, degreeId) VALUES('$facultyNameTH', '$facultyNameEN', $degreeId)";
$query = mysql_query($sql, $conn);
if (!$query) {
    echo json_encode(array("success" => false, "message" => "Error, please contact system admin for checking Admin Login."));
    exit;
}

$result = array(
    'success' => true,
    'message' => 'เพิ่มข้อมูลคณะ: ' . $facultyNameTH . ' สำเร็จ'
);

echo json_encode($result);
?>