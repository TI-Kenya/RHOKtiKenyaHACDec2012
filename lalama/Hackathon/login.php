<?php 
include('includes/session.php');
include('includes/functions.php');
include('includes/connect.php');
if(logged_in()== TRUE)
	{
		redirect_to("admin.php");
	}
if(isset($_POST['email']) && isset($_POST['password']))
{
	if(isValidEmail($_POST['email']))
	{
		$email = $_POST['email'];
		$password = sha1($_POST['password']);
		$query = "SELECT username,id FROM users WHERE email = '{$email}' AND password = '{$password}' ";
		$result_set = mysql_query($query);
		if(mysql_num_rows($result_set) == 1)
		{
			 $result = mysql_fetch_array($result_set);
			 $_SESSION['username'] = $result['username']; 
			 $_SESSION['id'] = $result['id'];
			 header('Location: admin.php');
			 exit;
		}
		else
		{
		  $message = "Incorrect username and password combination";
		}
	}
	else
	{
		$message = "Invalid email address";
	}
	
}
else
{
	if(isset($_GET['logout']) && $_GET['logout'] == 1)
	 {$message = "You are now logged out.";}
	 $username = "";
	 $password = "";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Login</title>	
	<meta name="Robots" content="index,follow" />
	<meta name="Generator" content="ESRI" />
	<link rel="stylesheet" type="text/css" href="css/main.css" media="screen" />
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
		</div>
		
		<div id="left">
			<h3>Menu:</h3>
			<ul>
				
			</ul>
			
			
		</div>
				
		<div id="right">
		<h3>Administrator Login</h3>
		<form action="login.php" method="post">
		<?php 
		if(isset($message))
		{ 
			echo $message;
			
		}
		?>
			<p>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input name="email" type="text" id="email" maxlength="30" value="<?php if(isset($_POST['email'])) {echo $_POST['email'];} ?>">
			<span class="star">*</span></p>
			<p>Password &nbsp;&nbsp;&nbsp;<input name="password" type="password" id="password" maxlength="30"><span class="star">*</span></p>
			<p><input type="submit" name="submit" value="Login" class="button"></p>
		</form>
		<p><span class="star">*</span> For Admin Demo Login with: </p>
		<p>Email : accadiusben@gmail.com</p>
		<p>Password: paul</p>
		</div>
	
		<div id="footer">
			<ul id="rss">
				<p id="footer_right"></p>
			</ul>
			<p>Created by  <a href="https://twitter.com/Accadius" title="">@Accadius</a> <a href="admin.php">Login</a></p>
			<p></p>
		</div>
	</div>
</body>
</html>
