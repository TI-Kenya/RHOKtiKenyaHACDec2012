<?php
include("includes/connect.php"); 
include("includes/session.php");
include("includes/functions.php");
if($_POST)
{
$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];

$lowercase = strtolower($email);
$image = md5( $lowercase ); 
$query = "INSERT INTO comments (Name, Email, Comment) VALUES ('$name','$email','$comment')";
$result = mysql_query($query); 
}
else 
{ 
	$message = "Failed".mysql_error();
}

?>
<li class="box">
<span style="font-size:16px; color:#663399; font-weight:bold"> <?php echo $name;?></span> <br /><br />
<li class="box">
<?php echo $name;?><br />
<?php echo $comment; ?>
<?php echo $message; ?>
</li>