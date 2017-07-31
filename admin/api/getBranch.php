<?php
session_start();

include "adminSession.php";
require "../../config/database.php";

header('Content-Type: application/json');

if (!isset($_GET['facultyId'])) {
    $result = array(
        'success' => false,
        'message' => 'Require facultyId'
    );

    echo json_encode($result);
    exit;
}

$facultyId = $_GET['facultyId'];

$sql = "SELECT branchId as id, branchNameTH as th, branchNameEN as en FROM branch WHERE facultyId = '$facultyId'";
$query = mysql_query($sql, $conn);
if (!$query) {
    echo json_encode(array("success" => false, "message" => "Error, please contact system admin for checking Admin Login."));
    exit;
}

$result = array();
while ($row = mysql_fetch_assoc($query)) {
    $rowResult = array(
        "id" => $row["id"],
        "th" => $row["th"],
        "en" => $row["en"],
    );

    array_push($result, $rowResult);
}

echo json_encode($result);
?>