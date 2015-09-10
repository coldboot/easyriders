<?php
include("include/dbconnect.php");
include("include/constants.php");

/*session_start();
 $user=$Session_email;
 
     if(isset($_POST["update_x"]))
	{
		$newsec	      = $_POST['newsec'];
		$secans	      = $_POST['secans'];
		$cpass=$_POST['cpass'];
		$repass=$_POST['repass'];
		$SelectQuery  = "SELECT * FROM ".REGISTER." WHERE `password`='$cpass' ";
		 $Result		  = mysql_query($SelectQuery);
		  $Count		  = mysql_num_rows($Result);
		/*<!--$Fetch		  = mysql_fetch_array($Result);
		echo $User_Id	  = $Fetch['Rid'];break;-->*/
		/*  if($Count != 0)
 		 {*/
			//$npassword = $_POST['npassword'];
			
	/*	 $UpdateUserQry = "update ".REGISTER." set `securityques` = '$newsec',`answer` = '$secans',`password` = '$cpass',`password1` = '$repass',   WHERE  `email`='$user'" ;
			$UpdateUserRes = mysql_query($UpdateUserQry) or die("Error in updation:".mysql_error());
			header("Location:password.php?logg=succ");
			}
			else
			{
			header("Location:password.php?logg=err");
			}
	 }*/
	
$sel="select * from tbl_gigband_plan order by intid";
$res=mysql_query($sel);



