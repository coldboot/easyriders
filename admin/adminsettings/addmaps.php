<?php



 include('header.php'); 





$cid=$_REQUEST['cid'];

if($_REQUEST['cid'] !="")

{

	$cid=$_REQUEST['cid'];

}



if(isset($_POST['submit']))

{

	 $cid=$_POST['cid'];

	

$mapname=$_POST['mapname'];

$maplink = $_POST['maplink'];



$maplarge = $_POST['maplarge'];



$disptitle		=	$_POST['cmd_Submit'];



			

			

		



	if($cid=="")

	{

	

		$sel_cat="SELECT * FROM tbl_cycling_maps WHERE `mapname`='$mapname'";	

		 

		$res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());

		

		$num_cat=mysql_num_rows($res_cat);



		

		

	

		if($num_cat!= 0)

		{

			$flag="error";

		}

	

		else

		{	

			$sel_cat="SELECT * FROM tbl_cycling_maps";

			

			$res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());

			

			$num_cat=mysql_num_rows($res_cat);

		



   

		

  $ins_cat="INSERT INTO tbl_cycling_maps(`mapname`,`varstatus`,`maplink`,`date`,`maplarge`) VALUES ('$mapname','Active','$maplink',now(),'$maplarge')";

			





			mysql_query($ins_cat)or die(mysql_error());

			

			$insertid	=	mysql_insert_id();

			



						

			

			$flag="success";

			header("Location:viewmaps.php?rflag=success&rtype=add");

		}

	}

	

	if($cid!="")

	{

	

	  $upd_cat="UPDATE tbl_cycling_maps SET `mapname`='$mapname',`maplink`='$maplink',`maplarge`='$maplarge' WHERE `id`='$cid'";

			mysql_query($upd_cat);

			

		

					

					//$imgnamethumb=$_FILES['deimage'];

		

			$flag="update";

			header("Location:viewmaps.php?rflag=success&rtype=edit");

	}

	

	}

	



	

if($cid != "")

{

	$sel_cat1="SELECT * FROM tbl_cycling_maps WHERE `id`='$cid'";	

	

	$res_cat1=mysql_query($sel_cat1);

	

	$fetch_cat1=mysql_fetch_array($res_cat1);

	

	$mapname=$fetch_cat1['mapname'];

	$maplink=$fetch_cat1['maplink'];

	$maplarge=$fetch_cat1['maplarge'];



	

	

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

		

	if(document.frm_cat.mapname.value=="")

	{

		alert("Please Enter The Map name");

		document.frm_cat.mapname.focus();

		return false;

	}

		



	



		if( document.frm_cat.maplink.value=="")

	{

		alert("Please Enter The Map Link");

		document.frm_cat.maplink.focus();

		return false;

	}

	

	

	  

		  

     

		if( document.frm_cat.maplarge.value=="")

	{

		alert("Please Enter The Map Link");

		document.frm_cat.maplarge.focus();

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

			<h2><?php echo $disptitle;?> Maps </h2>

					

				</div>

				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">

					<div class="portlet-header ui-widget-header"><?php echo $disptitle;?> Maps</div>

				    <?php if($_GET['log']=="succ"){?>	<div class="response-msg success ui-corner-all">

									<span>Your Details are Successfully Updated!</span>

									

								</div><?php } ?>

					<div class="portlet-content">

						<form action="addmaps.php" method="post" enctype="multipart/form-data" class="forms"  name="frm_cat" onSubmit="return addcat_validate();" onKeyPress="" >

							<ul>



						<li><span class="red">*</span>

									<label  class="desc">Map Name</label>

									<div>

									  <input type="text"  maxlength="255" value="<?php echo $mapname;?>" class="field text small" name="mapname" tabindex="1" onKeyPress="imposeMaxLength(this,25);" /><br />

									  (Maximum 25 characters)

									</div>

							  </li>

									

									<li><span class="red">*</span>

									<label  class="desc">Map Link</label>

							 

									<div>

									  

									 

									 

									 <textarea name="maplink" cols="50" rows="5" tabindex="1"><?php echo $maplink;?></textarea>

									 

									 

									</div>

							  </li>

							  <li><span class="red">*</span>

								<label  class="desc">Map Link in Larger view</label>

							 

									<div>

									

									  

									  

									   <textarea name="maplarge" cols="50" rows="5" tabindex="1"><?php echo $maplarge;?></textarea>

									 

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