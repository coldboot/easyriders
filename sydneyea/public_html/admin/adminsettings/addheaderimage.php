<?php

 include('header.php'); 
  
   $path="images/";

 
$imageid=$_REQUEST['imageid'];
if($_REQUEST['imageid'] !="")
{
	$imageid=$_REQUEST['imageid'];
}

 if(isset($_POST['Add']))
	 {
 
 $headerimagename = $_POST['headerimagename'];

 
/*$image=$_POST['deimage1'];
 if($_FILES['deimage1']['name']!="")
 {
 $rand=rand(0,2356565);
 $cname=$rand."_".$_FILES['deimage1']['name'];
 copy($_FILES['deimage1']['tmp_name'],$cpath.$cname);
 }
			
*/

$addimage=$_FILES['addimage'];
			$tmpname=$addimage['tmp_name'];
			$rand=rand(0,100000);
			 
			  
			
			$imagename=$rand."_".$addimage['name'];
			copy($tmpname,$path.$imagename);
			$oldimage=$imagename;
			
			if($addimage['name'] == "")
			{
			$imagename="images.jpeg";
			}

	
	 
         $sel_cat="SELECT * FROM ".HEADERIMAGE." WHERE `imageid`='$imageid'";	
		$res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());
		$num_cat=mysql_num_rows($res_cat);
		if($num_cat=="")
		{
				

		  $ins_cat="INSERT INTO ".HEADERIMAGE.
"(`headerimagename`,`addimage`,`status`) VALUES  

('$headerimagename','$imagename','Active')";		
		  mysql_query($ins_cat) or die(mysql_error());
		  
		
		$flag="success";
	/*?>  echo '<script type="text/javascript">window.location.href="viewblogs.php?rflag=success&rtype=add"></script>';<?php */
	 			echo '<script type="text/javascript">window.location.href="viewheaderimage.php?rflag=success&rtype=add";</script>';
   //	header("Location:viewmember.php?rflag=success&rtype=add");
		}
		else
       {
		$flag= "error";
		}
		
}		


 if(isset($_POST['Update']))
	 {
	 
 $headerimagename=$_POST['headerimagename'];


/* $image=$_POST['deimage1']; 
 if($_FILES['deimage1']['name']!="")
 {
 $rand=rand(0,2356565);
 $cname=$rand."_".$_FILES['deimage1']['name'];
 copy($_FILES['deimage1']['tmp_name'],$cpath.$cname);
 }
					
*/


		$addimage=$_FILES['addimage'];
		//$productname	=	str_replace('-',' ',$productname);
	
		
		if($addimage!="" && $addimage['name'] !="")
		{
			$tmpname=$addimage['tmp_name'];
			$rand=rand(0,100000);
			$imagename=$rand."_".$addimage['name'];
			copy($tmpname,$path.$imagename);
			$up_img="UPDATE ".HEADERIMAGE. " SET `addimage` = '$imagename' WHERE `imageid` = '$imageid'";
		}
		
  
			

			 if($imagename!="") {
			 
			 
			   $upd_cat="UPDATE ".HEADERIMAGE." SET
	 
	       `headerimagename`='$headerimagename',
	  		
			`addimage`='$imagename',
			
			

			`status`='Active'
			 WHERE  `imageid`='$imageid'";    
											 }
																		 
			if($imagename=="") {
																			
	 $upd_cat="UPDATE ".HEADERIMAGE." SET
	 
	       `headerimagename`='$headerimagename',
	  		`status`='Active'
			 WHERE  `imageid`='$imageid'";    
										 }
			 	 
			 
						mysql_query($upd_cat)or die(mysql_error());
 
				 
			            			
		$flag="update";
	 			echo '<script type="text/javascript">window.location.href="viewheaderimage.php?rflag=success&rtype=update&page='.$_GET['page'].'";</script>';
		//header("Location:viewmember.php?rflag=success&rtype=update");
	}			

	if($imageid != "")
{
	$sel_cat1="SELECT * FROM ".HEADERIMAGE." WHERE `imageid`='$imageid'";	
	
	$res_cat1=mysql_query($sel_cat1);
	
	$fetch_cat1=mysql_fetch_array($res_cat1);
	
	
	$headerimagename=$fetch_cat1['headerimagename'];


	$addimage=$fetch_cat1['addimage'];
	



	$disptitle="Update";
}
if($disptitle=="")
{
	$disptitle="Add";
} 
		
