<?php
include("include/dbconnect.php");
include("include/constants.php");
require('blog/wp-blog-header.php');

$path="deimage1/";
$id=$_REQUEST['id'];

// Grab the terms and ethos from the CMS for display on this page
$selectqrycms="select * from ".CMS." where `varMode` ='ethos'";
$selqrycms=mysql_query($selectqrycms) or die("Error:".mysql_error());
$fetchcms=mysql_fetch_array($selqrycms);
$txtEthos=$fetchcms['txtStatement'];
$selectqrycms="select * from ".CMS." where `varMode` ='terms'";
$selqrycms=mysql_query($selectqrycms) or die("Error:".mysql_error());
$fetchcms=mysql_fetch_array($selqrycms);
$txtTerms=$fetchcms['txtStatement'];


 if(isset($_POST['submit_x']))
 {
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];

	$username=$_POST['username'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];

	$biography=$_POST['biography'];

	$ridingtime=$_POST['ridingtime'];
	$ridename=$_POST['ridename'];
	$oftenrides=$_POST['oftenrides'];
	$biketype=$_POST['biketype'];

	$insurance=$_POST['insurance'];
	$acceptterms=$_POST['acceptterms'];

	$updatedimage=$_POST['updatedimage'];

	$image=$_POST['updatedimage'];

    	// Check if image provided
    	$productimage=$_FILES['updatedimage'];
    	if($productimage['name'] != "")
    	{
    		// Check if file was uploaded ok
    		if( ! is_uploaded_file($_FILES['updatedimage']['tmp_name']) || $_FILES['updatedimage']['error'] !== UPLOAD_ERR_OK)
    		{
		    exit('File not uploaded. Possibly too large.');
    		}

    		// Create image from file
    		switch(strtolower($_FILES['updatedimage']['type']))
    		{
			case "image/pjpeg":
			case "image/jpeg":
			case "image/jpg":
		        $image = imagecreatefromjpeg($_FILES['updatedimage']['tmp_name']);
		        break;
		    case 'image/png':
		    case 'image/x-png':
		        $image = imagecreatefrompng($_FILES['updatedimage']['tmp_name']);
		        break;
		    case 'image/gif':
		        $image = imagecreatefromgif($_FILES['updatedimage']['tmp_name']);
		        break;
		    default:
		        exit('Unsupported type: '.$_FILES['updatedimage']['type']);
    		}

    		// Target dimensions
    		$max_width = 140;
    		$max_height = 150;

    		// Get current dimensions
    		$old_width  = imagesx($image);
    		$old_height = imagesy($image);

    		// Calculate the scaling we need to do to fit the image inside our frame
    		$scale      = min($max_width/$old_width, $max_height/$old_height);

    		// Get the new dimensions
    		$new_width  = ceil($scale*$old_width);
    		$new_height = ceil($scale*$old_height);

    		// Create new empty image
    		$new = imagecreatetruecolor($new_width, $new_height);

    		// Resize old image into new
    		imagecopyresampled($new, $image,
		    0, 0, 0, 0,
		    $new_width, $new_height, $old_width, $old_height);

    	    // Make up a new image name
		$tmpname=$productimage['tmp_name'];
		$size=$productimage['size'];
		$rand=rand(0,100000);
		$imagename=$rand."_".$productimage['name'];
		$tmpname=$path.$imagename;

    		// Catch the imagedata
    		ob_start();
    		imagejpeg($new, $tmpname, 90);
    		$data = ob_get_clean();


    		// Destroy resources
    		imagedestroy($image);
    		imagedestroy($new);

		$upd_img="UPDATE ".MEMBER. " SET `productimage` = '$imagename' WHERE `intmemberid` = '$id'";
		mysql_query($upd_img)or die(mysql_error());

    	}


	if ($acceptterms == 'yes')
	{
		$accepttermsdate = date('Y-m-d H:i:s');
	}
	else
	{
		$accepttermsdate = "0000-00-00 00:00:00";
	}

  	$upd_user="UPDATE ".MEMBER." SET
			`varFirstname`='$firstname',
			`varEmail`='$email',
			`varPhone`='$phone',
			`varUsername`='$username',
			`varPassword`='$password',
			`cpassword`='$cpassword',
	  		`varLastname`='$Lastname',
			`varbiography`='$biography',
			`varridingtime`='$ridingtime',
			`varRidename`='$ridename',
			`varoftenrides`='$oftenrides',
			`varbiketype`='$biketype',
			`varLastname`='$lastname',
			`varInsurance`='$insurance',
			`varAcceptTerms`='$acceptterms',
			`varAcceptTermsDate`='$accepttermsdate'
			 WHERE  `intmemberid`='$id'";
			 //print_r($upd_cat); break;

	$res=mysql_query($upd_user);
	if (!$res) {
		$message  = 'Invalid query: ' . mysql_error() . '\n';
		$message .= 'Whole query: ' . $ins_ev;
		die($message);
	}

	$sel_dis_page=mysql_query("select * from tbl_cycling_membernew where `intmemberid`='$id'");
	$fet_dis_page=mysql_fetch_array($sel_dis_page);

	// Update matching WordPress user
	$WPid = $fet_dis_page['intWPid'];
	if ($WPid > 0)
	{
		wp_update_user( array ( 'ID' => $WPid,
								'user_login' => $username,
								'user_pass' => $password,
								'user_nicename' => $ridename,
								'nickname' => $ridename,
								'display_name' => $ridename,
								'user_email' => $email,
								'first_name' => $firstname,
								'last_name' => $lastname,
								'description' => $biography
								) ) ;
	}
	$flag="success";

    header("Location:editprofile_new.php?flag=success&id=".$id."");
}

