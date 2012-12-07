<!DOCTYPE html>
<head>
<title>Validate the Code</title>
</head>

    <link href="http://localhost/rhok/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="http://localhost/rhok/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
 <link rel="stylesheet" href="http://localhost/rhok/css/portal.css?v=0af4b5c44f423cb9bd1432392385dd5d" />
<link rel="stylesheet" href="http://localhost/rhok/css/top.css" />
</head>

<body class="body cities fiber">

<div id="container" class="container">
<header>

<h1 class="logo">
<a href="/rhok/home" target="_top"><img src="../img/logodcn.png" alt="Fen Tap" /><span>FenTap Corruption</span></a>
</h1>
<div id="square">
</div>
<div id="square1">
</div>
<div id="square2">
</div>
<div id="square3">
</div>

<div id="main-nav-container">

<nav id="main-nav" class="">
<ul>    
<li class=""><a href="/rhok/home/" target="_top" data-name="about-page" title="Home Page"><span>Home <br>Home</span></a></li>   
<li class=""><a href="#" target="_top" data-name="how-page" title="About Us"><span>About Us</span></a></li>    
<li class=""><a href="http://localhost/rhok/admin/post_tender.php" target="_top" data-name="plans-residential-page" title="All Tenders "><span>Post Tenders</span></a></li> 
<li class=""><a href="/rhok/wall/" target="_top" data-name="cities-page" title="Forum"><span>Notices</span></a></li>   
<li class=""><a href="#" target="_top" data-name="help-page" title="Help"><span>Help</span></a></li>
<li class="active"><a href="/rhok/register/" target="_top" data-name="register-page" title="Help"><span>Register</span></a></li>


</ul>
</nav>
<div id="join-up-button"><a href="/rhok/apply/apply.php" target="_top"> </a></div> 
&nbsp; &nbsp; &nbsp;<font color=#184dc5 size=4.9px>
<li class="active"></span>
  &nbsp;&nbsp;<a href="/rhok/wall/index.php" target="_top" data-name="help-page" title=<?php   ?><span><?php //echo $username;  ?></a></li>   
</font>

<nav id="main-nav-right-nav">
<ul>
<li class=""><a href="/rhok/wall/" target="_top" data-name="help-page" title="Help"><span></span></a></li>
</ul>
</nav>
</div>

</header>

  <br><br><br><br>
  <div class="alert alert-success">
    
  </div>
  

 <legend>
  </legend>

</body>
</html>

<?php

include('config.php');

$confirm_code=md5(uniqid(rand()));

// values sent from form
$name=$_POST['user_name'];
$username=$_POST['username'];
$email=$_POST['user_email'];
//$gender=$_POST['gender'];
$password=$_POST['pwd'];

// Insert data into database
$sql="INSERT INTO temp_members_db (confirm_code, name, username, email, password)VALUES('$confirm_code', '$name', '$username', '$email', '$password')";
$result=mysql_query($sql);

// if suceesfully inserted data into database, send confirmation link to email
if($result){

// ---------------- SEND MAIL FORM ----------------

require("../mailer/class.phpmailer.php");
$mail = new PHPMailer();

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "smtp.gmail.com"; // SMTP server
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "jmutie09@gmail.com";  // GMAIL username
$mail->Password   = "jacintamueni"; 

$webmaster_email = "jmutie09@gmail.com"; //Reply to this email ID
$to=$email; // Recipients email ID
$recepname=$name; // Recipient's name
$mail->From = $webmaster_email;
$mail->FromName = "Fen Tap Corruption.";
$mail->AddAddress($to,$recepname);
$mail->AddReplyTo($webmaster_email,"FenTap");
$mail->WordWrap = 50; // set word wrap

//$mail->AddAttachment("/tmp/image.jpg", "new.jpg"); // attachment
$mail->IsHTML(true); // send as HTML
$mail->Subject = "Confirm your email";
$mail->Body = "Your Confirmation link \r\n <br />
Hi $name please activate your account at Fen Tap Corruption. <br /> <br />
Here are your profile details: <br /> 
Name : ".$name. " <br />
Username : ".$username. " <br />
Email : ".$email. " <br />
Password : ".$password. " <br /> <br />

Click on this link to activate your account \r\n: <br />
http://localhost/rhok/register/confirmation.php?passkey=$confirm_code \r\n <br /><br />
Fen Tap Corruption <br />
 +254 XXX XXX<br />
 fentap@gmail.com<br />"; //HTML Body
//$mail->AltBody = "This is the body when user views in plain text format"; //Text Body
if(!$mail->Send())
{
echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
echo "Confirmation Link has been sent to $email .Please check your email";
}



}


// if email not found in the database
else {
echo "Oops. We did not find your email in our database";
}


?>
