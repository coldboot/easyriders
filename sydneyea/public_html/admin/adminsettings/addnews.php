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
	
$heading=$_POST['heading'];
$description = $_POST['description'];
$disptitle		=	$_POST['cmd_Submit'];	
	
	if($cid=="")
	{
	
		$sel_cat="SELECT * FROM  tbl_cycling_news  WHERE `heading`='$heading'";	
		 
		$res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());
		
		$num_cat=mysql_num_rows($res_cat);

		
		
	
		if($num_cat!= 0)
		{
			$flag="error";
		}
	
		else
		{	
			$sel_cat="SELECT * FROM tbl_cycling_news";
			
			$res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());
			
			$num_cat=mysql_num_rows($res_cat);
		
			
		
		  $ins_cat="INSERT INTO  tbl_cycling_news (`heading`,`status`,`description`,`date`) VALUES ('$heading','Active','$description',now())";
			
			mysql_query($ins_cat)or die(mysql_error());
			
			$insertid	=	mysql_insert_id();
			

						
		
					
			
			$flag="success";
			header("Location:viewnews.php?rflag=success&rtype=add");
		}
	}
	
	if($cid!="")
	{
	
	  $upd_cat="UPDATE tbl_cycling_news set `heading`='$heading',`description`='$description'  WHERE `intid`='$cid'";
			mysql_query($upd_cat);
			
	
					
		
			$flag="update";
			header("Location:viewnews.php?rflag=success&rtype=edit");
	}
	
	}
	

	
if($cid != "")
{
	$sel_cat1="SELECT * FROM  tbl_cycling_news WHERE `intid`='$cid'";	
	
	$res_cat1=mysql_query($sel_cat1);
	
	$fetch_cat1=mysql_fetch_array($res_cat1);
	
	$heading=$fetch_cat1['heading'];
	
	
	$description = $fetch_cat1['description'];
	
	
	
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
	var heading = document.frm_cat.heading.value;
	var description = document.frm_cat.description.value;
	
	if(heading=="")
	{
		alert("Please Enter Heading");
		document.frm_cat.heading.focus();
		return false;
	}
	
	/*if(isAlphanum(categoryname)==false)
	{
		alert("Category Name Contains Invalid Characters");
		document.frm_cat.categoryname.focus();
		return false;
	}*/
	
	if(description=="")
	{
		alert("Please Enter Description");
		document.frm_cat.description.focus();
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
			<h2><?php echo $disptitle;?> NEWS </h2>
					
				</div>
				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">
					<div class="portlet-header ui-widget-header"><?php echo $disptitle;?>&nbsp;NEWS </div>
				    <?php if($_GET['log']=="succ"){?>	<div class="response-msg success ui-corner-all">
									<span>Your Details are Successfully Updated!</span>
									
								</div><?php } ?>
					<div class="portlet-content">
						<form action="addnews.php" method="post" enctype="multipart/form-data" class="forms"  name="frm_cat" onSubmit="return addcat_validate();" onkeypress="" >
							<ul>
						<li><span class="red">*</span>
									<label  class="desc">Heading</label>
									<div>
									  <input type="text"  maxlength="255" value="<?php echo $heading;?>" class="field text small" name="heading" tabindex="1" onkeypress="imposeMaxLength(this,25);" /><br />
									  (Maximum 25 characters)
									</div>
							  </li>
							  
							
							  
								<li><span class="red">*</span>
								<label  class="desc">Description</label>
								  <div><textarea name="description" cols="55" rows="5" tabindex="1"><?php echo $description;?></textarea></div>
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