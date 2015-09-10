<?php

 include('header.php'); 
  
 $intSubId=$_REQUEST['intSubId'];

 if(isset($_POST['Add']))
	 {
	                         $varEmail = $_POST['varEmail'];
							 $name=$_POST['name'];								
								$birth=$_POST['birth'];
								$varCity=$_POST['varCity'];
								$country=$_POST['country'];
								$date=date("d:m:y");
	
        $sel_cat="SELECT * FROM ".SUBSCRIBER." WHERE `varEmail` = '$varEmail'";	
		$res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());
		$num_cat=mysql_num_rows($res_cat);
		if($num_cat=="")
		{
	     $ins_cat="INSERT INTO ".SUBSCRIBER." (`name`,`varEmail`,`varstatus`,`DtJoin`,`birth`,`city`,`country`) VALUES  
		('$name','$varEmail','Active','$date','$birth','$varCity','$country')";
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
		 $name=$_POST['name'];								
								$birth=$_POST['birth'];
								$varCity=$_POST['varCity'];
								$country=$_POST['country'];
								
     	 $upd_cat="UPDATE ".SUBSCRIBER. " SET `name`=' $name',`varEmail`='$varEmail', `birth`='$birth',`city`='$varCity',`country`='$country' WHERE `intSubId`='$intSubId'";
			mysql_query($upd_cat)or die(mysql_error());
			
		$flag="update";
		header("Location:viewsubscriber.php?rflag=success&rtype=update");
			
}			

	
if($intSubId!= "")
{
	$sel_cat1="SELECT * FROM ".SUBSCRIBER." WHERE `intSubId`='$intSubId'";	
	
	$res_cat1=mysql_query($sel_cat1);
	
	$fetch_cat1=mysql_fetch_array($res_cat1);
	
	$varEmail=$fetch_cat1['varEmail'];
	$varCountry=$fetch_cat1['country'];
	

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
		

				<form action="" method="post" class="forms" enctype="multipart/form-data" name="frm_member" onSubmit="return validation();" >
										
							<ul>
							
							  <li>
									<label  class="desc"><span class="red">*</span>&nbsp;User Name</label>
									<div>
								<input type="text" tabindex="1" value="<?php echo $fetch_cat1['name'];?>" style="width:50%;" class="field text small" name="name"  />
									</div>
							  </li>
							   	<li>
									<label  class="desc"><span class="red">*</span>&nbsp;Email Address</label>
									<div>
								<input type="text" name="varEmail" value="<?php echo $fetch_cat1['varEmail'];?>"  style="width:50%;" >
									</div>
							  </li>
							  
							   	<li>
									<label  class="desc"><span class="red">*</span>&nbsp;Date Of Birth</label>
									<div>
								<input type="text" tabindex="1" style="width:50%;" value="<?php echo $fetch_cat1['birth'];?>" class="field text small" name="birth" />
									</div>
							  </li>
							  

							    <li>
									<label  class="desc"><span class="red">*</span>&nbsp;City</label>
									<div>
								<input type="text" tabindex="1" value="<?php echo $fetch_cat1['city'];?>" style="width:50%;" class="field text small" name="varCity"  />
									</div>
							  </li>
							  
							  								  
							  	<li>
									<label  class="desc"><span class="red">*</span>&nbsp;Country </label>
									<div>
									<select name="country" id="country"   tabindex="1" style="width:25%;" >
									<option value="">Choose</option>
                                           <?php 
										            foreach($countryarray as $countryarrayid => $countryarrayname){
				                                                      if($countryarrayid==$varCountry){?>
                                         <option value="<?php echo $countryarrayid; ?>" selected="selected"><?php echo $countryarrayname; ?></option>
                                                                     <?php } else { ?>
                                          <option value="<?php echo $countryarrayid; ?>"><?php echo $countryarrayname; ?></option>
                                                                      <?php  } } ?>
                                       </select>
							<!--	<input type="text" tabindex="1" style="width:50%;" value="<?php echo $fetch_cat1['varCountry'];?>" class="field text small" name="country" />-->
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
		   	   
		 if (document.frm_member.name.value=='')
		 { 
			 alert ("Please Enter Your Name");
			 document.frm_member.name.focus();
			 return false;
		 }
		
		    var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
          if (!filter.test(document.frm_member.varEmail.value))
          {
	   	 alert ("Please Enter Valid Email Id");
		 document.frm_member.varEmail.focus();
			 return false;
		 }
		 
		   if(document.frm_member.birth.value=='')
		 { 
			 alert ("Please Enter Your Date Of Birth");
			 document.frm_member.birth.focus();
			 return false;
		 }
		
		  if (document.frm_member.varCity.value=='')
		 { 
			 alert ("Please Enter Your City");
			 document.frm_member.varCity.focus();
			 return false;
		 }
		 
		  if (document.frm_member.country.value=='')
		 { 
			 alert ("Please Choose Your Country");
			 document.frm_member.country.focus();
			 return false;
		 }
		 return true;	
		 
	
	
}

</script>
					