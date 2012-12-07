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
    <title>My Applications</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="http://localhost/rhok/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="http://localhost/rhok/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/rhok/css/portal.css?v=0af4b5c44f423cb9bd1432392385dd5d" />
<link rel="stylesheet" href="http://localhost/rhok/css/top.css" />
</head>
 
 <body class="body cities fiber">

<div id="container" class="container">
<header>

<h1 class="logo">
<a href="/rhok/home" target="_top"><img src="../../img/logodcn.png" alt="Fen Tap" /><span>FenTap Corruption</span></a>
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
<li class="active"><a href="/rhok/apps/applications.php/" target="_top" data-name="plans-residential-page" title="All Tenders "><span>All Tenders</span></a></li> 
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
    <a href="http://localhost/rhok/laws/index.php">Laws</a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="http://localhost/rhok/export/index.php">Export to Excel</a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a href="http://localhost/rhok/logout/logout.php">Logout</a>
  </div>  
  
  <br><br>
  
<?php

$con = mysql_connect("localhost","josemutie","jessie**2012");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("mutie", $con);

$result = mysql_query("SELECT * FROM tenders_app WHERE email='$email' ");

?>


    <table class="table table-condensed table-hover table-bordered table-striped">
    <caption>All Tenders</caption>
    <thead>
    <tr>
    <th>Ref No</th>
    <th>Tender Name</th>
    <th>Type</th>
    <th>Category</th>
    <th>Opening Date</th>
    <th>Deadline</th>
    <th>Tender Cost</th>
    <th>Description</th>
    <th>Submitter</th>
    <th>Contact Details</th>
    </tr>
    </thead>


    <tbody>
      <?php
  while($row = mysql_fetch_array($result))
  {
    


  echo "<tr>";
  echo "<td>" . $row['refno'] . "</td>";
  echo "<td>" . $row['tender_name'] . "</td>";
  echo "<td>" . $row['tenders'] . "</td>";
  echo "<td>" . $row['category'] . "</td>";
  $new_date = date("m-d-Y", $row['app_date']);  
  echo "<td>" . $new_date . "</td>";
  echo "<td>" . $row['deadline'] . "</td>";
  echo "<td>" . $row['amount_app'] . "</td>";
  echo "<td>" . $row['description'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['phone_number'] . "</td>";
  echo "</tr>";
  }

 mysql_close($con);
?>
   
    
    </tbody>
    </table>

<div id="disqus_thread"></div>
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'fentap'; // required: replace example with your forum shortname

            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
        






  <footer>
   <div class="container">
        <p>&copy;  Fen Tap Corruption</p>
</div>
      </footer>

  </body>
</html>
