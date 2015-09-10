<?php
include('header.php'); 

$gid="";
$disptitle="Add";
extract($_REQUEST);

if(isset($_POST['submit']))
{
	if($gid == "")
	{
		$sel_gal	=	"SELECT * FROM ".GALLERY." WHERE `gname` = '$gname'";	
		$res_gal	=	mysql_query($sel_gal) or die("SELECT ERROR".mysql_error());
		$num_gal	=	mysql_num_rows($res_gal);
		$gname	=	str_replace(" ","-",$gname);
		
		if($num_gal != 0){$flag="error";	}
		
		else
		{				
			$ins_gal	=	"INSERT INTO ".GALLERY." (`catid`,`gname`,`status`) VALUES	('$catid','$gname','active')";			
			mysql_query($ins_gal);			
			$gid	=	mysql_insert_id();
			
			$image=$_FILES['gimage'];
			if (isset($_FILES['gimage']) && $_FILES['gimage']['name'])
			{
				$gname = $_FILES['gimage']['name'];
				$gtype	=	$_FILES['gimage']['type'];
				$gsize	=	$_FILES['gimage']['size'];
				$gpath = GALLERYPATH."/".$gname;
				copy($_FILES['gimage']['tmp_name'],$gpath);	
  				$update_image="UPDATE ".GALLERY." SET gtype='$gtype',gsize='$gsize',gpath='$gname' WHERE gid ='$gid' ";
				$result = mysql_query($update_image)or die(mysql_error());
			}

			header("Location:viewgallery.php?rflag=success&rtype=add");
		}
	}
	
	else
	{
		if($gid != "")
		{
			$update_gal="UPDATE ".GALLERY. " SET `catid`='$catid',gname='$gname' WHERE `gid`='$gid'";
			mysql_query($update_gal);			
						
			echo $image=$_FILES['gimage'];
			if (isset($_FILES["gimage"]) && $_FILES["gimage"]["name"])
			{
				$gname	= $_FILES["gimage"]["name"];
				$gpath = GALLERYPATH."/".$gname;
				copy($_FILES["gimage"]["tmp_name"],$gpath);
  				$update_image="UPDATE ".GALLERY." SET gtype='gtype',gsize='gsize',gpath='$gname' WHERE gid ='$gid' ";
				$result = mysql_query($update_image)or die(mysql_error());
			}		
		
			$flag="update";
			header("Location:viewgallery.php?rflag=success&rtype=edit");
		}
	}
	
}
	
if($gid != "")
{
	$sel_gal	=	"SELECT * FROM ".GALLERY." WHERE `gid`='$gid'";	
	$res_gal	=	mysql_query($sel_gal) or die(mysql_error());
	$fet_gal	=	mysql_fetch_array($res_gal);
	extract($fet_gal);
	$disptitle="Update";
}
	
			
?>
<script type="text/javascript">
function validate_required(field,txt)
{
	with(field)
	{
		if(value == null || value == "")
		{alert(txt);			return false;}
		else
			return true;
	}
}
function validation_form(form)
{
	with(form)
	{
	if(validate_required(catid,"Please Select Category Name")==false)
	{catid.focus(); return false;}
	if(validate_required(gname,"Please Enter Image Name")==false)
	{gname.focus(); return false;}
	
	}
}
</script>
<div id="page-wrapper">
	<div id="main-wrapper">
		<div id="main-content">
			<div class="clearfix"></div>
				
				<div class="title title-spacing"><h2><?php echo $disptitle;?>&nbsp;Gallery</h2></div>
				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">
					<div class="portlet-header ui-widget-header"><?php echo $disptitle;?> Gallery </div>
				    					
					<div class="portlet-content">
						<form action="addgallery.php" method="post" enctype="multipart/form-data" class="forms"  name="frm_gallery" onSubmit="return validation_form(this);" >
							<ul>
							
								<li>
									<label  class="desc">Category Name</label>
									<div>
									<select name="catid" >
										<option value="">Choose</option>
											<?php
												$select_cat = "SELECT * FROM ".CATEGORY." ORDER BY `catid` DESC";
												$result_cat = mysql_query($select_cat);
												while($fetch_cat= mysql_fetch_array($result_cat))
												{
													if($catid == $fetch_cat['catid']) 
														$selected = "SELECTED";
													else
														$selected = "";
											?>
							<option value="<?php echo $fetch_cat['catid'];?>" <?php echo $selected;?>><?php echo $fetch_cat['varCategoryname'];?></option>
											<?php } ?>
									</select>
								</div>
							  </li>
							
							  <li>
							  	<label  class="desc">Image Name</label>
								<div><input type="text" tabindex="1" maxlength="255" value="<?php echo $gname;?>" class="field text small" name="gname" /></div>
							</li>
							
							<?php if($disptitle == "Update") { ?>
							<li>
									<label class="desc"><?php echo $gpath; ?></label>
									<div><img src="<?php echo GALLERYLINK."/".$gpath; ?>" border="0"   width="100px" height="75px" /><br /><br /></div>
									<div style="margin-left:30px"><b>(or)</b></div>
							</li>
							<?php } ?>
							
							<li>
								<label  class="desc">Upload Image</label>
								<div><input name="gimage" type="file" tabindex="1"/></div>
							</li>
																
							<li class="buttons">
								<input type="submit" value="<?php echo $disptitle;?>" class="btn ui-state-default ui-corner-all" name="submit"/>
								<input name="gid" type="hidden" id="gid"  value="<?php echo $gid;?>"/>
							</li>
						</ul>
					</form>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
<?php include('sidebar.php'); ?>
</div>
<div class="clearfix"></div>
<?php include('footer.php'); ?>
</body>
</html>