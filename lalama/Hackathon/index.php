<?php 
include('includes/session.php');
include('includes/functions.php');
include('includes/connect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Home</title>	
	<meta name="Robots" content="index,follow" />
	<meta name="Generator" content="ESRI" />
	<link rel="stylesheet" type="text/css" href="css/home.css" media="screen" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/highcharts.js"></script>
<script type="text/javascript" src="js/modules/exporting.js"></script>
	<link rel="shortcut icon" href="images/favicon.ico">
	<script type="text/javascript">
	$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'piez',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'Complains report'
            },
			legend: {
                enabled: true
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y} case(s)</b>',
                percentageDecimals: 1
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>'+ this.point.name +'</b>: '+ this.y +' Case(s)';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Complains',
                data: [
                    ['Blackmail',   <?php 
					$jo = mysql_query("SELECT COUNT(id) as jah FROM `complains` where problem_type='Blackmail'");
					$r=mysql_fetch_row($jo);
					echo $r[0];
					?>],
                    ['Bribery',       <?php 
					$jo = mysql_query("SELECT COUNT(id) as jah FROM `complains` where problem_type='Bribery'");
					$r=mysql_fetch_row($jo);
					echo $r[0];
					?>],
                    {
                        name: 'Collusion',
                        y:  <?php 
					$jo = mysql_query("SELECT COUNT(id) as jah FROM `complains` where problem_type='Collusion'");
					$r=mysql_fetch_row($jo);
					echo $r[0];
					?>,
                        sliced: true,
                        selected: true
                    },
                    ['Conflict of interest',     <?php 
					$jo = mysql_query("SELECT COUNT(id) as jah FROM `complains` where problem_type='Conflict of interest'");
					$r=mysql_fetch_row($jo);
					echo $r[0];
					?>],
                    ['Embezzelment',     <?php 
					$jo = mysql_query("SELECT COUNT(id) as jah FROM `complains` where problem_type='Embezzlement'");
					$r=mysql_fetch_row($jo);
					echo $r[0];
					?>],
                     ['Tax Evasion',      <?php 
					$jo = mysql_query("SELECT COUNT(id) as jah FROM `complains` where problem_type='Tax Evasion'");
					$r=mysql_fetch_row($jo);
					echo $r[0];
					?>],
                     ['Tax Fraud',      <?php 
					$jo = mysql_query("SELECT COUNT(id) as jah FROM `complains` where problem_type='Tax Fraud'");
					$r=mysql_fetch_row($jo);
					echo $r[0];
					?>],
                     ['Inefficiency',     <?php 
					$jo = mysql_query("SELECT COUNT(id) as jah FROM `complains` where problem_type='Inefficiency'");
					$r=mysql_fetch_row($jo);
					echo $r[0];
					?>],
                     ['theft',      <?php 
					$jo = mysql_query("SELECT COUNT(id) as jah FROM `complains` where problem_type='theft'");
					$r=mysql_fetch_row($jo);
					echo $r[0];
					?>],
                     ['Misuse of funds',     <?php 
					$jo = mysql_query("SELECT COUNT(id) as jah FROM `complains` where problem_type='Misuse of funds'");
					$r=mysql_fetch_row($jo);
					echo $r[0];
					?>],
                    ['Others',    <?php 
					$jo = mysql_query("SELECT COUNT(id) as jah FROM `complains` where problem_type='Others'");
					$r=mysql_fetch_row($jo);
					echo $r[0];
					?>]
                ]
            }]
        });
    });
    
});
	</script>
	
</head>
<body>
	<div class="wrap" style="height:900px;" >
		<div id="logo">
			<img src="images/logo.png"/>
		</div>
		<div id="subheader">
			<ul id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="complaint.php">Report Complain</a></li>
				<li><a href="public.php">Reported Complain</a></li>
				<li><a href="trace.php">Trace Complain</a></li>
				<li><a href="comment.php">Feedback</a></li>
			</ul>	
		</div>		
		<div id="right" style="height:auto;" >
		<?php 
		//include("watersystem.php");
		$url = "xmin=4073959.0882260324&ymin=-152904.42845964813&xmax=4125706.956375027&ymax=-130508.37917212165&wkid=102100";
		?>
		<iframe style="float:right;" width="45%" height="300" src="watersystem.php?<?php echo $url; ?>">
		</iframe>
			<div style="float:left;  width:50%; height:50px; box-shadow: 10px 10px 5px #888888;" > 
			Enter Tracking Code<form action="trace.php"><input type="text" name="tafuta" id="tafuta"><input type="submit" value="trace"></form>
			
			</div>
			<div id="piez" style="float:left; height:250px; width:35%; position:absolute; margin-top:60px; box-shadow: 10px 10px 5px #888888; ">pie</div>
			<div id="" style="float:left; height:250; width:60%; position:absolute; margin-top:360px; box-shadow: 10px 10px 5px #888888;" >column</div>
		</div>
	
		<div id="footer">
			<ul id="rss">
				<p id="footer_right"></p>
			</ul>
			<p>Created by  <a href="https://twitter.com/Accadius" title="">@Accadius</a> &middot; 
			<?php 
			if(isset($_SESSION['id']))
			{
				echo "<a href=\"admin.php\"> Admin </a>";
				echo "&middot;";
				echo "<a href=\"logout.php\" onclick=\"return confirm('Are you sure you want to Logout?')\"> Logout</a></</p>";
			}
			else
			{
				echo "<a href=\"login.php\">Login</a></p>";
			}
			?>
			<p></p>
		</div>
	</div>
</body>
</html>