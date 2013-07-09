<?php
include("include/dbconnect.php");
include("include/constants.php");
require('blog/wp-blog-header.php');

    if($_GET['log']=="out")
	{
		  $expdate=time()-(3600*24*3);
		  setcookie("login","auto",$expdate);
	 }

	// This doesn't work
	// if($_COOKIE['login']=="auto")
	// {
	// 	header("Location:index.php");
	// }

	if(isset($_POST['login_x']))
	{
		// extract($_POST);
		$username = $_POST['username'];
		$pass = $_POST['password'];
		$objResult= mysql_query("SELECT * FROM `tbl_cycling_membernew` WHERE `varUsername` = '$username' AND `varPassword` = '$pass'");

		$flag= "error";

		if (mysql_num_rows($objResult) != 0)
		{
			$objUserdetails = mysql_fetch_array($objResult);

			if ($objUserdetails['activeid'] == "yes")
			{
				$flag= "success";
			}
			else
			{
				$flag= "notactive";
			}
		}
		if ($flag == "success")
		{
			$intmemberid 	= $objUserdetails['intmemberid'];
			$varUsername 	= $objUserdetails['varUsername'];

			// Set Admin Session
			session_start();
			$_SESSION["Session_UserId1"] 	= $intmemberid;

			$_SESSION["Session_Username1"] 	= $varUsername;


			//Remember me

			if($rme=="rme")
			{
				$expdate=time()+(3600*24*3);
				setcookie("login","auto",$expdate);
			}
			else
			{
				$expdate=time()-(3600*24*3);
				setcookie("login","auto",$expdate);
			}


			$username1=base64_encode($varUsername);

			// Now attempt to log into Wordpress
			//login, set cookies, and set current user
			wp_login($username, $pass, true);
			wp_setcookie($username, $pass, true);
			wp_set_current_user($user->ID, $user_login);

			?>
			<script type="text/javascript">
			window.location.href="index.php?user=<?php echo $username1; ?>";
			</script>
			<?php
		}
		else
		{
			header("Location:login.php?flag=$flag");
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Easy Riders-Login</title>
<link href="images/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="/favicon new.ico" type="image/x-icon">
<link rel="icon" href="/favicon new.ico" type="image/x-icon">
<script src="images/galleryscript.js" type="text/javascript"></script>

  <link id='theme' rel='stylesheet' href='/humane-themes/bold-dark.css'/>
      <script src='/humane.js'></script>


</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
        <td><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="images/midpage_top.png" width="998" height="20" /></td>
          </tr>
          <tr>
            <td class="page_mid"><table width="990" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="240" valign="top"><?php include("sidebar.php"); ?></td>
                <td width="10">&nbsp;</td>
                <td width="700" valign="top"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
				  	   <?php
		$sel_img=mysql_query("select * from tbl_cycling_adminprofile");
		$fet_img=mysql_fetch_array($sel_img);


		?>


					<td class="head_big"><span style="font-size: 20px; font-weight:bold;"><big><?php echo $fet_img['loginpage'];?></big></span></td>



<!--                    <td class="head_big">Member Area</td>
-->                  </tr>

                                    <tr>
                                      <td class="body_style">&nbsp;</td>
                                    </tr>



								<?php
									$flag = $_REQUEST['flag'];
									$err_msg = "";
									if ($flag == "error")
									{
										$err_msg = "Please enter valid Username & Password";
									}
									else if ($flag == "notactive")
									{
										$err_msg = "You need to click the link in the registration email to activate your id";
									}
									if($err_msg != "")
									{
								?>
                                   	<tr>
										<td colspan="2" align="center" style="color:#000033; font-weight:bold; font-size:18px;"><?php echo $err_msg; ?></td>
									</tr>
									<tr><td>&nbsp;</td></tr>
								<?php } ?>



                                    <tr>
                                      <td class="body_style"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                                        <tr>
                                          <td><table width="350" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td width="8"><img src="images/side_1.png" width="8" height="8" /></td>
                                              <td class="side_top"></td>
                                              <td width="8"><img src="images/side_2.png" width="8" height="8" /></td>
                                            </tr>
                                            <tr>
                                              <td width="8" class="side_left"></td>
                                              <td bgcolor="#FFFFFF">



											  	<form  action="" method="post" enctype="multipart/form-data" name="login" onSubmit="return vali();">
											  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td><table border="0" align="left" cellpadding="5" cellspacing="0">

													<tr><td></td></tr>
                                                      <tr>
                                                        <td align="right" class="body_style"><strong>UserName</strong></td>
                                                        <td align="right" class="body_style"><strong>:</strong></td>
                                                        <td><input type="text" name="username" id="textfield" class="text_filed" autocomplete="off" /></td>
                                                      </tr>

                                                      <tr>
                                                        <td align="right" class="body_style"><strong>Password</strong></td>
                                                        <td align="right" class="body_style"><strong>:</strong></td>
                                                        <td><input type="password" name="password" class="text_filed" id="textfield5" autocomplete="off" /></td>
                                                      </tr>
                                                      <tr>
                                                        <td align="right" class="body_style">&nbsp;</td>
                                                        <td align="right" class="body_style">&nbsp;</td>
                                                        <td><input type="checkbox" id="checkbox" name="rme" />
                                                          Remember me</td>
                                                      </tr>
                                                      <tr>
													  <td align="right" class="body_style">&nbsp;</td>
													  <td align="right" class="body_style">&nbsp;</td>
                                                        <td colspan="">&nbsp; <a href="forgotpass.php?page=login" style="text-decoration:none; font-weight:bold;  color:#F64010;">Forgot password?</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><a href="register.php?page=login" style="text-decoration:none;"><span style="color:#F64010;">Register</span></a></strong></td>
                                                      </tr>
                                                      <tr>
                                                        <td align="right" class="body_style">&nbsp;</td>
                                                        <td align="right" class="body_style">&nbsp;</td>
                                                        <td><table border="0" cellspacing="0" cellpadding="3">
                                                            <tr>
                                                              <td><input type="image" src="images/submit.png" width="69" height="29" border="0" name="login" value="login" />                                                              </td>
                                                            </tr>
                                                        </table></td>
                                                      </tr>
                                                    </table></td>
                                                  </tr>

                                                  <tr>
                                                    <td align="center">&nbsp;</td>
                                                  </tr>
                                              </table>

											  </form>

											  </td>
                                              <td width="8" class="side_right"></td>
                                            </tr>
                                            <tr>
                                              <td width="8"><img src="images/side_3.png" width="8" height="8" /></td>
                                              <td class="side_bottom"></td>
                                              <td width="8"><img src="images/side_4.png" width="8" height="8" /></td>
                                            </tr>
                                          </table></td>
                                        </tr>
                                        <tr>
                                          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="23%">&nbsp;</td>
                                              <td width="77%">&nbsp;</td>
                                            </tr>
                                          </table></td>
                                        </tr>
                                        <tr>
                                          <td align="center" class="head_big">&nbsp;</td>
                                        </tr>




                                      </table></td>
                          </tr>
                  <tr>
                    <td align="center"></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                  </tr>



                </table></td>
              </tr>

            </table></td>
          </tr>
          <tr>
            <td><img src="images/midpage_bottom.png" width="998" height="20" /></td>
          </tr>
        </table></td>
      </tr>

    </table></td>
  </tr>
  <tr>
    <td><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
<script type="text/javascript">
function vali()
{


	 if(document.login.username.value=="")
           {
	   	 alert ("Please Enter Username");
		 document.login.username.focus();
			 return false;
		 }
		 if(document.login.password.value=="")
		 {
		 alert("Please Enter Password...!");
		 document.login.password.focus();
		 return false;
		 }
		 return true;
}
</script>
