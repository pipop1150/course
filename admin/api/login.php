<?php
session_start();

require "../../config/database.php";

header('Content-Type: application/json');

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    $result = array(
        'success' => false,
        'message' => 'Require username and password'
    );

    echo json_encode($result);
    exit;
}

$user = $_POST["username"];
$pass = $_POST["password"];

$sql = "SELECT * FROM user WHERE username='$user' AND password='$pass'";
$query = mysql_query($sql, $conn);
if (!$query) {
    echo json_encode(array("success" => false, "message" => "Error, please contact system admin for checking Admin Login."));
    exit;
}

$isAdmin = false;
while ($row = mysql_fetch_assoc($query)) {
    $isAdmin = $row['isAdmin'];
}

if ($isAdmin) {
    echo json_encode(array("success" => true, "message" => "Welcome $user to Admin page."));
    $_SESSION['isAdminUser'] = $isAdmin;
    exit;
}

echo json_encode(array("success" => false, "message" => "Username or Password is invalid."));
?>