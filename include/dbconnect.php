<?php

ob_start();

error_reporting(E_ERROR | E_WARNING | E_PARSE);

$host_name = "localhost";

if ($_SERVER['SERVER_NAME'] == "www.thebobbinhead.com")
{
	$host_user = "bobbinhe_sydneye";
	$host_pass = "sbwtstd";
	$host_db = "bobbinhe_sydneyea";
}
else
{
	$host_user = "sydneyea_cycling";
	$host_pass = "sbwtstd";
	$host_db = "sydneyea_cycling";
}


$connect=mysql_connect($host_name,$host_user,$host_pass) or die("Could Not Connect to Data Base ".mysql_error());

$db=mysql_select_db($host_db)or die("Could Not Select Data Base".mysql_error());

// Set PHP and MYSQL timezones
date_default_timezone_set('Australia/Sydney');
$dateqry = "SET `time_zone` = '".date('P')."'";
$res = mysql_query($dateqry);
$timenow = date('Y-m-d H:i:s');

?>



