<?php



 include('header.php'); 

$path="../../deimage1/";



	if(isset($_POST["submit"])){

	

			$x_company 		= $_POST["varCompany"];

			$x_contact 			= $_POST["varContactPerson"];

			$x_email 				= $_POST["varEmail"];

			//$x_payEmail         = $_POST["payEmail"];

		//	$x_payMode         = $_POST["payMode"];

		//	$x_paypalfeature   =$_POST["paypalfeature"];

			$x_adminpage		= $_POST['varAdminPage'];

			$txthomepage		= $_POST['varHomePage'];

			$tags					= $_POST['varTags'];

			$intRows		        = $_POST['intRows'];

			
 $mapspage		        = $_POST['mapspage']; 
$calendarpage		        = $_POST['calendarpage'];
$gallerypage		        = $_POST['gallerypage'];
$riderspage		        = $_POST['riderspage'];
$linkspage		        = $_POST['linkspage'];
$contactpage		        = $_POST['contactpage'];
$loginpage		        = $_POST['loginpage'];
$registerpage		        = $_POST['registerpage'];

			


		$sss = "select * from ".ADMINPROFILE."";

			$ccc = mysql_query($sss)or die(db_error());

			$carr11 = mysql_fetch_array($ccc);

			$adminid1 = $carr11['intAdminId'];

		

		 
			 

		 	$UpdateUserQry = "update tbl_cycling_adminprofile set varCompany = '$x_company',

			varContactPerson = '$x_contact',

			varEmail				= '$x_email',
			varHomePage 		= '$txthomepage',

			varTags				= '$tags',
			mapspage 		= '$mapspage',
			calendarpage 		= '$calendarpage',
			gallerypage 		= '$gallerypage',
			riderspage 		= '$riderspage',
			linkspage 		= '$linkspage',
			contactpage 		= '$contactpage',
			loginpage 		= '$loginpage',
			registerpage 		= '$registerpage',
			intRows 		= '$intRows',
			varAdminPage		= '$x_adminpage'";	 


			$UpdateUserRes = mysql_query($UpdateUserQry);
	header("location:settings.php?log=succ");
					} 

			

		

		//header("Location:http://wsdemos.info/ourprojects/karoo/admin/adminsettings/settings.php?log=succ");




			$cqry = "select * from tbl_cycling_adminprofile";

			$cres = mysql_query($cqry)or die(db_error());

			$carr = mysql_fetch_array($cres);

			$adminid = $carr['intAdminId'];

			

			$varCompany 				= $carr['varCompany'];

			$varContactPerson 				= $carr['varContactPerson'];

			$varEmail 					= $carr['varEmail'];

		

			$varHomePage 				= $carr['varHomePage'];

			$varAdminPage 				= $carr['varAdminPage'];

			$varTags							=  $carr['varTags'];

			$intRows 				= $carr['intRows']; 
		
		
			$mapspage 				= $carr['mapspage']; 
			$calendarpage 				= $carr['calendarpage']; 
			$gallerypage 				= $carr['gallerypage']; 
			$riderspage 				= $carr['riderspage']; 
			$linkspage 				= $carr['linkspage']; 
			$contactpage 				= $carr['contactpage']; 
			$loginpage 				= $carr['loginpage']; 
			$registerpage 				= $carr['registerpage']; 
	
			$productimage 				= $carr['productimage']; 

			

			//$Shoutcast                   =$carr['shoutcast'];

			

?>





<!--<div id="welcome" title="Welcome to  BIngo Nights Admin Panel">

	

	</div>-->

	<script type="text/javascript">

function imposeMaxLength(fld,len)

	{



		if(fld.value.length > len) { fld.value = fld.value.substr(0,len); }



	}

