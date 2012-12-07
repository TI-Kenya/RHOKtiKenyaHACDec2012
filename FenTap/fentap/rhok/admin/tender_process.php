<?php
  //error_reporting(0);
  include('../login/auth.php');
  //session_start();
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

   <link rel="stylesheet" href="http://localhost/rhok/css/portal.css?v=0af4b5c44f423cb9bd1432392385dd5d" />
<link rel="stylesheet" href="http://localhost/rhok/css/top.css" />

 <link href="http://localhost/rhok/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="http://localhost/rhok/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
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
<li class=""><a href="http://localhost/rhok/home/" target="_top" data-name="about-page" title="Home Page"><span>Home <br>Home</span></a></li>   
<li class=""><a href="#" target="_top" data-name="how-page" title="About Us"><span>About Us</span></a></li>    
<li class="active"><a href="http://localhost/rhok/admin/post_tender.php/" target="_top" data-name="plans-residential-page" title="All Tenders "><span>Post Tenders</span></a></li> 
<li class=""><a href="http://localhost/rhok/wall/" target="_top" data-name="cities-page" title="Forum"><span>Notices</span></a></li>   
<li class=""><a href="#" target="_top" data-name="help-page" title="Help"><span>Help</span></a></li>
<li class=""><a href="/rhok/register/" target="_top" data-name="register-page" title="Help"><span>Register</span></a></li>


</ul>
</nav>
<div id="join-up-button"><a href="/rhok/apply/apply.php" target="_top"> </a></div> 
&nbsp; &nbsp; &nbsp;<font color=#184dc5 size=4.9px>
<li class="active"></span>
  &nbsp;&nbsp;<a href="/rhok/wall/" target="_top" data-name="help-page" title=<?php   ?>""><span><?php   ?></a></li>   
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
   Submit Tender &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="http://localhost/rhok/apply/apply.php">Tender Application</a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="http://localhost/rhok/apps/applications.php">My Applications</a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="http://localhost/rhok/wall/index.php">Notice Board</a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="#">Laws</a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="http://localhost/rhok/export/index.php">Export to Excel</a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="http://localhost/rhok/logout/logout.php">Logout</a>
  </div>  

  <div class="container">
  <div class="row"> 
  <div class="span8">
  
  <legend>
  
  </legend>

<?php

include('config.php');



// values sent from form application form
$tender_name=$_POST['tender_name'];
$description=$_POST['description'];
$amount_app=$_POST['amount_app'];
$contact_person=$_POST['contact_person'];
$phone_number=$_POST['phone_number'];
$name;
$email;
$deadline=$_POST['deadline'];
$refnos = substr(number_format(time() * rand(),0,'',''),0,7);
$refno= 'REF :'. $refnos;
$tenders=$_POST['tenders'];
$category=$_POST['category'];



// Insert data into database
$sql="INSERT INTO tenders_app (tender_name,app_date, description, amount_app, contact_person, phone_number, name, email,deadline,tenders,category,refno)
VALUES('$tender_name', '".strtotime(date("Y-m-d H:i:s"))."', '$description', '$amount_app', '$contact_person', '$phone_number', '$name', '$email', '$deadline', '$tenders', '$category','$refno')";
$result=mysql_query($sql);

echo "The Tender has been posted online.";

?>

<a href ="applications.php"> View Tenders</a>
  <footer>
	 <div class="container">
        <p>&copy;  Fen Tap Corruption</p>
</div>
      </footer>

  </body>
</html>