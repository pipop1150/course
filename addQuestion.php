<?php

require "./config/database.php";

header('Content-Type: application/json');

if (!isset($_POST['question']) || !isset($_POST['keyCheck']) ) {
    $result = array(
        'success' => false,
        'message' => 'can\'t access page'
    );

    echo json_encode($result);
    exit;
}

$question = $_POST['question'];

$sql = "insert into question (question, isActive) VALUES('$question', 0)";
$query = mysql_query($sql, $conn);
if (!$query) {
    echo json_encode(array("success" => false, "message" => "Error, please contact system admin."));
    exit;
}

$result = array(
    'success' => true,
    'message' => 'เพิ่มข้อมูลคำถาม : ' . $branchNameTH . ' สำเร็จ'
);

echo json_encode($result);
?>