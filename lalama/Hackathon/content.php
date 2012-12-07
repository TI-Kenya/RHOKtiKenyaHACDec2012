<?php 
include('includes/session.php');
include('includes/functions.php');
include('includes/connect.php');
if(isset($_GET['id']))
{
	$id = $_GET['id'];
	if(isset($_POST['submit']))
	{
	
		$name = $_POST['region'];
		$problem = $_POST['Problem'];
		$description = $_POST['description'];
		$solved = $_POST['solved'];
		
		$query = "UPDATE complains SET
				 Name = '{$name}',
				 problem_type  = '{$problem}',
				 description = '{$description}',
				 solved = '{$solved}'
				 WHERE id = {$id}";
		$result = mysql_query($query);
			if(mysql_affected_rows() == 1)
			{ 
				$message = "The data was successfully updated.";
			}
			else{ 
			$message = "The update failed.".mysql_error();
			}
	}
	$query = "SELECT * FROM complains WHERE id = '{$id}'";
	$result_set = mysql_query($query);
		if($result_set)
		{
			while($result = mysql_fetch_array($result_set))
			{
				$problem = $result['problem_type'];
				$description = $result['description'];
				$problem = $result['problem_type'];
				$time = $result['report_time'];
				$solved = $result['solved'];
				$image = $result['photo'];
				$name = $result['Name'];
				$id = $result['id'];
			}
		}
		else
		{
			$message = "No data";
		}
	
	
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $name;?></title>	
	<meta name="Robots" content="index,follow" />
	<meta name="Generator" content="ESRI" />
	<link rel="stylesheet" type="text/css" href="css/home.css" media="screen" />
	<link rel="shortcut icon" href="images/favicon.ico">
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<div class="wrap">
		<div id="logo">
			<img src="images/logo.png"/>
		</div>
		<div id="subheader">
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="complaint.php">Report Complain</a></li>
				<li><a href="public.php">Reported Complains</a></li>
				<li><a href="trace.php">Trace Complain</a></li>
				<li><a href="comment.php">Feedback</a></li>
			
			</ul>	
			
		</div>		
		<div id="right">
		<?php 
		echo "<h3>".$name."</h3>";
		//$url = "xmin=".$_GET['xmin']."&xmax=". $_GET['xmax']."&ymin=".$_GET['ymin']."&ymax=".$_GET['ymax']."&wkid=".$_GET['wkid']; 
		//echo "<img src=\"location/".$image."\" align=\"left\" width=\"50%\" class=\"location\">"; 
		//echo "<iframe width=\"47%\" height=\"280\" frameborder=\"0\" src=\"watersystem.php?".$url."\"></iframe>";
		echo "<br>";
		if(isset($_SESSION['id']))
		{
			echo "<h3>Complain details</h3>";
			if(isset($message))
			{
				echo $message;
			}
			echo "<form action=\"content.php?id=".$id."\"method=\"post\">";
			
			echo "<p>Complain&nbsp;&nbsp;&nbsp;<input type=\"text\" class=\"text\" name=\"Problem\" value=\"".$problem_type."\">";
			echo "<p>Region&nbsp;&nbsp;&nbsp;<input type=\"text\" class=\"text\" name=\"Problem\" value=\"".$region."\">";
			echo "<p>Assign&nbsp;&nbsp;&nbsp;<input type=\"text\" class=\"text\" name=\"Problem\" value=\"".$assign1."\">";
			echo "<p>Description<textarea name=\"description\" id=\"description\" >".$description."</textarea>";
			echo "<p>Reported&nbsp;&nbsp;&nbsp;<b>".$report_time."</b>";
			echo "<p>Solved&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>".strtoupper($solved)."</b>";
			echo "<p>Solved&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "<input name=\"solved\" type=\"radio\" value=\"yes\""; 
				
					if($solved == 'yes')
					{echo "checked";}
					
					echo ">Solved &nbsp;&nbsp;";
			echo "<input name=\"solved\" type=\"radio\" value=\"pending\""; 
				
					if($solved == 'pending')
					{echo "checked";}
					
					echo ">Pending &nbsp;&nbsp;";		
			echo "<input name=\"solved\" type=\"radio\" value=\"no\""; 
					
					if($solved == 'no')
					{echo "checked";}
					
					echo ">Not Solved";
			echo "<p><input type=\"submit\" name=\"submit\" value=\"Modify\">";
			echo "</form>";
		}
		else
		{
			echo "<table width=\"100%\">";
			echo "<h3>Area details</h3>";
			echo "<tr><th>Options</th><th>Details</th></tr>";
			echo "<tr><td>ID</td><td>".$tcode."</td></tr>";
			echo "<tr><td>Name</td><td>".$region."</td></tr>";
			echo "<tr><td>category</td><td>".$problem_type."</td></tr>";
			echo "<tr><td>Description</td><td>".$description."</td></tr>";
			echo "<tr><td>Time</td><td>".$time."</td></tr>";
			echo "<tr><td>Assign</td><td>".$assign1."</td></tr>";
			echo "<tr><td>Assign2</td><td>".$assign2."</td></tr>";
			echo "<tr><td>Solved</td><td><b>".strtoupper($solved)."</b></td></tr>";
			echo "</table>";
			echo "<br>";
			//echo "<div class=\"fb-comments\" data-href=\"esriea.co.ke?id=".$id."data-num-posts=\"2\" data-width=\"500\"></div>";
		}
		?>
		<br>
		
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