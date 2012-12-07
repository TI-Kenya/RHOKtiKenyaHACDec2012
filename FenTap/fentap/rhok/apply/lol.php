<?php
	require_once('auth.php');
?>
<?php
function time_stamp($session_time) 
{ 
 
$time_difference = time() - $session_time ; 
$seconds = $time_difference ; 
$minutes = round($time_difference / 60 );
$hours = round($time_difference / 3600 ); 
$days = round($time_difference / 86400 ); 
$weeks = round($time_difference / 604800 ); 
$months = round($time_difference / 2419200 ); 
$years = round($time_difference / 29030400 ); 

if($seconds <= 60)
{
echo"$seconds seconds ago"; 
}
else if($minutes <=60)
{
   if($minutes==1)
   {
     echo"one minute ago"; 
    }
   else
   {
   echo"$minutes minutes ago"; 
   }
}
else if($hours <=24)
{
   if($hours==1)
   {
   echo"one hour ago";
   }
  else
  {
  echo"$hours hours ago";
  }
}
else if($days <=7)
{
  if($days==1)
   {
   echo"one day ago";
   }
  else
  {
  echo"$days days ago";
  }


  
}
else if($weeks <=4)
{
  if($weeks==1)
   {
   echo"one week ago";
   }
  else
  {
  echo"$weeks weeks ago";
  }
 }
else if($months <=12)
{
   if($months==1)
   {
   echo"one month ago";
   }
  else
  {
  echo"$months months ago";
  }
 
   
}

else
{
if($years==1)
   {
   echo"one year ago";
   }
  else
  {
  echo"$years years ago";
  }


}
 


} 



?>
<html>
<link rel="icon" href="images/App-share-manager-icon.png" type="image" />
<link rel="shortcut icon" href="images/App-share-manager-icon.png" type="image" />
<title>i share</title>







<head>
<script language="JavaScript" type="text/javascript" src="suggest.js"></script>

<link rel="stylesheet" href="menu.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/main.css" type="text/css" media="screen" />

<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
 
  <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>

</head>
<body>
<div id="containertop" >
  <div id='profile' style='margin:10px;height:50px;'>
    



<ul id="menu">
<a rel="facebox" href="request.php"><img src="images/friends.png" border="0"></a>
<?php
	include('config.php');

$result = mysql_query("SELECT * FROM friends WHERE requested='".$_SESSION['SESS_MEMBER_ID'] ."' and status='pending' ORDER BY requested ASC");
	
	$numberOfRows = MYSQL_NUMROWS($result);	
	
	echo '<font size="2" color="red"><b>' . $numberOfRows . '</b></font>'; 
	?>	
	
	
	<a rel="facebox" href="messages.php"><img src="images/e_mail.png" border="0"></a>
	<?php
	include('config.php');

$result = mysql_query("SELECT * FROM messages WHERE pakadtoan='".$_SESSION['SESS_MEMBER_ID'] ."' and status='unread' ORDER BY pakadtoan ASC");
	
	$numberOfRows = MYSQL_NUMROWS($result);	
	
	echo '<font size="2" color="red"><b>' . $numberOfRows . '</b></font>'; 
	?>

<input type="text" id="amots" name="amots" onKeyUp="bleble();" autocomplete="off" style="margin-top: 10px; margin-left: 109px; width:272px;"/>
	<div id="layers" style="margin-right:109px; float:left; width:260px;"></div>
  <li class="menu_right" style="margin-right: 15px; float:right"><a href="#" class="drop">Accounts</a><!-- Begin 3 columns Item -->

    

      <div class="dropdown_3columns align_right"><!-- Begin 3 columns container -->

            

         

            

          <div class="col_3">

              <?php
			   include('config.php');			
					$commentid=$_SESSION['SESS_MEMBER_ID'];
								
								$result3 = mysql_query("SELECT * FROM members where id='$commentid'");
								
								
								while($row3 = mysql_fetch_array($result3))
								  { 
			  
			  
			  		echo '<img src="'.$row3['profilepic'].'" height="124" width="124">'.'</a>';
					$wwww=$row3['fname'].' '.$row3['lname'];
								  
								  }
				?>
    

              

              <p align="center"><?php echo $wwww; ?></p>
			  <p align="center"><a href="index.php">logout</a></p>
          </div>
      </div><!-- End 3 columns container -->
    </li>
    <!-- End 3 columns Item -->
