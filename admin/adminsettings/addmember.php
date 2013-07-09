<?php

include('header.php');
$path="../../deimage1/";

$memberid=$_REQUEST['memberid'];

$errormsg = "";
$flag="success";

if(isset($_POST['Add']) || isset($_POST['Update']))
{
    $flag= "error";

	// Copied from register.php - should be in an include file!
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
    $insurance=$_POST['insurance'];
	$insuranceother=htmlspecialchars($_POST['insuranceother'], ENT_QUOTES);

	// extra admin only fields
	$wpid=$_POST['wpid'];
	$memberstatus=$_POST['memberstatus'];
	$activeid=$_POST['activeid'];
	$activeid=$_POST['activeid'];
	$suspendeddate=$_POST['suspendeddate'];
	$resigneddate=$_POST['resigneddate'];
	$paid=$_POST['paid'];
	$paiddate=$_POST['paiddate'];
	$rideroftheweek=$_POST['rideroftheweek'];

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
		$imagename= str_replace(' ', '', $imagename);	// remove any spaces
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
}

if(isset($_POST['Add']))
{
    $sel_cat="SELECT * FROM ".MEMBER." WHERE `varUsername`='$username'";
    $res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());
    $num_cat = (int) mysql_num_rows($res_cat);

    if($num_cat > 0)
	{
		$flag = "error";
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
			$ins_user="INSERT INTO ".MEMBER." SET
					`intWPid`='$wp_user_id',
					`varFirstname`='$firstname',
					`varLastname`='$lastname',
					`varEmail`='$email',
					`varPhone`='$phone',
					`varUsername`='$username',
					`varPassword`='$password',
					`cpassword`='$cpassword',
					`varbiography`='$biography',
					`varridingtime`='$ridingtime',
					`varRidename`='$ridename',
					`varoftenrides`='$oftenrides',
					`varbiketype`='$biketype',
					`varInsurance`='$insurance',
					`varInsuranceOther`='$insuranceother',
					`varStatus`='$memberstatus',
					`activeid`='$activeid',
					`varSuspendedDate`='$suspendeddate',
					`varResignedDate`='$resigneddate',
					`varPaid`='$paid',
					`varPaidDate`='$paiddate',
					`varMugShot`='$mugshot',
					`intROW`='$rideroftheweek'";

			$res = mysql_query($ins_user);
			if (!$res) {
				$errormsg  = "Failed to create user\n";
				$errormsg .= 'Invalid query: ' . mysql_error() . '\n';
				$errormsg .= 'Whole query: ' . $ins_user;
			}
			else
			{
				$flag="success";
				$errormsg="User added successfully";
			}
		}
	}
}

if(isset($_POST['Update']))
{
	// Note do not update Accept Terms fields from admin screen
  	$upd_user="UPDATE ".MEMBER." SET
			`intWPid`='$wpid',
			`varFirstname`='$firstname',
			`varEmail`='$email',
			`varPhone`='$phone',
			`varUsername`='$username',
			`varPassword`='$password',
			`cpassword`='$cpassword',
			`varbiography`='$biography',
			`varridingtime`='$ridingtime',
			`varRidename`='$ridename',
			`varoftenrides`='$oftenrides',
			`varbiketype`='$biketype',
			`varLastname`='$lastname',
			`varInsurance`='$insurance',
			`varInsuranceOther`='$insuranceother',
			`varStatus`='$memberstatus',
			`activeid`='$activeid',
			`varSuspendedDate`='$suspendeddate',
			`varResignedDate`='$resigneddate',
			`varPaid`='$paid',
			`varPaidDate`='$paiddate',
			`varMugShot`='$mugshot',
			`intROW`='$rideroftheweek'

			 WHERE  `intmemberid`='$memberid'";

	$res=mysql_query($upd_user);
	if (!$res) {
		$errormsg  = "Failed to update user\n";
		$errormsg .= 'Invalid query: ' . mysql_error() . '\n';
		$errormsg .= 'Whole query: ' . $ins_user;
	}
	else
	{
		$sel_dis_page=mysql_query("select * from tbl_cycling_membernew where `intmemberid`='$memberid'");
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
		$errormsg="User updated successfully";
	}
    // header("Location:addmember.php?flag=".$flag."&memberid=".$memberid"");
}

