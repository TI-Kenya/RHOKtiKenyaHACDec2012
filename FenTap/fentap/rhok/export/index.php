<?php
  error_reporting(0);
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
      
      
    }else {
      

      exit();
    }
  }else {
    die(mysql_error());
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Fen Tap Corruption</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script type="text/javascript" src="js/autofill.js"></script>
<script language="JavaScript">
function Check(chk)
{ 
if(document.myform.Check_ctr.checked==true)
{
for (var i = 0; i < chk.length; i++)
{
chk[i].checked = true ;
}
}
else
{
for (i = 0; i < chk.length; i++)
chk[i].checked = false ;
}
}
</script>
<script type="text/javascript">
function confirmDelete() 
{
	var msg = "Are you sure you want to delete?";       
    return confirm(msg);
}
</script>
<script language="javascript">
function download()
{
	window.location='tenderreport.xls';
}
</script>

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
<li class="active"><a href="/rhok/apps/applications.php/" target="_top" data-name="plans-residential-page" title="All Tenders "><span>All Tenders</span></a></li> 
<li class=""><a href="/rhok/wall/" target="_top" data-name="cities-page" title="Forum"><span>Notices</span></a></li>   
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
    Home Page &nbsp;&nbsp;&nbsp;&nbsp;
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
  

 <legend>
  </legend> &nbsp;  &nbsp;  &nbsp;  &nbsp;


<table class="table table-condensed table-hover table-bordered table-striped">
    <caption>Export Tenders To Microsoft Excel</caption>
    <thead>
    <tr>
    <th>Ref No</th>
    <th>Tender Name</th>
    <th>Type</th>
    <th>Category</th>
    <th>Opening Date</th>
    <th>Deadline</th>
    <th>Description</th>
     <th>Tender Cost</th>
    <th>Submitter</th>
    <th>Contact Details</th>
    </tr>
    </thead>

  <?php
require_once("config.php");
$qrys=mysql_query("select * from tenders_app");
while($row=mysql_fetch_array($qrys))
	{
  echo "<tr>";
  echo "<td>" . $row['refno'] . "</td>";
  echo "<td>" . $row['tender_name'] . "</td>";
  echo "<td>" . $row['tenders'] . "</td>";
  echo "<td>" . $row['category'] . "</td>";
  $new_date = date("m-d-Y", $row['app_date']);  
  echo "<td>" . $new_date . "</td>";
  echo "<td>" . $row['deadline'] . "</td>";
  echo "<td>" . $row['description'] . "</td>";
  echo "<td>" . $row['amount_app'] . "</td>";  
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['phone_number'] . "</td>";
  echo "</tr>";
  }
  ?>
</table>

<?php
error_reporting (E_ALL ^ E_NOTICE);

require_once("config.php");
require_once("excelwriter.class.php");

$excel=new ExcelWriter("tenderreport.xls");
if($excel==false)	
echo $excel->error;
$myArr=array("");
$myArr=array("Tenders Report");
$excel->writeLine($myArr);
$myArr=array("");
$excel->writeLine($myArr);
$myArr=array("Tender Name","Reference No","Tender Type","Tender Category","Opening Date","Closing Date","Tender Cost","Description","Submitter","Contact Details");
$excel->writeLine($myArr);
$from=$_POST['from'];
$to=$_POST['to'];
$qry=mysql_query("select * from tenders_app");
if($qry!=false)
{
	$i=1;
	while($res=mysql_fetch_array($qry))
	{
		$myArr=array($res['tender_name'],$res['refno'],$res['tenders'],$res['category'],$res['app_date'],$res['deadline'],$res['amount_app'],$res['description'],$res['name'],$res['phone_number']);
		$excel->writeLine($myArr);
		$i++;
	}
}
?>
<a href="javascript:void(0);" onClick="download();"><img src="img/preview.png" alt="" /></a>

</div>
</body>
</html>
