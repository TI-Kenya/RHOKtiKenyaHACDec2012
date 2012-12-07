<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Log Out</title>
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
  &nbsp;&nbsp;<a href="/rhok/wall/" target="_top" data-name="help-page" title=<?php  ?>""><span><?php   ?></a></li>   
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

  <div class="container">
  <div class="row"> 
  <div class="span8">
  
  <legend>
  
  </legend>	  
	
<?php

	session_start();
   session_destroy();

?>

  <div class="container">
	
  <div class="row">



   <div class="span8">
	<div class="alert alert-success">
	Logged Out
	</div>
	<legend></legend>
  
 <?php

  echo "You have been successfully logged out. <br><br>";
?>

  <form class="form-horizontal" id="login" method='post' action='../login/login_process.php'>
	  <fieldset>
	    <legend>Log In</legend>

	    <div class="control-group">
	      <label class="control-label" for="input01">User Name</label>
	      <div class="controls">
	        <input type="text" class="input-xlarge" id="username" name="username" >
	        
	      </div>
	</div>



	<div class="control-group">
	      <label class="control-label" for="input01">Password</label>
	      <div class="controls">
	        <input type="password" class="input-xlarge" id="password" name="password" >
	        
	      </div>
	</div>


	
	<div class="control-group">
		<label class="control-label" for="input01"></label>
	      <div class="controls">
	       <button type="submit" class="btn btn-success" id="register" rel="tooltip" title="Login" >Login</button>
	      
	      </div>
	
	</div>
	
	
	  </fieldset>
	</form>
</div>
</div>
        
        
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
	 <div class="container">
        <p>&copy; Fen Tap Corruption
        </p>
</div>
      </footer>

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

	  <script type="text/javascript">
	  $(document).ready(function(){
			$('#login input').hover(function()
			{
			$(this).popover('show')
		});
			$("#login").validate({
				rules:{
					
					username:"required",
					password:"required"
				},
				messages:{

					username:"Enter your username",
					password:"Enter your password"

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

  </body>
</html>
