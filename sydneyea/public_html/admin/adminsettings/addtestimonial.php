<?php

 include('header.php'); 

$cpath="../../deimage1/";

$cid=$_REQUEST['cid'];
if($_REQUEST['cid'] !="")
{
	$cid=$_REQUEST['cid'];
}

if(isset($_POST['submit']))
{
	 $cid=$_POST['cid'];
	
$testimonialname=$_POST['testimonialname'];
$description = addslashes($_POST['description']);
$authorname=$_POST['authorname'];
$Url=$_POST['url'];


$disptitle		=	$_POST['cmd_Submit'];	
	
	if($cid=="")
	{
	
		$sel_cat="SELECT * FROM ".TESTIMONIAL." WHERE `testimonialname`='$testimonialname'";	
		 
		$res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());
		
		$num_cat=mysql_num_rows($res_cat);

		
		
	
		if($num_cat!= 0)
		{
			$flag="error";
		}
	
		else
		{	
			$sel_cat="SELECT * FROM ".TESTIMONIAL."";
			
			$res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());
			
			$num_cat=mysql_num_rows($res_cat);
		
			
		
		 $ins_cat="INSERT INTO ".TESTIMONIAL."(`testimonialname`,`status`,`description`,`authorname`,`url`) VALUES ('$testimonialname','Active','$description','$authorname','$Url')";
			
			mysql_query($ins_cat)or die(mysql_error());
			
			$insertid	=	mysql_insert_id();
			

						
		
			
			$flag="success";
			header("Location:viewtestimonial.php?rflag=success&rtype=add");
		}
	}
	
	if($cid!="")
	{
	
	  $upd_cat="UPDATE ".TESTIMONIAL. " SET `testimonialname`='$testimonialname',`description`='$description',`authorname`='$authorname',`url`='$Url'  WHERE `catid`='$cid'";
			mysql_query($upd_cat);
			
						
			
					
		
			$flag="update";
			header("Location:viewtestimonial.php?rflag=success&rtype=edit");
	}
	
	}
	

	
if($cid != "")
{
	$sel_cat1="SELECT * FROM ".TESTIMONIAL." WHERE `catid`='$cid'";	
	
	$res_cat1=mysql_query($sel_cat1);
	
	$fetch_cat1=mysql_fetch_array($res_cat1);
	
	$testimonialname=$fetch_cat1['testimonialname'];
	
	
	
	$description = $fetch_cat1['description'];
	$authorname=$fetch_cat1['authorname'];
	$Url=$fetch_cat1['url'];
	
	
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

	

	
	if(document.frm_cat.testimonialname.value=='')
	{
		alert("Please Enter Testimonial Name");
		document.frm_cat.testimonialname.focus();
		return false;
	}
	
	
		if( document.frm_cat.authorname.value=='')
	{
		alert("Please Enter Testimonial authorname");
		document.frm_cat.authorname.focus();
		return false;	
	}
	
	if(document.frm_cat.url.value=='')
	{
		alert("Please Enter Testimonial URL");
		document.frm_cat.url.focus();
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
			<h2><?php echo $disptitle;?> Testimonial</h2>
					
				</div>
				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">
					<div class="portlet-header ui-widget-header"><?php echo $disptitle;?> Testimonial </div>
				    <?php if($_GET['log']=="succ"){?>	<div class="response-msg success ui-corner-all">
									<span>Your Details are Successfully Updated!</span>
									
								</div><?php } ?>
					<div class="portlet-content">
						<form action="" method="post" enctype="multipart/form-data" class="forms"  name="frm_cat" onsubmit="return addcat_validate();" >
							<ul>
						<li><span class="red">*</span>
									<label  class="desc">Title</label>
									<div>
									
									  <input type="text"  maxlength="255" value="<?php echo $testimonialname;?>" class="field text small" name="testimonialname" tabindex="1" onkeypress="imposeMaxLength(this,25);" /><br />
									  (Maximum 25 characters)
									</div>
							  </li>
							  
							
							  <li><span class="red">*</span>
									<label  class="desc">Author name</label>
									<div>
									  <input type="text"  maxlength="255" value="<?php echo $authorname;?>" class="field text small" name="authorname" tabindex="1" onkeypress="imposeMaxLength(this,25);" /><br />
									  (Maximum 25 characters)
									</div>
							  </li>
							
							  
								<li>
								<label  class="desc">Description</label>
								  <div><textarea name="description" cols="55" rows="5" tabindex="1"><?php echo $description;?></textarea></div>
								</li>
								 <li><span class="red">*</span>
									<label  class="desc">Url</label>
									<div>
									  <input type="text"  maxlength="255" value="<?php echo $Url;?>" class="field text small" name="url" tabindex="1" onkeypress="imposeMaxLength(this,25);" /><br />
									  (Maximum 25 characters)
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