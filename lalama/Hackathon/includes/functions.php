<?php
function mysql_prep($value)
{
	mysql_real_escape_string($value);
	return $value;
}
function redirect_to($location = NULL)
{
	if($location != NULL)
	{
		header("Location: {$location}");
		exit ;
	}
}
function confirm_query($result_set)
{
	if(!result_set)
		{
			die("Database query failed: ".mysql_error());
		}
}
function limit_size($input)
{
	$position=30; 
	$post = substr($input,$position,1); 
	if($post !=" ")
	{ 	
		while($post !=" ")
		{
			$i=1;
			$position=$position+$i;
			$post = substr($input,$position,1);
		}
	
	}
	$post = substr($input,0,$position);
	$post .="...";
	return $post;
}
function isValidEmail($email)
{
	return preg_match('/^[a-z\d_\.\-]+@([a-z\d\-]+)(?:\.(?1)){1,2}$/i', $email);
}
?>
	