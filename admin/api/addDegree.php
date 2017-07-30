<?php
session_start();

include "adminSession.php";
require "/../../config/database.php";

header('Content-Type: application/json');

$degreeNameTH = $_POST['degreeNameTH'];
$degreeNameEN = $_POST['degreeNameEN'];

$sql = "INSERT INTO degree(degreeId, degreeNameTH, degreeNameEN) VALUES(
    (SELECT CASE WHEN MAX(degreeId) IS NULL THEN 1 ELSE MAX(degreeId)+1 END FROM (SELECT * FROM degree) aliasDegree)
, '$degreeNameTH', '$degreeNameEN')";
$query = mysql_query($sql, $conn);
if (!$query) {
    echo json_encode(array("success" => false, "message" => "Error, please contact system admin for checking Admin Login."));
    exit;
}

$result = array(
    'success' => true,
    'message' => 'เพิ่มข้อมูลหลักสูตร: ' . $degreeNameTH . ' สำเร็จ'
);

echo json_encode($result);
?>