</script>

	<div id="page-wrapper">

		<div id="main-wrapper">

			<div id="main-content">

				

				

				<div class="clearfix"></div>

				<div class="title title-spacing">

			<a name="settings"></a><h2>General Settings</h2>

					

				</div>

				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">

					<div class="portlet-header ui-widget-header">General Settings</div>

				<?php if($_GET['log']=="succ"){?>	<div class="response-msg success ui-corner-all">

									<span>Your Details Are Successfully Updated!</span>

									

								</div><?php } ?>

					<div class="portlet-content">

						<form action="" method="post" enctype="multipart/form-data" class="forms"  name="frm_accountinfo" onSubmit="return account_validate();" >

							<ul>	

								<li><span class="red">*</span>

									<label  class="desc">

										Name of the Company

									</label>

									<div>

										<input type="text" tabindex="1" maxlength="255" value="<?php echo $varCompany;?>" class="field text medium" name="varCompany" onkeypress="return imposeMaxLength(this, 50);"/><br />(Maximum 50 Characters)

									</div>

								</li>

								<li><span class="red">*</span>

									<label  class="desc">

										Contact Person

									</label>

									<div>

										<input type="text" tabindex="1" maxlength="255" value="<?php echo $varContactPerson;?>" class="field text medium" name="varContactPerson" />

									</div>

								</li>

								<li><span class="red">*</span>

									<label  class="desc">

										Email Address

									</label>

									<div>

										<input type="text" tabindex="1" maxlength="255" value="<?php echo $varEmail;?>" class="field text medium" name="varEmail" />

									</div>

								</li>

								

							<!--

								<li><span class="red">*</span>

									<label  class="desc">

										

										API_UserName

									</label>

									<div>

										<input type="text" tabindex="1" maxlength="255" value="<?php echo $APIusername;?>" class="field text medium" name="apiuname" />

									</div>

								</li>

								<li><span class="red">*</span>

									<label  class="desc">

API_Password 

									</label>

									<div>

										<input type="text" tabindex="1" maxlength="255" value="<?php echo $APIpassword;?>" class="field text medium" name="apipwd" />

									</div>

								</li>

								<li><span class="red">*</span>

									<label  class="desc">

API_Signature

									</label>

									<div>

										<input type="text" tabindex="1" maxlength="255" value="<?php echo $APIsignature;?>" class="field text medium" name="apisig" />

									</div>

								</li>

									<li><span class="red">*</span>

									<label  class="desc">

									API_AppID 

									</label>

									<div>

										<input type="text" tabindex="1" maxlength="255" value="<?php echo $APIappid;?>" class="field text medium" name="apiappid" />

									</div>

								</li>

								

								<li><span class="red">*</span>

									<label  class="desc">

API_RequestFormat									</label>

									<div>

										<input type="text" tabindex="1" maxlength="255" value="<?php echo $APIrequest;?>" class="field text medium" name="apirequest" />

									</div>

								</li>

									

								<li><span class="red">*</span>

									<label  class="desc">

