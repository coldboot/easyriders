<?php

 include('header.php'); 

$path=CATIMAGE;

$cid=$_REQUEST['cid'];
if($_REQUEST['cid'] !="")
{
	$cid=$_REQUEST['cid'];
}

if(isset($_POST['submit']))
{
	 $cid=$_POST['cid'];
	
$jobname=$_POST['categoryname'];
$catdescription = $_POST['catDescription'];
$catimage = $_FILES['catimage'];
$metakey 	 = $_POST['metakey'];
$metadesc = $_POST['metadesc'];
$metatitle = $_POST['metatitle'];
$heading = $_POST['heading'];
$disptitle		=	$_POST['cmd_Submit'];	
	
	if($cid=="")
	{
	
		$sel_cat="SELECT * FROM ".CATEGORY." WHERE `varCategoryname`='$jobname'";	
		 
		$res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());
		
		$num_cat=mysql_num_rows($res_cat);

		
		
	
		if($num_cat!= 0)
		{
			$flag="error";
		}
	
		else
		{	
			$sel_cat="SELECT * FROM ".CATEGORY."";
			
			$res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());
			
			$num_cat=mysql_num_rows($res_cat);
		
			
		
		 $ins_cat="INSERT INTO ".CATEGORY."(`varCategoryname`,`varStatus`,`catDescription`) VALUES ('$jobname','Active','$catdescription')";
			
			mysql_query($ins_cat)or die(mysql_error());
			
			$insertid	=	mysql_insert_id();
			

						
			$imgnamethumb=$_FILES['catimage'];
			if (isset($_FILES["catimage"]) && $_FILES["catimage"]["name"])
			{
			$cimagename = copyimageonly($path,$imgnamethumb,$insertid);
			
			$updqry="UPDATE ".CATEGORY." SET `catimage`='".$cimagename."' WHERE catid ='$insertid' ";
			$result = mysql_query($updqry)or die(mysql_error());
			}//End of Image Checking
					
			
			$flag="success";
			header("Location:viewcategory.php?rflag=success&rtype=add");
		}
	}
	
	if($cid!="")
	{
	
	  $upd_cat="UPDATE ".CATEGORY. " SET `varCategoryname`='$jobname',catDescription='$catdescription' WHERE `catid`='$cid'";
			mysql_query($upd_cat);
			
						
			$imgnamethumb=$_FILES['catimage'];
			if (isset($_FILES["catimage"]) && $_FILES["catimage"]["name"])
			{
			$cimagename = copyimageonly($path,$imgnamethumb,$cid);
			
			$updqry="UPDATE ".CATEGORY." SET `catimage`='".$cimagename."' WHERE `catid` ='$cid' ";
			$result = mysql_query($updqry)or die(mysql_error());
			}//End of Image Checking
					
					
		
			$flag="update";
			header("Location:viewcategory.php?rflag=success&rtype=edit");
	}
	
	}
	

	
if($cid != "")
{
	$sel_cat1="SELECT * FROM ".CATEGORY." WHERE `catid`='$cid'";	
	
	$res_cat1=mysql_query($sel_cat1);
	
	$fetch_cat1=mysql_fetch_array($res_cat1);
	
	$jobname=$fetch_cat1['varCategoryname'];
	$metakey=$fetch_cat1['metakey'];
	$metadesc=$fetch_cat1['metadesc'];
	$catimage=$fetch_cat1['catimage'];
	$metatitle=$fetch_cat1['metatitle'];
	$heading=$fetch_cat1['heading'];
	$catdescription = $fetch_cat1['catDescription'];
	$belowdescription = $fetch_cat1['belowdescription'];
	
	
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
	var categoryname = document.frm_cat.categoryname.value;
	var catDescription = document.frm_cat.catDescription.value;
	
	if(categoryname=="")
	{
		alert("Please Enter Category Name");
		document.frm_cat.categoryname.focus();
		return false;
	}
	
	/*if(isAlphanum(categoryname)==false)
	{
		alert("Category Name Contains Invalid Characters");
		document.frm_cat.categoryname.focus();
		return false;
	}*/
	
	if(catDescription=="")
	{
		alert("Please Enter Category Description");
		document.frm_cat.catDescription.focus();
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
			<h2><?php echo $disptitle;?> Category </h2>
					
				</div>
				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">
					<div class="portlet-header ui-widget-header"><?php echo $disptitle;?> Category </div>
				    <?php if($_GET['log']=="succ"){?>	<div class="response-msg success ui-corner-all">
									<span>Your Details are Successfully Updated!</span>
									
								</div><?php } ?>
					<div class="portlet-content">
						<form action="addcategory.php" method="post" enctype="multipart/form-data" class="forms"  name="frm_cat" onSubmit="return addcat_validate();" onkeypress="" >
							<ul>
						<li><span class="red">*</span>
									<label  class="desc">Category Name</label>
									<div>
									  <input type="text"  maxlength="255" value="<?php echo $jobname;?>" class="field text small" name="categoryname" tabindex="1" onkeypress="imposeMaxLength(this,25);" /><br />
									  (Maximum 25 characters)
									</div>
							  </li>
							  
							
							  
								<li><span class="red">*</span>
								<label  class="desc">Description</label>
								  <div><textarea name="catDescription" cols="55" rows="5" tabindex="1"><?php echo $catdescription;?></textarea></div>
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