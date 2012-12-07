<?php
include("db.php");

include('../login/auth.php');
  session_start();
  $username=$_SESSION['SESS_USERNAME'];
  
  $link = mysql_connect('localhost', 'josemutie', 'jessie**2012'); 
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
      $usernames = $member['username'];
      echo "$username";
      echo "$usernames";
      
    }else {
      

      exit();
    }
  }else {
    die(mysql_error());
  }


$msgcon=$_POST['message'];
mysql_query("INSERT INTO messages (message,email,username)
VALUES ('$msgcon',$email',$usernames')");
header("location: index.php");
?>