<?php
include('header.php'); 

$Menu	=	base64_decode($_REQUEST['menutype']);

if(!$Menu=="")
{
	$sel_cms		=	"SELECT * FROM ".CMS." WHERE  varMode='$Menu'";
	$res_cms		=	mysql_query($sel_cms);
	$num_cms	=	mysql_num_rows($res_cms);
	$fet_cms		=	mysql_fetch_array($res_cms);
}

if(!empty($_POST['update']) && !empty($Menu))
{
	 	/*intCmsid 	varMode 	varTitle 	MetatagKey 	metatagDesc 	varHeading 	txtStatement 	dateModified 	intmainpageid 	varStatus 	varMetaTitle 	varcmsImage 	belowdesc*/	
	extract($_POST);
	$varHeading			= addslashes($varHeading);
	$varMetaTitle		= addslashes($varMetaTitle);
	$MetatagKey		= addslashes($MetatagKey);
	$metatagDesc		= addslashes($metatagDesc);
	$txtStatement		= addslashes($txtStatement);
	$txtStatement1		= addslashes($txtStatement1);
		
	if($num_cms != 0)
	{
		$update_cms		= "UPDATE ".CMS." SET
						   `txtStatement`='$txtStatement',
						   `txtStatement1`='$txtStatement1',
				      		`varHeading`	='$varHeading',
							`varMetaTitle`			='$varMetaTitle',
							`MetatagKey`	='$MetatagKey',
							`metatagDesc`='$metatagDesc',
							`dateModified`=NOW() WHERE varMode='$Menu'";
		mysql_query($update_cms) or die("Update Error".mysql_error());
	}
	else
	{
		$ins_cms	=	"INSERT INTO ".CMS." (`varMode`,`txtStatement`,`txtStatement1`,`varHeading`,`varMetaTitle`,`MetatagKey`,`metatagDesc`,`dateModified`) VALUES('$Menu','$txtStatement','$txtStatement1','$varHeading','$varMetaTitle','$MetatagKey','$metatagDesc',NOW())";
		$Result	=	mysql_query($ins_cms);
	}
	
	header("Location:cms.php?flag=updated&menutype=".base64_encode($Menu));
}

switch($Menu)
{
	case "home":
		$PageTitle	=	"Home";
		$Title1	=	"Update Home Contents";
		break;
		
		case "strava1":
		$PageTitle	=	"strava1";
		$Title1	=	"Update strava1 Contents";
		break;
		
			
		case "strava2":
		$PageTitle	=	"strava2";
		$Title1	=	"Update strava2 Contents";
		break;
		
		
	
		
		
		
	case "contactus":
		$PageTitle	=	"Contact us";
		$Title1	=	"Update Contact us Contents";
		break;
		
	case "returnpolicy":
		$PageTitle	=	"Returns Policy";
		$Title1	=	"Update Returns Policy Contents";
		break;
			
	case "ordertracking":
		$PageTitle	=	"Order Tracking";
		$Title1	=	"Update Order Tracking Contents";
		break;
		
	case "deliveryinformation":
		$PageTitle	=	"Delivery Information";
		$Title1	=	"Update Delivery Information Contents";
		break;
   
    case "technicalproblem":
		$PageTitle	=	"Technical Problems";
		$Title1	=	"Update Technical Problems Contents";
		break;
		
	case "paymentinformation":
		$PageTitle	=	"Payment Information";
		$Title1	=	"Update Payment Information Contents";
		break;
    
	case "useourwebsite":
		$PageTitle	=	"Use Our Website";
		$Title1	=	"Update Order Tracking Contents";
		break;
    
	case "giftvouchers":
		$PageTitle	=	"Gift Vouchers";
		$Title1	=	"Update Gift Vouchers Contents";
		break;
    
	case "discountsandcoupons":
		$PageTitle	=	"Discounts & Coupons";
		$Title1	=	"Update Discounts & Coupons Contents";
		break;
		
	case "aboutus":
		$PageTitle	=	"About Us";
		$Title1	=	"Update About Us Contents";
		break;
		
    case "privacy":
		$PageTitle	=	"Privacy Policy";
		$Title1	=	"Update Privacy Policy Contents";
		break;
		
     case "terms":
		$PageTitle	=	"Terms & Conditions";
		$Title1	=	"Update Terms & Conditions Contents";
		break;
		
	case "delivery":
		$PageTitle	=	"Delivery";
		$Title1	=	"Update Delivery Contents";
		break;
		
	case "return":
		$PageTitle	=	"Return Info";
		$Title1	=	"Update Return Info Contents";
		break;
		
	case "discountsandcoupons":
		$PageTitle	=	"Discounts & Coupons";
		$Title1	=	"Update Discounts & Coupons Contents";
		break;
		
	case "affiliatescheme":
		$PageTitle	=	"Affliate Scheme";
		$Title1	=	"Update Affliate Scheme Contents";
		break;
		
	case "downloads":
		$PageTitle	=	"Downloads";
		$Title1	=	"Update Downloads Contents";
		break;
		
	case "loyalitypoints":
		$PageTitle	=	"Loyality Points";
		$Title1	=	"Update Loyality Points Contents";
		break;
	
	case "sponsorship":
		$PageTitle	=	"Sponsorship";
		$Title1	=	"Update Sponsorship Contents";
		break;
	
	case "testimonial":
		$PageTitle	=	"Testimonial";
		$Title1	=	"Update Testimonial Contents";
		break;
		
	case "sitemap":
		$PageTitle	=	"SiteMap";
		$Title1	=	"Update SiteMap Contents";
		break;
	
	case "dropshipping":
		$PageTitle	=	"Drop Shipping";
		$Title1	=	"Update Drop Shipping Contents";
		break;
	
	case "customerservice";
	$PageTitle = "Customer Service";
	$Title1="Update Customer Service Contents";
	break;

    case "thanks";
	$PageTitle = "Thanks";
	$Title1="Update Thanks Contents";
	break;
	
	case "error";
	$PageTitle = "Error";
	$Title1="Update Error Contents";
	break;

		
	default:
		$PageTitle="home";
		$Title1	=	"Update Home Contents";
		break;
}
@extract($fet_cms);
?>
<script type="text/javascript">
function imposeMaxLength(fld,len)
	{

		if(fld.value.length > len) { alert("You Reached Maximum Character Limit"); fld.value = fld.value.substr(0,len); }

	}
