<?php

 include('header.php'); 

$path=SUBCATIMAGE;

$cid=$_REQUEST['cid'];
if($_REQUEST['cid'] !="")
{
	$cid=$_REQUEST['cid'];
}

if(isset($_POST['submit']))
{
	 $cid=$_POST['cid'];
	
$jobname=addslashes($_POST['categoryname']);
$catdescription = addslashes($_POST['catdescription']);
$catimage = $_FILES['catimage'];
$categoryid = ($_POST['categoryid']);
$metakey 	 = $_POST['metakey'];
$metadesc = $_POST['metadesc'];
$metatitle = $_POST['metatitle'];
$heading = $_POST['heading'];
$disptitle		=	$_POST['cmd_Submit'];	
	
	if($cid=="")
	{
	
		$sel_cat="SELECT * FROM ".ADDSUBCATEGORY." WHERE `subcatname`='$jobname'";	
		 
		$res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());
		
		$num_cat=mysql_num_rows($res_cat);

		
		
	
		if($num_cat!= 0)
		{
			$flag="error";
		}
	
		else
		{	
			$sel_cat="SELECT * FROM ".ADDSUBCATEGORY;
			
			$res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());
			
			$num_cat=mysql_num_rows($res_cat);
		
			
				$tmp_name=$catimage['tmp_name'];
		$name=$catimage['name'];
		$rand=rand(0,100000);
		$name=$rand."_".$name;
		
		if(copy($tmp_name,$path.$name))
		{
		 $image=$name;
		
		
		 $ins_cat="INSERT INTO ".ADDSUBCATEGORY."(`catimage`,`catid`,`subcatname`,`varstatus`,`desc`) VALUES ('$image','$categoryid','$jobname','Active','$catdescription')";
			
			mysql_query($ins_cat)or die(mysql_error());
			
			$insertid	=	mysql_insert_id();
			
}
	
			
			$flag="success";
			header("Location:viewsubcategory.php?rflag=success&rtype=add");
		}
	}
	
	if($cid!="")
	{
	if($catimage['name']!="")
	{
	
	
				$tmp_name=$catimage['tmp_name'];
		$name=$catimage['name'];
		$rand=rand(0,100000);
		$name=$rand."_".$name;
		
		if(copy($tmp_name,$path.$name))
		{
		 $image=$name;
	  $upd_cat="UPDATE ".ADDSUBCATEGORY. " SET  `catimage`='$image',`catid`='$categoryid',`subcatname`='$jobname',desc='$catdescription' WHERE `scid`='$cid'";
			mysql_query($upd_cat);
			
			}
		}
		
		if($catimage['name']=="")
	{
	  $upd_cat="UPDATE ".ADDSUBCATEGORY. " SET  `catid`='$categoryid',`subcatname`='$jobname',desc='$catdescription' WHERE `scid`='$cid'";
			mysql_query($upd_cat);
		}	
						
	
					
		
			$flag="update";
			header("Location:viewsubcategory.php?rflag=update&rtype=edit");
	}
	
	}
	

	
if($cid != "")
{
	$sel_cat1="SELECT * FROM ".ADDSUBCATEGORY." WHERE `scid`='$cid'";	
	
	$res_cat1=mysql_query($sel_cat1);
	
	$fetch_cat1=mysql_fetch_array($res_cat1);
		$categoryid=$fetch_cat1['catid'];
	$jobname=$fetch_cat1['subcatname'];
	$metakey=$fetch_cat1['metakey'];
	$metadesc=$fetch_cat1['metadesc'];
	$catimage=$fetch_cat1['catimage'];
	$metatitle=$fetch_cat1['metatitle'];
	$heading=$fetch_cat1['heading'];
	$catdescription = stripslashes($fetch_cat1['desc']);
	$belowdescription = stripslashes($fetch_cat1['belowdescription']);
	
	
	$disptitle="Update";
}
if($disptitle=="")
{
	$disptitle="Add";
}
		
?>


<script>

function addcat_validate()
{


 var  categoryid= document.frm_cat.categoryid.value;
		 if ( categoryid=="choose" )
		 { 
			 alert ("Please Select The  Main Category Name");
			 document.frm_cat.categoryid.focus();
			 return false;
		 }
         var  categoryname= document.frm_cat.categoryname.value;
		 if ( categoryname=="" )
		 { 
			 alert ("Please Select The Category Name");
			 document.frm_cat.categoryname.focus();
			 return false;
		 }

		 
		 if ( catimage=="" )
		 { 
			 alert ("Please Select The catimage Image");
			 document.frm_cat.catimage.focus();
			 return false;
		 }		
		 var  catdescription= document.frm_cat.catdescription.value;
		 if ( catdescription=="" )
		 { 
			 alert ("Please Select The Sub Category description");
			 document.frm_cat.catdescription.focus();
			 return false;
		 } 
}
</script>


	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				
				
				<div class="clearfix"></div>
				<div class="title title-spacing">
			<a name="addcat"></a>
			<h2><?php echo $disptitle;?> Sub Category </h2>
					
				</div>
				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">
					<div class="portlet-header ui-widget-header"><?php echo $disptitle;?> Sub Category </div>
				    <?php if($_GET['log']=="succ"){?>	<div class="response-msg success ui-corner-all">
									<span>Your Details are Successfully Updated!</span>
									
								</div><?php } ?>
					<div class="portlet-content">
						<form action="addsubcategory.php" method="post" enctype="multipart/form-data" class="forms"  name="frm_cat" onSubmit="return addcat_validate();" >
							<ul>
							
							
								<li>
									<label  class="desc">Main Category Name</label>
									<div>
										<select name="categoryid" id="categoryid" onchange="showCat(this.value);">
										<option value="choose">Choose</option>
										<?php
										$select_cat = "SELECT * FROM ".ADDCATEGORY." order by  catid DESC";
										$result_cat = mysql_query($select_cat);
										while($fetch_cat= mysql_fetch_array($result_cat)){
										if($categoryid == $fetch_cat['catid']) {
										$selected = "SELECTED";
										} else {
										$selected = "";
										}
										?>
							<option value="<?php echo $fetch_cat['catid'];?>" <?php echo $selected;?>><?php echo $fetch_cat['varCategoryname'];?></option>
										<?php } ?>
										</select>
									</div>
								</li>
							
							
							
						<li>
									<label  class="desc">Sub category Name</label>
									<div>
									  <input type="text" tabindex="1" maxlength="255" value="<?php echo $jobname;?>" class="field text small" name="categoryname" />
									</div>
							  </li>
							  
							  
							   <li>
								<label  class="desc">Sub category Picture</label>
								<div>
								<input name="catimage" type="file" class="forms" id="catimage" />
								
								</div>
								</li>
								
								
									<?php If($cid !="") { ?>
									
								<img src="<?php echo $path.$catimage; ?>" border="0"  height="100"/>
								<?php }?>
							  
							  
								<li><label  class="desc">Description</label>
								  <div><textarea name="catdescription" cols="55" rows="5"><?php echo $catdescription;?></textarea></div>
								</li>
							
								<li class="buttons">
								  <input type="submit" value="<?php echo $disptitle;?>" class="submit" name="submit" />
								  <input name="cid" type="hidden" id="cid"  value="<?php echo $cid;?>"/>
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