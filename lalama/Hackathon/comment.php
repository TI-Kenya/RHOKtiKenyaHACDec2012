<?php 
include("includes/ps_pagination.php");	
include('includes/session.php');
include('includes/functions.php');
include('includes/connect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Feedback</title>	
<meta name="Robots" content="index,follow" />
<meta name="Generator" content="ESRI" />
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" type="text/css" href="css/main.css" /> 
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(function() {

$(".submit").click(function() {

var name = $("#name").val();
var email = $("#email").val();
	var comment = $("#comment").val();
    var dataString = 'name='+ name + '&email=' + email + '&comment=' + comment;
	
	if(name=='' || email=='' || comment=='')
     {
    alert('Please Give Valid Details');
     }
	else
	{
	$("#flash").show();
	$("#flash").fadeIn(400).html('<img src="ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
$.ajax({
		type: "POST",
  url: "commentajax.php",
   data: dataString,
  cache: false,
  success: function(html){
 
  $("ol#update").append(html);
  $("ol#update li:last").fadeIn("slow");
  document.getElementById('email').value='';
   document.getElementById('name').value='';
    document.getElementById('comment').value='';
	$("#name").focus();
 
  $("#flash").hide();
	
  }
 });
}
return false;
	});

});
</script>
<script type="text/javascript">
		$(document).ready(function(){		  
		  $(".content").hide();		  
		  $(".toggle").click(function()
		  {
		$(this).toggleClass('arrow-down').next(".content").slideToggle(300);
		  });
		});	
</script>
</head>
<body>
<div class="wrap">
		<div id="logo">
			<img src="images/logo.png"/>
		</div>
		<div id="subheader">
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="complaint.php">Report Complain</a></li>
				<li><a href="public.php">Reported Complain</a></li>
				<li><a href="trace.php">Trace Complain</a></li>
				<li><a href="comment.php">Feedback</a></li>
				
			</ul>	
		</div>
		<div id="left">
			<h3>Menu:</h3>
			<ul>
				
			</ul>
			
			
		</div>
		<div id="right">
		<h3>Got any feedback? Scribble below.</h3>
		<form action="#" method="post">
		<input type="text" name="title" id="name"/><span class="titles">Name</span><span class="star">*</span><br />
		<input type="text" name="email" id="email"/><span class="titles">Email</span><span class="star">*</span><br />
		<p>Comment</p>
		<textarea name="comment" id="comment"></textarea><br />
		<input type="submit" class="submit" value="Submit" />
		</form>
		<br>
		<ol  id="update" class="timeline">
		</ol>
		<div id="flash" align="left"></div>
		<br>
		<div id="comments">
		<ol  id="update" class="timeline2">
		
		<?php
			$query = "SELECT * FROM comments ORDER by ID Desc";
			$result = mysql_query($query);
			$pager = new PS_Pagination($connection, $query, 3, 5, "id=$id");
			$rs = $pager->paginate();
			$rs = $pager->paginate();
			if(!$rs) die(mysql_error());
			while($row = mysql_fetch_array($rs))
			{
				echo "<li class=\"box\">";
				$email2 = $row['Email'];
				$lowercase = strtolower($email);
				$image = md5( $lowercase );
				//echo "<img src=\"http://www.gravatar.com/avatar.php?gravatar_id=".$image."\">";
				echo $row['Name']."<br>";
				echo $row['Comment']."&nbsp;&nbsp;&nbsp;&nbsp;";
				if(isset($_SESSION['id']))
				{
					echo "<a href=\"remove.php?id=".$row['ID']."\" onclick=\"return confirm('Are you sure you want to remove this comment?')\">Remove Comment</a>";
				}
				echo "</li>";
			}
			echo $pager->renderFullNav();
	    ?>
		
		</ol>
		</div>
	</div>
	<div id="footer">
			<ul id="rss">
				<p id="footer_right"></p>
			</ul>
			<p>Created by  <a href="https://twitter.com/Accadius" title="">@Accadius</a> &middot; 
			<?php 
			if(isset($_SESSION['id']))
			{
				echo "<a href=\"admin.php\"> Admin </a>";
				echo "&middot;";
				echo "<a href=\"logout.php\" onclick=\"return confirm('Are you sure you want to Logout?')\"> Logout</a></</p>";
			}
			else
			{
				echo "<a href=\"login.php\">Login</a></p>";
			}
			?>
			<p></p>
		</div>
	</div>
</body>
</html>