</script>
	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
							
				<div class="clearfix"></div>
				<div class="title title-spacing">
					<a name="cms"></a><h2>Content Management System</h2>
				</div>
				
				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">
					<div class="portlet-header ui-widget-header"><?php echo $PageTitle; ?> Page Content</div>
				  		<?php if($_GET['flag']=="updated") { ?>
							<div class="response-msg success ui-corner-all">
								<span><?php echo $PageTitle; ?> Page Content Updated successfully!</span>
							</div>
						<?php } ?>
					<div class="portlet-content">
						<form action="cms.php" method="post" enctype="multipart/form-data" class="forms"  name="frm_accountinfo"  >
							<ul>
								
								<li>
									<label  class="desc">Heading</label>
									<div>
										<input type="text" tabindex="1" maxlength="255" value="<?php echo substr($varHeading,0,25);?>" class="field text small" name="varHeading" onkeypress="return imposeMaxLength(this, 25);"/><br />(Maximum 25 Characters)
									</div>
								</li>
								
								<li>
									<label  class="desc">Meta Title</label>
									<div>
										<input type="text" tabindex="1" maxlength="255" value="<?php echo substr($varMetaTitle,0,50);?>" class="field text medium" name="varMetaTitle" onkeypress="return imposeMaxLength(this, 50);"/>
									</div>
								</li>
								
								<li>
									<label  class="desc">Meta Keyword</label>
									<div>
									  <textarea tabindex="2" cols="50" rows="5" class="field textarea small" name="MetatagKey"  onkeypress="return imposeMaxLength(this, 255);"><?php echo substr($MetatagKey,0,255);?></textarea>
									</div>
								</li>
								
								<li>
									<label  class="desc">Meta Tag Description</label>
									<div>
										<textarea tabindex="2" cols="50" rows="5" class="field textarea small" name="metatagDesc"  onkeypress="return imposeMaxLength(this, 255);"><?php echo substr($metatagDesc,0,255);?></textarea>
									</div>
								</li>
								
								<li>
									<label  class="desc">English Content</label>
									<div>
										<?php
											$oFCKeditor=new FCKeditor('txtStatement');
											$oFCKeditor->BasePath="../../fckeditor/" ;
											//$oFCKeditor->ToolbarSet = "Basic" ;
											$oFCKeditor->Skin="office2003";
											$oFCKeditor ->Height='470';
											$oFCKeditor->Value=stripslashes($txtStatement);
											$oFCKeditor->Create();
										?>
									</div>
								</li>
								
								<?php /*?><li>
									<label  class="desc">French Content</label>
									<div>
										<?php
											$oFCKeditor=new FCKeditor('txtStatement1');
											$oFCKeditor->BasePath="../../fckeditor/" ;
											//$oFCKeditor->ToolbarSet = "Basic" ;
											$oFCKeditor->Skin="office2003";
											$oFCKeditor ->Height='470';
											$oFCKeditor->Value=stripslashes($txtStatement1);
											$oFCKeditor->Create();
										?>
									</div>
								</li><?php */?>
								<li class="buttons">
									<input name="update" type="submit" id="update" value="Update" class="btn ui-state-default ui-corner-all" />
        		                    <input name="menutype" type="hidden" id="menutype" value="<?php echo base64_encode($Menu); ?>" />
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