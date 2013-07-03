<?php

@session_start();

error_reporting(0);


$Session_username 	= $_SESSION['Session_Username'];
$Session_username1 	= $_SESSION['Session_Username1'];
$Session_UserId1 =$_SESSION['Session_UserId1'];
$Session_UserId =$_SESSION['Session_UserId'];

$Session_email1 		= $_SESSION['yemailid'];

$Session_user=$_SESSION['User'];
$Session_email1=$_SESSION['mailid'];
$Session_email2=$_SESSION['mailid2'];
$Session_level = $_SESSION['level'];

// Get the ride name if logged in
$curuser="";
$userid = $_SESSION['Session_UserId1'];
if ($userid != "")
{
	$userid = $Session_UserId1;
	$sel="select * from `tbl_cycling_membernew` where `intmemberid`='$userid'";
	$res=mysql_query($sel);
	if (!$res) {
		$message  = 'Invalid query: ' . mysql_error() . "\n";
		$message .= 'Whole query: ' . $sel;
		die($message);
	}
	$fetch=mysql_fetch_array($res);
	$curuser=$fetch['varRidename'];
}

define("ADMINPROFILE","tbl_cycling_adminprofile");
define("CMS","tbl_cycling_cms");
define("BANNER","tbl_cycling_banner");
define("LINK","tbl_cycling_link");
define("CATEGORY","tbl_cycling_category");
define("GALLERY","tbl_cycling_gallery");
define("MAILS","tbl_cycling_mails");
define("MEMBER","tbl_cycling_membernew");
define("PAGE","tbl_cycling_page");
define("PRODUCT","tbl_cycling_product1");
define("HEADERIMAGE","tbl_cycling_image");
define("TESTIMONIAL","tbl_cycling_testimonial");
define("FAQ","tbl_cycling_faq");

define("DEIMAGE","../../deimage/");
define("CATIMAGE","../../catimage/");
define("SUBCATIMAGE","../../subcatimage/");
define("PRODUCTIMG","../../productimg/");

$sel_admindetail ="SELECT * FROM ".ADMINPROFILE;
$Query = mysql_query($sel_admindetail) or die(mysql_error());
$Fetch = mysql_fetch_array($Query);
extract($Fetch);

session_start();


function get_string_between($string, $start, $end){//JOX

        $string = " ".$string;

        $ini = strpos($string,$start);

        if ($ini == 0) return "";

        $ini += strlen($start);   

        $len = strpos($string,$end,$ini) - $ini;

        return substr($string,$ini,$len);

}



 ?>

