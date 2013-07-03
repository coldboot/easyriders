<?php



 include('header.php'); 



$path="../../deimage1/";

$gpath="../../deimage1/";



$cid=$_REQUEST['cid'];

if($_REQUEST['cid'] !="")

{

	$cid=$_REQUEST['cid'];

}



if(isset($_POST['submit']))

{

	 $cid=$_POST['cid'];

	

$bannername=$_POST['bannername'];

$bannerdesc = $_POST['bannerdesc'];



$varlink = $_POST['varlink'];



$amount = $_POST['amount'];









/*$metakey 	 = $_POST['metakey'];

$metadesc = $_POST['metadesc'];

$metatitle = $_POST['metatitle'];

$heading = $_POST['heading'];*/

$disptitle		=	$_POST['cmd_Submit'];



$image=$_FILES["deimage"]["name"];

if($image!="")

{

$rand=rand(0,24342324);

	

	$gimg = $rand."_".$_FILES['deimage']['name'];

			 

				$catpath = $gpath.$gimg;

				copy($_FILES['deimage']['tmp_name'],$catpath);	

				

			}	

			

			

		



	if($cid=="")

	{

	

		$sel_cat="SELECT * FROM ".BANNER." WHERE `varBannername`='$bannername'";	

		 

		$res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());

		

		$num_cat=mysql_num_rows($res_cat);



		

		

	

		if($num_cat!= 0)

		{

			$flag="error";

		}

	

		else

		{	

			$sel_cat="SELECT * FROM ".BANNER."";

			

			$res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());

			

			$num_cat=mysql_num_rows($res_cat);

		



   

		

  $ins_cat="INSERT INTO ".BANNER."(`varBannername`,`varStatus`,`varBannerimage`,`varDescription`,`varlink`,`varAmount`,`date`) VALUES ('$bannername','Active','$gimg','$bannerdesc','$varlink','$amount',now())";

			





			mysql_query($ins_cat)or die(mysql_error());

			

			$insertid	=	mysql_insert_id();

			



						

			

			$flag="success";

			header("Location:viewbanner.php?rflag=success&rtype=add");

		}

	}

	

	if($cid!="")

	{

	

	  $upd_cat="UPDATE ".BANNER. " SET `varBannername`='$bannername',`varDescription`='$bannerdesc',`varlink`='$varlink',`varamount`='$amount' WHERE `catid`='$cid'";

			mysql_query($upd_cat);

			

						

			//$imgnamethumb=$_FILES['deimage'];

			if (isset($_FILES["deimage"]) && $_FILES["deimage"]["name"])

			{

			//$cimagename = copyimageonly($path,$catimage,$cid);

			

			$updqry="UPDATE ".BANNER." SET `varBannerimage`='".$gimg."' WHERE `catid` ='$cid' ";

			$result = mysql_query($updqry)or die(mysql_error());

			}//End of Image Checking

					

					

					//$imgnamethumb=$_FILES['deimage'];

		

			$flag="update";

			header("Location:viewbanner.php?rflag=success&rtype=edit");

	}

	

	}

	



	

if($cid != "")

{

	$sel_cat1="SELECT * FROM ".BANNER." WHERE `catid`='$cid'";	

	

	$res_cat1=mysql_query($sel_cat1);

	

	$fetch_cat1=mysql_fetch_array($res_cat1);

	

	$bannername=$fetch_cat1['varBannername'];

	$varDescription=$fetch_cat1['varDescription'];

	

	

	/*$metakey=$fetch_cat1['metakey'];

	$metadesc=$fetch_cat1['metadesc'];*/

	$varBannerimage=$fetch_cat1['varBannerimage'];

		$varlink=$fetch_cat1['varlink'];



		$varAmount=$fetch_cat1['varAmount'];









	

	/*$metatitle=$fetch_cat1['metatitle'];

	$heading=$fetch_cat1['heading'];*/

	/*$belowdescription = $fetch_cat1['belowdescription'];*/

	

	

	$disptitle="Update";

}

