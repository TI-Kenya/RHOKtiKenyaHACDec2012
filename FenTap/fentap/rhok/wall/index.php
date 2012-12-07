<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="keywords" content="">
<meta name="description" content="">
<title>Welcome<?php echo $_SESSION['SESS_FIRST_NAME'];?></title>
<link href="format.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/basic.js'></script>

  <link href="http://localhost/rhok/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="http://localhost/rhok/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">


<script src="../../jquery/jquery-1.4.4.min.js" type="text/javascript"></script>
<script type="text/javascript" src="contact.js"></script>

<script type="text/javascript">
<!--
var timeout         = 500;
var closetimer		= 0;
var ddmenuitem      = 0;

// open hidden layer
function mopen(id)
{	
	// cancel close timer
	mcancelclosetime();

	// close old layer
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';

	// get new layer and show it
	ddmenuitem = document.getElementById(id);
	ddmenuitem.style.visibility = 'visible';
	

}
// close showed layer
function mclose()
{
	if(ddmenuitem) ddmenuitem.style.visibility = 'hidden';
}

// go close timer
function mclosetime()
{
	closetimer = window.setTimeout(mclose, timeout);
}

// cancel close timer
function mcancelclosetime()
{
	if(closetimer)
	{
		window.clearTimeout(closetimer);
		closetimer = null;
	}
}

// close layer when click-out
document.onclick = mclose; 
// -->
</script>
<script type="text/javascript" src="jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="jquery.livequery.js"></script>
<script src="jquery.watermarkinput.js" type="text/javascript"></script>



<style type="text/css">
<!--
a:link {
	color: #0000FF;
	text-decoration: none;
}
a:hover {
	color: #0033FF;
	text-decoration: underline;
}
a:visited {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
-->
</style><link rel="stylesheet" href="http://localhost/rhok/css/portal.css?v=0af4b5c44f423cb9bd1432392385dd5d" />
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
<li class="active"><a href="/rhok/wall/" target="_top" data-name="cities-page" title="Forum"><span>Notices</span></a></li>   
<li class=""><a href="#" target="_top" data-name="help-page" title="Help"><span>Help</span></a></li>
<li class=""><a href="/rhok/register/" target="_top" data-name="register-page" title="Help"><span>Register</span></a></li>


</ul>
</nav>
<div id="join-up-button"><a href="/rhok/apply/apply.php" target="_top"> </a></div> 
&nbsp; &nbsp; &nbsp;<font color=#184dc5 size=4.9px>
<li class="active"></span>
  &nbsp;&nbsp;<a href="/rhok/wall/" target="_top" data-name="help-page" title=<?php // echo $name;  ?><span><?php //echo $username;  ?></a></li>   
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

 <legend>User:
  </legend>
	

  
          <div class="shoutout">
          <form  class="form-horizontal" id="postHere" method="post" action="save.php">
          <div class="comment">
          <textarea name="message" cols="45" rows="2" id="message" onclick="this.value='';">Post an announcement</textarea>
          </div>
          <input name="name" type="hidden" id="name" value="<?php echo $_SESSION['SESS_USERNAME'];?>"/>

          
          <div class="button">
           <input type="submit" name="btnlog" value="Post " class="greenButton" />
          </div>
           
          </form>
          </div>

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
			$('#postHere input').hover(function()
			{
			$(this).popover('show')
		});
			$("#postHere").validate({
				rules:{
					
					message:"required",
					
				},

				messages:{

					message:"Enter type the announcement",
					
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



<div class="post">
        <?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("facebook", $con);

$query  = "SELECT *,UNIX_TIMESTAMP() - date_created AS TimeSpent FROM message  ORDER BY messages_id DESC";
$result = mysql_query($query);
			

while($row = mysql_fetch_assoc($result))
{

	echo '<div class="message">';
	echo "Posted by {$row['user']}:<br></div><b><div class='postedby'>{$row['messages']}</b>";	
	echo '<input type="hidden" name="com" value="'. $row['messages_id'] .'">';
	echo '<input type="hidden" name="cam" value="'. $_SESSION['SESS_USERNAME'] .'">';
	echo '</form>';
	$result1 = mysql_query("SELECT * FROM bleh WHERE remarks='". $row['messages_id'] ."'");

	echo '<div class="delete">';
	echo '<font color="White">';
	echo '<a href=deleteposthome.php?id=' . $row["messages_id"] . '>' . "DELETE" . '</a>';
	echo '</font>';	
	echo '&nbsp;';
	echo'</div>';
	echo '<br>';
	echo '<font color="blue">';
	$days = floor($row['TimeSpent'] / (60 * 60 * 24));
			$remainder = $row['TimeSpent'] % (60 * 60 * 24);
			$hours = floor($remainder / (60 * 60));
			$remainder = $remainder % (60 * 60);
			$minutes = floor($remainder / 60);
			$seconds = $remainder % 60;
	if($days > 0)
			echo date('F d Y', $row['date_created']);
			elseif($days == 0 && $hours == 0 && $minutes == 0)
			echo "few seconds ago";		
			elseif($days == 0 && $hours == 0)
			echo $minutes.' minutes ago';
		
			echo '</font>';	
	echo'</div>';
	
	echo '<br /><br />';
	
	$query1  = "SELECT *,
		UNIX_TIMESTAMP() - date_created AS CommentTimeSpent FROM postcomment WHERE id=" . $row['messages_id'] . " ORDER BY comment_id DESC LIMIT 4";
	$result1 = mysql_query($query1);
	while($row1 = mysql_fetch_assoc($result1))
	{
		echo '<div class="postcomment">';
		echo '<div class="commentby">';
		echo '<font color="blue">';
		echo $row1['commentedby'];
		echo '</font>';
		echo '&nbsp;&nbsp;';
		echo $row1['content'];
		echo '<div class="delete">';
	echo '<font color="White">';
	echo '<a href=deletepostcommenthome.php?id=' . $row1["comment_id"] . '>' . "DELETE" . '</a>';
	echo '</font>';	
	echo '&nbsp;';
	echo'</div>';
		echo '<br />';
		echo '<font color="blue">';
						$days2 = floor($row1['CommentTimeSpent'] / (60 * 60 * 24));
						$remainder = $row1['CommentTimeSpent'] % (60 * 60 * 24);
						$hours = floor($remainder / (60 * 60));
						$remainder = $remainder % (60 * 60);
						$minutes = floor($remainder / 60);
						$seconds = $remainder % 60;	
						if($days2 > 0)
							echo date('F d Y', $row1['date_created']);
						elseif($days2 == 0 && $hours == 0 && $minutes == 0)
							echo "few seconds ago";		
						elseif($days2 == 0 && $hours == 0)
							echo $minutes.' minutes ago';
											
		echo '</font>';				
	echo '</div>';
		echo '</div>';
			echo '<br />';
	}
	echo '<div class="fieldcomment">';
	echo '<form action="commentpost.php" method="post">'; 
	echo'<input type="hidden" name="postid" value="'. $row['messages_id'] .'">';
	echo'<input type="hidden" name="user" value="'. $_SESSION['SESS_USERNAME'] .'">';
	echo'<input type="text" class="textbox" name="postcomment">';
	echo '</form';
	echo '</div>';
	echo "<br>";
	echo "<hr>";
	echo "<br>";

	
} 

if (!mysql_query($query,$con))
  {
  die('Error: ' . mysql_error());
  }

mysql_close($con)
?>
     
  </div>

</div>




        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
	 <div class="container">
        <p>&copy;  Fen Tap Corruption</p>
</div>
      </footer>
</body>
</html>
