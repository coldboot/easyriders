<?php
require('blog/wp-blog-header.php');
session_start();
ob_start();
error_reporting  (E_ERROR | E_WARNING | E_PARSE);

//Session Start

 $intUserId = $_SESSION["Session_UserId1"] ;
 //$strUsername =	$_SESSION["Session_Username"] ;

	if($intUserId == "")
		{
			header("Location:index.php");
		}

$_SESSION["Session_UserId1"] = "";
//$_SESSION["Session_Username"] = "";
//session_destroy();

wp_logout();

header("Location:index.php");
?>
