<?php 
   require_once('includes/connection.php'); 
   mysql_select_db($database_localhost,$localhost);
	 
	$useremail = $_POST['UserEmail'];
	$password = $_POST['Password'];
	 
	 $query_search = "select * from agents where username = '".$useremail."' AND password = '".$password. "'";
	 $query_exec = mysql_query($query_search) or die(mysql_error());
	 $rows = mysql_num_rows($query_exec);
	 
	 if($rows --> 0)
	 {
	 echo "Y";
	 }
	else
	{
	echo "N";
	}
	?>