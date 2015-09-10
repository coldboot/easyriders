<?php
 	ob_start(); 
	//Include Database Connection
	include("../../include/dbconnect.php");
			//Include session
	
	include("../../include/constants.php");
	include("../../include/session.php");
	//Include Constants
	
		//Include session
	include("../../include/functions.php");
		//Include Editor
	include("../../fckeditor/fckeditor.php") ;
	//include paging
    include("../../include/paging.php");
	$dir = current_dir();
$link= current_link();
define("GALLERYPATH",$dir."/gallery");
define("GALLERYLINK",$link."/gallery");
define("CATEGORYPATH",$dir."/category");
define("CATEGORYLINK",$link."/category");	
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title><?php echo $varAdminPage;?></title>
	<link href="style.css" rel="stylesheet" media="all" />
	<link href="" rel="stylesheet" title="style" media="all" />
	
	<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.7.2.js"></script>
	<script type="text/javascript" src="js/tooltip.js"></script>
	<script type="text/javascript" src="js/tablesorter.js"></script>
	<script type="text/javascript" src="js/tablesorter-pager.js"></script>
	<script type="text/javascript" src="js/cookie.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<script type="text/javascript" src="js/jquery.timepicker-list.js"></script>
	
	<script type="text/javascript" src="js/validate.js"></script>
	
 <script type="text/javascript">
function calldel(m) 
{
if(!confirm(m))
{
return false;
}
else
return true;
}
function checkvalue() 
{

}

</script>  

		
</head>
<body>
	<div id="header">
		<div id="top-menu">
			<!--<a href="#" title="My account">My account</a> |
			<a href="settings.php" title="Settings">Settings</a> |
			<a href="#" title="Contact us">Contact us</a>
		-->
			<span><a href="#" title="Logged in as admin"><?php echo "Logged in as ".$_SESSION["Session_Username"]; ?></a></span>
			| <a href="settings.php#settings" title="Settings">General Settings</a>
			| <a href="changepassword.php#change" title="Change Password">Change Password</a>
			| <a href="adminlogout.php" title="Logout">Logout</a>
		</div>
		<div id="sitename">
			<a href="index.php" class="logo float-left" title="Admin Home"><?php echo $varHomePage;?></a>
		</div>
		
		<ul id="navigation" class="sf-navbar">
		
			<li>
				<a href="index.php">General Settings</a>
				<ul>
					<li><a href="settings.php#settings">Settings</a></li>
					<li><a href="changepassword.php#change">Change Password</a></li>
					<li><a href="adminlogout.php">Logout</a></li>
				</ul>
			</li>
			
			<li>
				<a href="cms.php?menutype=<?php echo base64_encode('home');?>">CMS</a>
				<ul>
				<li><a href="cms.php?menutype=<?php echo base64_encode('home');?>">Home</a></li>
				<li><a href="#">Customer Service</a>
					   <ul>
							<li><a href="cms.php?menutype=<?php echo base64_encode('contactus');?>">Contact us</a></li>
							<li><a href="cms.php?menutype=<?php echo base64_encode('returnpolicy');?>">Returns Policy</a></li>
							<li><a href="cms.php?menutype=<?php echo base64_encode('ordertracking');?>">Order Tracking</a></li>
							<li><a href="cms.php?menutype=<?php echo base64_encode('deliveryinformation');?>">Delivery Information</a></li>
							<li><a href="cms.php?menutype=<?php echo base64_encode('technicalproblem');?>">Technical Problems</a></li>
							<li><a href="cms.php?menutype=<?php echo base64_encode('paymentinformation');?>">Payment Information</a></li>
					   </ul>
				</li>
					<li><a href="#">Shopping Online</a>
					   <ul>
							<li><a href="cms.php?menutype=<?php echo base64_encode('useourwebsite');?>">Use Our Website</a></li>
							<li><a href="cms.php?menutype=<?php echo base64_encode('sitemap');?>">SiteMap</a></li>
							<li><a href="cms.php?menutype=<?php echo base64_encode('sizechart');?>">Size Chart</a></li>
							<li><a href="cms.php?menutype=<?php echo base64_encode('giftvouchers');?>">Gift Vouchers</a></li>
							<li><a href="cms.php?menutype=<?php echo base64_encode('discountsandcoupons');?>">Discounts & Coupons</a></li>
					   </ul>
				</li>
				<li><a href="#">About Us</a>
					   <ul>
							<li><a href="cms.php?menutype=<?php echo base64_encode('aboutus');?>">About us</a></li>
					        <li><a href="cms.php?menutype=<?php echo base64_encode('privacyandpolicy');?>">Privacy Policy</a></li>
					        <li><a href="cms.php?menutype=<?php echo base64_encode('termsandconditions');?>">Terms & Conditions</a></li>
					        <li><a href="cms.php?menutype=<?php echo base64_encode('wholesaleandtrade');?>">Wholesale & Trade</a></li>
					        <li><a href="cms.php?menutype=<?php echo base64_encode('visitourshop');?>">Visit Our Shop</a></li>
							<li><a href="cms.php?menutype=<?php echo base64_encode('dropshipping');?>">Drop Shipping</a></li>
					   </ul>
				</li>
				<li><a href="#">More Information</a>
					   <ul>
							<li><a href="cms.php?menutype=<?php echo base64_encode('affiliatescheme');?>">Affliate Scheme</a></li>
					        <li><a href="cms.php?menutype=<?php echo base64_encode('downloads');?>">Downloads</a></li>
					        <li><a href="cms.php?menutype=<?php echo base64_encode('loyalitypoints');?>">Loyality Points</a></li>
					        <li><a href="cms.php?menutype=<?php echo base64_encode('sponsorship');?>">Sponsorship</a></li>
					        <li><a href="cms.php?menutype=<?php echo base64_encode('testimonial');?>">Testimonials</a></li>
					   </ul>
				</li>
				<li><a href="cms.php?menutype=<?php echo base64_encode('customerservice');?>">Customer Service</a></li>
				<li><a href="cms.php?menutype=<?php echo base64_encode('thanks');?>">Thanks</a></li>
				<li><a href="cms.php?menutype=<?php echo base64_encode('error');?>">Error</a></li>
			</ul>
		</li>
			
			<li>
				<a href="viewmember.php">Member</a>
				<ul>
				    <li><a href="addmember.php">Add Member</a></li>
					<li><a href="viewmember.php">View Member</a></li>
					
				</ul>
			</li>
			<li>
				<a href="viewretailer.php">Retailer</a>
				<ul>
				    <li><a href="addretailer.php">Add Retailer</a></li>
					<li><a href="viewretailer.php">View Retailer</a></li>
				</ul>
			</li>
				<li>
				<a href="viewcategory.php">Category</a>
				<ul>
				    <li><a href="addcategory.php">Add Category</a></li>
					<li><a href="viewcategory.php">View Category</a></li>
					 <li><a href="addsubcategory.php">Add SubCategory</a></li>
					<li><a href="viewsubcategory.php">View SubCategory</a></li>
				</ul>
			</li>
				
			<li>
				<a href="viewproduct.php">Product</a>
				<ul>
				    <li><a href="addproduct.php">Add Product</a></li>
					<li><a href="viewproduct.php">View Product</a></li>
