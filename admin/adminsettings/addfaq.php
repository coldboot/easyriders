<?php

 include('header.php'); 
  
 
$faqid=$_REQUEST['faqid'];
if($_REQUEST['faqid'] !="")
{
	$faqid=$_REQUEST['faqid'];
}

 if(isset($_POST['Add']))
	 {
	 $faqid=$_POST['faqid'];
	$question=addslashes($_POST['question']);
    //$date = $_POST['date']; 
	$faqs=addslashes($_POST['faqs']);
	$TodayDate	= date("d-m-Y");
	
	
        $sel_cat="SELECT * FROM ".FAQ." WHERE `varQuestions` = '$question'";	
		$res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());
		$num_cat=mysql_num_rows($res_cat);
		
		if($num_cat=="")
		{
	    $ins_cat="INSERT INTO ".FAQ."(`varQuestions`,`description`,`date`,`varStatus`) VALUES  
		('$question','$faqs','$TodayDate','Active')";
			
		mysql_query($ins_cat)  or die(mysql_error());
		
		$flag="success";
	 /*?> echo '<script type="text/javascript">window.location.href="viewfaqs.php?rflag=success&rtype=add";</script>';<?php */
		header("Location:viewfaq.php?rflag=success&rtype=add");
		}
		else
       {
		$flag= "error";
		}
		
}		




 if(isset($_POST['Update']))
	 {
	  $faqid=$_POST['faqid'];
	$question=$_POST['question'];
   // $date = $_POST['date']; 
	$faqs=$_POST['faqs'];
	$TodayDate	= date( "d:m:Y")." ".date("H:i:s");
	
	 $upd_cat="UPDATE ".FAQ. " SET varQuestions='$question',
	 		description='$faqs',
	  		date= '$TodayDate',
			varStatus='Active'
			 WHERE intid='$faqid'";
			mysql_query($upd_cat)or die(mysql_error());
			
		$flag="update";
		header("Location:viewfaq.php?rflag=success&rtype=update");
			
}			

	
if($faqid != "")
{
	$sel_cat1="SELECT * FROM ".FAQ." WHERE `intid`='$faqid'";	
	
	$res_cat1=mysql_query($sel_cat1);
	
	$fetch_cat1=mysql_fetch_array($res_cat1);
	
	$varName=$fetch_cat1['varQuestions'];
	$varfaqs=$fetch_cat1['description'];
	$date=$fetch_cat1['date'];
	//$varUrl=$fetch_cat1['varUrl'];
  //  $varSender=$fetch_cat1['varSenderName'];


	$disptitle="Update";
}
if($disptitle=="")
{
	$disptitle="Add";
} 
		
?>

<script language="javascript" type="text/javascript" src="js/datetimepicker.js">
NewCal([textbox id],[date format],[show time in calendar?],[time mode (12,24)?])
</script>
	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				
				
				<div class="clearfix"></div>
				<div class="title title-spacing">
			<a name="addcat"></a>
			<h2><?php echo $disptitle;?> &nbsp;FAQ's</h2>
					
				</div>
				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">
					<div class="portlet-header ui-widget-header"><?php echo $disptitle;?>&nbsp;FAQ's</div>
				    <?php if($_GET['log']=="succ"){?>	<div class="response-msg success ui-corner-all">
									<span>Your Details Are Successfully Updated!</span>
									
								</div><?php } ?>
									<?php if($flag == "error"){ ?>
	  <div class="response-msg error ui-corner-all">
			<span>Error message</span>
			FAQ's Name Already Exist!
	  </div><?php } ?>
					<div class="portlet-content">
		
				
				<form action="" method="post" class="forms"  name="faqs_form" onsubmit="return faqs_validation();" >
										
							<ul>
						<li>
									<label  class="desc"><span class="red">*</span>&nbsp;Faq's question</label>
									<div>
								<input type="text" tabindex="1" value="<?php echo $fetch_cat1['varQuestions'];?>" style="width:50%;" class="field text small" name="question"  />
									</div>
							  </li>
							  								  
							  
							   	<li>
									<label  class="desc"><span class="red"></span>&nbsp; FAQ's Answer</label>
									<div>
																
										<?php
				$oFCKeditor=new FCKeditor('faqs');
				$oFCKeditor->BasePath="../../fckeditor/" ;
				//$oFCKeditor->ToolbarSet = "Basic" ;
				$oFCKeditor->Skin="office2003";
				$oFCKeditor ->Height='470';
				$oFCKeditor->Value=stripslashes($fetch_cat1['description']);
				$oFCKeditor->Create();
			                             ?>
									</div>
							  </li>
							    
							
								  <li class="buttons">
					<input name="<?php echo $disptitle;?>" class="btn ui-state-default ui-corner-all" type="submit" value="<?php echo $disptitle;?>">
					<input name="faqid" type="hidden" id="faqid"  value="<?php echo $faqid;?>"/>
								    </li>
							</ul>
							<div class="red">
								
								</div>
						</form><div class="red">&nbsp;* &nbsp; Indicates required information</div>
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
		function faqs_validation()
{
		 if (document.faqs_form.question.value=='')
		 { 
			 alert ("Please Enter The Question");
			 document.faqs_form.question.focus();
			 return false;
		 }
		 if (document.faqs_form.date.value=='' )
		 { 
			 alert ("Please Select The Date");
			document.faqs_form.date.focus();
			 return false;
		 }
}
</script>
					