if($disptitle=="")

{

	$disptitle="Add";

}

		

?>







<script type="text/javascript">

function addcat_validate()

{

		

	if(document.frm_cat.bannername.value=="")

	{

		alert("Please Enter The Banner name");

		document.frm_cat.bannername.focus();

		return false;

	}

		



	<?php if($cid=="")

	{

	?>

	if(document.frm_cat.deimage.value=="")

	{

		alert("Please Enter The Image");

		document.frm_cat.deimage.focus();

		return false;

	}

	<?php }?>	

	



		if( document.frm_cat.bannerdesc.value=="")

	{

		alert("Please Enter The Description");

		document.frm_cat.bannerdesc.focus();

		return false;

	}

		if( document.frm_cat.varlink.value=="")

	{

		alert("Please Enter The Link");

		document.frm_cat.varlink.focus();

		return false;

	}

	

	if( document.frm_cat.amount.value=="")

	{

		alert("Please Enter The amount");

		document.frm_cat.amount.focus();

		return false;

	}

	

	return true;

}



function imposeMaxLength(fld,len)

{

	if(fld.value.length > len) { alert("You Reached Maximum Character Limit"); fld.value = fld.value.substr(0,len-1); }

}



</script>





	<div id="page-wrapper">

		<div id="main-wrapper">

			<div id="main-content">

				

				

				<div class="clearfix"></div>

				<div class="title title-spacing">

			<a name="addcat"></a>

			<h2><?php echo $disptitle;?> Banner </h2>

					

				</div>

				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">

					<div class="portlet-header ui-widget-header"><?php echo $disptitle;?> Banner</div>

				    <?php if($_GET['log']=="succ"){?>	<div class="response-msg success ui-corner-all">

									<span>Your Details are Successfully Updated!</span>

									

								</div><?php } ?>

					<div class="portlet-content">

						<form action="addbanner.php" method="post" enctype="multipart/form-data" class="forms"  name="frm_cat" onSubmit="return addcat_validate();" onKeyPress="" >

							<ul>

						<li><span class="red">*</span>

									<label  class="desc">Banner Name</label>

									<div>

									  <input type="text"  maxlength="255" value="<?php echo $bannername;?>" class="field text small" name="bannername" tabindex="1" onKeyPress="imposeMaxLength(this,25);" /><br />

									  (Maximum 25 characters)

									</div>

							  </li>

							  

							  <li><span class="red">*</span>

									<label  class="desc">Banner Image</label>

							

							  <?php if($cid!="") { ?> 

									<label  class="desc"> </label>

									<div> <img src="../../deimage1/<?php echo $varBannerimage; ?>" width="602" height="60" /></div>

							

								

							<?php }?><br/>

								<div><input type="file" tabindex="1" maxlength="255" value="" class="field text small" name="deimage" /></div>

								

								

								

								

								

							

								

									

									<li><span class="red">*</span>

								<label  class="desc">Description</label>

							  <div><textarea name="bannerdesc" cols="55" rows="5" tabindex="1"><?php echo $varDescription;?></textarea></div>

								</li>

								

								

									<li><span class="red">*</span>

									<label  class="desc">Banner Link</label>

									<div>

									  <input type="text"  maxlength="255" value="<?php echo $varlink;?>" class="field text small" name="varlink" tabindex="1"  /><br />

									 

									</div>

							  </li>

							

									<li><span class="red">*</span>

									<label  class="desc">Amount</label>

									<div>

									  $<input type="text"  maxlength="255" value="<?php echo $varAmount;?>" class="field text small" name="amount" tabindex="1" onKeyPress="imposeMaxLength(this,25);" /><br />

									  

									</div>

							  </li>

									

								

								

							

								<li class="buttons">

								  <input type="submit" value="<?php echo $disptitle;?>" class="btn ui-state-default ui-corner-all" name="submit" />

								  <input name="cid" type="hidden" id="cid"  value="<?php echo $cid;?>"/>

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