if(isset($_POST['send_x']))
{
$name=$_POST['planname'];

$duration=$_POST['duration'];

$msg=$_POST['message'];
$price=$_POST['price'];


 	$content='<table width="480" height="100" border="0">
  <tr>
    <td style="font:"Courier New", Courier, monospace; color:#990000; font-size: 24px; font-weight:bolder;" valign="top" ><center>
      <h2>LICENSE DETAILS</h2>
    </center></td>
  </tr>
   
  <tr><td height="5">&nbsp;</td></tr>
  
 
 <tr><td><table width="80%" align="center">
 <tr>
   <td width="45%" align="right" style="color:#660033; font-weight:bold;"> Plan Name</td>
   <td>&nbsp;</td><td width="45%" align="left" style="color:#660033; font-weight:bold;"> '."$name".'</td>
 </tr>
 
 <tr><td colspan="3">&nbsp;</td></tr>
 
 <tr>
   <td width="45%" align="right" style="color:#660033; font-weight:bold;">Duration</td>
   <td>&nbsp;</td><td width="45%" align="left" style="color:#660033; font-weight:bold;"> '."$duration".'</td>
 </tr>
 
 <tr><td colspan="3">&nbsp;</td></tr>

 <tr>
	   <td width="45%" align="right" style="color:#660033; font-weight:bold;">Price </td>
   <td>&nbsp;</td><td width="45%" align="left" style="color:#660033; font-weight:bold;"> '."$price".'</td>
 </tr>
 
 <tr><td colspan="3">&nbsp;</td></tr>
 
 <tr>
    <td>&nbsp;</td></tr></table>';
	
	
	   $message= '<table cellspacing="1" cellpadding="1" border="0" width="100%">
              <tr bgcolor="#eeeeee">
              <td style="font-family:Verdana, Arial; font-size:11px; color:#333333;">'."$content".'</td>
              </tr>
              </table>';
	
	
	 $email="rajalakshmi@websolusionz.com";
	 $mail="johnpeter@websolusionz.com";
	
//$email="wmcnally@anchorbrokerage.com";
	
	$subject = "LIcense Details";
	
	$headers = "From: ".$mail."\r\n";

	$headers .= "Reply-To: ".$mail."\r\n";

	$headers .= "MIME-Version: 1.0\r\n";
	
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	mail($email,$subject,$message,$headers);
	//header("location:contact.php?log=msg");
	
//	echo '<script type="text/javascript">
//window.location.href="location:contact.php?log=msg";

		
}

				
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome</title>
<link href="images/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="135" valign="top" class="top_bg"><?php include("header.php"); ?><!--<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td width="365"><a href="index.php"><img src="images/logo.png" width="365" height="52" border="0"  alt="" title=""/></a></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </table></td>
                <td valign="top"><table width="100" border="0" align="right" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="5"></td>
                    </tr>
                    <tr>
                      <td><table width="304" border="0" align="center" cellpadding="0" cellspacing="0" class="box">
                          <tr>
                            <td width="54" class="body_style">Search</td>
                            <td width="193"><input name="textfield" type="text" class="text_filed" id="textfield" /></td>
                            <td width="56" align="left"><a href="#"><img src="../demoyoulicense/demo1/images/go.png" width="40" height="22" border="0"  title="" alt=""/></a></td>
                          </tr>
                          <tr>
                            <td colspan="3" class="body_style"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="32"><img src="shopping_cart.png" width="30" height="26" /></td>
                                  <td>Now Your Cart IS 0 items</td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td colspan="2" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><div id="menu1">
                          <ul>
                            <li><a href="index.php" class="current"> Home</a></li>
                            <li><a href="#"> I&nbsp;need&nbsp;music </a></li>
                            <li><a href="#">I&nbsp;offern&nbsp;music </a></li>
                            <li><a href="#">Labels&nbsp;&&nbsp;publishers</a></li>
                            <li><a href="#">Play&nbsp;Lists</a></li>
                          </ul>
                        </div></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td height="282" valign="top" class="top_banner"><table width="460" border="0" align="left" cellpadding="0" cellspacing="0">
              <tr>
                <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td valign="top" class="top_box1"><table width="190" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="5" colspan="2" valign="middle" class="small_head"></td>
                          </tr>
                          <tr>
                            <td colspan="2" valign="middle" class="small_head">Looking for music to licence</td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="body_style">Licence music for your TV, Documentary, Film, Advert, Mobile, Website, etc. Search here and find the music you want to license right now.</td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td class="small_head">Find music</td>
                            <td align="right"><img src="images/arrow.png" width="19" height="18" /></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
                <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td valign="top">&nbsp;</td>
                    </tr>
                    <tr>
                      <td valign="top">&nbsp;</td>
                    </tr>
                    <tr>
                      <td valign="top" class="top_box2"><table width="190" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td height="5" colspan="2" valign="middle" class="small_head"></td>
                          </tr>
                          <tr>
                            <td colspan="2" valign="middle" class="small_head">Want to licence your music</td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2" class="body_style1">Whether your a Band,Artists, Songwriter, Label , if you are the owner of the copyright to your music, you can join free now and start earning money licencing your music.</td>
                          </tr>
                          <tr>
                            <td  colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td height="26" colspan="2"></td>
                          </tr>
                          <tr>
                            <td class="small_head">Find Music</td>
                            <td align="right"><img src="images/arrow.png" width="19" height="18" /></td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
		-->
		
        <tr>
          <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center"></td>
              </tr>
              <tr>
                <td><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
				  
				  
				  
				  
				  </td>
              </tr>
              <tr>
                <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="217" valign="top"><table width="217" border="0" align="right" cellpadding="0" cellspacing="0">
                          <tr>
                            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td class="left_top"><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td width="30"><img src="images/icon1.png" width="25" height="28" /></td>
                                      <td class="small_head">My account</td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td valign="top" bgcolor="#1a3340"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                      <td height="5"></td>
                                    </tr>
                                    <tr>
                                      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td class="box1"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td class="categorylist"><ul>
                                                     <li><a href="details.php">My Details</a></li>
                                                        <li><a href="company.php">Company Information</a></li>
                                                        <li><a href="artists.php">My Artists</a></li>
                                                        <li><a href="viewcart1.php">My Albums</a></li>
														<li><a href="viewsong1.php">Songs</a></li>
                                                        <li><a href="change.php">Change Password</a></li>
                                                        <li><a href="password.php">Password Reminder</a></li>
                                                        <li><a href="feedback.php">Feedback</a></li>
                                                        <li><a href="contracts.php">My Contracts</a></li>
                                                        <li><a href="billingdetails.php">Billing Details</a></li>
                                                        <li><a href="newflash.php">Newsflash</a></li>
                                                        <li><a href="subscription.php">My Subscription</a></li>
                                                        <li><a href="mp3sales.php">MP3 Sales Report</a></li>
                                                        
                                                  </ul></td>
                                                </tr>
                                            </table></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                    <tr>
                                      <td height="10"></td>
                                    </tr>
                                </table></td>
                              </tr>
                            </table></td>
                          </tr>
                        </table></td>
                      <td width="15">&nbsp;</td>
                      <td width="750" valign="top"><!--paly list start -->
                        <table width="760" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="title"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><img src="images/icon1.png" width="25" height="28" alt="" title="" style="vertical-align:middle;" />License Details</td>
                                  <td width="300" align="right" style="padding-right:10px;">&nbsp;</td>
                                </tr>
                              </table></td>
                          </tr>
                        
                          <tr>
                            <td valign="top">&nbsp;</td>
                          </tr>
                          <tr>
                            <td valign="top">
							
							<form action="" method="post" enctype="multipart/form-data">
							<table width="90%" border="0" align="center" cellpadding="3" cellspacing="0" class="body_style6">
                              <tr>
							  <th align="left">DURATION</th>
							  <th align="left">PLAN NAME</th>
							  <th align="left">PRICE</th>
							  </tr>
							  <?php
							  $i=0;
							  while($fet=mysql_fetch_array($res)) {
							  $i++; 
							  
							  ?>
                          
<?php if($fet['Duration']==7) { ?>	<tr><td><input type="radio"  value="one week" name="duration"/> A WEEK</td><td><?php echo $fet['planname']; ?> </td><td><?php echo $fet['planprice']; ?></td></tr> <?php } ?>
	<?php if($fet['Duration']==30) { ?><tr><td><input type="radio"  value="one month" name="duration"/> ONE MONTH</td><td><?php echo $fet['planname']; ?></td> <td><?php echo $fet['planprice']; ?></td></tr><?php } ?>
<?php if($fet['Duration']==90) { ?><tr>   <td><input type="radio" value="three month"  name="duration"/> THREE MONTHS </td> <td><?php echo $fet['planname']; ?></td><td><?php echo $fet['planprice']; ?></td></tr> <?php } ?>
<?php if($fet['Duration']==150) { ?><tr>	<td><input type="radio" value="five month"  name="duration"/> FIVE MONTHS</td> <td><?php echo $fet['planname']; ?> </td><td><?php echo $fet['planprice']; ?></td></tr><?php } ?>
<?php if($fet['Duration']==365) { ?><tr>	<td><input type="radio"  value="one year" name="duration"/> ONE YEAR</td> <td> <?php echo $fet['planname']; ?></td><td><?php echo $fet['planprice']; ?></td></tr><?php } ?>
<?php if($fet['Duration']==730) { ?>	<tr><td><input type="radio"  value="two years"name="duration"/> TWO YEARS</td> <td><?php echo $fet['planname']; ?> </td><td><?php echo $fet['planprice']; ?></td></tr><?php } ?>
<?php if($fet['Duration']==1725) { ?><tr>	<td><input type="radio" value="three years"  name="duration"/>THREE YEARS</td><td> <?php echo $fet['planname']; ?></td> <td><?php echo $fet['planprice']; ?></td>							</tr><?php } ?>
								<!--  <select name="dur">
								  <option value="">CHOOSE</option>
								  <option value="7">A WEEK</option>
								  <option value="30">ONE MONTH</option>
								  <option value="90">THREE MONTHS</option>
								  <option value="150">FIVE MONTHS</option>
								  <option value="365">ONE YEAR</option>
								  <option value="730">TWO YEARS</option>
								  <option value="1725">THREE YEARS</option>
								    </select>-->
                            <!--  <tr>
                                <td><strong>Security Answer</strong></td>
                                <td><input name="secans" type="text" class="text_filed" id="textfield3" /></td>
                              </tr>
							     <tr>
                                <td><strong>Current Password</strong></td>
                                <td><input name="cpass" type="text" class="text_filed" id="textfield4" /></td>
                              </tr>-->
							
							  
							<!--   <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>-->
							  <input type="hidden" value="<?php echo $fet['planname']; ?>" name="planname" />
							  <input type="hidden" value="<?php echo $fet['planprice']; ?>" name="price" />
							   <?php } ?>
							  <tr><td>&nbsp;</td></tr>
                              <tr>
                               <td><strong>Email id</strong></td>
                                <td><input name="mail" type="text" class="text_filed" id="textfield4" /></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td><br />
                                <td><br /><input type="image" src="images/send-but.png" width="77" height="33" name="send" /></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                              </tr>
                            </table></form></td>
                          </tr>
                        </table>
                        <!--paly list end -->
                      </td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php include("footer.php"); ?><!--<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="box3">
        <tr>
          <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center"></td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
              </tr>
              <td align="center"><span class="click"><a href="about.php" class="click">About </a>|</span><a href="contact.php" class="click"> Contact  |</a> <a href="blog.php" class="click">Blog</a> <a href="testimonials.php" class="click">| <span class="click">Testimonials </span></a><a href="contactus.php" class="click"> </a><a href="contact.php" class="click"> | </a><a href="partners.php" class="click">Partners | </a><a href="team.php" class="click">Team | </a><a href="privacypolicy.php" class="click">Privacy Policy | </a><a href="upgrade.php" class="click">Upgrade |</a><a href="#" class="click"> |Twitter </a></td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
              </tr>
              <tr>
                <td align="center" class="footer_text">Copyright &copy; 2010 GigBand.com .  All rights reserved. / <a href="terms-and-conditions.php">Terms and Conditions</a></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table>--></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
