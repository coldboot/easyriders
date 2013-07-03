<?php
 include('header.php'); 
	$pagqry="SELECT * FROM ".MEMBER." order by `varFirstname`";
	$R_Check	= mysql_query($pagqry) or die(mysql_error());
	$C_Check	= mysql_num_rows($R_Check);
	
	if(isset($_POST['Send'])){
	
	$subject=$_POST['subject'];
	$fromemail=$_POST['fromemail'];
	$toemail=$_POST['toemail'];
	$message=$_POST['message'];
	
	 $count = count($toemail);

			for($i=0;$i<=$count;$i++)
			{
				$toemail1=$toemail[$i];
				$insert_couponsend="insert into ".SENDCOUPON." (`subject`,`frommail`,`tomail`,`message`)values('$subject','$fromemail','$toemail1','$message')";
				 $mysql_insert	 =mysql_query($insert_couponsend);
				
				$to = $toemail;
				$subject = $subject;
				$headers = "From: " . strip_tags($fromemail) . "\r\n";
				$headers .= "Reply-To: ". strip_tags($fromemail) . "\r\n";
				$headers .= "CC: info@websolusionz.com\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
				mail($toemail1, $subject, $message, $headers);
				header("Location:viewsendcoupon.php?rType=add");
			}
		
	}


?>
<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				
				
				<div class="clearfix"></div>
				<div class="title title-spacing">
			<a name="addcat"></a>
			<h2><?php echo $disptitle;?> &nbsp;Send coupon </h2>
					
				</div>
				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">
					<div class="portlet-header ui-widget-header"><?php echo $disptitle;?>Category</div>
				    <?php if($_GET['log']=="succ"){?>	<div class="response-msg success ui-corner-all">
									<span>Your Details are Successfully Updated!</span>
									
								</div><?php } ?>
									<?php if($flag == "error"){ ?>
	  <div class="response-msg error ui-corner-all">
			<span>Error message</span>
			Category Name already exist!
	  </div><?php } ?>
					<div class="portlet-content">
		

				<form action="sendcoupon.php" method="post" class="forms" enctype="multipart/form-data" name="frm_category" onsubmit="return validation();" >
										
							<ul>
						<li>
									<label  class="desc"><span class="red">*</span>&nbsp;Subject</label>
									<div>
								<input type="text" tabindex="1" style="width:50%;" class="field text small" name="subject"  />
									</div>
							  </li>
							  								  
							  	<li>
									<label  class="desc"><span class="red">*</span>&nbsp;From Email</label>
									<div>
								<input type="text" name="fromemail" >
									</div>
							  </li>
							    	<li>
									<label  class="desc"><span class="red">*</span>&nbsp;To Email</label>
									<div>
								<select multiple="multiple" name="toemail[]">
								
								<option value="">Choose</option>
								<?php
								
								 if($C_Check>0)
								{
								while($fetch_amem=mysql_fetch_array($R_Check)){
								?>
								<option value="<?php echo $fetch_amem['varEmail'];?>"><?php echo $fetch_amem['varFirstname'].' '.$fetch_amem['varLastname'];?></option>
								<?php }}?>
								
								</select>
									</div>
							  </li>
							    	<li>
									<label  class="desc"><span class="red">*</span>&nbsp;Message</label>
									<div>
							  <?php
											$oFCKeditor=new FCKeditor('message');
											$oFCKeditor->BasePath="../../fckeditor/" ;
											//$oFCKeditor->ToolbarSet = "Basic" ;
											$oFCKeditor->Skin="office2003";
											$oFCKeditor ->Height='470';
											$oFCKeditor->Value=stripslashes($fetch_cat1['message']);
											$oFCKeditor->Create();
											?>
							 </div>
							  </li>
							
								  <li class="buttons">
					<input name="Send" class="btn ui-state-default ui-corner-all" type="submit" value="Send">
				
						      </li>
							</ul>
							<div class="red">
								  * indicates required information
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
		 if (document.frm_category.subject.value=='')
		 { 
			 alert ("Please Enter the subject");
			 document.frm_category.subject.focus();
			 return false;
		 }
		 if (document.frm_category.fromemail.value=='')
		 { 
			 alert ("Please Enter the from email");
			 document.frm_category.fromemail.focus();
			 return false;
		 }
		  if (document.frm_category.toemail.value=='')
		 { 
			 alert ("Please Select the to email");
			 document.frm_category.toemail.focus();
			 return false;
		 }
			
			
	
}

</script>
					