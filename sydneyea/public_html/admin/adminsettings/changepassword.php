<?php

 include('header.php'); 

	/*****************************************************************************
 * Website: SHOPPING COMPARISON
 * Change Password  Page
 *developed on 11/02/2010
 ****************************************************************************/

	if(isset($_POST["submit"]))
	{
		$Old	      = $_POST['Old'];
		$SelectQuery  = "SELECT * FROM ".ADMINPROFILE." WHERE `varPassword` = '$Old'";
		$Result		  = mysql_query($SelectQuery);
		$Count		  = mysql_num_rows($Result);
		$Fetch		  = mysql_fetch_array($Result);
		$User_Id	  = $Fetch['intAdminId'];
		if($Count != 0)
 		 {
			$Password = $_POST['Password'];
			
			$UpdateUserQry = "update ".ADMINPROFILE." set `varPassword` = '$Password' WHERE `intAdminId`='$Session_UserId'";
			$UpdateUserRes = mysql_query($UpdateUserQry) or die("Error in updation:".mysql_error());
			header("Location:changepassword.php?log=succ");
			}
			else
			{
			header("Location:changepassword.php?log=err");
			}
	 }
		
			
?>


<!--<div id="welcome" title="Welcome to   Julie Dimmick Photography">
		<p><strong>Here admin can change the Password details.</strong></p>
			
	</div>
-->
	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				
				
				<div class="clearfix"></div>
				<div class="title title-spacing">
			<a name="change"></a><h2>Change Password</h2>
					
				</div>
				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">
					<div class="portlet-header ui-widget-header">Change Password</div>
								<?php if($_GET['log']=="succ"){?>	<div class="response-msg success ui-corner-all">
									<span>Your Password Changed Successfully!</span>
																	</div><?php } ?>
																<?php if($_GET['log']=="err"){?>	<div class="response-msg error ui-corner-all">
									<span>Your Old Password may be Incorrect.</span>
																	</div><?php } ?>								
					<div class="portlet-content">
						<form action="changepassword.php" method="post" enctype="multipart/form-data" class="forms"  name="frm_change" onSubmit="return pass_validate();" >
							<ul>
								<li>	<label  class="desc">Old Password</label>
								  <div>
										<input type="password" tabindex="1" maxlength="255"  class="field text small" name="Old"  />
									</div>
								</li>
								<li><label  class="desc">New Password</label>
								  <div>
										<input type="password" tabindex="1" maxlength="255" class="field text small" name="Password"  />
									</div>
								</li>
								<li><label  class="desc">Confirm Password</label>
								  <div>
										<input type="password" tabindex="1" maxlength="255"  class="field text small" name="Conpassword"  />
									</div>
								</li>
																	
								
								<li class="buttons">
									<input type="submit" value="Change" class="btn ui-state-default ui-corner-all" name="submit" />
								</li>
							</ul>
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

<script type="text/javascript">
function pass_validate()
{
var Old = document.frm_change.Old.value;
var Password = document.frm_change.Password.value;
var Conpassword = document.frm_change.Conpassword.value;


if(Old=="")
{
alert("Please Enter Your Old Password");
document.frm_change.Old.focus();
return false;
}

if(Password=="")
{
alert("Please Enter Your New Password ");
document.frm_change.Password.focus();
return false;
}
if(Conpassword=="")
{
alert("Please Enter Your Confirm Password ");
document.frm_change.Conpassword.focus();
return false;
}
if(Password != Conpassword)
{
alert("Password Mismatch !");
document.frm_change.Conpassword.focus();
return false;
}


return true;
}
</script>
