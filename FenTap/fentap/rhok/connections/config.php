<?php
$mysql_hostname = "localhost";
$mysql_user = "josemutie";
$mysql_password = "jessie**2012";
$mysql_database = "mutie";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");

?>