API_ResponseFormat

									</label>

									<div>

										<input type="text" tabindex="1" maxlength="255" value="<?php echo $APIresponse;?>" class="field text medium" name="apiresponse" />

									</div>

								</li>

								

								<li><span class="red">*</span>

									<label  class="desc">

										PayPal Email Address

									</label>

									<div>

										<input type="text" tabindex="1" maxlength="255" value="<?php echo $payEmail;?>" class="field text medium" name="payEmail" />

									</div>

								</li>

								<li><span class="red">*</span>

									<label  class="desc">

										PayPal Mode

									</label>

									<div>

										<select name="payMode">

										<option value="">Choose</option>

										<option value="sandbox" <?php if($payMode=="sandbox"){?> selected="selected" <?php }?>>Sandbox (Test Mode)</option>

										<option value="paypal" <?php if($payMode=="paypal"){?> selected="selected" <?php }?>>PayPal (Live Mode)</option>

										</select>

									</div>

								</li>

								

								<li><span class="red">*</span>

									<label  class="desc">

										Paypalfeature

									</label>

									<div>

										<select name="paypalfeature">

										<option value="">Choose</option>

										<option value="true" <?php if($paypalfeature=="true"){?> selected="selected" <?php }?>>Yes</option>

										<option value="false" <?php if($paypalfeature=="false"){?> selected="selected" <?php }?>>NO</option>

										</select>

									</div>

								</li>

								

								-->

								<li><span class="red">*</span>

									<label  class="desc">

										Number of Pages Per Row

									</label>

									<div>

									  <input type="text" tabindex="1" maxlength="255" value="<?php echo $intRows;?>" class="field text medium" name="intRows" />

									</div>

								</li>

									<li><span class="red">*</span>

									<label  class="desc">

									Admin Page Title

									</label>

									<div>

										<input type="text" tabindex="1" maxlength="255" value="<?php echo $varAdminPage;?>" class="field text medium" name="varAdminPage" onkeypress="return imposeMaxLength(this, 30);" /><br />(Maximum 30 Characters)

									</div>

								</li>

								

									<li><span class="red">*</span>

									<label  class="desc">

										Front Page Title

									</label>

									<div>

										<input type="text" tabindex="1" maxlength="255" value="<?php echo $varHomePage;?>" class="field text medium" name="varHomePage" onkeypress="return imposeMaxLength(this, 30);" /><br />(Maximum 30 Characters)

									</div>

								</li>

								

								

								

								
								

								
									<li><span class="red">*</span>

									<label  class="desc">

										Maps Page Heading

									</label>

									<div>

										<input type="text" tabindex="1" maxlength="255" value="<?php echo $mapspage;?>" class="field text medium" name="mapspage" onkeypress="return imposeMaxLength(this, 30);" /><br />(Maximum 30 Characters)

									</div>

								</li>
								
								
									<li><span class="red">*</span>

									<label  class="desc">

										Calendar Page Heading

									</label>

									<div>

										<input type="text" tabindex="1" maxlength="255" value="<?php echo $calendarpage;?>" class="field text medium" name="calendarpage" onkeypress="return imposeMaxLength(this, 30);" /><br />(Maximum 30 Characters)

									</div>

								</li>
								
									<li><span class="red">*</span>

									<label  class="desc">

										Gallery Page Heading

									</label>

									<div>

										<input type="text" tabindex="1" maxlength="255" value="<?php echo $gallerypage;?>" class="field text medium" name="gallerypage" onkeypress="return imposeMaxLength(this, 30);" /><br />(Maximum 30 Characters)

									</div>

								</li>
								
									<li><span class="red">*</span>

									<label  class="desc">

										Riders Page Heading

									</label>

									<div>

										<input type="text" tabindex="1" maxlength="255" value="<?php echo $riderspage;?>" class="field text medium" name="riderspage" onkeypress="return imposeMaxLength(this, 30);" /><br />(Maximum 30 Characters)

									</div>

								</li>
								
									<li><span class="red">*</span>

									<label  class="desc">

										Linkspage Heading

									</label>

									<div>

										<input type="text" tabindex="1" maxlength="255" value="<?php echo $linkspage;?>" class="field text medium" name="linkspage" onkeypress="return imposeMaxLength(this, 30);" /><br />(Maximum 30 Characters)

									</div>

								</li>
									<li><span class="red">*</span>

									<label  class="desc">

										Contact Us Page Heading

									</label>

									<div>

										<input type="text" tabindex="1" maxlength="255" value="<?php echo $contactpage;?>" class="field text medium" name="contactpage" onkeypress="return imposeMaxLength(this, 30);" /><br />(Maximum 30 Characters)

									</div>

								</li>
								
									<li><span class="red">*</span>

									<label  class="desc">

										Login Page Heading

									</label>

									<div>

										<input type="text" tabindex="1" maxlength="255" value="<?php echo $loginpage;?>" class="field text medium" name="loginpage" onkeypress="return imposeMaxLength(this, 30);" /><br />(Maximum 30 Characters)

									</div>

								</li>
								
       <li><span class="red">*</span>

									<label  class="desc">

										Register Page Heading

									</label>

									<div>

										<input type="text" tabindex="1" maxlength="255" value="<?php echo $registerpage;?>" class="field text medium" name="registerpage" onkeypress="return imposeMaxLength(this, 30);" /><br />(Maximum 30 Characters)

									</div>

								</li>
								
								
								
								
								
								

								

							<!--	<li><span class="red">*</span>

									<label  class="desc">

										Thumnails Height(Pixels)

									</label>

									<div>

										<input type="text" tabindex="1" maxlength="255" value="<?php echo $Thumheight;?>" class="field text medium" name="Thumheight" onkeypress="return imposeMaxLength(this, 30);" /><br />

									</div>

								</li>

								

								

								<li><span class="red">*</span>

									<label  class="desc">

										Thumnails Width(Pixels)

									</label>

									<div>

										<input type="text" tabindex="1" maxlength="255" value="<?php echo $Thumwidth;?>" class="field text medium" name="Thumwidth" onkeypress="return imposeMaxLength(this, 30);" /><br />

									</div>

								</li>-->

								

								 <!--<li>

									<label  class="desc"><span class="red">*</span>Shoutcast Coding</label>

									<div>

									<textarea name="shoutcast" cols="50" rows="10" onkeypress="imposeMaxLength(this,255);"><?php echo $Shoutcast; ?></textarea><br/>

									</div>

							  </li>-->

								

								<li class="buttons">

									<input type="submit" value="Update" class="btn ui-state-default ui-corner-all" name="submit" />

								</li>

								<span class="red">* Indicates Required Information.</span>

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



