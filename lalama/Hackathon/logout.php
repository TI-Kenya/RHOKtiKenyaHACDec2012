<?php ob_start();?>
<?php require_once("includes/functions.php"); ?>
<?php 
	session_start();
	$_SESSION = array();
	if(isset($_COOKIE[session_name()]))
	{
		setcookie(session_name(),'',time()-5000,'/');
	}
	session_destroy();
	redirect_to("login.php?logout=1");
	?>
<?php ob_end_flush();?>