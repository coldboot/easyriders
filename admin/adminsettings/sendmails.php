<?php
 include('header.php'); 
 
 $id=$_GET['id'];
	$pagqry="SELECT * FROM ".MAILS." where intmailid='$id'";
	$R_Check	= mysql_query($pagqry) or die(mysql_error());
	$C_Check	= mysql_num_rows($R_Check);
	
	
	if(isset($_POST['Send'])){
	
	$subject=$_POST['subject'];
	$message=addslashes($_POST['message']);
	$intmailid=$_POST['intmailid'];
			  $insert_couponsend="Update ".MAILS." set `subject`='$subject',`message`='$message' where intmailid='$intmailid'";
				 $mysql_insert	 =mysql_query($insert_couponsend);
				 $messagess="Mail Content was Successfully Updated";
				 //header("Location:sendmails.php?id=$intmailid");
	}
	$fetchs     =mysql_fetch_array($R_Check);
	@extract($fetchs);
	
	if($intmailid=1){
	
	$disptitle="Registration Thank You Mail";
	
	}else if($intmailid=6){
	
	$disptitle="Order Success! Thank You Mail";
	
	}else if($intmailid=7){
	
	$disptitle="Order Cancelled! Notification Mail";
	
	}else if($intmailid=8){
	
	$disptitle="Forget Password Mail";
	
	}
	else if($intmailid=9){
	
	$disptitle="Contact Email";
	
	}
	
	
?>
<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				
				
				<div class="clearfix"></div>
				<div class="title title-spacing">
			<a name="addcat"></a>
			<h2> &nbsp;Mail Template for <?php echo $disptitle;?></h2>
					
				</div>
				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">
					<div class="portlet-header ui-widget-header"><?php echo $disptitle;?>Category</div>
				    <?php if($_GET['log']=="succ"){?>	<div class="response-msg success ui-corner-all">
									<span>Your Details are Successfully Updated!</span>
									
								</div><?php } ?>
									<?php if($messagess){ ?>
	  <div class="response-msg success ui-corner-all">
			<span>Success Message</span>
			<?php echo $messagess;?>!
	  </div><?php } ?>
					<div class="portlet-content">
		

				<form action="sendmails.php" method="post" class="forms" enctype="multipart/form-data" name="frm_category" onsubmit="return validation();" >
										
							<ul>
						<li>
									<label  class="desc"><span class="red">*</span>&nbsp;Subject</label>
									<div>
								<input type="text" tabindex="1" style="width:50%;" class="field text small" name="subject"  value="<?php echo $subject;?>"/>
									</div>
							  </li>
							  								  
							  	
							    	<li>
									<label  class="desc"><span class="red">*</span>&nbsp;Message &nbsp;&nbsp;<br>

									String for get username and password and administrator here<select >
									<option>Username  -  ###USERNAME###</option>
									<option>Password  -  ###PASSWORD###</option>
									<option>Email  -  ###EMAIL###</option>
									<option>Administrator  -  ###ADMINISTRATOR###</option>
									</select>
									</label><br>
<br>

									<div>
							  <?php
											$oFCKeditor=new FCKeditor('message');
											$oFCKeditor->BasePath="../../fckeditor/" ;
											//$oFCKeditor->ToolbarSet = "Basic" ;
											$oFCKeditor->Skin="office2003";
											$oFCKeditor ->Height='470';
											$oFCKeditor->Value=stripslashes($message);
											$oFCKeditor->Create();
											?>
							 </div>
							  </li>
							
								  <li class="buttons">
					<input name="Send" class="btn ui-state-default ui-corner-all" type="submit" value="Update">
					<input name="intmailid"  type="hidden" value="<?php echo $id;?>">
				
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
			 alert ("Please Upload the from email");
			 document.frm_category.fromemail.focus();
			 return false;
		 }
		  if (document.frm_category.toemail.value=='')
		 { 
			 alert ("Please Upload the to email");
			 document.frm_category.toemail.focus();
			 return false;
		 }
			
			
	
}

</script>
					