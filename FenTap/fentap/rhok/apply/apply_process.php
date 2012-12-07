<?php
  error_reporting(0);
  include('../login/auth.php');
  session_start();
  $username=$_SESSION['SESS_USERNAME'];
  
  $link = mysql_connect('localhost', 'josemutie', 'jessie**2012'); 
  if (!$link) {
    die('Could not connect: ' . mysql_error());
  }
//select the database 
mysql_select_db('mutie'); 

  $qry="SELECT * FROM registered_members WHERE username = '$username'";
  $result=mysql_query($qry);
  
  //Check whether the query was successful or not
  if($result) {
    if(mysql_num_rows($result) > 0) {
            
      $member = mysql_fetch_assoc($result);
      $email=$member['email'];
      $name=$member['name'];
      
      
    }else {
      

      exit();
    }
  }else {
    die(mysql_error());
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Application | Submission</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="http://localhost/rhok/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="http://localhost/rhok/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

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

<?php
//echo "<br> Automatic Messages from Google Gmail Servers:<br>";
include('config.php');



// values sent from form application form
$refno=$_POST['refno'];
$description=$_POST['description'];
$phone_number=$_POST['phone_number'];
$name;
$email;



// Insert data into database
$sql="INSERT INTO applications (refno,app_date, description, phone_number, name, email)
VALUES('$refno', '".strtotime(date("Y-m-d H:i:s"))."', '$description','$phone_number', '$name', '$email')";
$result=mysql_query($sql);

// if suceesfully inserted data into database, send confirmation link to email
if($result){

// ---------------- SEND MAIL FORM ----------------

require("../../mailer/class.phpmailer.php");
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
$mail->AddReplyTo($webmaster_email,"Fen Tap Corruption");
$mail->WordWrap = 50; // set word wrap

//$mail->AddAttachment("/tmp/image.jpg", "new.jpg"); // attachment
$mail->IsHTML(true); // send as HTML
$mail->Subject = "Application received";
$mail->Body = "Your tender application has been received \r\n <br />
You will be notified on the staus of your application soon. <br /> <br />
Here are your Submission details: <br /> 
Name : ".$name. " <br />
Phone Number : ".$phone_number. " <br />
Email : ".$email. " <br />
Reference Number: ".$refno. " <br /> <br />
Description : ".$description. " <br /> <br />



Fen Tsp Corruption <br />
+254 XXX XXX<br />
jmutie09@gmail.com<br />"; //HTML Body
//$mail->AltBody = "This is the body when user views in plain text format"; //Text Body
if(!$mail->Send())
{
echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
//echo "End of Automatic Google Gmail Server Messages";
echo "<legend></legend>";
echo "<br><br>Thank you. Application has been received";
echo "<br><br>We will keep in touch with you.";
echo "<br><br>You will be notified about the status of your application soon.";
}



}


// if email not found in the database
else {
echo "Not found your email in our database";
}


?>

<a href ="http://localhost/rhok/apps/applications.php"> View Your Applications</a>
  <footer>
	 <div class="container">
        <p>&copy;  Fen Tap Corruption</p>
</div>
      </footer>

  </body>
</html>