$sel_dis_page=mysql_query("select * from tbl_cycling_membernew where `intmemberid`='$id'");
$fet_dis_page=mysql_fetch_array($sel_dis_page);

$productimage = $fetch['productimage'];


?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Sydney Easy Riders-Edit Profile</title>
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
    <td><?php include("header.php"); ?><</td>
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
                    <td class="head_big"><span style="font-size: 20px; font-weight:bold;"><big>Edit Profile</big></span></td>
                  </tr>
				  <tr>
					<td class="body_style">
						<?php echo $txtEthos; ?>
					</td>
				  </tr>

				  <?php if($_REQUEST['flag']=="success"){?>
								<tr>
									<td colspan="2" align="center" style="color:#000033; font-weight:bold; font-size:18px;">Details Saved</td>

									<?php } ?>
								</tr>
								<tr><td>&nbsp;</td></tr>
                                            <tr>
                                      <td class="body_style"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                                        <tr>
                                          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td valign="top">&nbsp;</td>
                                              <td valign="top">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td width="115" valign="top"><table width="150" border="0" align="center" cellpadding="0" cellspacing="0">
                                                <tr>
                                                  <td width="8"><img src="images/side_1.png" width="8" height="8" /></td>
                                                  <td class="side_top"></td>
                                                  <td width="8"><img src="images/side_2.png" width="8" height="8" /></td>
                                                </tr>
                                                <tr>
                                                  <td width="8" class="side_left"></td>
                                                  <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                      <tr>
                                                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                          <tr>
                                                            <td>&nbsp;</td>
                                                          </tr>
                                                          <tr>


								 <td align="center"><img src="deimage1/<?php echo $fet_dis_page['productimage'];?>" width="140" height="150"  class="img_border" title="<?php echo $fetch['varUsername'];?>" alt="<?php echo $fetch['productimage'];?>"/></td>



                                                          </tr>
                                                          <tr>
                                                            <td align="center"><?php echo $fet_dis_page['varUsername'];?></td>
                                                          </tr>
                                                        </table></td>
                                                    </tr>
                                                      <tr>
                                                        <td align="center">&nbsp;</td>
                                                      </tr>
                                                  </table></td>
                                                  <td width="8" class="side_right"></td>
                                                </tr>
                                                <tr>
                                                  <td width="8"><img src="images/side_3.png" width="8" height="8" /></td>
                                                  <td class="side_bottom"></td>
                                                  <td width="8"><img src="images/side_4.png" width="8" height="8" /></td>
                                                </tr>
                                              </table></td>
                                              <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                                                <tr>
                                                  <td><table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                      <td width="8"><img src="images/side_1.png" width="8" height="8" /></td>
                                                      <td class="side_top"></td>
                                                      <td width="8"><img src="images/side_2.png" width="8" height="8" /></td>
                                                    </tr>
                                                    <tr>
                                                      <td width="8" class="side_left"></td>
                                                      <td bgcolor="#FFFFFF">
													    <form action="" method="post" enctype="multipart/form-data" name="register"onSubmit="return validation();">


													  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                          <tr>
                                                            <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">







                                                              <tr>
                                                                <td class="body_style"><strong>First Name</strong></td>
                                                                 <td><input name="firstname" type="text" class="text_filed" id="textfield" value="<?php echo $fet_dis_page['varFirstname'];?>" /></td>
                                                              </tr>
                                                              <tr>
                                                                <td class="body_style"><strong>Last Name</strong></td>
                                                                  <td><input name="lastname" type="text" class="text_filed" id="textfield"  value="<?php echo $fet_dis_page['varLastname'];?>" /></td>
                                                              </tr>
                                                              <tr>
                                                                <td class="body_style"><strong>Ride Name</strong></td>
                                                                 <td><input name="ridename" type="text" class="text_filed" id="textfield" value="<?php echo $fet_dis_page['varRidename'];?>" /></td>
                                                              </tr>
                                                              <tr>
                                                                <td class="body_style"><strong class="body_style">Email Address</strong></td>
                                                                <td><input name="email" type="text" class="text_filed" id="textfield2" value="<?php echo $fet_dis_page['varEmail'];?>" /></td>
                                                              </tr>

															    <tr>
                                                                <td class="body_style"><strong class="body_style">Username</strong></td>
                                                                <td><input name="username" type="text" class="text_filed" id="textfield2" value="<?php echo $fet_dis_page['varUsername'];?>" /></td>
                                                              </tr>
															   <tr>
                                                                <td class="body_style"><strong class="body_style">Password</strong></td>
                                                                <td><input name="password" type="password" class="text_filed" id="textfield2" value="<?php echo $fet_dis_page['varPassword'];?>" /></td>
                                                              </tr>



															    <tr>
                                                                <td class="body_style"><strong class="body_style">Confirm Password</strong></td>
                                                                <td><input name="cpassword" type="password" class="text_filed" id="textfield2" value="<?php echo $fet_dis_page['cpassword'];?>" /></td>
                                                              </tr>


                                                              <tr>
                                                                <td class="body_style"><strong>Mobile Number</strong></td>
                                                                <td><input name="phone" type="text" class="text_filed" id="textfield3" value="<?php echo $fet_dis_page['varPhone'];?>" /></td>
                                                              </tr>

                                                              <tr>
                                                                <td class="body_style"><strong class="body_style">How long Riding</strong></td>
                                                                 <td><input name="ridingtime" type="text" class="text_filed" id="textfield3" value="<?php echo $fet_dis_page['varridingtime'];?>" /></td>
                                                              </tr>
                                                              <tr>
                                                                <td class="body_style"><strong>How Often Rides Per Week</strong></td>
                                                                <td><input name="oftenrides" type="text" class="text_filed" id="textfield3" value="<?php echo $fet_dis_page['varoftenrides'];?>" /></td>
                                                              </tr>
                                                              <tr>
                                                                <td class="body_style"><strong>Type of Bike</strong></td>
                                                                <td><input name="biketype" type="text" class="text_filed" id="textfield3" value="<?php echo $fet_dis_page['varbiketype'];?>"/></td>
                                                              </tr>
															  <tr>
                                                                <td class="body_style"><strong>Biography</strong></td>
                                                                <td><textarea name="biography" cols="45" rows="5" class="text_area" id="textarea"><?php echo $fet_dis_page['varbiography'];?></textarea></td>
                                                              </tr>
															  <tr>
																<td class="body_style"><strong>Upload Profile Photo (150*140)</strong></td>
																<td><input type="file" tabindex="1" maxlength="255" value="" class="text_filed" name="updatedimage" />
															  </tr>

															  <tr><td>&nbsp;</td></tr>
															  <tr><td colspan=3 class="body_style"><?php echo $txtTerms; ?></td></tr>
															  <tr><td>&nbsp;</td></tr>

															  <tr>
																<td align="right" valign="top" class="body_style"><strong>Do you accept the above risk warning?</strong></td>
																<td><select name="acceptterms"><option value="no" selected="selected">no</option><option value="yes">yes</option></select></td>
															  </tr>
															  <tr>
																<td align="right" valign="top" class="body_style"><strong>Do you have public liability insurance for cycling?</strong></td>
																<td><select name="insurance">
																	<option value="no" <?php if ($fet_dis_page['varInsurance'] == "no") { echo 'selected="selected"'; } ?> >no</option>
																	<option value="yes with BNSW" <?php if ($fet_dis_page['varInsurance'] == "yes with BNSW") { echo 'selected="selected"'; } ?> >yes with BNSW</option>
																	<option value="yes with CA" <?php if ($fet_dis_page['varInsurance'] == "yes with CA") { echo 'selected="selected"'; } ?> >yes with CA</option>
																	<option value="yes other" <?php if ($fet_dis_page['varInsurance'] == "yes other") { echo 'selected="selected"'; } ?> >yes other</option>
																	</select>
																</td>
															  </tr>

                                                              <tr>
                                                                <td>&nbsp;</td>
                                                                <td><table border="0" cellspacing="0" cellpadding="3">
                                                                    <tr>
                                                                      <td><input type="image" src="images/submit.png" width="69" height="29" border="0" name="submit" value="submit" /> </td>
                                                                    </tr>
                                                                </table></td>
                                                              </tr>
                                                            </table></td>
                                                          </tr>
                                                          <tr>
                                                            <td align="center">&nbsp;</td>
                                                          </tr>
                                                      </table>
													  </form></td>
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
                                                  <td>&nbsp;</td>
                                                </tr>

                                              </table></td>
                                            </tr>
                                          </table></td>
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
<script type="text/javascript" language="javascript">
		function validation()
		 {


		 if (document.register.firstname.value=='')
		 {
			 alert ("Please Enter Your FirstName");
			 document.register.firstname.focus();
			 return false;
		 }

		 	 if (document.register.lastname.value=='')
		 {
			 alert ("Please Enter Your Lastname");
			 document.register.lastname.focus();
			 return false;
		 }

		   if (document.register.ridename.value=='')
		 {
			 alert ("Please Enter Ridename");
			 document.register.ridename.focus();
			 return false;
		 }





		   var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
          if(!filter.test(document.register.email.value))
          {
	   	 alert ("Please Enter Valid Email Id");
		 document.register.email.focus();
			 return false;
		 }

		 	   if (document.register.username.value=='')
		 {
			 alert ("Please Enter Username");
			 document.register.username.focus();
			 return false;
		 }

		    if (document.register.password.value=='')
		 {
			 alert ("Please Enter Password");
			 document.register.password.focus();
			 return false;
		 }



		    if (document.register.cpassword.value=='')
		 {
			 alert ("Please Enter Confirm Password");
			 document.register.cpassword.focus();
			 return false;
		 }

		    if (document.register.password.value!=document.register.cpassword.value)
		 {
			 alert ("Confirm Password should be same as Password");
			 document.register.cpassword.focus();
			 return false;
		 }

		   if (document.register.phone.value=='')
		 {
			 alert ("Please Enter Mobile number");
			 document.register.phone.focus();
			 return false;
		 }

			 if (isNaN(document.register.phone.value))
		 {
			 alert ("Mobile no Must Be Numeric");
			 document.register.phone.focus();
			 return false;
		 }

		   if (document.register.ridingtime.value=='')
		 {
			 alert ("Please Enter RidingTime");
			 document.register.ridingtime.focus();
			 return false;
		 }

		 if (isNaN(document.register.ridingtime.value))
		 {
			 alert ("Riding Time Must Be Numeric");
			 document.register.ridingtime.focus();
			 return false;
		 }

		   if (document.register.oftenrides.value=='')
		 {
			 alert ("Please Enter OftenRides");
			 document.register.oftenrides.focus();
			 return false;
		 }


		  if (isNaN(document.register.oftenrides.value))
		 {
			 alert ("Often Rides Must Be Numeric");
			 document.register.oftenrides.focus();
			 return false;
		 }

	if (document.register.biketype.value=='')
	{
		 alert ("Please Enter Your BikeType");
		 document.register.biketype.focus();
		 return false;
	}



	if (document.register.biography.value=='')
	{
		 alert ("Please Enter Biography");
		 document.register.biography.focus();
		 return false;
	}


	return true;


}

</script>
