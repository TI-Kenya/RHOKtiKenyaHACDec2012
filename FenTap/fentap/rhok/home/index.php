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
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    
    <link href="http://localhost/rhok/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="http://localhost/rhok/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">


<script src="../jquery/jquery-1.4.4.min.js" type="text/javascript"></script>


<style type="text/css">

#status
{
font-size:11px;
margin-left:10px;
}
.green
{
background-color:#CEFFCE;
}
.red
{
background-color:#FFD9D9;

}
input.red{
border-color: #FFD9D9;	
}

input
{
font-size:16px;
width:190px;
height:25px;

padding:4px;
}

</style>

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
<li class="active"><a href="/rhok/home/" target="_top" data-name="about-page" title="Home Page"><span>Home <br>Home</span></a></li>   
<li class=""><a href="#" target="_top" data-name="how-page" title="About Us"><span>About Us</span></a></li>    
<li class=""><a href="/rhok/admin/post_tender.php/" target="_top" data-name="plans-residential-page" title="All Tenders "><span>Post Tenders</span></a></li> 
<li class=""><a href="/rhok/wall/" target="_top" data-name="cities-page" title="Forum"><span>Notices</span></a></li>   
<li class=""><a href="#" target="_top" data-name="help-page" title="Help"><span>Help</span></a></li>
<li class=""><a href="/rhok/register/" target="_top" data-name="register-page" title="Help"><span>Register</span></a></li>


</ul>
</nav>
<div id="join-up-button"><a href="/rhok/apply/apply.php" target="_top"> </a></div> 
&nbsp; &nbsp; &nbsp;<font color=#184dc5 size=4.9px>
<li class="active"></span>
  &nbsp;&nbsp;<a href="/rhok/wall/" target="_top" data-name="help-page" title=<?php echo $name;  ?>""><span><?php echo $username;  ?></a></li>   
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
	  Home Page &nbsp;&nbsp;&nbsp;&nbsp;
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
  

 <legend>
  </legend> &nbsp;  &nbsp;  &nbsp;  &nbsp;
	<img src="homepage.png">
 <div class="invite-countdown">
 <a class="twitter-timeline"  href="https://twitter.com/fentap" data-widget-id="275090212210737152">Tweets by @fentap</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div> &nbsp;  &nbsp;  &nbsp;  &nbsp;

  <br><br>
	We are on Twitter, Please report a complain by using the hashtag <font size=5px color=#184dc5> #fentap </font> and we will 
  respond as soon as we can.<br><br>
  <a href="https://twitter.com/intent/tweet?button_hashtag=fentap&text=Report%20corruption" class="twitter-hashtag-button" data-size="large" data-related="fentap,fentap" data-url="www.twitter.com/fentap">Tweet #fentap</a>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
   <br><br>
  Also, Follows us on Twitter for more about what we do in allowing transparency.<br><br>
  <a href="https://twitter.com/fentap" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @fentap</a>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


  <br><br><br><br>
  <hr>
  <br><br>
   <footer>
	 <div class="container">
   <p>&copy;  Fen Tap Corruption</p>
   </div>
   </footer>



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/js/bootstrap-transition.js"></script>
    <script src="../bootstrap/js/js/bootstrap-alert.js"></script>
    <script src="../bootstrap/js/bootstrap-modal.js"></script>
    <script src="../bootstrap/js/bootstrap-dropdown.js"></script>
    <script src="../bootstrap/js/bootstrap-scrollspy.js"></script>
    <script src="../bootstrap/js/bootstrap-tab.js"></script>
    <script src="../bootstrap/js/bootstrap-tooltip.js"></script>
    <script src="../bootstrap/js/bootstrap-popover.js"></script>
	<script type="text/javascript" src="../bootstrap/js/jquery.validate.js"></script>
   
    

     <script type="text/javascript">
   // $("#register").click(function(){
     // $(".loading").show();
   // }
    </script>

<script type="text/javascript">
//$('button:submit').click(function(){
	//$('fieldset').text("Submitting your details").addClass('submit');
	//$("#register").html('<img src="loading.gif" align="absmiddle">&nbsp;Submitting your details...');
	
//});
</script>

	 



  </body>
</html>