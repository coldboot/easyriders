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



	<link rel="shortcut icon" href="/favicon new.ico" type="image/x-icon">

<link rel="icon" href="/favicon new.ico" type="image/x-icon">





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



			<span><a href="index.php" title="Logged in as admin"><?php echo "Logged in as ".$_SESSION["Session_Username"]; ?></a></span>



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



				<a href="cms.php?menutype=<?php echo base64_encode('Aboutus');?>">CMS</a>



				<ul>



				            <li><a href="cms.php?menutype=<?php echo base64_encode('home');?>">Home</a>



							<ul>

				           <li><a href="cms.php?menutype=<?php echo base64_encode('strava1');?>">Strava Code #1</a></li>





						   <li><a href="cms.php?menutype=<?php echo base64_encode('strava2');?>">Strava Code #2</a></li>

</ul>

</li>

					      <!--  <li><a href="cms.php?menutype=<?php echo base64_encode('customerservice');?>">Service</a></li>-->





							<li><a href="cms.php?menutype=<?php echo base64_encode('aboutus');?>">About us</a></li>









	                  <li><a href="cms.php?menutype=<?php echo base64_encode('ethos');?>">Ethos</a></li>



							<li><a href="cms.php?menutype=<?php echo base64_encode('terms');?>">Terms and Conditions</a></li>



							<li><a href="cms.php?menutype=<?php echo base64_encode('contactus');?>">Contact us</a></li>







					<!--	<li><a href="cms.php?menutype=<?php echo base64_encode('blog');?>">Blog</a></li>-->



							<!--<li><a href="cms.php?menutype=<?php echo base64_encode('return');?>"> </a></li>-->





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



				<a href="viewmaps.php">Maps</a>



				<ul>



				    <li><a href="addmaps.php">Add Maps</a></li>



					<li><a href="viewmaps.php">View Maps</a></li>







				</ul>



			</li>



			<!--	<li>





		<a href="viewtestimonial.php">Testimonial</a>



				<ul>





			    <li><a href="addtestimonial.php">Add Testimonial</a></li>





					<li><a href="viewtestimonial.php">View Testimonial</a></li>



					</ul>







			</li>



					<li>

						<a href="viewfaq.php">FAQ</a>



				<ul>



			 <li><a href="addfaq.php">Add FAQ</a></li>



				 <li><a href="viewfaq.php">View FAQ</a></li>



			</ul>



			</li>-->



			<!--	<li>



				<a href="viewnews.php">News</a>



				<ul>



				    <li><a href="addnews.php">Add news</a></li>



					<li><a href="viewnews.php">View news</a></li>



				</ul>



			</li>-->

			<li>

						<a href="viewgall.php">Gallery</a>



				<ul>



			 <li><a href="addgall.php">Add Gallery</a></li>



				 <li><a href="viewgall.php">View Gallery</a></li>





			</ul>



			</li>


             <li>

						<a href="viewheaderimage.php">Header Image</a>

				<ul>


			 <li><a href="addheaderimage.php">Add Header Image</a></li>

				 <li><a href="viewheaderimage.php">View Header Image</a></li>

			</ul>

			</li>



			<li>



				<a href="viewbanner.php">Banner</a>



				<ul>



				    <li><a href="addbanner.php">Add Banner</a></li>



					<li><a href="viewbanner.php">View Banner</a></li>







				</ul>



		</li>





			<li>
             <a href="viewlink.php">Link</a>

				<ul>

				    <li><a href="addlink.php">Add Link</a></li>

					<li><a href="viewlink.php">View Link</a></li>

				</ul>

		</li>


<li>
             <a href="viewpage.php">Pages</a>

				<ul>

				    <li><a href="addpage.php">Add Page</a></li>

					<li><a href="viewpage.php">View Page</a></li>

				</ul>

		</li>


		<li>



				<a href="/calendar/login.php">Calendar</a>

</li>









			<li>



				<a href="viewregisteredevents.php">Registered Events</a>



				<ul>







					<li><a href="viewregisteredevents.php">View RegisteredEvents</a></li>







				</ul>



		</li>



			<li>



				<a href="/blog/wp-admin">Blog</a>

</li>





			<!--

				<li>

						<a href="viewfaq.php">Advertisement</a>



				<ul>



			 <li><a href="addadvertisement.php">Add Advertisement</a></li>



				 <li><a href="viewadvertisement.php">View Advertisement</a></li>



			</ul>



			</li>-->



		<!--	<li>



				<a href="viewcategory.php">Category</a>



				<ul>



				    <li><a href="addcategory.php">Add Category</a></li>



					<li><a href="viewcategory.php">View Category</a></li>



				</ul>



			</li>-->

			<!--<li>



				<a href="viewproducts.php">Products</a>



				<ul>



				    <li><a href="addproduct.php">Add Products</a></li>



					<li><a href="viewproduct.php">View Products</a></li>







				</ul>



			</li>-->







	<!--

			<li>

			<a href="viewteam.php">Team</a>

			<ul>

				   <li><a href="addteam.php">Add Team</a></li>



					<li><a href="viewteam.php">View Team</a></li>



				</ul>

		    </li>

















			</ul>







				<a href="viewplan.php">Plan</a>







				<ul>







				    <li><a href="addplan.php">Add Plan</a></li>







					<li><a href="viewplan.php">View Plan</a></li>







			</ul>







			</li>-->











			<!--<li>

				<a href="sendmails.php?id=1">Mail Content</a>

				<ul>

					<li><a href="sendmails.php?id=1">Registration Thank You Mail</a></li>

            		<li><a href="sendmails.php?id=6">Order Success! Thank You Mail</a></li>

					<li><a href="sendmails.php?id=7">Order Cancelled! Notification Mail</a></li>

					<li><a href="sendmails.php?id=8">Forget Password Mail</a></li>

					<li><a href="sendmails.php?id=9">Contact Mail</a></li>

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













		<li>



				<a href="viewnews.php">Artist News</a>



				<ul>



				    <li><a href="addnews.php">Add news</a></li>



					<li><a href="viewnews.php">View news</a></li>



				</ul>



			</li>

			<li>



				<a href="viewteam.php">Team</a>



				<ul>



				    <li><a href="addteam.php">Add Team</a></li>



					<li><a href="viewteam.php">View Team</a></li>



				</ul>



			</li>











			<li>



				<a href="viewchart.php">Charts</a>



				<ul>



				    <li><a href="addchart.php">Add Charts</a></li>



					<li><a href="viewchart.php">View Charts</a></li>



				</ul>



			</li>

-->

<!--

			<li>



							<a href="vieworders.php">Orders</a>



				<ul>



				 <li><a href="vieworders.php">View Order</a></li>



				</ul>



			</li>





-->





		<!--<li>



							<a href="viewstatistics.php">User Statistics</a>



							<ul>



					<li><a href="view_weekly_statistics.php">Weekly Statistics</a></li>



            		<li><a href="view_monthly_statistics.php">Monthly Statistics</a></li>



							</ul>



		</li>-->



		</ul>



	</div>



	</div>



	</body>



	</html>