<!--					<li><a href="pexport.php">Export Product</a></li>
-->				</ul>
			</li>
			
			<li>
							<a href="vieworders.php">Order Management</a>
				<ul>
				 <li><a href="vieworders.php">View Order</a></li>
				</ul>
			</li>
			
		<!--<li>
				<a href="sendmails.php?id=1">Mail Content</a>
				<ul>
					<li><a href="sendmails.php?id=1">Registration Thank You Mail</a></li>
            		<li><a href="sendmails.php?id=2">Order Success! Thank You Mail</a></li>
					<li><a href="sendmails.php?id=3">Order Cancelled! Notification Mail</a></li>
					<li><a href="sendmails.php?id=4">Forget Password Mail</a></li>
        		</ul>
		</li>-->
		<li>
				<a href="viewcoupon.php">Coupon/Gift cards</a>
				<ul>
					<li><a href="addcoupon.php">Add Coupon</a></li>
            		<li><a href="viewcoupon.php">View Coupon</a></li>
					<li><a href="sendcoupon.php">Send Coupon</a></li>
						<li><a href="viewsendcoupon.php">View Sent Coupons</a></li>
        		</ul>
		</li>
	<li>
				<a href="viewsubscriber.php">Newsletter</a>
				<ul>
					<li><a href="addsubscriber.php">Add Subscriber</a></li>
            		<li><a href="viewsubscriber.php">View Subscriber</a></li>
					<li><a href="sendnewsletter.php">Send Newsletter</a></li>
						<li><a href="viewsentmail.php">View Sent Newsletter</a></li>
        		</ul>
		</li>
		
		
		</ul>
	</div>
	</div>
	</body>
	</html>