?>
	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				
				
				<div class="clearfix"></div>
				<div class="title title-spacing">
			<a name="addcat"></a>
			<h2><?php echo $disptitle;?> &nbsp;Header Image</h2>
					
			  </div>
				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">
					<div class="portlet-header ui-widget-header"><?php echo $disptitle;?>Header Image</div>
				    <?php if($_GET['log']=="succ"){?>	<div class="response-msg success ui-corner-all">
									<span>Your Details are Successfully Updated!</span>
									
								</div><?php } ?>
									<?php if($flag == "error"){ ?>
	  <div class="response-msg error ui-corner-all">
			<span>Error message</span>
		   your User Id is already exist!	  </div>
	  <?php } ?>
					<div class="portlet-content">
		
				<script>
function imposeMaxLength(fld,len)
{
	if(fld.value.length > len) { alert("You Reached Maximum Character Limit"); fld.value = fld.value.substr(0,len-1); }
}</script>
				<form action="" method="post" class="forms" enctype="multipart/form-data"  name="frm_image" onSubmit="return validation();" >
										
							<ul>
					<!--		
							<li>
									<label  class="desc">&nbsp;Title</label>
									<div>
									<select name="title" id="title" >
										<option value="">Choose</option>
								
								<option value="Mr" <?php if($title1=="Mr"){?> selected="selected" <?php } ?>>Mr</option>
								<option value="Mrs" <?php if($title1=="Mrs"){?> selected="selected" <?php } ?>>Mrs</option>
								<option value="Ms" <?php if($title1=="Ms"){?> selected="selected" <?php } ?>>Ms</option>
								<option value="Miss" <?php if($title1=="Miss"){?> selected="selected" <?php } ?>>Miss</option>
								<option value="Dr" <?php if($title1=="Dr"){?> selected="selected" <?php } ?>>Dr</option>
								<option value="None" <?php if($title1=="None"){?> selected="selected" <?php } ?>>None</option>
							</select>	
									</div>
							  </li>-->
					<li>
					  <label  class="desc"><span class="red">*</span>&nbsp;Header Image Name</label>
					  <div>
					    <input type="text" tabindex="1" value="<?php echo $fetch_cat1['headerimagename'];?>" style="width:50%;" class="field text small" name="headerimagename" onKeyPress="imposeMaxLength(this,25);" />
					    <br/>
					    (Maximum 25 Characters)									</div>
					  </li>
					
					  
					  
					  
					
					  <label  class="desc"><span class="red">*</span>&nbsp;Header Image</label>
					  <?php if($imageid!="") {
							$addimage=$path.$addimage;
							list($width,$height)=getimagesize($addimage);
							if($width>=75)  $width="615px";
							if($height>=75) $height="191px";
						
							?>
					  
					  <div><img src="<?php echo $addimage;?>" border="0" alt="Image" width="<?php echo $width;?>" height="<?php echo $height;?>" align="absmiddle"/><br />
				      </div>
					  <div><?php echo str_replace($path,"",$addimage);?><br />
				        <br />
				      </div>
					  <?php }?>
					  <div>
					    <input type="file" tabindex="1" maxlength="255" value="" class="field text small" name="addimage" />
				      </div>
					  </li>
					  
					 
					  
					  <!--<li>
					  <label  class="desc"><span class="red">*</span>Advertisement Description</label>
					  <div>
					    <input type="text" tabindex="1" value="<?php echo $fetch_cat1['adddescription'];?>" style="width:50%;" class="field text small" name="adddescription" onKeyPress="imposeMaxLength(this,25);" />
					    <br/>
					    (Maximum 25 Characters)									</div>
					  </li>-->
					  
					<li class="buttons">
					  <input name="<?php echo $disptitle;?>" class="btn ui-state-default ui-corner-all" type="submit" value="<?php echo $disptitle;?>">
					  <input name="imageid" type="hidden" id="imageid"  value="<?php echo $imageid;?>"/>
					  </li>
							</ul>
							<div class="red">
								  * Indicates Required Information
				  </div>
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



<script type="text/javascript" language="javascript">
		function validation()
		 {
		  	
		
		 if (document.frm_image.headerimagename.value=='')
		 { 
			 alert ("Please Enter Your Image Name");
			 document.frm_image.headerimagename.focus();
			 return false;
		 }
		 
		
		  
		  
				
	<?php 
	if($imageid=='') { ?>
		 if (document.frm_image.addimage.value=='')
	 { 
		 alert ("Please Upload Image");
		 document.frm_member.addimage.focus();
		 return false;
	}
		 
		 
		 
		 <?php } ?>
	
		
		 return true;
		 
	 	
}

</script>
		
		
