<?php
 include("include/dbconnect.php");
include("include/constants.php");
echo $sid=$Session_uid ;break;

  $cpath="deimage1/";
  $disptitle="Add";
 
$aid=$_REQUEST['cid'];
					
					if($_REQUEST['cid'] !="")
					{
						$aid=$_REQUEST['cid'];
					}
					
 if(isset($_POST['Add']))
	 {
 $aid= $_POST['cid'];
							    $Albumname=$_POST['albumname'];
								$Year=$_POST['year'];
								$Producer=$_POST['producer'];
								$Albumtype=$_POST['albumtype'];
								
								$image=$_POST['deimage1'];
								 if($_FILES['deimage1']['name']!="")
 {
 $rand=rand(0,2356565);
 $cname=$rand."_".$_FILES['deimage1']['name'];
 copy($_FILES['deimage1']['tmp_name'],$cpath.$cname);
 }
			

	
         $sel_cat="SELECT * FROM ".ALBUM." WHERE `aid`='$aid'";	
										$res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());
										$num_cat=mysql_num_rows($res_cat);
										
										if($num_cat=="")
										{
										$ins_cat="INSERT INTO ".ALBUM."(`albumname`,`year`,`producer`,`albumtype`,`artistimage`,`varstatus`) VALUES 	('$Albumname','$Year','$Producer','$Albumtype','$cname','Active')";		
									  mysql_query($ins_cat) or die("INSERT ERROR".mysql_error());
									  
								    	$flag="success";
header("location:viewalbum.php?messge=success");		}
		else
       {
		$flag= "error";
		}
		
}		

	if($aid != "")
{
	
  if(isset($_POST['Update']))
							 {
										
								$Albumname=$_POST['albumname'];
								$Year=$_POST['year'];
								$Producer=$_POST['producer'];
								$Albumtype=$_POST['albumtype'];
								
										 if($_FILES['deimage1']['name']!="")
 {
 $rand=rand(0,2356565);
 $cname=$rand."_".$_FILES['deimage1']['name'];
 copy($_FILES['deimage1']['tmp_name'],$cpath.$cname);
 }
										
							
					 $upd_cat="UPDATE ".ALBUM." SET
									`albumname`='$Albumname',
								   `year`='$Year',
									`producer`='$Producer',
									`albumtype`='$Albumtype',
									
									`artistimage`='$cname'				
									 WHERE  `aid`='$aid'";
									 
									mysql_query($upd_cat)or die("UPDATE ERROR".mysql_error());
									
									
			
			
			            			
		$flag="update";
header("location:viewalbum.php?messge=success");			$disptitle="Update";
	}		
	$disptitle="Update";	
}
	if($aid != "")
{
	
	
	$sel_cat1="SELECT * FROM ".ALBUM." WHERE `aid`='$aid'";		
							$res_cat1=mysql_query($sel_cat1);
							$fetch_cat1=mysql_fetch_array($res_cat1);
							
							 $Albumname=$_POST['albumname'];
								$Year=$_POST['year'];
								$Producer=$_POST['producer'];
								$Albumtype=$_POST['albumtype'];
								
								$image=$_POST['deimage1'];
							$disptitle="Update";
							}

		
?>
	<div id="page-wrapper">
		
			
								
				
				<div >
			
			<h2><?php echo $disptitle;?> &nbsp; ALBUM</h2>
					
			  </div>
				<div >
					
				    <?php if($_GET['log']=="succ"){?>	<div >
									<span>Your Details are Successfully Updated!</span>
									
								</div><?php } ?>
									<?php if($flag == "error"){ ?>
	  <div >
			<span>Error message</span>
		   your User Id is already exist!	  </div>
	  <?php } ?>
					<div >
		
				<script>
