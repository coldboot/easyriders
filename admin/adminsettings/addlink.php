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
	
$linkname=$_POST['linkname'];
$linkurl = $_POST['linkurl'];

$linkdesc = $_POST['linkdesc'];




$disptitle		=	$_POST['cmd_Submit'];

			
			
		

	if($cid=="")
	{
	
		$sel_cat="SELECT * FROM ".LINK." WHERE `linkname`='$linkname'";	
		 
		$res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());
		
		$num_cat=mysql_num_rows($res_cat);

		
		
	
		if($num_cat!= 0)
		{
			$flag="error";
		}
	
		else
		{	
			$sel_cat="SELECT * FROM ".LINK."";
			
			$res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());
			
			$num_cat=mysql_num_rows($res_cat);
		

   
		
  $ins_cat="INSERT INTO ".LINK."(`linkname`,`varStatus`,`linkurl`,`date`,`linkdesc`) VALUES ('$linkname','Active','$linkurl',now(),'$linkdesc')";
			


			mysql_query($ins_cat)or die(mysql_error());
			
			$insertid	=	mysql_insert_id();
			

						
			
			$flag="success";
			header("Location:viewlink.php?rflag=success&rtype=add");
		}
	}
	
	if($cid!="")
	{
	
	  $upd_cat="UPDATE ".LINK. " SET `linkname`='$linkname',`linkurl`='$linkurl',`linkdesc`='$linkdesc' WHERE `catid`='$cid'";
			mysql_query($upd_cat);
			
		
					
					//$imgnamethumb=$_FILES['deimage'];
		
			$flag="update";
			header("Location:viewlink.php?rflag=success&rtype=edit");
	}
	
	}
	

	
if($cid != "")
{
	$sel_cat1="SELECT * FROM ".LINK." WHERE `catid`='$cid'";	
	
	$res_cat1=mysql_query($sel_cat1);
	
	$fetch_cat1=mysql_fetch_array($res_cat1);
	
	$linkname=$fetch_cat1['linkname'];
	$linkurl=$fetch_cat1['linkurl'];
	$linkdesc=$fetch_cat1['linkdesc'];

	
	
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
		
	if(document.frm_cat.linkname.value=="")
	{
		alert("Please Enter The Link name");
		document.frm_cat.linkname.focus();
		return false;
	}
		

	

		if( document.frm_cat.linkurl.value=="")
	{
		alert("Please Enter The Url");
		document.frm_cat.linkurl.focus();
		return false;
	}
		if( document.frm_cat.linkdesc.value=="")
	{
		alert("Please Enter The Description");
		document.frm_cat.linkdesc.focus();
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
			<h2><?php echo $disptitle;?> Link </h2>
					
				</div>
				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">
					<div class="portlet-header ui-widget-header"><?php echo $disptitle;?> Link</div>
				    <?php if($_GET['log']=="succ"){?>	<div class="response-msg success ui-corner-all">
									<span>Your Details are Successfully Updated!</span>
									
								</div><?php } ?>
					<div class="portlet-content">
						<form action="addlink.php" method="post" enctype="multipart/form-data" class="forms"  name="frm_cat" onSubmit="return addcat_validate();" onKeyPress="" >
							<ul>
						<li><span class="red">*</span>
									<label  class="desc">Link Name</label>
									<div>
									  <input type="text"  maxlength="255" value="<?php echo $linkname;?>" class="field text small" name="linkname" tabindex="1" onKeyPress="imposeMaxLength(this,25);" /><br />
									  (Maximum 25 characters)
									</div>
							  </li>
							  
							
								
								
								
								
								
							
								
									
									<li><span class="red">*</span>
								<label  class="desc">Link Url</label>
							 
									<div>
									  <input type="text"  maxlength="255" value="<?php echo $linkurl;?>" class="field text small" name="linkurl" tabindex="1" /><br />
									 
									</div>
							  </li>
							
									
										<li><span class="red">*</span>
								<label  class="desc">Link Description</label>
							 
									 <div><textarea name="linkdesc" cols="55" rows="5" tabindex="1"><?php echo $linkdesc;?></textarea></div>
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