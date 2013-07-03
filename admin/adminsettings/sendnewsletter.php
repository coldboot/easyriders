<?php
 include('header.php'); 
	$pagqry="SELECT * FROM ".SUBSCRIBER." order by `intSubId`";
	$R_Check	= mysql_query($pagqry) or die(mysql_error());
	$C_Check	= mysql_num_rows($R_Check);
	
	if(isset($_POST['Send'])){
	//print_r($_POST);
	$subject=$_POST['subject'];
	$fromemail=$_POST['fromemail'];
	$toemail=$_POST['toemail'];
	$message="<table><tr><td>";
	$message.=$_POST['message']."</td></tr></table>";
	$dtsend =date("Y/d/m");
	 $count = count($toemail);
/*if($message=="") {echo "<script>alert('Please Enter The Message');return false;</script>";}*/
			for($i=0;$i<$count;$i++)
			{
				$toemail1=$toemail[$i];
				$insert_couponsend="insert into ".NEWSLETTER." (`varSubject`,`varFromEmail`,`EmailSendTo`,`txtMessage`,`dtsend`,`varStatus`)values('$subject','$fromemail','$toemail1','$message','$dtsend','Active')";
				 $mysql_insert	 =mysql_query($insert_couponsend);
				
				$to = $toemail;
				$subject = $subject;
				$headers = "From: " . strip_tags($fromemail) . "\r\n";
				$headers .= "Reply-To: ". strip_tags($fromemail) . "\r\n";
				//$headers .= "CC: info@websolusionz.com\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			mail($toemail1, $subject, $message, $headers);
				header("Location:viewsentmail.php?rType=add");
			}
		
	}


?>
<script type="text/javascript">
function selectAll(selectBox,selectAll) {
		// have we been passed an ID
		if (typeof selectBox == "string") {
			selectBox = document.getElementById(selectBox);
		}
		// is the select box a multiple select box?
		if (selectBox.type == "select-multiple") {
			for (var i = 0; i < selectBox.options.length; i++) {
				selectBox.options[i].selected = selectAll;
			}
		}
	}
function checkselectbox(id)
{
	if(id.type == "select-multiple") 
	{
		for (var i = 0; i < id.options.length; i++) 
		{
			if(id.options[i].selected==true) return true;
		}
		return false;
	}
}

</script>
<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				
				
				<div class="clearfix"></div>
				<div class="title title-spacing">
			<a name="addcat"></a>
			<h2><?php echo $disptitle;?> &nbsp;Send Newsletter </h2>
					
				</div>
				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">
					<div class="portlet-header ui-widget-header"><?php echo $disptitle;?></div>
				    <?php if($_GET['log']=="succ"){?>	<div class="response-msg success ui-corner-all">
									<span>Your Details are Successfully Sent!</span>
									
								</div>
				    <?php } ?>
									<?php if($flag == "error"){ ?>
	  <div class="response-msg error ui-corner-all">
			<span>Error message</span>
		    already sent!	  </div>
	  <?php } ?>
					<div class="portlet-content">
		

				<form action="" method="post" class="forms" enctype="multipart/form-data" name="frm_category" onSubmit="return validation();" >
										
							<ul>
						<li>
									<label  class="desc"><span class="red">*</span>&nbsp;Subject</label>
									<div>
								<input type="text" tabindex="1" style="width:50%;" class="field text small" name="subject" tabindex="1"/>
									</div>
							  </li>
							  								  
							  	<li>
									<label  class="desc"><span class="red">*</span>&nbsp;From Email Address</label>
									<div>
								<input type="text" name="fromemail" tabindex="1">
									</div>
							  </li>
							    	<li>
									<label  class="desc"><span class="red">*</span>&nbsp;To Email Address&nbsp;&nbsp;</label>
									<div>
								<select multiple="multiple" id="toemailid" name="toemail[]" tabindex="1" size="5">
								<!--<option value="choose" selected="selected">Choose</option>-->
								<?php
								
								 if($C_Check>0)
								{$c=0;
								while($fetch_amem=mysql_fetch_array($R_Check)){
								?>
								<option value="<?php echo $fetch_amem['varEmail'];?>" id="option<?php echo $c++; ?>"><?php echo $fetch_amem['varEmail'];?></option>
								<?php }}?>
								</select>
									</div>
							  </li>
							  <li><input name="select" class="btn ui-state-default ui-corner-all" type="button" value="Select All"  onclick="selectAll('toemailid',true)" >&nbsp;&nbsp;<input name="select" class="btn ui-state-default ui-corner-all" type="button" value="Unselect All"  onclick="selectAll('toemailid',false)" ></li>
							    	<li>
									<label  class="desc">&nbsp;Message</label>
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
var minNum=1; var maxNum=3; 
		function validation()
       {
		 if (document.frm_category.subject.value=='')
		 { 
			 alert ("Please Enter The Subject");
			 document.frm_category.subject.focus();
			 return false;
		 }
		 if(document.frm_category.fromemail.value=='')
		 { 
			 alert ("Please Enter The From Email Address");
			 document.frm_category.fromemail.focus();
			 return false;
		 }
		  if(!document.frm_category.toemailid.value)
		 { 
			 alert ("Please Select The To Email Address");
			 document.frm_category.toemailid.focus();
			 return false;
		 }
		 oSelect=document.getElementById("toemailid");
		 var count=0;
		 for(var i=0;i<oSelect.options.length;i++)
		 {
			if(oSelect.options[i].selected)
			count++;
			/*if(count>maxNum)
			{
				alert("Can't select more than 3");
				return false;
			}*/
		}
		if(oSelect.options[i].value=="choose")
		{
			alert("please  select at least one item");
			return false;
		}
	
		if(count<1)
		{
			alert("Must select at least one item");
			return false;
		}
		return true; 			
	
}

</script>
					