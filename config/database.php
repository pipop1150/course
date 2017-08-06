<?php

// If you change the project name, you also must change the project name in root.php
include "root.php";
include $root."application/config/config.php";
include $root."application/config/database.php";


$host = $db['default']['hostname'];
$userdb = $db['default']['username'];
$passworddb = $db['default']['password'];
$dbuse = $db['default']['database'];

// $host = 'localhost';
// $userdb = 'www';
// $passworddb = 'webrkl@word';
// $dbuse = 'sjuwebdb';

$conn = mysql_connect($host,$userdb,$passworddb);
mysql_select_db($dbuse) or die(mysql_error());
mysql_query("SET NAMES UTF8");
?>