<?php
session_start();
include "../application/config/config.php";

if (!isset($_SESSION['admin-user'])) {
    header('Location: '. $config['base_url']."admin/login.php");
    return;
}
?>