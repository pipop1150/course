<?php
include "application/config/database.php";
include "application/config/config.php";

$host = $db['default']['hostname'];
$userdb = $db['default']['username'];
$passworddb = $db['default']['password'];
$dbuse = $db['default']['database'];

mysql_connect($host,$userdb,$passworddb);
mysql_select_db($dbuse) or die(mysql_error());
mysql_query("SET NAMES UTF8");
?>