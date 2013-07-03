<?php  include('header.php'); 



if(isset($_POST['submit']))
{
$ans="instock";

$nesel="select * from `tbl_side_product1`";
$qu=mysql_query($nesel) or die(mysql_error());
while($res=mysql_fetch_array($qu))
{

$intid=$res['intproductid'];

echo $sel="update `tbl_side_product1` set `stockstatus`='$ans'  WHERE `intproductid`='$intid'";
mysql_query($sel);


}


	





}





?>


<html>
<head></head>
<body>
<form method="post" name="new">
<table>

<tr><td><input type="submit" name="submit"></td></tr></table></form></body></html>