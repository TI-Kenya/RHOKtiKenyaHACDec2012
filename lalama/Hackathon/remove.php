<?php 
include("includes/session.php"); 
include("includes/connect.php"); 
include("includes/functions.php");
confirm_logged_in();
if(isset($_GET['id']))
{
	$id = $_GET['id'];	
	$query = "DELETE FROM comments WHERE ID = '{$id}' LIMIT 1";
	$result = mysql_query($query);
		if(mysql_affected_rows() == 1)
			{ 
				redirect_to("comment.php");
			}
		else
			{
				echo "Subject deletion failed";
				echo "<p>".mysql_error()."</p>";
				echo "<a href=\"comment.php\">Return to main page</a>";
			}
}
else
{
	redirect_to("comment.php");
}		
?>	
<?php mysql_close($connection); ?>