<?php 
include('includes/session.php');
include('includes/functions.php');
include('includes/connect.php');
confirm_logged_in()
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Admin Area</title>	
	<script type="text/javascript" src="js/tabber.js"></script>
	<meta name="Robots" content="index,follow" />
	<meta name="Generator" content="ESRI" />
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/home.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/example.css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/example-print.css" media="print">
	<script type="text/javascript">
	document.write('<style type="text/css">.tabber{display:none;}<\/style>');
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
		<div id="right">
		<h3>Admin Area</h3>
		<div class="tabber">
			<div class="tabbertab">
			  <h2>Reported Problems</h2>
			  <?php 
				$query = "SELECT * FROM complains WHERE solved = 'no'";
				$result_set = mysql_query($query);
				
				echo "<table width=\"100%\">";
				echo "<tr><th>ID</th><th>Location</th><th>Problem Type</th><th>Time Reported</th></tr>";
				while($result = mysql_fetch_array($result_set))
					 {
						echo "<tr><td>".$result['id']."</td><td>".$result['Name']."</td>
						<td>".$result['problem_type']."</td><td>".$result['report_time']."</td>
						<td><a href=\"content.php?id=".urlencode($result['id'])."\" target=\"_blank\">More</td></tr>";
					 }
				echo "</table>";
			  ?>
			</div>
		<!--div class="tabbertab">
			  <h2>SMS Log</h2>
			  <?php
				$query = "SELECT * FROM community_reports";
				$result_set = mysql_query($query);
				
				echo "<table width=\"100%\">";
				echo "<tr><th>Region</th><th>Estate</th><th>Problem Type</th></tr>";
				while($result = mysql_fetch_array($result_set))
					 {
						echo "<tr><td>".$result['region']."</td><td>".$result['estate']."</td>
						<td>".$result['problem']."</td>
						<td><input type=\"submit\" name=\"submit\" value=\"Assign\"></td></tr>";
					 }
				echo "</table>";
			  ?>
			</div--> 
		<div class="tabbertab">
			  <h2>Fixed Problems</h2>
			 <?php 
				$query = "SELECT * FROM complains WHERE solved = 'yes'";
				$result_set = mysql_query($query);
				
				echo "<table width=\"100%\">";
				echo "<tr><th>ID</th><th>Location</th><th>Problem Type</th><th>Time Reported</th></tr>";
				while($result = mysql_fetch_array($result_set))
					 {
						echo "<tr><td>".$result['id']."</td><td>".$result['Name']."</td>
						<td>".$result['problem_type']."</td><td>".$result['report_time']."</td>
						<td><a href=\"content.php?id=".urlencode($result['id'])."\" target=\"_blank\">More</td></tr>";
					 }
				echo "</table>";
			 
			 ?>
			 </div>

		</div>

		</div>
	
		<div id="footer">
			<ul id="rss">
				<p id="footer_right"></p>
			</ul>
			<p>Created by  <a href="https://twitter.com/Accadius" title="">@Accadius</a> <a href="logout.php" onclick="return confirm('Are you sure you want to Logout?')">Logout</a></</p>
			<p></p>
		</div>
	</div>
</body>
</html>