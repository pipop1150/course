<?php
session_start();

include "adminSession.php";
require "../../config/database.php";

header('Content-Type: application/json');

$sql = "SELECT degreeId as id, degreeNameTH as th, degreeNameEN as en FROM degree";
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