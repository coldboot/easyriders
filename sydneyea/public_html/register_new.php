<?php
include("include/dbconnect.php");
include("include/constants.php");
require('blog/wp-blog-header.php');

$path="deimage1/";
$flag="";

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
    $firstname=htmlspecialchars($_POST['firstname'], ENT_QUOTES);
    $lastname=htmlspecialchars($_POST['lastname'], ENT_QUOTES);
    $email=htmlspecialchars($_POST['email'], ENT_QUOTES);
    $phone=htmlspecialchars($_POST['phone'], ENT_QUOTES);

    $username=htmlspecialchars($_POST['username'], ENT_QUOTES);
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    $biography=htmlspecialchars($_POST['biography'], ENT_QUOTES);
    $ridingtime=htmlspecialchars($_POST['ridingtime'], ENT_QUOTES);
    $ridename=htmlspecialchars($_POST['ridename'], ENT_QUOTES);
    $oftenrides=htmlspecialchars($_POST['oftenrides'], ENT_QUOTES);
    $biketype=htmlspecialchars($_POST['biketype'], ENT_QUOTES);
    $acceptterms=$_POST['acceptterms'];
    $insurance=$_POST['insurance'];
    $flag= "error";

    // Check if image provided
    $productimage=$_FILES['image'];
    if($productimage['name'] != "")
    {
    	// Check if file was uploaded ok
    	if( ! is_uploaded_file($_FILES['image']['tmp_name']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK)
    	{
	    	exit('File not uploaded. Possibly too large.');
    	}

    	// Create image from file
    	switch(strtolower($_FILES['image']['type']))
    	{
        case "image/pjpeg":
        case "image/jpeg":
        case "image/jpg":
	        $image = imagecreatefromjpeg($_FILES['image']['tmp_name']);
	        break;
	    case 'image/png':
	    case 'image/x-png':
	        $image = imagecreatefrompng($_FILES['image']['tmp_name']);
	        break;
	    case 'image/gif':
	        $image = imagecreatefromgif($_FILES['image']['tmp_name']);
	        break;
	    default:
	        exit('Unsupported type: '.$_FILES['image']['type']);
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
		$imagepath=$path.$imagename;

    	// Catch the imagedata
    	ob_start();
    	imagejpeg($new, $imagepath, 90);
    	$data = ob_get_clean();


    	// Destroy resources
    	imagedestroy($image);
    	imagedestroy($new);

    }
    else
    {
		$imagename="images.jpeg";
    }


    $sel_cat="SELECT * FROM ".MEMBER." WHERE `varUsername`='$username'";
    $res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());
    $num_cat = (int) mysql_num_rows($res_cat);

    if($num_cat > 0)
	{
		$errormsg = "Username already regsitered";
	}
	else
    {
		// Create the WP user first and get the wp_user_id
		// $wp_user_id = wp_create_user( $username, $password, $email );
		$wp_user_id = wp_insert_user( array ('user_login' => $username,
											 'user_pass' => $password,
											 'user_nicename' => $ridename,
											 'nickname' => $ridename,
											 'display_name' => $ridename,
											 'user_email' => $email,
											 'first_name' => $firstname,
											 'last_name' => $lastname,
											 'description' => $biography
											 ) ) ;
		if (is_wp_error($wp_user_id))
		{
			$errormsg = "Failed to create user: ";
			$errormsg .= $wp_user_id->get_error_message();
		}
		else
		{
			$timenow = date('Y-m-d H:i:s');
			$ins_user="INSERT INTO ".MEMBER.
						 "(`intWPid`, `varFirstname`,`varLastname`,`varEmail`,`varPhone`,`varStatus`,`productimage`,`varbiography`,`varridingtime`,`varRidename`,`varoftenrides`,`varbiketype`,`varUsername`,`varPassword`,`cpassword`,`activeid`,`varRegoDate`,`varAcceptTerms`,`varAcceptTermsDate`, `varInsurance`) VALUES
						  ('$wp_user_id', '$firstname','$lastname','$email'  ,'$phone'  ,'Active'   ,'$imagename'  ,'$biography'  ,'$ridingtime'  ,'$ridename'  ,'$oftenrides'  ,'$biketype'  ,'$username'  ,'$password'  ,'$cpassword','no'     ,'$timenow'   ,'$acceptterms'   ,'$timenow'          , '$insurance')";
			$res = mysql_query($ins_user);
			if (!$res) {
				$errormsg  = "Failed to create user\n";
				$errormsg .= 'Invalid query: ' . mysql_error() . '\n';
				$errormsg .= 'Whole query: ' . $ins_user;
			}
			else
			{
				$insert_id=mysql_insert_id();

				$link = 'http://'.$_SERVER['SERVER_NAME'].'/index.php?activeid='.base64_encode($insert_id);
				$message='<table border="0" cellpadding="0" border="0">
				<tr><td style="color:#FF0000"><b>Thank you for registering at the Sydney Easy Riders website</b></td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td><b>Login Details</b></td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td> UserName : '.$username.'</td></tr>
				<tr><td> Password : '.$password.'</td></tr>
				<tr><td>Please click the activation link to complete your registration: <a href="'.$link.'" target=\"_blank\">'.$link.'</a></td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td> '.$txtEthos.'</td></tr>
				<tr><td> '.$txtTerms.'</td></tr>
				</table>';


				/* $sel_adm=mysql_query("select * from tbl_cycling_adminprofile");
				   $fet_adm=mysql_fetch_array($sel_adm);*/

				$email11="registration@sydney-easy-riders.com.au";
				$subject = "Web account details for Sydney Easy Riders";
				$headers = "From: ".$email11."\r\n";
				$headers .= "Reply-To: ".$email11."\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				mail($email,$subject,$message,$headers);

				/* Let the administrators know */
				$sel_adm=mysql_query("select * from tbl_cycling_adminprofile");
				$fet_adm=mysql_fetch_array($sel_adm);
				$emailadmin=$fet_adm['varEmail'];
				$subject = "New account registered on Sydney Easy Riders";
				$message='<table border="0" cellpadding="0" border="0">
				<tr><td>Details</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td> Firstname : '.$firstname.'</td></tr>
				<tr><td> Lastname : '.$lastname.'</td></tr>
				<tr><td> Ride Name : '.$ridename.'</td></tr>
				<tr><td> Email : '.$email.'</td></tr>
				<tr><td> Phone : '.$phone.'</td></tr>
				<tr><td> Insurance : '.$insurance.'</td></tr>
				<tr><td> Accepted Terms : '.$acceptterms.'</td></tr>
				<tr><td valign="top"> Biography : '.$biography.'</td></tr>
				<tr><td> Riding Time : '.$ridingtime.'</td></tr>
				<tr><td> How often rides : '.$oftenrides.'</td></tr>
				<tr><td> Bike type : '.$biketype.'</td></tr>
				<tr><td valign="top"> Image : <img src="http://'.$_SERVER['SERVER_NAME'].'/'.$imagepath.'" height="'.$new_height.'" width="'.$new_width.'" alt="rider image"></td></tr>
				<tr><td>  </td></tr>
				</table>';
				mail($emailadmin,$subject,$message,$headers);

				/* but assume succcess */
				$flag="success";
    			// header("Location:register.php?flag=$flag");
			}
		}
    }
} // if POST