</ul>
  </div>
  <div id='profile1' style='margin: -12px 10px 10px; height: 250px; border: 1px solid rgb(180, 187, 205); background-color: rgb(255, 255, 255);'>
			  	
			  <div id="Layer1">
			  
			  
			  <?php
			   include('config.php');			
					$commentid=$_SESSION['SESS_MEMBER_ID'];
								
								$result3 = mysql_query("SELECT * FROM members where id='$commentid'");
								
								
								while($row3 = mysql_fetch_array($result3))
								  { 
			  
			  
			  		echo '<a href=editpic.php?id='.$row3["id"] .' title="Click to Edit Profile Picture">'.'<img src="'.$row3['profilepic'].'" height="124" width="124" style="border-width: 0px;">'.'</a>';
								  
								  }
				?>
			  
			  
			  
			  
			  
			  
			  </div>
			  
              <?php
			   include('config.php');			
					$commentid=$_SESSION['SESS_MEMBER_ID'];
								
								$result3 = mysql_query("SELECT * FROM members where id='$commentid'");
								
								
								while($row3 = mysql_fetch_array($result3))
								  { 
			  
			  
			  		echo '<a href=editcover.php?id='.$row3["id"] .' title="Click to Edit Profile Picture">'.'<img src="'.$row3['coverphoto'].'" height="250px" width="838px" style="border-width: 0px;">'.'</a>';
								  
								  }
				?></div>
<div id='profile2' class="timelineheader">
			 
			 <div id="Layer3"> 
			  <?php
			   include('config.php');			
					$commentid=$_SESSION['SESS_MEMBER_ID'];
								
								$result3 = mysql_query("SELECT * FROM members where id='$commentid'");
								
								
								while($row3 = mysql_fetch_array($result3))
								  { 
			  
			  
			  		echo '<b>'.$row3['fname'].' '.$row3['lname'].'</b>';
								  
								  }
				?>
			 </div>
  </div>
<div id='profile2' class="timenav">	
	<div id="about">
		<div class="a">
		  <div style="margin-left: 21px; margin-top: 7px;">
		    <?php
			   include('config.php');			
					$commentid=$_SESSION['SESS_MEMBER_ID'];
								
								$result3 = mysql_query("SELECT * FROM members where id='$commentid'");
								
								
								while($row3 = mysql_fetch_array($result3))
								  { 
			  
			  
			  		echo '<div style="height: 15px;"><b>Address: '.$row3['address'].' '.$row3['city'].'</div>';
					echo '<div style="height: 15px;">Contact: '.$row3['contact'].'/'.$row3['email'].'</div>';
					echo '<div style="height: 15px;">Gender: '.$row3['gender'].'</div>';	
					echo '<div style="height: 15px;">Birthday: '.$row3['bday'].'</b></div>';		  
								  }
				?>
		  </div>
		</div>
		<div align="right">about
	    </div>
	</div>	
	<div id="friends" style="margin-left: 341px; margin-top: -93px;">
		<div class="b"><span class="listfriends">
        
        </span> </div>
		<div align="right">
		  <div id="Layer2">
            <?php
						include('config.php');
						$result = mysql_query("SELECT * FROM friends WHERE requested='".$_SESSION['SESS_MEMBER_ID'] ."' and status='accepted' ORDER BY requested ASC");
						$numberOfRows = MYSQL_NUMROWS($result);	
						echo '<font size="5" color="white"><b>' . $numberOfRows . '</b></font>'; 
		?>
		    <a rel="facebox" href="listfriends.php?id=<?php echo $_SESSION['SESS_MEMBER_ID']; ?>" style="text-decoration:none; color:#FFFFFF;">friends</a> </div>
	    friends
		</div>
	</div>
	<div id="friends" style="margin-left: 467px; margin-top: -93px;">
		<div class="b">
		</div>
		<div align="right">
		<div id="Layer2">
            <?php
						include('config.php');
						$result = mysql_query("SELECT * FROM photos WHERE uploadedby='".$_SESSION['SESS_MEMBER_ID'] ."' ORDER BY id ASC");
						$numberOfRows = MYSQL_NUMROWS($result);	
						echo '<font size="5" color="white"><b>' . $numberOfRows . '</b></font>'; 
						?>
		    <a rel="facebox" href="photos.php?id=<?php echo $_SESSION['SESS_MEMBER_ID']; ?>" style="text-decoration:none; color:#FFFFFF;">photos</a> </div>
	    photos
	    </div>
	</div>	 
	<div id="friends" style="margin-left: 593px; margin-top: -93px;">
		<div class="b">
		</div>
		<div align="right">lorem</div>
	</div>
	<div id="friends" style="margin-left: 721px; margin-top: -93px;">
		<div class="b">
		</div>
		<div align="right">lorem
	    </div>
	</div>
</div>
			  
</div>
<div id="container">
    
       <div class="timeline_container">
            <div class="timeline">
                <div class="plus"></div>
            </div>
  </div>