if($memberid != "")
{
	$sel_cat1="SELECT * FROM ".MEMBER." WHERE `intmemberid`='$memberid'";
	$res_cat1=mysql_query($sel_cat1);
	$fetch_cat1=mysql_fetch_array($res_cat1);

	$wpid=$fetch_cat1['intWPid'];
	$firstname=$fetch_cat1['varFirstname'];
	$lastname=$fetch_cat1['varLastname'];
	$email=$fetch_cat1['varEmail'];
	$phone=$fetch_cat1['varPhone'];
	$username=$fetch_cat1['varUsername'];
	$password=$fetch_cat1['varPassword'];
	$memberstatus=$fetch_cat1['varStatus'];
	$regodate=$fetch_cat1['varRegoDate'];
	$activationdate=$fetch_cat1['varActivationDate'];
	$productimage=$fetch_cat1['productimage'];
	$ridename=$fetch_cat1['varRidename'];
	$ridingtime=$fetch_cat1['varridingtime'];
	$oftenrides=$fetch_cat1['varoftenrides'];
	$biketype=$fetch_cat1['varbiketype'];
	$biography=$fetch_cat1['varbiography'];
	$cpassword=$fetch_cat1['cpassword'];
	$activeid=$fetch_cat1['activeid'];
	$acceptterms=$fetch_cat1['varAcceptTerms'];
	$accepttermsdate=$fetch_cat1['varAcceptTermsDate'];
	$insurance=$fetch_cat1['varInsurance'];
	$insuranceother=$fetch_cat1['varInsuranceOther'];
	$approved=$fetch_cat1['varApproved'];
	$approveddate=$fetch_cat1['varApprovedDate'];
	$approvedby=$fetch_cat1['varApprovedBy'];
	$suspendeddate=$fetch_cat1['varSuspendedDate'];
	$resigneddate=$fetch_cat1['varResignedDate'];
	$paid=$fetch_cat1['varPaid'];
	$paiddate=$fetch_cat1['varPaidDate'];
	$mugshot=$fetch_cat1['varMugShot'];
	$rideroftheweek=$fetch_cat1['intROW'];

	$disptitle="Update";
}

if($disptitle=="")
{
	$disptitle="Add";
}

?>

	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				<div class="clearfix"></div>
				<div class="title title-spacing">
					<a name="addcat"></a>
					<h2><?php echo $disptitle;?> &nbsp;Member</h2>
				</div>

				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">

					<div class="portlet-header ui-widget-header"><?php echo $disptitle;?>Member</div>

					<?php if($flag == "error"){ ?>
						<div class="response-msg error ui-corner-all">
					<?php } else { ?>
						<div class="response-msg success ui-corner-all">
					<?php } ?>
						<?php echo $errormsg; ?>
						</div>

					<div class="portlet-content">