?>

<script>
function imposeMaxLength(fld,len)
{
	if(fld.value.length > len) { alert("You Reached Maximum Character Limit"); fld.value = fld.value.substr(0,len-1); }
}</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Easy Riders-Register</title>
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
            <td class="page_mid">
            <table width="990" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="240" valign="top"><?php include("sidebar.php"); ?></td>
                <td width="10">&nbsp;</td>
                <td width="700" valign="top">
                <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>

				  	   <?php
						$sel_img=mysql_query("select * from tbl_cycling_adminprofile");
						$fet_img=mysql_fetch_array($sel_img);
					   ?>
					<td class="head_big"><span style="font-size: 20px; font-weight:bold;"><big><?php echo $fet_img['registerpage'];?></big></span></td>
                  <!--  <td class="head_big">Register with Easy Riders</td>-->
                  </tr>
                  <tr>
                  	<td class="body_style">
                  		<?php echo $txtEthos; ?>
                  	</td>
                  </tr>
				  <tr><td>&nbsp;</td></tr>
                    <?php if($flag=="success"){?>
						<tr>
							<td align="center" style="color:#000033; font-weight:bold; font-size:18px;">Registeration Successfull.<br>Please click the link in the email to activate your account.</td>
						</tr>
						<tr><td>&nbsp;</td></tr>
					<?php } else if($flag=="error"){
					?>
						<tr>
							<td align="center" style="color:#FF0000; font-weight:bold; font-size:18px;"><?php echo $errormsg; ?></td>
						</tr>
						<tr><td>&nbsp;</td></tr>
					<?php } else if($flag=="img"){ ?>
						<tr>
							<td align="center" style="color:#FF0000; font-weight:bold; font-size:18px;">Upload Profile Photo Within The Limit</td>
						</tr>
						<tr><td>&nbsp;</td></tr>
					<?php }?>

                                    <tr>
                                      <td class="body_style">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="body_style"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                                        <tr>
                                          <td><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td width="8"><img src="images/side_1.png" width="8" height="8" /></td>
                                              <td class="side_top"></td>
                                              <td width="8"><img src="images/side_2.png" width="8" height="8" /></td>
                                            </tr>




                                            <tr>
                                              <td width="8" class="side_left"></td>
                                              <td bgcolor="#FFFFFF">

							    <form action="" method="post" enctype="multipart/form-data" name="register" onSubmit="return ValidateRego();">

											  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                  <td valign="top">
                                                    <table width="100%" border="0" align="left" cellpadding="5" cellspacing="0">
                                                      <tr>
                                                        <td align="right" class="body_style"><strong>First Name&nbsp;<span style="color:#FF0000; font-weight:bold;">*</span></strong></td>
                                                        <td align="right" class="body_style"><strong>:</strong></td>
                                                        <td><input name="firstname" type="text" class="text_filed" id="textfield" /></td>
                                                      </tr>
													  <tr>
                                                        <td align="right" class="body_style"><strong>Last Name&nbsp;<span style="color:#FF0000; font-weight:bold;">*</span></strong></td>
                                                        <td align="right" class="body_style"><strong>:</strong></td>
                                                        <td><input name="lastname" type="text" class="text_filed" id="textfield" /></td>
                                                      </tr>
												      <tr>
                                                        <td align="right" class="body_style"><strong>Ride Name&nbsp;<span style="color:#FF0000; font-weight:bold;">*</span></strong></td>

                                                        <td align="right" class="body_style"><strong>:</strong></td>
                                                        <td><input name="ridename" type="text" class="text_filed" id="textfield" /></td>
                                                      </tr>
                                                      <tr>
                                                        <td align="right" class="body_style"><strong>E-mail address&nbsp;<span style="color:#FF0000; font-weight:bold;">*</span></strong></td>
                                                        <td align="right" class="body_style"><strong>:</strong></td>
                                                        <td><input name="email" type="text" class="text_filed" id="textfield2" /></td>
                                                      </tr>
													  <tr>
                                                        <td align="right" class="body_style"><strong>Username&nbsp;<span style="color:#FF0000; font-weight:bold;">*</span></strong></td>
                                                        <td align="right" class="body_style"><strong>:</strong></td>
                                                        <td><input name="username" type="text" class="text_filed"  autocomplete="off" id="textfield2" /></td>
                                                      </tr>
													   <tr>
                                                        <td align="right" class="body_style"><strong>Password&nbsp;<span style="color:#FF0000; font-weight:bold;">*</span></strong></td>
                                                        <td align="right" class="body_style"><strong>:</strong></td>
                                                        <td><input name="password" type="password" autocomplete="off" class="text_filed" id="textfield2" /></td>
                                                      </tr>
													  <tr>
                                                        <td align="right" class="body_style"><strong>Confirm Password&nbsp;<span style="color:#FF0000; font-weight:bold;">*</span></strong></td>
                                                        <td align="right" class="body_style"><strong>:</strong></td>
                                                        <td><input name="cpassword" type="password" class="text_filed" id="textfield2" /></td>
                                                      </tr>
                                                      <tr>
                                                        <td align="right" class="body_style"><strong>Mobile Number&nbsp;<span style="color:#FF0000; font-weight:bold;">*</span></strong></td>
                                                        <td align="right" class="body_style"><strong>:</strong></td>
                                                        <td><input name="phone" type="text" class="text_filed" id="textfield3" /></td>
                                                      </tr>
													  <tr>
                                                        <td align="right" class="body_style"><strong>How Long Riding&nbsp;(Years)</strong></td>
                                                        <td align="right" class="body_style"><strong>:</strong></td>
                                                        <td><input name="ridingtime" type="text" class="text_filed" id="textfield3" /></td>
                                                      </tr>
												      <tr>
                                                        <td align="right" class="body_style"><strong>How Often Rides Per Week&nbsp;<span style="color:#FF0000; font-weight:bold;">*</span></strong></td>
                                                        <td align="right" class="body_style"><strong>:</strong></td>
                                                        <td><input name="oftenrides" type="text" class="text_filed" id="textfield3" /></td>
                                                      </tr>
													  <tr>
                                                        <td align="right" class="body_style"><strong>Type of Bike&nbsp;<span style="color:#FF0000; font-weight:bold;">*</span></strong></td>
                                                        <td align="right" class="body_style"><strong>:</strong></td>
                                                        <td><input name="biketype" type="text" class="text_filed" id="textfield3" /></td>
                                                      </tr>
                                                      <tr>
                                                        <td align="right" valign="top" class="body_style"><strong>Upload Profile Photo</strong>&nbsp;<strong><span style="color:#FF0000; font-weight:bold;">*</span></strong></td>
                                                        <td align="right" valign="top" class="body_style"><strong>:</strong></td>
                                                        <td><input type="file" tabindex="1" maxlength="255" value="" class="field text small" name="image" /><br /><span class="body_style">(Please Upload 150*140 image)</span><td>
													  </tr>
													  <tr>
                                                        <td align="right" valign="top" class="body_style"><strong>Biography</strong>&nbsp;<strong><span style="color:#FF0000; font-weight:bold;">*</span></strong></td>
                                                        <td align="right" valign="top" class="body_style"><strong>:</strong></td>
                                                        <td><textarea name="biography" cols="45" rows="5" class="text_area" id="textarea" onKeyPress="imposeMaxLength(this,1200);"></textarea><br /><span class="body_style">(Maximum 1200 Characters)</span></td>
                                                      </tr>

													  <tr><td>&nbsp;</td></tr>

													  <tr><td colspan=3 class="body_style"><?php echo $txtTerms; ?></td></tr>

													  <tr><td>&nbsp;</td></tr>

													  <tr>
                                                        <td align="right" valign="top" class="body_style"><strong>Do you accept the above risk warning?</strong>&nbsp;<strong><span style="color:#FF0000; font-weight:bold;">*</span></strong></td>
                                                        <td align="right" valign="top" class="body_style"><strong>:</strong></td>
                                                        <td><select name="acceptterms"><option value="no" selected="selected">no</option><option value="yes">yes</option></select></td>
                                                      </tr>

													  <tr>
                                                        <td align="right" valign="top" class="body_style"><strong>Do you have public liability insurance for cycling?</strong>&nbsp;<strong><span style="color:#FF0000; font-weight:bold;">*</span></strong></td>
                                                        <td align="right" valign="top" class="body_style"><strong>:</strong></td>
                                                        <td><select name="insurance">
                                                        	<option value="no" selected="selected">no</option>
                                                        	<option value="yes with BNSW">yes with BNSW</option>
                                                        	<option value="yes with CA">yes with CA</option>
                                                        	<option value="yes other">yes other</option>
                                                        	</select>
                                                        </td>
                                                      </tr>



                                                      <tr>
                                                        <td align="right" valign="top" class="body_style">&nbsp;</td>
                                                        <td align="right" valign="top" class="body_style">&nbsp;</td>
                                                        <td><table border="0" cellspacing="0" cellpadding="3">
                                                          <tr>
                                                            <td>
																<input type="image" src="images/submit.png" width="69" height="29" border="0" name="submit" value="submit" />
															</td>

                                                          </tr>


                                                        </table></td>
                                                      </tr>
													  <tr><td style="color:#FF0000; font-size:12px;">
								  * Indicates Required Information
				  </div></td></tr>
                                                    </table></td>
                                                  </tr>
                                                  <tr>
                                                    <td align="center">&nbsp;</td>
                                                  </tr>
                                              </table></form></td>
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
      </tr><strong></strong>

    </table></td>
  </tr>
  <tr>
    <td><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
<script type="text/javascript" language="javascript">
function ValidateRego()
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
		alert ("Please Enter A Ride Name - this is used to identify you on the site. You can change it later when you get a proper ER ride name");
		document.register.lastname.focus();
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


	<?php
	if($intmemberid=='') { ?>
		 if (document.register.productimage.value=='')
	 {
		 alert ("Please Upload Image");
		 document.register.productimage.focus();
		 return false;
	}
	<?php } ?>

	if (document.register.biography.value=='')
	{
		 alert ("Please Enter Biography");
		 document.register.biography.focus();
		 return false;
	}

	if (document.register.acceptterms.value!='yes')
	{
		 alert ("You must accept the risk warning to register");
		 document.register.acceptterms.focus();
		 return false;
	}

	return true;


}

</script>

