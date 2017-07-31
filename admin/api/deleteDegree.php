<?php
session_start();

include "adminSession.php";
require "../../config/database.php";

header('Content-Type: application/json');

if (!isset($_POST['degreeId'])) {
    $result = array(
        'success' => false,
        'message' => 'Require degreeId'
    );

    echo json_encode($result);
    exit;
}

$degreeId = $_POST['degreeId'];

$sql = "DELETE FROM degree WHERE degreeId = $degreeId";
$query = mysql_query($sql, $conn);
if (!$query) {
    echo json_encode(array("success" => false, "message" => "Error, please contact system admin for checking Admin Login."));
    exit;
}

$result = array(
    'success' => true,
    'message' => 'ลบข้อมูลหลักสูตร: ' . $degreeNameTH . ' สำเร็จ'
);

echo json_encode($result);
?>