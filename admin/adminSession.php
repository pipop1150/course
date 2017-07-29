<?php
session_start();

// This page only for admin.php on the root directory 
include "application/config/config.php";

if (!isset($_SESSION['isAdminUser'])) {
    header('Location: '. $config['base_url']."login.php");
    exit;
}
?>