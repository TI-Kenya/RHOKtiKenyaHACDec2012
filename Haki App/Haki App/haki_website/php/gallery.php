<?php
?>
<html>
  <head>
    <title>haki</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/jquery.lightbox-0.5.css" type="text/css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.slideshow.min.js"></script>
	<script type="text/javascript" src="js/jquery.lightbox-0.5.js"></script>
	<script type="text/javascript">
	  $(function(){
	    $('#gallery a').lightBox();
	  });
	  </script>
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
		    <li ><a href="Index.php" class="current">Home</a></li>
			<li><a href="crimes.php">crimes</a></li>
			<li><a href="gallery.php"> Gallery</a></li>
			<li ><a href="contacts.php"class="last">Contacts</a></li>
		  </ul>
	   </div>
	   </div>
	   
	   <div id="slideshow">
	   <img src="images/slide1.jpg" alt="The Beach" />
	   <img src="images/slide2.jpg" alt="Lodge"/>
<!--	   <img src="images/slide3.jpg" alt="Ldges"/>
	   <img src="images/slide4.jpg" alt="Sail Fish"/>-->
	   </div>
	   <div id="leftcol">
	       <div class="box"><h2>Quick Links</h2>
		      <ul>
			   <li>About
			   <ul>
			   <li><a href="history.html">History</a></li>
			   <li><a href="team.html">Team</li>
			   </ul>
			   </li>
			   <li><a href="gallery.html"> Gallery</a></li>
			   <li><a href="contacts.php">Contacts</a></li>
		    </ul>
		   
		   </div>
		   <div class="box"><h2>Videos</h2><img src="images/video.jpg" /></div>
	       <div class="box"><h2>Quotes</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ac iaculis libero. Ut lobortis, nibh quis suscipit pellentesque, nulla metus vehicula turpis, quis luctus nibh ligula et leo. orci pretium pulvinar. Nam sollicitudin rutrum tellus, non viverra neque mattis porta. Aliquam posuere consequat quam nec tempor. Suspendisse ullam<p></div>
	   </div>
	   <div id="rigthcol">
	       <h1><strong>Gallery</strong></h1>
		     <div id="gallery"> 
			   <ul>
			   <li><a href="gallery/Kilwa_0084.jpg"><img src="gallery/thumbs/Kilwa_0084.jpg"</a></li>
			   <li><a href="gallery/Kilwa_0099.jpg"><img src="gallery/thumbs/Kilwa_0099.jpg"</a></li>
			   <li><a href="gallery/Kilwa_0100.jpg"><img src="gallery/thumbs/Kilwa_0100.jpg"</a></li>
			   <li><a href="gallery/Kilwa_0105.jpg"><img src="gallery/thumbs/Kilwa_0105.jpg"</a></li>
			   <li><a href="gallery/Kilwa_0112.jpg"><img src="gallery/thumbs/Kilwa_0112.jpg"</a></li>
			   <li><a href="gallery/Kilwa_0119.jpg"><img src="gallery/thumbs/Kilwa_0119.jpg"</a></li>
			   <li><a href="gallery/Kilwa_0120.jpg"><img src="gallery/thumbs/Kilwa_0120.jpg"</a></li>
			   <li><a href="gallery/Kilwa_0126.jpg"><img src="gallery/thumbs/Kilwa_0126.jpg"</a></li>
			   <li><a href="gallery/Kilwa_0142.jpg"><img src="gallery/thumbs/Kilwa_0142.jpg"</a></li>
			   <li><a href="gallery/Kilwa_0284.jpg"><img src="gallery/thumbs/Kilwa_0284.jpg"</a></li>
			   <li><a href="gallery/Kilwa_0483.jpg"><img src="gallery/thumbs/Kilwa_0483.jpg"</a></li>
			   <li><a href="gallery/Kilwa_0512.jpg"><img src="gallery/thumbs/Kilwa_0512.jpg"</a></li>
			   <li><a href="gallery/Kilwa_0535.jpg"><img src="gallery/thumbs/Kilwa_0535.jpg"</a></li>
			 </ul>
			 </div>

	   </div>
	   <div id="footer">
	       <div id="copyright">Copyright &copy;2012 Thomas</div>
	   </div>
	   
	   </div>	   
	   
	   
	   
	   
	</div>
  </body>
</html>

