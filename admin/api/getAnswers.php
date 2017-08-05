<?php
session_start();

include "adminSession.php";
require "../../config/database.php";

header('Content-Type: application/json');

$pageNumber = 1;
$resultSize = 10;
if (isset($_GET['pageNumber'])) {
    $pageNumber = $_GET['pageNumber'];
}

$beginAt = $resultSize * $pageNumber - $resultSize;
$sql = "".
    "SELECT a.answerId, a.answer, q.question 
     FROM question q
     JOIN answer a ON q.questionId = a.questionId
     ORDER BY answerId DESC LIMIT $beginAt, $resultSize";
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

$sql = "SELECT COUNT(*) AS COUNT_ROW FROM answer";
$query = mysql_query($sql, $conn);
if (!$query) {
    echo json_encode(array("success" => false, "message" => "Error, please contact system admin for checking Admin Login."));
    exit;
}

$COUNT_ROW = 0;
while ($row = mysql_fetch_assoc($query)) {
    $COUNT_ROW = $row['COUNT_ROW'];
}

$result = array(
    'pagesCount' => ceil($COUNT_ROW/$resultSize),
    'activePage' => intval($pageNumber),
    'result' => $dataArray
);

echo json_encode($result);
?>