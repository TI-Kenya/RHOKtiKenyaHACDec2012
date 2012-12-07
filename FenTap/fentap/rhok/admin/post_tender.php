<?php
  error_reporting(0);
  include('../login/auth.php');
  session_start();
  $username=$_SESSION['SESS_USERNAME'];
  
  $link = mysql_connect('localhost', 'root', ''); 
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
    <title>Application</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    
    <link href="http://localhost/rhok/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="http://localhost/rhok/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">


<script src="../jquery/jquery-1.4.4.min.js" type="text/javascript"></script>
<script src="jquery.jCombo.min.js" type="text/javascript"></script>


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



<script type="text/javascript">
var tenders = new Array("Industrial", "Consultancy","Infrastructure","Transportation","Environment");
var category = new Array();
category["Industrial"] = new Array("Automobiles", "Cement", "Chemicals", "Fertilizers","Leather","Machinery","Minerals","Mining","Plastic","Rubber","Textiles","Fire Safety","Security","Printing");
category["Consultancy"] = new Array("Education", "Engineering", "Health","Human Resource","Tourism","Law");
category["Infrastructure"] = new Array("Roads", "Bridges", "Tunnels", "Airports","Building");
category["Transportation"] = new Array("Airports", "Ports and Shipping", "Railways","Roads");
category["Environment"] = new Array("Water and Sanitation", "Cleaning", "Garbage Collection");

function resetForm(theForm) {
  /* reset makes */
  theForm.tenders.options[0] = new Option("Please select a tender type", "");
  for (var i=0; i<tenders.length; i++) {
    theForm.tenders.options[i+1] = new Option(tenders[i], tenders[i]);
  }
  theForm.tenders.options[0].selected = true;
  /* reset models */
  theForm.category.options[0] = new Option("Please select a category", "");
  theForm.category.options[0].selected = true;
}

function updateModels(theForm) {
  var make = theForm.tenders.options[theForm.tenders.options.selectedIndex].value;
  var newModels = category[make];
  theForm.category.options.length = 0;
  theForm.category.options[0] = new Option("Please select a category", "");
  for (var i=0; i<newModels.length; i++) {
    theForm.category.options[i+1] = new Option(newModels[i], newModels[i]);
  }
  theForm.category.options[0].selected = true;
}

</script>

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
	 Submit Tender &nbsp;&nbsp;&nbsp;&nbsp;
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

  <div class="container">
  <div class="row">	
  <div class="span8">
	
	<legend>
  
	</legend>

	<form class="form-horizontal" name="autoSelectForm" id="apply" method='post' action='http://localhost/rhok/admin/tender_process.php'>
	  <fieldset>
	    <legend>Submit a Tender.</legend>


	    <div class="control-group">
	      <label class="control-label" for="input01">Poster's Name</label>
	      <div class="controls">
	        <input type="text" class="input-xlarge" id="name" name="name" value="<?php echo $name ?>"  disabled>        
	      </div>
	     </div>

	     <div class="control-group">
	      <label class="control-label" for="input01">Email Address</label>
	      <div class="controls">
	        <input type="text" class="input-xlarge" id="email" name="email" value="<?php echo $email ?>" disabled>        
	      </div>
	     </div>

	     <div class="control-group">
	      <label class="control-label" for="input01">Tender Name</label>
	      <div class="controls">
	        <input type="text" class="input-xlarge" id="tender_name" name="tender_name" >        
	      </div>
	     </div>

	<div class="control-group">
	<label class="control-label" for="input01">Tender Type</label>
	<div class="controls">
	<select size="1" name="tenders" onchange="updateModels(this.form)">
    </select>
    <select size="1" name="category">
    </select>
	</div>
	</div>



	     <div class="control-group">
	      <label class="control-label" for="input01">Reference Number</label>
	      <div class="controls"> <?php $refno = substr(number_format(time() * rand(),0,'',''),0,7);?>
	        <input type="text" class="input-xlarge" id="refno" name="refno" value="<?php echo 'REF: '.$refno ?>"  disabled>        
	      </div>
	     </div>

	     <div class="control-group">
	      <label class="control-label" for="input01">Deadline</label>
	      <div class="controls">
	        <input type="date" class="input-xlarge" id="deadline" name="deadline" >        
	      </div>
	     </div>


	

	<div class="control-group">
		<label class="control-label" for="input01">Description</label>
	      <div class="controls">
	        <textarea rows="4" name="description" id="description"></textarea>
	       
	      </div>
	</div>



	 <div class="control-group">
		<label class="control-label" for="input01">Cost of Tender</label>
	      <div class="controls"><span class="add-on">SSLeone.</span>
	        <input  type="text" placeholder="e.g 500,000" class="span2" id="amount_app" size="20" name="amount_app" >	       
	 </div>
	</div>
	
	<div class="control-group">
		<label class="control-label" for="input01">Contact Person</label>
	      <div class="controls">
	        <input type="text" class="input-xlarge" id="contact_person" name="contact_person" >
	       
	      </div>
	</div>

     <div class="control-group">
		<label class="control-label" for="input01">Phone Number</label>
	      <div class="controls">
	        <input type="text" placeholder="07__ __   __ __ __    __ __ __" class="input-xlarge" id="phone_number" name="phone_number" >
	       
	      </div>
	</div>
			               
			            
	
	<div class="control-group">
		<label class="control-label" for="input01"></label>
	      <div class="controls">
	       <button type="submit" class="btn btn-success" id="register" rel="tooltip" title="Submit" >Submit Proposal</button>
	      
	      </div>
	
	</div>
	
	
	  </fieldset>
	</form>
<script type="text/javascript">
  resetForm(document.autoSelectForm);
</script>

	</div>
	
		</div>
        
        
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
	 <div class="container">
        <p>&copy;  E- Tenders Approvers</p>
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
			$('#apply input').hover(function()
			{
			$(this).popover('show')
		});
			$("#apply").validate({
				rules:{
					
					tender_name:"required",
                    tenders:"required",
                    category:"required",
                    deadline:"required",
					description:"required",			
					amount_app:"required",
					contact_person:"required",
					phone_number:"required"
				},
				messages:{

					tender_name:"Enter the title of the tender name",
					tenders:"The Tender type is required",
					category:"The Tender category is required",
					category:"The Tender deadline is required",
					description:"Enter the description of the tender",
					amount_app:"Enter the cost of the tender",
					contact:"Enter the name of the person to be contacted",
					phone_number:"Enter the phone_number"
				},
				errorClass: "help-inline",
				errorElement: "span",
				highlight:function(element, errorClass, validClass) {
					$(element).parents('.control-group').addClass('error');
					$(element).parents('.input-prepend').addClass('error');
					
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).parents('.control-group').removeClass('error');
					$(element).parents('.control-group').addClass('success');
					$(element).parents('.input-prepend').removeClass('error');
					$(element).parents('.input-prepend').addClass('success');


				}

			});

		});
	  </script>



  </body>
</html>