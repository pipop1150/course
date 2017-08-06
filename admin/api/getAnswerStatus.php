<?php
session_start();

include "adminSession.php";
require "../../config/database.php";

header('Content-Type: application/json');

$sql = "SELECT answerStatusId, answerStatusDetail FROM answerstatus";
$query = mysql_query($sql, $conn);
if (!$query) {
    echo json_encode(array("success" => false, "message" => "Error, please contact system admin for checking Admin Login."));
    exit;
}

$result = array();
$dataArray = array();
while ($row = mysql_fetch_assoc($query)) {
    array_push($dataArray, $row);
}

$result = array(
    'answerList' => $dataArray
);

echo json_encode($result);
?>