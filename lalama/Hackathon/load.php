<?php
header('Content-type: application/json');
require_once('includes/connect.php'); 
   //mysql_select_db($database_localhost,$localhost);
	  
	    
	 //$query_search = "SELECT * FROM population WHERE province='".$_REQUEST['province']."'";
	 $query_search = "SELECT c.id,c.name,c.region,c.point_x,c.point_y,c.problem_type,c.description,c.photo,c.report_time, p.icon
   FROM complains c, problem p
     WHERE p.problem= c.problem_type";
	 $result = mysql_query($query_search)or die(mysql_error());
	 	 
     $return_arr= array();
	 while($row = mysql_fetch_array($result)){
     
	   $row_array['name']=$row['name'];
	   $row_array['region']=$row['region'];
	   $row_array['point_x']=$row['point_x'];
	   $row_array['point_y']=$row['point_y'];
	   $row_array['photo']=$row['photo'];
	   $row_array['icon']=$row['icon'];
	   $row_array['id']=$row['id'];
	   $row_array['description']=$row['description'];
	   $row_array['report_time']=$row['report_time'];
	   $row_array['problem_type']=$row['problem_type'];
	   array_push($return_arr,$row_array);
    
    //exit;
     }
	 
	 echo json_encode($return_arr);
	 
	 //echo $_POST['province'];
	 
?>