<div class="item" style="height: 147px">

    
    <div class="tabs">
        
       <div class="tab">
           <input type="radio" id="tab-4" name="tab-group-2" checked>
           <label for="tab-4">Post</label>
           
           <div class="content">
               <form action="savecomment.php" method="post">
			  	<input name="from" type="hidden" value="<?php echo $_SESSION['SESS_MEMBER_ID']; ?>">
			  	<input name="to" type="hidden" value="<?php echo $_SESSION['SESS_MEMBER_ID']; ?>">
			  	<input name="pakadtoan" type="hidden" value="<?php echo $_SESSION['SESS_MEMBER_ID']; ?>">
			 	<textarea name="content" style="margin-left: 10px; width:95%"></textarea><br>
			 	<input name="" type="submit" value="POST" class='update_button' style="margin-left: 10px;">
			   </form>
           </div> 
       </div>
        
       <div class="tab">
           <input type="radio" id="tab-5" name="tab-group-2">
           <label for="tab-5">Photo</label>
           
           <div class="content">
               <form action="postphoto.php" method="post" enctype="multipart/form-data">
				<input name="from" type="hidden" value="<?php echo $_SESSION['SESS_MEMBER_ID']; ?>">
				<input name="to" type="hidden" value="<?php echo $_SESSION['SESS_MEMBER_ID']; ?>">
				Select Image
				<br>
				<input type="file" name="image"><br>
				<input type="submit" value="Upload">
				</form>
           </div> 
       </div>
        
        
    </div>
	





  </div>
  
  
  <div class="item" style="padding-top: 3px;">
		 <div class="topheader">
		 <img src="images/download.jpg">
		 <div class="timelineReportCol">Friends</div>
		 </div>
 
  <div class="listfriends">
  <?php
			   include('config.php');			
				
								
								$result = mysql_query("SELECT * FROM friends WHERE requested='".$_SESSION['SESS_MEMBER_ID'] ."' and status='accepted' ORDER BY requested ASC");
								
								
								while($row3 = mysql_fetch_array($result))
								  {
								  $qwe=$row3['addedby'];
								  $result1 = mysql_query("SELECT * FROM members WHERE id='$qwe'");
								
								
								while($row1 = mysql_fetch_array($result1))
								  { 
			  
									  
											echo '<a style="text-decoration:none" href=profile.php?id='.$row1["id"] .'>'.'<img src="'.$row1['profilepic'].'" title="'.$row1['fname'].' '.$row1['lname'].'" style="padding-left: 10px; padding-bottom: 10px; max-width: 50px"></a>';
											
											
								  }
								  }
				?>
	</div>
  </div>
<?php
			   include('config.php');

