<?php
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("kutraining") or die(mysql_error());

$response="";
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];


$sql="INSERT INTO website(email,subject,message) VALUES ('$email','$subject','$message')";
mysql_query($sql) or die(mysql_error());

$sql="select * from website where email='$email'and subject='$subject'";
$result=mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($result)>0){

      $response="Your message was successully sent";
} else
  {
    $response="Message not sent";
   }
?>


<html>
  <head>
    <title>haki</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.slideshow.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
	   $('#slideshow').slideshow({
	    timeout:5000,
		fadetime:2000,
		type:'sequence',
	   });
	});
	</script>
  </head>
  <body>
    <div id="wrapbg">
	   <div id="wrap">
	   <div id="banner">
	   <div id="logo"><img src="images/logo.jpg" alt="Logo"/></div>
	   <div id="topnav">
	      <ul>
		    <li ><a href="Index.html" class="current">Home</a></li>
			<li><a href="crimes.html">crimes</a></li>
			<li><a href="gallery.html"> Gallery</a></li>
			<li ><a href="contacts.php"class="last">Contacts</a></li>
			<li><a href="localhost/Ushahidi_Web/"> Report</a></li>
		  </ul>
	   </div>
	   </div>
	   
	   <div id="slideshow">
	   <img src="images/slide1.jpg" alt="The Beach" />
	   <img src="images/slide2.jpg" alt="Lodge"/>
	   <img src="images/slide3.jpg" alt="Ldges"/>
	   <img src="images/slide4.jpg" alt="Sail Fish"/>
	  
	   </div>
	   <div id="leftcol">
	       <div class="box"><h2>Quick Links</h2>
		      <ul>
			   <li><a href="www.kenyaredcross.org"> Red Cross</a></li>
			   <li><a href="http://www.nwch.co.ke/"> Nairobi Women Hospital</a></li>
			   <li><a href="http://www.ushahidi.com/"> Ushahidi</a></li>
			   <li><a href="http://www.kenyapolice.go.ke/"> Kenya Police</a></li>
			   <li><a href="http://www.judiciary.go.ke/portal/"> Kenya Law Courts</a></li>		   
		    </ul>
		   
		   
		   </div>
		   <div class="box"><h2>Videos</h2><img src="images/video.jpg" /></div>
	       <div class="box"><h2>Quotes</h2><p><strong>HAKI</strong> enlightens people on their rights, allows them to report and 
		   offer various assistance.</br>
<strong>Mission</strong></br>
Sensitize citizen that justice is a right for all but not a privilege for a few.
<p></div>
	   </div>
	   <div id="rigthcol">
	       <h1><strong>Contacts</strong></h1>
   <table>
<form name="form1" method="post" action="">
  <tr>
    <td><label>Email:</label></td>
    <td> <input type="text" name="textfield"></td>
  </tr>
  <tr>
    <td><label>Subject:</label></td>
    <td><input type="text" name="textfield2"></td>
  </tr>
  <tr>
    <td><label>Message:</label></td>
    <td><textarea name="textarea"></textarea></td>
  </tr>
  <tr>
    <td> <label>Send</label></td>
    <td><input type="submit" name="Submit" value="Submit"></td>
  </tr>
  </form>
</table>

	   </div>
	   <div id="footer">
	       <div id="copyright">Copyright &copy;2012 Designed by Haki Inc</div>
	   </div>
	   
	   </div>	   
	   
	   
	   
	   
	</div>
  </body>
</html>