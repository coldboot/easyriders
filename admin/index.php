<?php

/*****************************************************************************

 * Website: SHOPPING COMPARISON

 * Admin login Page

 *developed on 11/02/2010

 ****************************************************************************/



	//Include Database Connection

	include("../include/dbconnect.php");

	//Include Constants

	include("../include/constants.php");



		if(isset($_POST["login"]))

		{

			extract($_POST);

			//echo $sel="SELECT * from ".ADMINPROFILE." WHERE `varUserName` = '$txtUsername' and `varPassword`='$txtPassword'";break;

			$objResult = mysql_query("SELECT * from ".ADMINPROFILE." WHERE `varUserName` = '$txtUsername' and `varPassword`='$txtPassword'") or die ("Error:".mysql_error());

			

			if (mysql_num_rows($objResult) != 0) 

			{

				

				$objUserdetails = mysql_fetch_array($objResult);

				

				$intUserId 		= $objUserdetails['intAdminId'];

				$strUserName 	= $objUserdetails['varUserName'];

				

				// Set Admin Session				

				session_start();

				$_SESSION["Session_UserId"] 	= $intUserId;

				$_SESSION["Session_Username"] 	= $strUserName;

				

				header("Location:adminsettings/index.php");

			}

			else

			{

				

				header("Location:index.php?log=error");

			}

		

		}



?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />

	<title><?php echo $varHomePage ;?></title>

	<link href="../include/style.css" rel="stylesheet" media="all" />

	<link href="../css/ie7.css" rel="stylesheet" media="all" />

	<link href="../css/ie6.css" rel="stylesheet" media="all" />	

	<link href="" rel="stylesheet" title="style" media="all" />

	

	<link rel="shortcut icon" href="/favicon new.ico" type="image/x-icon">

<link rel="icon" href="/favicon new.ico" type="image/x-icon">



	<script type="text/javascript" src="../js/jquery-1.3.2.js"></script>

	<script type="text/javascript" src="../js/superfish.js"></script>

	<script type="text/javascript" src="../js/jquery-ui-1.7.2.js"></script>

	<script type="text/javascript" src="../js/tooltip.js"></script>

	<script type="text/javascript" src="../js/cookie.js"></script>

	<script type="text/javascript" src="../js/custom.js"></script>

<script type="text/javascript">

function login_validation()

{

var txtUsername = document.Login.txtUsername.value;

var txtPassword = document.Login.txtPassword.value;



if(txtUsername=="")

{

alert("Please Enter Your User Name");

document.Login.txtUsername.focus();

return false;

}



if(txtPassword=="")

{

alert("Please Enter Your Password ");

document.Login.txtPassword.focus();

return false;

}

return true;

}

</script>	

</head>

<body>

	

	

	<div><a href="index.php"><center><img src="/images/logo.png" width="350" height="74" border="0" align="middle" style="padding-top:40px;"/></center></a></div>

	

	<div id="welcome_login" title="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome to Sydney Easy Riders Admin Panel" style="height:200px;">                                                            

		<?php if($_GET['log'] == "error"){ ?><div class="response-msg error ui-corner-all">Invalid Login!</div><?php } ?>

			<?php if($_GET['log'] == ""){ ?><div class="response-msg inf ui-corner-all" style="padding-left:65px;">Enter Your User Name & Password</div><?php } ?>

	<form action="" method="post" enctype="multipart/form-data" class="forms" name="Login" id="Login" onSubmit="return login_validation();" >

		<ul>

		

			<li>

				<label for="email" class="desc">User Name:</label>

				<div><input type="text" tabindex="1" maxlength="255" class="field text full" name="txtUsername" id="txtUsername" />	</div>

			</li>

			

			<li>

				<label for="password" class="desc">Password:</label>

				<div><input type="password" tabindex="1" maxlength="255" class="field text full" name="txtPassword" id="txtPassword" /></div>

			</li>

			

			<li><div><center><input type="submit" name="login" value="Login"  class="loginbutton"/ ></center></div></li>

		

		</ul>

	</form>

	</div>

	

</body>

</html>