$commentid=$_SESSION['SESS_MEMBER_ID'];								
								$result3 = mysql_query("SELECT * FROM comment where pakadtoan='$commentid' or name='$commentid' ORDER BY id DESC");
								
								
								while($row3 = mysql_fetch_array($result3))
								  {  
  
echo '<div class="item ">';
 echo '<a href=deletecomment.php?id='.$row3["id"].' class="delete">X</a>';
 
 
 echo '<div id="Layer4">';
	$qwerty=$row3['name'];	
	$time=$row3['created'];	
	$ppppp=$row3['postcat'];  
$result4 = mysql_query("SELECT * FROM members where id='$qwerty'");
								
								
								while($row4 = mysql_fetch_array($result4))
								  { 
			  
			  
			  		echo '<img src="'.$row4['profilepic'].'" style="max-width: 50px">';
					$qwqwqw=$row4['fname'].' '.$row4['lname'];
								  
								  }	  
			 
			  
			  
			  
			  
			  
			  
		echo '</div>';
 		
 		echo '<div style="width: 289px; margin-top: -6px; margin-left: 53px; padding-bottom: 0px;"><a style="text-decoration:none" href=profile.php?id='.$row3["commentid"] .'>'.$qwqwqw.'</a></div>';
		echo '<div class="sttime" style="float: right; margin-top: -4px; padding-bottom: 0px; padding-top: 0px; width: 310px;">';
		$time = time_stamp($time);
		echo '</div>';
		
		if($ppppp=='photos')
		{
		echo '<div style="width: 387px; margin-left: 8px; padding: 4px; margin-top: 20px; border-width: 1px 0px 0px 0px; border-style: solid; border-color: #e6e6e6;">';
		echo '<img src="'.$row3['content'].'" style="max-width: 387px">';
		echo '</div>';
		}
		if($ppppp!='photos')
		{
	  	echo '<div style="width: 387px; margin-left: 8px; padding: 4px; margin-top: 20px; border-width: 1px 0px 0px 0px; border-style: solid; border-color: #e6e6e6;">'.$row3['content'].'</div>';
		}
		
		
		
		
		echo '<div style="width: 385px; margin-left: 8px; padding: 4px; margin-top: 0px; background-color: rgb(237, 239, 244); margin-bottom: 2px; font-family: '.'Lucida Grande'.', Tahoma, Verdana, Arial, sans-serif; font-size: 11px; color: #3B5998;">';
		$rrr=$row3['id'];
$result = mysql_query("SELECT * FROM subcomment where subcommentid='$rrr'");
	
	$numberOfRows = MYSQL_NUMROWS($result);	
	
	echo $numberOfRows.'     '; 
	
		echo 'comment'.'</div>';
		
		
		$result4 = mysql_query("SELECT * FROM subcomment where subcommentid='$rrr'");
			while($row4 = mysql_fetch_array($result4))
			 { 					
			echo '<div style="width: 385px; margin-left: 8px; padding: 4px; margin-top: 0px; background-color: rgb(237, 239, 244); margin-bottom: 2px;">';
			$fff=$row4['subcommentname'];
			$result5 = mysql_query("SELECT * FROM members where id='$fff'"); 
			while($row5 = mysql_fetch_array($result5))
			{
			echo '<img src="'.$row5['profilepic'].'" style="max-width: 50px; float:left;">';
			//echo '<div style="float: right; padding-top: 1px; padding-bottom: 1px; padding-right: 1px; width: 328px;">';
			echo '<label>';
			echo '<b><a style="text-decoration:none" href=profile.php?id='.$row3["commentid"] .'>'.$row5['fname'].' '.$row5['lname'].'</a></b>'.'   '.$row4['content'];
			echo '</label>';
			//echo '</div>';
			}
			echo '</div>';					
			}					
		
		
		echo '<div style="width: 385px; margin-left: 8px; padding: 4px; margin-top: 0px; background-color: rgb(237, 239, 244);">';
		echo '<form action="subcomment.php" method="post" style="margin-bottom: 2px;">';
		
		
		echo '<input name="commentid" type="hidden" value="'.$row3['id'].'">';
		echo '<input name="subcommentname" type="hidden" value="'.$_SESSION['SESS_MEMBER_ID'].'">';
		echo '&nbsp;&nbsp;<input name="subcommentcontent" type="text" style="width: 370px; margin-left: 0px;">';
		echo '</form>';	
		echo '</div>';
		echo '<div style="padding-top: 0px;"></div>';
echo '</div>';
	  
}
			  
			  ?>

	
		
</div>
<script src="emeron.js"></script>
<script src="jquery.masonry.min.js"></script>

<script>
$(function(){


function Arrow_Points()
{ 
var s = $('#container').find('.item');
$.each(s,function(i,obj){
var posLeft = $(obj).css("left");
$(obj).addClass('borderclass');
if(posLeft == "0px")
{
html = "<span class='rightCorner'></span>";
$(obj).prepend(html);			
}
else
{
html = "<span class='leftCorner'></span>";
$(obj).prepend(html);
}
});
}

$('.timeline_container').mousemove(function(e)
{
var topdiv=$("#containertop").height();
var pag= e.pageY - topdiv-26;
$('.plus').css({"top":pag +"px", "background":"url('images/plus.png')","margin-left":"1px"});}).
mouseout(function()
{
$('.plus').css({"background":"url('')"});
});
	
	
				
$("#update_button").live('click',function()
{
var x=$("#update").val();
$("#container").prepend('<div class="item"><a href="#" class="deletebox">X</a><div>'+x+'</div></div>');

//Reload masonry
$('#container').masonry( 'reload' );

$('.rightCorner').hide();
$('.leftCorner').hide();
Arrow_Points();

$("#update").val('');
$("#popup").hide();
return false;
});

// Divs
$('#container').masonry({itemSelector : '.item',});
Arrow_Points();
  
//Mouseup textarea false
$("#popup").mouseup(function() 
{
return false
});
  
$(".timeline_container").click(function(e)
{
var topdiv=$("#containertop").height();
$("#popup").css({'top':(e.pageY-topdiv-33)+'px'});
$("#popup").fadeIn();
$("#update").focus();

	
});  


$(".deletebox").live('click',function()
{
if(confirm("Are your sure?"))
{
$(this).parent().fadeOut('slow');  
//Remove item
$('#container').masonry( 'remove', $(this).parent() );
//Reload masonry
$('#container').masonry( 'reload' );
$('.rightCorner').hide();
$('.leftCorner').hide();
Arrow_Points();
}
return false;
});



//Textarea without editing.
$(document).mouseup(function()
{
$('#popup').hide();

});
 
  
});
</script>

</body>
</html>