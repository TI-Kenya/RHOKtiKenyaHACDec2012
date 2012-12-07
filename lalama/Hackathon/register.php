<?php 
include('includes/session.php');
include('includes/functions.php');
include('includes/connect.php');
if(isset($_POST['submit']))
{
	$errors = array();
	$required_fields = array('fname','lname','username', 'email','password');
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
	if(!isValidEmail($_POST['email']))
	{
		$errors = "Invalid email address";
	}
	if(empty($errors))
	{
		$fname = mysql_prep($_POST['fname']);
		$lname = mysql_prep($_POST['lname']);
		$username = mysql_prep($_POST['username']);
		$email = mysql_prep($_POST['email']);
		$password = mysql_prep(sha1($_POST['password']));
		$query = "INSERT into users(fname, lname, username, email, password) 
		VALUES('$fname', '$lname', '$username', '$email' , '$password' )";
		$result_set = mysql_query($query);
		if($result_set)
		{
			$message = "Thank you! You can now login.";
		}
		else
		{
			$message = "Failure to register".mysql_error();
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
	<title>Registration Form</title>	
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
				<li><a href="comment.php">Feedback</a></li>
			</ul>	
		</div>		
		<div id="right">
		<?php 
		
		?>
		<h3>Register</h3>
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
		<table width="40%">
		<form action="register.php" method="post">
		<tr><td>First Name</td><td><input type="text" name="fname"> <span class="star">*</span></td></tr>
		<tr><td>Last Name</td><td><input type="text" name="lname"> <span class="star">*</span></td></tr>
		<tr><td>Username</td><td><input type="text" name="username"> <span class="star">*</span></td></tr>
		<tr><td>Email</td><td><input type="text" name="email"> <span class="star">*</span></td></tr>
		<tr><td>Password</td><td><input type="text" name="password"> <span class="star">*</span></td></tr>
		<tr><td>Confirm Password</td><td><input type="text" name="cpassword"> <span class="star">*</span></td></tr>
		<tr><td>Enter the code: <b><?php echo $ResultStr; ?></b></td><td><input type="text" name="captcha"> <span class="star">*</span></td></tr>
		<tr><td></td>
		<td><input type="submit" name="submit" value="Submit">&nbsp;&nbsp;<input type="reset" name="reset" value="Reset"></td></tr>
		</form>
		</table>
		<p><span class="star">*</span> Indicates required field</p>
		</div>
	
		<div id="footer">
			<ul id="rss">
				<p id="footer_right"></p>
			</ul>
			<p>Created by  <a href="" title="">Geotech</a> &middot; 
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