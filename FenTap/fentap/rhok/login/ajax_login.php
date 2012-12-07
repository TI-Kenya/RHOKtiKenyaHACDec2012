<?php session_start();

//Connect to database from here
$link = mysql_connect('localhost', 'josemutie', 'jessie**2012'); 
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
//select the database | Change the name of database from here
mysql_select_db('mutie'); 

//get the posted values
$username=htmlspecialchars($_POST['username'],ENT_QUOTES);
$password=($_POST['password']);
$email;
$name;

//now validating the username and password
$sql="SELECT username, password FROM registered_members WHERE username='".$username."'";
$result=mysql_query($sql);
$member=mysql_fetch_array($result);

//if username exists
if(mysql_num_rows($result)>0)
{
	//compare the password
	if(strcmp($member['password'],$password)==0)
	{
		echo "yes";
		//now set the session from here if needed
		$_SESSION['SESS_USERNAME']=$username; 
		//$_SESSION['SESS_NAME']=$name; 
		//$_SESSION['SESS_EMAIL']=$email; 
		
	}
	else
		echo "no"; 
}
else
	echo "no"; //Invalid Login

?>