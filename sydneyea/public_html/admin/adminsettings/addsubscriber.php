<?php

 include('header.php'); 
  
 $intSubId=$_REQUEST['intSubId'];

 if(isset($_POST['Add']))
	 {
	 $varEmail = $_POST['varEmail'];
	
        $sel_cat="SELECT * FROM ".SUBSCRIBER." WHERE `varEmail` = '$varEmail'";	
		$res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());
		$num_cat=mysql_num_rows($res_cat);
		if($num_cat=="")
		{
	     $ins_cat="INSERT INTO ".SUBSCRIBER." (`varEmail`,`varstatus`) VALUES  
		('$varEmail','Active')";
		mysql_query($ins_cat)  or die(mysql_error());
		
		$flag="success";
		header("Location:viewsubscriber.php?rflag=success&rtype=add");
		}
		else
       {
		$flag= "error";
		}
		
}		


 if(isset($_POST['Update']))
	 {
        $varEmail = $_POST['varEmail'];
		
     	 $upd_cat="UPDATE ".SUBSCRIBER. " SET
		   `varEmail`='$varEmail',
 	  		`varstatus`='Active' WHERE `intSubId`='$intSubId'";
			mysql_query($upd_cat)or die(mysql_error());
			
		$flag="update";
		$pageid=$_GET['page'];
		header("Location:viewsubscriber.php?rflag=success&rtype=update&page=$pageid");
			
}			

	
if($intSubId!= "")
{
	$sel_cat1="SELECT * FROM ".SUBSCRIBER." WHERE `intSubId`='$intSubId'";	
	
	$res_cat1=mysql_query($sel_cat1);
	
	$fetch_cat1=mysql_fetch_array($res_cat1);
	
	$varEmail=$fetch_cat1['varEmail'];
	

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
			<h2><?php echo $disptitle;?> &nbsp;Subscriber</h2>
					
				</div>
				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">
					<div class="portlet-header ui-widget-header"><?php echo $disptitle;?>&nbsp;Subscriber</div>
				    <?php if($_GET['log']=="succ"){?>	<div class="response-msg success ui-corner-all">
									<span>Your Details are Successfully Updated!</span>
									
								</div><?php } ?>
									<?php if($flag == "error"){ ?>
	  <div class="response-msg error ui-corner-all">
			<span>Error message</span>
			Subscriber Name already exist!
	  </div>
	  <?php } ?>
					<div class="portlet-content">
		

				<form action="" method="post" class="forms" enctype="multipart/form-data" name="frm_category" onSubmit="return validation();" >
										
							<ul>
							  	<li>
									<label  class="desc"><span class="red">*</span>&nbsp;Email Address</label>
									<div>
								<input type="text" name="varEmail" value="<?php echo $fetch_cat1['varEmail'];?>">
									</div>
							  </li>
							  
							  
							
								  <li class="buttons">
					<input name="<?php echo $disptitle;?>" class="btn ui-state-default ui-corner-all" type="submit" value="<?php echo $disptitle;?>">
					<input name="intSubId" type="hidden" id="brandid"  value="<?php echo $intSubId;?>"/>
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
		 if (document.frm_category.varEmail.value=='')
		 { 
			 alert ("Please Enter The Email Address");
			 document.frm_category.varEmail.focus();
			 return false;
		 }
		if (!validateEmail(document.frm_category.varEmail.value,1,1)) 
					{
					document.frm_category.varEmail.focus();
					return false;
					}
			
	
}

</script>
					