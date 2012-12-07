

<?php

$host="localhost"; // Host name
$username="josemutie"; // Mysql username
$password="jessie**2012"; // Mysql password
$db_name="mutie"; // Database name


//Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("Cannot connect to server");
mysql_select_db("$db_name")or die("cannot select DB");

?>
