
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
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
<li class=""><a href="http://localhost/rhok/admin/post_tender.php" target="_top" data-name="plans-residential-page" title="Post Tenders "><span>All Tenders</span></a></li> 
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
error_reporting(0);
include('config.php');

// Passkey that got from link
$passkey=$_GET['passkey'];

$tbl_name1="temp_members_db";

// Retrieve data from table where row that match this passkey
$sql1="SELECT * FROM $tbl_name1 WHERE confirm_code ='$passkey'";
$result1=mysql_query($sql1);

// If successfully queried
if($result1){

// Count how many row has this passkey
$count=mysql_num_rows($result1);

// if found this passkey in our database, retrieve data from table "temp_members_db"
if($count==1){
//echo"Found Key";
$rows=mysql_fetch_array($result1);
$username=$rows['username'];
$name=$rows['name'];
$email=$rows['email'];
$password=$rows['password'];
//$gender=$rows['gender'];

$tbl_name2="registered_members";

// Insert data that retrieves from "temp_members_db" into table "registered_members"
$sql2="INSERT INTO $tbl_name2(username, name, email, password)VALUES('$username', '$name', '$email', '$password')" or die(mysql_error());
$result2=mysql_query($sql2);
}

//key used
else if ($count!=1) {
	echo"Oops. We are sorry for this. <br />";
	echo "The Confirmation Code \r\n $passkey has already been used.";
}
// if not found passkey, display message "Wrong Confirmation code"
else {
echo "Wrong Confirmation code Or that Confirmation Code has already been used.";
}

//if successfully move data from table"temp_members_db" to table "registered_members" 
//then elete confirmation code from table "temp_members_db"
if($result2){

echo"Hi \n".$name."<br />";
echo "Welcome to Fen Tap Corruption.<br />"; 
echo "Your account has been activated <br />";


// Delete information of this user from table "temp_members_db" that has this passkey.
$sql3="DELETE FROM $tbl_name1 WHERE confirm_code = '$passkey'";
$result3=mysql_query($sql3);

}

}
?>

<!DOCTYPE html>
<head>
<title>Confirm your Phone Number</title>
</head>
<body>

      <form class="form-horizontal" id="confirmNamba" method='post' action='phpclient.php'>
      <fieldset>
      <legend>Phone Number Confirmation</legend>
      <font color = #184dc5>We would like to send a confirmation code to your phone so that you can confirm it.</font><br><br>
      <font color = #184dc5>You can however skip this process.</font><br><br>
      
      
      <div class="control-group">
      <label class="control-label" for="input01">Email</label>
      <div class="controls">
      <input type="text" class="input-xlarge" id="email" name="email" >         
      </div>
      </div>
  

      <div class="control-group">
      <label class="control-label" for="input01">Phone Number</label>
      <div class="controls">
      <input type="text" class="input-xlarge" id="recipient" name="recipient" >         
      </div>
      </div>



  
    <div class = "control-group">
    <label class="control-label" for="input01"></label>
    <div class="controls">
    <button type="submit" class="btn btn-success" id="register" rel="tooltip" title="Register" >Send Confirmation Code.</button>
    </div>
    </div>

    <div class="control-group">
    <label class="control-label" for="input01"></label>
    <div class="controls">
    <a href="http://localhost/rhok/home">Skip This Process</a>      
    </div>  
    </div>


    </fieldset>
    </form>
    </div>
  
    </div>
        
        
      </div><!--/row-->
      </div><!--/span-->
      </div><!--/row-->
      

    </div><!--/.fluid-container-->

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
    $(document).ready(function(){
      $('#confirmNamba input').hover(function()
      {
      $(this).popover('show')
    });
      $("#confirmNamba").validate({
        rules:{         
          recipient:{
            required:true,
            number:true,
            digits:true
          },  
          email:{
            required:true,
            email:true
          },    
        },

        messages:{
          recipient: {
          required:"Please enter your Phone Number",
          number:"Only digits are allowed",
          digits:"Only digits are allowed"
        },
          email:{
            required:"Enter your email address",
            email:"Enter valid email address"
          },
        },
        errorClass: "help-inline",
        errorElement: "span",
        highlight:function(element, errorClass, validClass) {
          $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).parents('.control-group').removeClass('error');
          $(element).parents('.control-group').addClass('success');


        }

      });

    });
    </script>


<br><br><br><br><br><br><br><br>
<br><br><br><br> <br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>



<legend></legend>
<footer>
<div class="container">
<p>&copy;  Fen Tap Corruption</p>
</div>
</footer>

</body>
</html>
