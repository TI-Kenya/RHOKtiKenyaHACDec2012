<?php 
include('includes/session.php');
include('includes/functions.php');
include('includes/connect.php');
if(isset($_POST['submit']))
{
	$errors = array();
	$required_fields = array('region','description','simu');
	foreach($required_fields as $fieldname)
	{
		if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) 
		{
		$errors[] = $fieldname;
		} 
	}
	if($_SESSION['captcha'] != $_POST['captcha'])
	{
		$errors[] = "Invalid captcha code";
	}
	if(empty($errors))
	{
		$region = mysql_prep($_POST['region']);
		$typo = mysql_prep($_POST['typo']);
		//$problem = mysql_prep($_POST['problem']);
		$description = mysql_prep($_POST['description']);
		$simu = mysql_prep($_POST['simu']);
		$mail = mysql_prep($_POST['mail']);
		$tcode = substr(number_format(time() * rand(),0,'',''),0,5);
		//$tcode=mysql_query($tcod);
		$query = "INSERT into complains(region, problem_type, description, report_time, tcode, email, phone) 
		VALUES('$region', '$typo', '$description', now(),'TIK$tcode', '$mail', '$simu'  )";
		$result_set = mysql_query($query);
		
		if($result_set)
		{
			$message = "Thank you! Your input has been received.";
		}
		else
		{
			$message = "Failure to insert data".mysql_error(); 
		}
	}
	else
	{
		$message = "Please ensure that you have filled the required fields";
	}
}
$RandomStr = md5(microtime());
$ResultStr = substr($RandomStr,0,5);
$_SESSION['captcha'] = $ResultStr;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Complaint Form</title>	
	<meta name="Robots" content="index,follow" />
	<meta name="Generator" content="ESRI" />
	<link rel="stylesheet" type="text/css" href="css/home.css" media="screen" />
	<link rel="shortcut icon" href="images/favicon.ico">
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
				<li><a href="public.php">Reported Complains</a></li>
				<li><a href="trace.php">Trace Complain</a></li>
				<li><a href="comment.php">Feedback</a></li>
			</ul>	
			<form action="" method="post"><input type="text" name="search"><input type="submit" value="Seach"/></form>
		</div>		
		<div id="right">
		<h3>Submit a Complaint</h3>
		<?php 
		 if(!empty($message))
		 {
			echo $message;
			echo "<br>";
		 }
		 if(!empty($errors))
		 {
			foreach($errors as $value)
			{
				echo strtoupper($value);
				echo "&nbsp;&nbsp;";
			}
		 }
		?>
		<table width="50%">
		<form action="complaint.php" method="post">
		<tr><td>Region</td><td><input type="text" name="region"> <span class="star">*</span></td></tr>
		<tr><td>Phone</td><td><input type="text" name="simu"> <span class="star">*</span></td></tr>
		<tr><td>e-mail</td><td><input type="text" name="mail"> <span class="star">*</span></td></tr>
		<tr><td>Category</td><td><select name="typo" id="typo">
	<option value="">Select Category</option>
	<?php
  $query = "SELECT * FROM `corruption_categories`;";
$result = mysql_query($query); 


while ($row = mysql_fetch_array($result)){
?>
<font face="verdana" size ="0.5" color="green">
<option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></a> </option>
</font>
<?php
}
?>
</select><span class="star">*</span></td></tr>
		
		<tr><td>Description</td><td><textarea name="description" id="description"></textarea></td></tr>
		<tr><td></td>
		<tr><td>Enter the code: <b><?php echo $ResultStr; ?></b></td><td><input type="text" name="captcha"> <span class="star">*</span></td></tr>
		<tr><td></td><td><input type="submit" name="submit" value="Submit">&nbsp;&nbsp;<input type="reset" name="reset" value="Reset"></td></tr>
		</form>
		</table>
		<p><span class="star">*</span> Indicates required field</p>
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