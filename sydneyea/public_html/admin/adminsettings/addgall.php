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
	
$gallery=$_POST['gallery'];
$categoryname=$_POST['categoryname'];
$catdescription = $_POST['catDescription'];
$catimage = $_FILES['deimage'];
$catlargeimage = $_FILES['deimage2'];



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
			
			
			
			
			$image2=$_FILES["deimage2"]["name"];
if($image!="")
{
$rand=rand(0,24342324);
	
	$limg = $rand."_".$_FILES['deimage2']['name'];
			 
				$catpath2 = $gpath.$limg;
				copy($_FILES['deimage2']['tmp_name'],$catpath2);	
				
			}	

	if($cid=="")
	{
	
		$sel_cat="SELECT * FROM ".CATEGORY." WHERE `varCategoryname`='$categoryname'";	
		 
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
		

   
		
  $ins_cat="INSERT INTO ".CATEGORY."(`varGallery`,`varCategoryname`,`varStatus`,`catimage`,`catDescription`,`catlargeimage`) VALUES ('$gallery','$categoryname','Active','$gimg','$catdescription','$limg')";
			
			mysql_query($ins_cat)or die(mysql_error());
			
			$insertid	=	mysql_insert_id();
			

						
			
			$flag="success";
			header("Location:viewgall.php?rflag=success&rtype=add");
		}
	}
	
	if($cid!="")
	{
	
	  $upd_cat="UPDATE ".CATEGORY. " SET `varGallery`='$gallery',`varCategoryname`='$categoryname',`catDescription`='$catdescription' WHERE `catid`='$cid'";
			mysql_query($upd_cat);
			
						
			//$imgnamethumb=$_FILES['deimage'];
			if (isset($_FILES["deimage"]) && $_FILES["deimage"]["name"])
			{
			//$cimagename = copyimageonly($path,$catimage,$cid);
			
			$updqry="UPDATE ".CATEGORY." SET `catimage`='".$gimg."' WHERE `catid` ='$cid' ";
			$result = mysql_query($updqry)or die(mysql_error());
			}//End of Image Checking
					
					
					//$imgnamethumb=$_FILES['deimage'];
			if (isset($_FILES["deimage2"]) && $_FILES["deimage2"]["name"])
			{
			//$cimagename = copyimageonly($path,$catimage,$cid);
			
			$updqry="UPDATE ".CATEGORY." SET `catlargeimage`='".$limg."' WHERE `catid` ='$cid' ";
			$result = mysql_query($updqry)or die(mysql_error());
			}//End of Image Checking
		
			$flag="update";
			header("Location:viewgall.php?rflag=success&rtype=edit");
	}
	
	}
	

	
if($cid != "")
{
	$sel_cat1="SELECT * FROM ".CATEGORY." WHERE `catid`='$cid'";	
	
	$res_cat1=mysql_query($sel_cat1);
	
	$fetch_cat1=mysql_fetch_array($res_cat1);
	
	$gallery=$fetch_cat1['varGallery'];
	$categoryname=$fetch_cat1['varCategoryname'];
	$catDescription=$fetch_cat1['catDescription'];
	
	
	/*$metakey=$fetch_cat1['metakey'];
	$metadesc=$fetch_cat1['metadesc'];*/
	$catimage=$fetch_cat1['catimage'];
		$catlargeimage=$fetch_cat1['catlargeimage'];

	
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
		
	if(document.frm_cat.gallery.value=="")
	{
		alert("Please select a gallery");
		document.frm_cat.gallery.focus();
		return false;
	}
		
	if(document.frm_cat.categoryname.value=="")
	{
		alert("Please Enter The Image Name");
		document.frm_cat.categoryname.focus();
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
	
	<?php if($cid=="")
	{
	?>
	if(document.frm_cat.deimage2.value=="")
	{
		alert("Please Enter The Large Image");
		document.frm_cat.deimage2.focus();
		return false;
	}
	<?php }?>
		if( document.frm_cat.catDescription.value=="")
	{
		alert("Please Enter The Description");
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
			<h2><?php echo $disptitle;?> Gallery </h2>
					
				</div>
				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">
					<div class="portlet-header ui-widget-header"><?php echo $disptitle;?> Gallery</div>
				    <?php if($_GET['log']=="succ"){?>	<div class="response-msg success ui-corner-all">
									<span>Your Details are Successfully Updated!</span>
									
								</div><?php } ?>
					<div class="portlet-content">
						<form action="addgall.php" method="post" enctype="multipart/form-data" class="forms"  name="frm_cat" onSubmit="return addcat_validate();" onKeyPress="" >
							<ul>
						<li><span class="red">*</span>
									<label  class="desc">Gallery</label>
									<div>
									<select name="gallery">
									    <?php
		    							    $select=mysql_query("select * from tbl_cycling_galleries where varStatus ='Active'");
		    							    $i=0;
		    							    while($fetch=mysql_fetch_array($select)) { 
		    							        $i++;
									        echo "<option value=\"".$fetch['varGallery']."\">".$fetch['varGallery']."</option>";
									    }
									    ?>
									  </select>
									</div>
							  </li>
							  
						<li><span class="red">*</span>
									<label  class="desc">Image Name</label>
									<div>
									  <input type="text"  maxlength="255" value="<?php echo $categoryname;?>" class="field text small" name="categoryname" tabindex="1" onKeyPress="imposeMaxLength(this,25);" /><br />
									  (Maximum 25 characters)
									</div>
							  </li>
							  
							  <li><span class="red">*</span>
								<label  class="desc">Small Image</label>
							
							  <?php if($cid!="") { ?> 
							  <span class="red">*</span>
									<label  class="desc"> </label>
									<div> <img src="../../deimage1/<?php echo $catimage; ?>" width="130" height="120" /></div>
							
								
							<?php }?>
								<div><input type="file" tabindex="1" maxlength="255" value="" class="field text small" name="deimage" /></div>
							</li>	
										
										  <li><span class="red">*</span>
								<label  class="desc">Large Image</label>
							
							  <?php if($cid!="") { ?> 
							  <span class="red">*</span>
									<label  class="desc"> </label>
									<div> <img src="../../deimage1/<?php echo $catlargeimage; ?>" width="143" height="177" /></div>
							
								
							<?php }?>
								<div><input type="file" tabindex="1" maxlength="255" value="" class="field text small" name="deimage2" /></div>
							</li>				
									<li><span class="red">*</span>
								<label  class="desc">Description</label>
							  <div><textarea name="catDescription" cols="55" rows="5" tabindex="1"><?php echo $catDescription;?></textarea></div>
								</li>
								
								
								
								<!--<li><span class="red">*</span>
									<label  class="desc" >File Name</label>
										<div>
						<input type="file"  name="file" value="<?php echo $fetch['file']; ?>" class="field text medium" id="textfield" />
										</div>
							  	</li> -->
									
								
								
							
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