<script type="text/javascript" language="javascript">

function account_validate()

{



var  varCompany= document.frm_accountinfo.varCompany.value;

if(varCompany =="")

{ 

alert ("Please Enter The Name of the Company");

document.frm_accountinfo.varCompany.focus();

return false;

}



var  varContactPerson= document.frm_accountinfo.varContactPerson.value;

if(varContactPerson=="")

{ 

alert ("Please Enter The Contact Person");

document.frm_accountinfo.varContactPerson.focus();

return false;

}



	 

if(document.frm_accountinfo.varEmail.value =="")

{ 

alert ("Please Enter The Email ");

document.frm_accountinfo.varEmail.focus();

return false;

}

		 

<!--var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;-->



/*if (!filter.test(document.frm_accountinfo.varEmail.value))

{          

alert ("Please Enter the Valid User ID");

document.frm_accountinfo.varEmail.focus();

return false;

}

*/		

var apiuname= document.frm_accountinfo.apiuname.value;

if (apiuname == "" )

{ 

alert ("Please Select The PayPal API Username");

document.frm_accountinfo.apiuname.focus();

return false;

}



var apipwd= document.frm_accountinfo.apipwd.value;

if (apipwd == "" )

{ 

alert ("Please Select The PayPal API Password");

document.frm_accountinfo.apipwd.focus();

return false;

}

	

var apisig= document.frm_accountinfo.apisig.value;

if(apisig == "" )

{ 

alert ("Please Select The PayPal API Signature");

document.frm_accountinfo.apisig.focus();

return false;

}

	 

var apiappid= document.frm_accountinfo.apiappid.value;

if(apiappid == "" )

{ 

alert ("Please Select The PayPal API Application ID");

document.frm_accountinfo.apiappid.focus();

return false;

}

		 

var apirequest= document.frm_accountinfo.apirequest.value;

if(apirequest == "" )

{ 

alert ("Please Select The PayPal API Request");

document.frm_accountinfo.apirequest.focus();

return false;

}



var apirequest= document.frm_accountinfo.apiresponse.value;

if(apirequest == "" )

{ 

alert ("Please Select The PayPal API Response");

document.frm_accountinfo.apirequest.focus();

return false;

}



if (document.frm_accountinfo.payEmail.value=="")

{          

alert ("Please Enter the  Email ID");

document.frm_accountinfo.payEmail.focus();

return false;

}

	

var payMode= document.frm_accountinfo.payMode.value;

if(payMode == "" )

{ 

alert ("Please Select The PayPal Mode");

document.frm_accountinfo.payMode.focus();

return false;

}

		 

var intRows= document.frm_accountinfo.intRows.value;

if(intRows== "" )

{ 

alert ("Please Enter The No of Rows Displayed per page");

document.frm_accountinfo.intRows.focus();

return false;

}



if (isNaN(document.frm_accountinfo.intRows.value))

{ 

alert ("No of Rows Must Be Numeric");

document.frm_accountinfo.intRows.focus();

return false;

}



if (document.frm_accountinfo.intRows.value < 0)

{ 

alert ("Please Enter The Positive Value");

document.frm_accountinfo.intRows.focus();

return false;

}



var varAdminPage= document.frm_accountinfo.varAdminPage.value;

if(varAdminPage == "" )

{ 

alert ("Please Enter The Admin Page Title");

document.frm_accountinfo.varAdminPage.focus();

return false;

}



var varHomePage= document.frm_accountinfo.varHomePage.value;

if(varHomePage== "" )

{ 

alert ("Please Enter The Home Page Title");

document.frm_accountinfo.varHomePage.focus();

return false;

}









	<?php 

	if($adminid =='') { ?>

		 if (document.frm_accountinfo.productimage.value=='')

	 { 

		 alert ("Please Upload Header Image");

		 document.frm_accountinfo.productimage.focus();

		 return false;

	}

		 

		 

		 

		 <?php } ?>



/*

var varTags= document.frm_accountinfo.varTags.value;

if (varTags== "" )

alert ("Please Enter The Home Page Title");

document.frm_accountinfo.varTags.focus();

return false;

}*/



		return true;

		}

</script>