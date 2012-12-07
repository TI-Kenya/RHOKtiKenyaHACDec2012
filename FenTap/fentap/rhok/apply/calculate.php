<?php

mysql_connect('localhost','josemutie','jessie**');  
mysql_select_db('jacinta');


SELECT a.dept, a.date, IF(a.id=15,'15-18',a.id) AS id, IF(b.profit IS NULL,a.profit,a.profit-b.profit) AS profit
FROM deptTable a 
LEFT JOIN deptTable b ON a.ID=15 AND b.ID=18 AND a.dept=b.dept
WHERE a.ID IN(10,15,25) AND a.date = '2009-01-25'

$addition = 2 + 4; 
$subtraction = 6 - 2; 
$multiplication = 5 * 3; 
$division = 15 / 3; 
$modulus = 5 % 2; 
echo "Perform addition: 2 + 4 = ".$addition."<br />"; 
echo "Perform subtraction: 6 - 2 = ".$subtraction."<br />"; 
echo "Perform multiplication:  5 * 3 = ".$multiplication."<br />"; 
echo "Perform division: 15 / 3 = ".$division."<br />"; 
echo "Perform modulus: 5 % 2 = " . $modulus 
	. ". Modulus is the remainder after the division operation has been performed.  
	In this case it was 5 / 2, which has a remainder of 1.";

?>