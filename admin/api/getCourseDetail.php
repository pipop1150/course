<?php
session_start();

include "adminSession.php";
require "../../config/database.php";

header('Content-Type: application/json');

if (!isset($_GET['branchId'])) {
    $result = array(
        'success' => false,
        'message' => 'Require branchId'
    );

    echo json_encode($result);
    exit;
}

$branchId = $_GET['branchId'];

$sql = "SELECT courseDetail FROM branch WHERE branchId = $branchId LIMIT 1";
$query = mysql_query($sql, $conn);
if (!$query) {
    echo json_encode(array("success" => false, "message" => "Error, please contact system admin for checking Admin Login."));
    exit;
}

$row = mysql_fetch_array($query);
$result = array(
    'success' => true,
    'courseDetail' => $row['courseDetail']
);
// $result = array();
// while ($row = mysql_fetch_assoc($query)) {
//     $rowResult = array(
//         "courseDetail" => $row["courseDetail"]
//     );

//     array_push($result, $rowResult);
// }

echo json_encode($result);
?>