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
      <form class="form-horizontal" id="confirmKode" method='post' action='confirm_phone.php'>
      <fieldset>
      <legend>Phone Number Validation

      </legend>

      <div class="control-group">
      <label class="control-label" for="input01">Code</label>
      <div class="controls">
      <input type="text" class="input-xlarge" id="conf_code" name="conf_code" >
          
     </div>
     </div>
  
  
    <div class = "control-group">
    <label class="control-label" for="input01"></label>
    <div class="controls">
    <button type="submit" class="btn btn-success" id="register" rel="tooltip" title="Register" >Validate</button>
    </div>
    </div>

   
    </fieldset>
    </form>

        <?php
		include("sendsms.php");
		include('config.php');
		if(isset($_REQUEST['recipient']))
		{
			$recipient =$_REQUEST['recipient'];
			$code = substr(number_format(time() * rand(),0,'',''),0,5);
			$Msg = ' Confirmation Code: ' .$code;
			
         $email=$_POST['email'];
        // $sql="INSERT INTO final_members (email,phonenumber,code)VALUES('$email','$recipient','$code')";
         //$result=mysql_query($sql);
         SendSms($recipient, $Msg, true);
         mysql_query("UPDATE registered_members SET code=$code, phonenumber=$recipient
         WHERE email='$email'");

		}
		?>

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
      $('#confirmKode input').hover(function()
      {
      $(this).popover('show')
    });
      $("#confirmKode").validate({
        rules:{         
          conf_code:{
            required:true,
            number:true,
            digits:true
          },    
        },

        messages:{
          conf_code:{
						required:"Please enter the Code that we send to your Phone",
						digits:"Only digits are allowed"
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

<br><br><br>
<hr>
<br><br><br>

<legend></legend>
<footer>
<div class="container">
<p>&copy;  Fen Tap Corruption</p>
</div>
</footer>

</body>
</html>








