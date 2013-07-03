<?php

 include('header.php'); 
  
 
$pageid=$_REQUEST['pageid'];
if($_REQUEST['pageid'] !="")
{
	$pageid=$_REQUEST['pageid'];
}

 if(isset($_POST['Add']))
	 {
	 $pageid=$_POST['pageid'];
	 $pagetype=$_POST['pagetype'];
	$title=addslashes($_POST['title']);
    //$date = $_POST['date']; 
	$description=addslashes($_POST['description']);
	
	
	
        $sel_cat="SELECT * FROM ".PAGE." WHERE `title` = '$title'";	
		$res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());
		$num_cat=mysql_num_rows($res_cat);
		
		if($num_cat=="")
		{
	    $ins_cat="INSERT INTO ".PAGE."(`pagetype`,`title`,`description`,`status`) VALUES  
		('$pagetype','$title','$description','Active')";
			
		mysql_query($ins_cat)  or die(mysql_error());
		
		$flag="success";
	 /*?> echo '<script type="text/javascript">window.location.href="viewdescription.php?rflag=success&rtype=add";</script>';<?php */
		header("Location:viewpage.php?rflag=success&rtype=add");
		}
		else
       {
		$flag= "error";
		}
		
}		




 if(isset($_POST['Update']))
	 {
	  $pageid=$_POST['pageid'];
	 $pagetype=$_POST['pagetype'];
	$title=$_POST['title'];
   // $date = $_POST['date']; 
	$description=$_POST['description'];
	
	
	 $upd_cat="UPDATE ".PAGE. " SET pagetype='$pagetype', title='$title',
	 		description='$description',
	 		status='Active'
			 WHERE pageid='$pageid'";
			mysql_query($upd_cat)or die(mysql_error());
			
		$flag="update";
		header("Location:viewpage.php?rflag=success&rtype=update");
			
}			

	
if($pageid != "")
{
	$sel_cat1="SELECT * FROM ".PAGE." WHERE `pageid`='$pageid'";	
	
	$res_cat1=mysql_query($sel_cat1);
	
	$fetch_cat1=mysql_fetch_array($res_cat1);
	
	$pagetype=$fetch_cat1['pagetype'];
	$title=$fetch_cat1['title'];
	$description=$fetch_cat1['description'];
	
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
			<h2><?php echo $disptitle;?> &nbsp;Page's</h2>
					
				</div>
				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">
					<div class="portlet-header ui-widget-header"><?php echo $disptitle;?>&nbsp;Page's</div>
				    <?php if($_GET['log']=="succ"){?>	<div class="response-msg success ui-corner-all">
									<span>Your Details Are Successfully Updated!</span>
									
								</div><?php } ?>
									<?php if($flag == "error"){ ?>
	  <div class="response-msg error ui-corner-all">
			<span>Error message</span>
			Page's Name Already Exist!
	  </div><?php } ?>
					<div class="portlet-content">
		
				
				<form action="" method="post" class="forms"  name="page_form" onsubmit="return page_validation();" >
										
							<ul>
								<li>
								<select name="pagetype">
									<option value="info" >Info
									<option value="route" <?php if ($pagetype=="route") { echo "selected"; } ?> >Route
								</select>	
								</li>
						<li>
									<label  class="desc"><span class="red">*</span>&nbsp;Page Title </label>
									<div>
								<input type="text" tabindex="1" value="<?php echo $fetch_cat1['title'];?>" style="width:50%;" class="field text small" name="title"  />
									</div>
							  </li>
							  								  
							  
							   	<li>
									<label  class="desc"><span class="red"></span>&nbsp; Description </label>
									<div>
																
										<?php
				$oFCKeditor=new FCKeditor('description');
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
					<input name="pageid" type="hidden" id="pageid"  value="<?php echo $pageid;?>"/>
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
		function page_validation()
{
		 if (document.page_form.title.value=='')
		 { 
			 alert ("Please Enter The title");
			 document.page_form.title.focus();
			 return false;
		 }
		
}
</script>
					