function imposeMaxLength(fld,len)
{
	if(fld.value.length > len) { alert("You Reached Maximum Character Limit"); fld.value = fld.value.substr(0,len-1); }
}</script>
				<form action="" method="post" class="forms" enctype="multipart/form-data"  name="form_album" onsubmit="return validation();" >
										
							<ul>
							
						
							   
							     <li>
									<label  class="desc"><span class="red"></span>&nbsp;Album NAme</label>
									<div>
								<input type="text" tabindex="1" value="<?php echo $fetch_cat1['albumname'];?>" style="width:50%;" class="field text small" name="albumname"  onkeypress="imposeMaxLength(this,50);"/><br/>
									</div>
							  </li>
							  <li>
									<label  class="desc"><span class="red"></span>&nbsp;Year</label>
									<div>
									<select name="year">
									 <?php
                                                       foreach($years as $key)
                                                       { ?>
                                                       <option value="<?php echo $key[0];?>"><?php echo $key;?></option>
                                                       
                                                       <?php }?>
     
       </select>
	  
									</div>
							  </li>
							  
							    <li>
									<label  class="desc"><span class="red"></span>&nbsp;Producer</label>
									<div>
								<input type="text" tabindex="1" value="<?php echo $fetch_cat1['producer'];?>" style="width:50%;" class="field text small" name="producer"  onkeypress="imposeMaxLength(this,25);" /><br/>(Maximum 25 Characters)
									</div>
							  </li>
							    
							  <li>
									<label  class="desc"><span class="red"></span>&nbsp;Album Type</label>
									<div>
									<select name="albumtype">
       <option value="Album" <?php echo $fetch_cat1['albumtype'];?>>Album</option>
       <option value="Single" <?php echo $fetch_cat1['albumtype'];?>>Single</option>
       <option value="Compilation" <?php echo $fetch_cat1['albumtype'];?>>Compilation</option>
       <option value="Double Album" <?php echo $fetch_cat1['albumtype'];?>>Double Album</option>
	   <option value="EP" <?php echo $fetch_cat1['albumtype'];?>>EP</option>
       </select>
								
									</div>
							  </li>
							 
							  
							   <li>
									<label  class="desc"><span class="red"></span>&nbsp;Image</label>
									<div>
									
									
								<input type="file" tabindex="1" value="<?php echo $fetch_cat1['artistimage'];?>" style="width:50%;" class="field text small" name="deimage1"  onkeypress="imposeMaxLength(this,25);" /><br/>
									</div>
							  </li>
							
								  <li class="buttons">
					<input name="<?php echo $disptitle;?>" class="btn ui-state-default ui-corner-all" type="submit" value="<?php echo $disptitle;?>">
					<input name="cid" type="hidden" id="cid"  value="<?php echo $aid;?>"/>
						      </li>
							</ul>
							
					  </form>
					</div>
				</div>
				</div>
				<i class="note"></i>
		
			

</body>
</html>
  <script>

function insRow(form)
{
	var rowIndex = form.attachno.value;
	 
	var cou=6;
 
	
	if(rowIndex==cou) {alert("Exceed Your Limit !"); return false;}
	var x=document.getElementById("ins").insertRow(rowIndex)
	var y=x.insertCell(0)
	y.style.padding="3px 0px";
	y.innerHTML='<input name="deimage1[]" type="file" class="text_field_new" id="textfield3" size="15%" />';
	form.attachno.value ++;
}

</script>

<script type="text/javascript" language="javascript">
			function validation()
       {
	   
         if (document.form_album.albumname.value=='')
		 { 
			 alert ("Please Select The albumname");
			 document.form_album.albumname.focus();
			 return false;
		 }
	   
		 if (document.form_album.year.value=='')
		 { 
			 alert ("Please Enter Your year");
			 document.form_album.year.focus();
			 return false;
		 }
		  if (document.form_album.producer.value=='')
		 { 
			 alert ("Please Enter Your producer");
			 document.form_album.producer.focus();
			 return false;
		 }
		   
		 
		   if(document.form_album.albumtype.value=='')
		 { 
			 alert ("Please Enter Your albumtype");
			 document.form_album.albumtype.focus();
			 return false;
		 }

		   if(document.form_album.image.value=='')
		 { 
			 alert ("Please Enter Your image");
			 document.form_album.image.focus();
			 return false;
		 }
		 
		   
	
		 
		   
	 	
}

</script>
					