<script>
function imposeMaxLength(fld,len)
{
	if(fld.value.length > len) { alert("You Reached Maximum Character Limit"); fld.value = fld.value.substr(0,len-1); }
}
</script>

				<form action="" method="post" class="forms" enctype="multipart/form-data"  name="register" onsubmit="return validation();" >
					<ul>
						<li>
							<label  class="desc"><span class="red">*</span>&nbsp;FirstName</label>
							<div>
								<input type="text" tabindex="1" value="<?php echo $firstname;?>" style="width:50%;" class="field text small" name="firstname" onkeypress="imposeMaxLength(this,50);"/><br/>(Maximum 50 Characters)
							</div>
						</li>
						<li>
							<label  class="desc"><span class="red">*</span>&nbsp;LastName</label>
							<div>
								<input type="text" tabindex="1" value="<?php echo $lastname;?>" style="width:50%;" class="field text small" name="lastname" onkeypress="imposeMaxLength(this,50);" /><br/>(Maximum 50 Characters)
							</div>
						</li>
						<li>
							<label  class="desc">&nbsp;Ride Name</label>
							<div>
								<input type="text" tabindex="1" value="<?php echo $ridename;?>" style="width:50%;" class="field text small" name="ridename" onkeypress="imposeMaxLength(this,50);" /><br/>(Maximum 50 Characters)
							</div>
						</li>
						<li>
							<label  class="desc"><span class="red">*</span>&nbsp;Email</label>
							<div>
								<input type="text" tabindex="1" value="<?php echo $email;?>" style="width:50%;" class="field text small" name="email"  onkeypress="imposeMaxLength(this,100);"/><br/>(Maximum 100 Characters)
							</div>
						</li>
						<li>
							<label  class="desc"><span class="red">*</span>&nbsp;User Name</label>
							<div>
								<input type="text" tabindex="1" value="<?php echo $username;?>" style="width:50%;" class="field text small" name="username" onkeypress="imposeMaxLength(this,25);" /><br/>(Maximum 25 Characters)
							</div>
						</li>
						<li>
							<label  class="desc"><span class="red">*</span>&nbsp;Password</label>
							<div>
								<input type="text" tabindex="1" value="<?php echo $password;?>" style="width:50%;" class="field text small" name="password" onkeypress="imposeMaxLength(this,25);" /><br/>(Maximum 25 Characters)
							</div>
						</li>
						<li>
							<label  class="desc"><span class="red">*</span>&nbsp;Confirm Password</label>
							<div>
								<input type="text" tabindex="1" value="<?php echo $cpassword;?>" style="width:50%;" class="field text small" name="cpassword" onkeypress="imposeMaxLength(this,25);" /><br/>(Maximum 25 Characters)
							</div>
						</li>
						<li>
							<label  class="desc"><span class="red">*</span>&nbsp;Mobile Number </label>
							<div>
								<input type="text" tabindex="1" style="width:50%;" value="<?php echo $phone;?>" class="field text small" name="phone" onkeypress="imposeMaxLength(this,30);" /><br/>
							</div>
						</li>
						<li>
							<label  class="desc"><span class="red">*</span>&nbsp;How Long Riding(Years)</label>
							<div>
								<input type="text" tabindex="1" value="<?php echo $ridingtime;?>" style="width:50%;" class="field text small" name="ridingtime"  onkeypress="imposeMaxLength(this,25);"/>&nbsp;<br/>
							</div>
						</li>
						<li>
							<label  class="desc"><span class="red">*</span>&nbsp;How Often Rides Per Week</label>
							<div>
								<input type="text" tabindex="1" value="<?php echo $oftenrides;?>" style="width:50%;" class="field text small" name="oftenrides"  onkeypress="imposeMaxLength(this,25);" />&nbsp;<br/>
							</div>
						</li>
						<li>
							<label  class="desc"><span class="red">*</span>&nbsp;Type of Bike</label>
							<div>
								<input type="text" tabindex="1" value="<?php echo $biketype;?>" style="width:50%;" class="field text small" name="biketype"  onkeypress="imposeMaxLength(this,250);" /><br/>(Maximum 250 Characters)
							</div>
						</li>
						<li>
							<label  class="desc"><span class="red">*</span>&nbsp;Biography</label>
							<div>
								<textarea name="biography" cols="50" rows="5" align="left" onkeypress="imposeMaxLength(this,1200);"><?php echo $biography; ?></textarea><br/>(Maximum 1200 Characters)
							</div>
						</li>
						<li>
							<label  class="desc"><span class="red">*</span>&nbsp;Insurance</label>
							<div>
								<select name="insurance">
									<option value="no" <?php if ($insurance == "no") { echo 'selected="selected"'; } ?> >no</option>
									<option value="yes with CA" <?php if ($insurance == "yes with CA") { echo 'selected="selected"'; } ?> >yes with CA</option>
									<option value="yes with Bike NSW" <?php if ($insurance == "yes with Bike NSW") { echo 'selected="selected"'; } ?> >yes with Bike NSW</option>
									<option value="yes with Bike Vic" <?php if ($insurance == "yes with Bike Vic") { echo 'selected="selected"'; } ?> >yes with Bike Vic</option>
									<option value="yes with Bike North" <?php if ($insurance == "yes with Bike North") { echo 'selected="selected"'; } ?> >yes with Bike North</option>
									<option value="yes other" <?php if ($insurance == "yes other") { echo 'selected="selected"'; } ?> >yes other</option>
								</select>
							</div>
						</li>
						<li>
							<label  class="desc">&nbsp;&nbsp;Details of Other Insurance</label>
							<div>
								<input type="text" tabindex="1" value="<?php echo $insuranceother;?>" style="width:50%;" class="field text small" name="insuranceother"  onkeypress="imposeMaxLength(this,50);" /><br/>(Maximum 50 Characters)
							</div>
						</li>
						<li>
							<label  class="desc"><span class="red">*</span>&nbsp;Upload Profile Photo (150 x 140) </label>
								<?php if($memberid!="") {
										$productimage=$path.$productimage;
										list($width,$height)=getimagesize($productimage);
										if($width>=140)  $width="140px";
										if($height>=150) $height="150px";
								?>
							<div><img src="<?php echo $productimage;?>" border="0" width="<?php echo $width;?>" height="<?php echo $height;?>" align="absmiddle"/><br /></div>
							<div><?php echo str_replace($path,"",$productimage);?><br /><br /></div><?php }?>
							<div><input type="file" tabindex="1" maxlength="255" value="" class="field text small" name="image" /></div>
						</li>

						<li>
							<label  class="desc">&nbsp;&nbsp;WordPress Id</label>
							<div>
								<input type="text" tabindex="1" value="<?php echo $wpid;?>" style="width:50%;" class="field text small" name="wpid"  onkeypress="imposeMaxLength(this,25);"/>&nbsp;<br/>
							</div>
						</li>
						<li>
							<label  class="desc">&nbsp;&nbsp;Rider of the Week Page Number</label>
							<div>
								<input type="text" tabindex="1" value="<?php echo $rideroftheweek;?>" style="width:50%;" class="field text small" name="rideroftheweek"  onkeypress="imposeMaxLength(this,25);"/>&nbsp;<br/>
							</div>
						</li>
						<li>
							<label  class="desc"><span class="red">*</span>&nbsp;Status</label>
							<div>
								<select name="memberstatus">
									<option value="Active" <?php if ($memberstatus == "Active") { echo 'selected="selected"'; } ?> >Active</option>
									<option value="Suspended" <?php if ($memberstatus == "Suspended") { echo 'selected="selected"'; } ?> >Suspended</option>
									<option value="Resigned" <?php if ($memberstatus == "Resigned") { echo 'selected="selected"'; } ?> >Resigned</option>
								</select>
							</div>
						</li>
						<li>
							<label  class="desc"><span class="red">*</span>&nbsp;Active Id - yes if user has clicked activation link in email</label>
							<div>
								<select name="activeid">
									<option value="no" <?php if ($activeid == "no") { echo 'selected="selected"'; } ?> >no</option>
									<option value="yes" <?php if ($activeid == "yes") { echo 'selected="selected"'; } ?> >yes</option>
								</select>
							</div>
						</li>
						<li>
							<label  class="desc"><span class="red">*</span>&nbsp;Paid</label>
							<div>
								<select name="paid">
									<option value="no" <?php if ($paid == "no") { echo 'selected="selected"'; } ?> >no</option>
									<option value="yes" <?php if ($paid == "yes") { echo 'selected="selected"'; } ?> >yes</option>
								</select>
							</div>
						</li>
						<li>
							<label  class="desc">&nbsp;&nbsp;Paid Date</label>
							<div>
								<input type="text" tabindex="1" value="<?php echo $paiddate;?>" style="width:50%;" class="field text small" name="paiddate"  onkeypress="imposeMaxLength(this,10);" /><br/>(format YYYY-MM-DD)
							</div>
						</li>
						<li>
							<label  class="desc">&nbsp;&nbsp;Suspended Date</label>
							<div>
								<input type="text" tabindex="1" value="<?php echo $suspendeddate;?>" style="width:50%;" class="field text small" name="suspendeddate"  onkeypress="imposeMaxLength(this,10);" /><br/>(format YYYY-MM-DD)
							</div>
						</li>
						<li>
							<label  class="desc">&nbsp;&nbsp;Resigned Date</label>
							<div>
								<input type="text" tabindex="1" value="<?php echo $resigneddate;?>" style="width:50%;" class="field text small" name="resigneddate"  onkeypress="imposeMaxLength(this,10);" /><br/>(format YYYY-MM-DD)
							</div>
						</li>

						<li class="buttons">
							<input name="<?php echo $disptitle;?>" class="btn ui-state-default ui-corner-all" type="submit" value="<?php echo $disptitle;?>">
							<input name="memberid" type="hidden" id="memberid"  value="<?php echo $memberid;?>"/>
						</li>

					</ul>

					<div class="red">
						  * Indicates Required Information
					</div>

				</form>
			</div>
		</div>
		<div class="clearfix"></div>
		<i class="note"></i>
	</div>
	<div class="clearfix"></div>
