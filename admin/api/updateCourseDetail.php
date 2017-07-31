<?php
session_start();

include "adminSession.php";
require "../../config/database.php";

header('Content-Type: application/json');

if (!isset($_POST['branchId']) || !isset($_POST['courseDetail'])) {
    $result = array(
        'success' => false,
        'message' => 'Require branchId and courseDetail'
    );

    echo json_encode($result);
    exit;
}

$branchId = $_POST['branchId'];
$courseDetail = $_POST['courseDetail'];

$sql = "UPDATE branch SET courseDetail = '$courseDetail' WHERE branchId = $branchId";
$query = mysql_query($sql, $conn);
if (!$query) {
    echo json_encode(array("success" => false, "message" => "Error, please contact system admin for checking Admin Login."));
    exit;
}

$result = array(
    'success' => true,
    'message' => 'บันทึกรายละเอียดหลักสูตรแล้ว'
);

echo json_encode($result);
?>