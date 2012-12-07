<?php

include('db.php');


if(isSet($_POST['username']))
{
$username = $_POST['username'];
$username = mysql_real_escape_string($username);
$sql_check = mysql_query("SELECT uid FROM registered_members WHERE username='$username'");

if(mysql_num_rows($sql_check))
{
echo '<font color="#cc0000"><STRONG>'.$username.'</STRONG> is already in use.</font>';
}
else
{
echo 'OK';
}

}

?>