</div>

<?php include('sidebar.php'); ?>

	</div>

	<div class="clearfix"></div>

<?php include('footer.php'); ?>

</body>

</html>



<script type="text/javascript" language="javascript">

function validation()		// Copied from register.php - should really share a function
{
	if (document.register.firstname.value=='')
	{
		alert ("Please enter your first name");
		document.register.firstname.focus();
		return false;
	}
	if (document.register.lastname.value=='')
	{
		alert ("Please enter your last name");
		document.register.lastname.focus();
		return false;
	}
	if (document.register.ridename.value=='')
	{
		alert ("Please enter a Ride Name - this is used to identify you on the site. You can change it later when you get a proper ER ride name");
		document.register.lastname.focus();
		return false;
	}
	var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	if(!filter.test(document.register.email.value))
	{
		alert ("Please enter valid email address");
		document.register.email.focus();
		return false;
	}
	if (document.register.username.value=='')
	{
		 alert ("Please enter username");
		 document.register.username.focus();
		 return false;
	}
	if (document.register.password.value=='')
	{
		 alert ("Please enter password");
		 document.register.password.focus();
		 return false;
	}
	if (document.register.cpassword.value=='')
	{
		 alert ("Please enter confirm password");
		 document.register.cpassword.focus();
		 return false;
	}
	if (document.register.password.value!=document.register.cpassword.value)
	{
		 alert ("Confirm password should be same as password");
		 document.register.cpassword.focus();
		 return false;
	}
	if (document.register.phone.value=='')
	{
		 alert ("Please enter mobile number");
		 document.register.phone.focus();
		 return false;
	}
	if (isNaN(document.register.phone.value))
	{
		 alert ("Mobile number must be numeric");
		 document.register.phone.focus();
		 return false;
	}
	if (document.register.oftenrides.value=='')
	{
		 alert ("Please enter often rides");
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
		 alert ("Please enter your bike type");
		 document.register.biketype.focus();
		 return false;
	}
	if (document.register.biography.value=='')
	{
		 alert ("Please enter a biography");
		 document.register.biography.focus();
		 return false;
	}
	if (document.register.insurance.value=='yes other' && document.register.insuranceother.value == '')
	{
		 alert ("Please enter details of other insurance");
		 document.register.insuranceother.focus();
		 return false;
	}

	return true;
}

</script>
