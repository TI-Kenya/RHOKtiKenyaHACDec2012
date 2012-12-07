
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


<script src="../../jquery/jquery-1.4.4.min.js" type="text/javascript"></script>
<SCRIPT type="text/javascript">
$(document).ready(function()
{
$("#username").change(function() 
{ 

var username = $("#username").val();
var msgbox = $("#status");


if(username.length > 3)
{
$("#status").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');

$.ajax({  
    type: "POST",  
    url: "check_ajax.php",  
    data: "username="+ username,  
    success: function(msg){  
   
   $("#status").ajaxComplete(function(event, request){ 

	if(msg !='OK')
	{ 
	 $("#username").removeClass("green");
		 $("#username").addClass("red");
		msgbox.html(msg);
		//$('button[type=submit]', this).attr('disabled', 'disabled');
		$('#register').attr('disabled', 'disabled');
		//$('#register').hide();

	    
	}  
	else  
	{  
	 $("#username").removeClass("red");
	    $("#username").addClass("green");
        msgbox.html('<img src="yes.png" align="absmiddle"> <font color="Green"> Available </font>  ');
        //$('#register').show();  
        $('#register').removeAttr('disabled'); 
	}  
   
   });
   } 
   
  }); 

}
else
{
 $("#username").addClass("red");
$("#status").html('<font color="#cc0000">Enter valid User Name</font>');
}



return false;
});

});
</SCRIPT>

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
<li class=""><a href="/rhok/home/" target="_top" data-name="about-page" title="Home Page"><span>Home <br>Home</span></a></li>   
<li class=""><a href="#" target="_top" data-name="how-page" title="About Us"><span>About Us</span></a></li>    
<li class=""><a href="http://localhost/rhok/admin/post_tender.php" target="_top" data-name="plans-residential-page" title="All Tenders "><span>Post Tenders</span></a></li> 
<li class=""><a href="/rhok/wall/" target="_top" data-name="cities-page" title="Forum"><span>Notices</span></a></li>   
<li class=""><a href="http://localhost/rhok/login/index.php" target="_top" data-name="help-page" title="Help"><span>login</span></a></li>
<li class="active"><a href="/rhok/register/" target="_top" data-name="register-page" title="Help"><span>Register</span></a></li>


</ul>
</nav>
<div id="join-up-button"><a href="/rhok/apply/apply.php" target="_top"> </a></div> 
&nbsp; &nbsp; &nbsp;<font color=#184dc5 size=4.9px>
<li class="active"></span>
  &nbsp;&nbsp;<a href="/rhok/wall/" target="_top" data-name="help-page" title=<?php   ?><span><?php   ?></a></li>   
</font>

<nav id="main-nav-right-nav">
<ul>
<li class=""><a href="/rhok/wall/" target="_top" data-name="help-page" title="Help"><span></span></a></li>
</ul>
</nav>
</div>

</header>

	<br><br><br><br>

  

 <legend>
  </legend> 	  

  <div class="container">
	
  <div class="row">
	
	
  <div class="span8">
	<div class="alert alert-success">
	  Register to this site.
	</div>

	<form class="form-horizontal" id="registerHere" method='post' action='signup-ac.php'>
	  <fieldset>
	    <legend>Registration</legend>
	    <div class="control-group">
	      <label class="control-label" for="input01">Name</label>
	      <div class="controls">
	        <input type="text" class="input-xlarge" id="user_name" name="user_name" >
	        
	      </div>
	</div>

	<div class="control-group">
		<label class="control-label" for="input01">Username</label>
	      <div class="controls">
	        <input type="text" class="input-xlarge" name="username" id="username" ><span id="status"></span>
	       
	      </div>
	</div>
	
	 <div class="control-group">
		<label class="control-label" for="input01">Email</label>
	      <div class="controls">
	        <input type="text" class="input-xlarge" id="user_email" name="user_email" >
	       
	      </div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="input01">Password</label>
	      <div class="controls">
	        <input type="password" class="input-xlarge" id="pwd" name="pwd" >
	       
	      </div>
	</div>
	<div class="control-group">
		<label class="control-label" for="input01">Confirm Password</label>
	      <div class="controls">
	        <input type="password" class="input-xlarge" id="cpwd" name="cpwd"   >
	       
	      </div>
	</div>
	

            <div class="control-group">
			<label class="control-label" for="input01">Membership Type</label>
	      	<div class="controls">
	        <select name="mtype" id="mtype" >
            <option value="">Membership Type</option>
			<option value="male">Ministry</option>
			<option value="female">Local Council</option>
			<option value="other">Company</option>		               
			</select>	       
	      	</div>	
			</div>



	
	 		<div class="control-group">
			<label class="control-label" for="input01">Gender</label>
	      	<div class="controls">
	        <select name="gender" id="gender" >
            <option value="">Gender</option>
			<option value="male">Male</option>
			<option value="female">Female</option>
			<option value="other">Other</option>		               
			</select>	       
	      	</div>	
			</div>
	
	
	<div class="control-group">
		<label class="control-label" for="input01"></label>
	      <div class="controls">
	       <button type="submit" class="btn btn-success" id="register" rel="tooltip" title="Register" >Create My Account</button>
	      
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
        <p>&copy; Fen Tap Corruption</p>
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
			$('#registerHere input').hover(function()
			{
			$(this).popover('show')
		});
			$("#registerHere").validate({
				rules:{
					
					user_name:"required",
					user_email:{
							required:true,
							email: true
						},
					username:{
						required:true,
						minlength: 6
					},
					pwd:{
						required:true,
						minlength: 6
					},
					cpwd:{
						required:true,
						equalTo: "#pwd"
					},
					mtype:"required",
					gender:"required"
				},

				messages:{

					user_name:"Enter your first and last name",
					user_email:{
						required:"Enter your email address",
						email:"Enter valid email address"
					},
					pwd:{
						required:"Enter your password",
						minlength:"Password must be minimum 6 characters"
					},
					username:{
						required:"Enter your username",
						minlength:"Username must be minimum 6 characters"
					},
					cpwd:{
						required:"Enter confirm password",
						equalTo:"Password and Confirm Password must match"
					},
					gender:"Select Gender",
					mtype:"Please select Membership type"
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