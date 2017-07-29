<?php
session_start();
require "../application/config/config.php";

if (!isset($_SESSION['isAdminUser'])) {
    header('Location: '. $config['base_url']."login.php");
    exit;
}
?>