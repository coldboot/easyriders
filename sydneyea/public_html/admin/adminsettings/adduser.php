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
	
$Firstname   = $_POST['Firstname'];
$Lastname   =$_POST['Lastname'];
$Username   = $_POST['Username'];
$Password 	 = $_POST['Password'];
$memaddress = $_POST['memaddress'];
$City              = $_POST['City'];
$varCountry = $_POST['Country'];
$State = $_POST['State'];
$contactnumber = $_POST['contactnumber'];
$pincode = $_POST['pincode'];
$Email		=	$_POST['Email'];
	
	if($cid =="")
	{
	
		 $sel_cat="SELECT * FROM ".USER." WHERE Username='$Username' ";

		 
		$res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());
		
	 	$num_cat=mysql_num_rows($res_cat);

		
		
	
		if($num_cat != 0)
		{
			$flag="error";
		}
	
		else
		{	
			$sel_cat="SELECT * FROM ".USER."";
			
			$res_cat=mysql_query($sel_cat) or die("SELECT ERROR".mysql_error());
			
			$num_cat=mysql_num_rows($res_cat);
		
		
			$ins_cat="INSERT INTO ".USER." (`Firstname`,`Lastname`,`Username`,`Password`,`memaddress`,`City`,`Country`,`pincode`,`State`,`Email`,`contactnumber`,`varStatus`) VALUES ('$Firstname','$Lastname','$Username','$Password','$memaddress','$City','$varCountry','$pincode','$State','$Email','$contactnumber','Active')";
			

		 	mysql_query($ins_cat)or die(mysql_error());
			
			$insertid	=	mysql_insert_id();
			

			
								
			
			$flag="success";
			header("Location:viewuser.php?rflag=success&rtype=add");
		}
	}
	
	if($cid !="")
	{
	
	  $upd_cat="UPDATE ".USER." SET `Firstname`='$Firstname',`Lastname`='$Lastname',`Username`='$Username',`Password`='$Password',`memaddress`='$memaddress',`City`='$City',`Country`='$varCountry',`pincode`='$pincode',`State`='$State',`contactnumber`='$contactnumber',`Email`='$Email' WHERE `intid`='$cid'";
			mysql_query($upd_cat)or die(mysql_error());;
			
						
			
					
					
		
			$flag="update";
			header("Location:viewuser.php?rflag=success&rtype=edit");
	}
	
	}
	

	
if($cid != "")
{
	 $sel_cat1="SELECT * FROM ".USER." WHERE `intid`='$cid'";	
	
	$res_cat1=mysql_query($sel_cat1) or die(mysql_error());
	
	$fetch_cat1=mysql_fetch_array($res_cat1);
	
	 $Firstname=$fetch_cat1['Firstname'];
	$Lastname=$fetch_cat1['Lastname'];
	$Username=$fetch_cat1['Username'];
	$Password=$fetch_cat1['Password'];
	$memaddress=$fetch_cat1['memaddress'];
	$City=$fetch_cat1['City'];
	$varCountry=$fetch_cat1['Country'];
	$pincode=$fetch_cat1['pincode'];
	$State=$fetch_cat1['State'];
	$Email =$fetch_cat1['Email'];
	$contactnumber=$fetch_cat1['contactnumber'];	
	$Active=$fetch_cat1['Active'];
	
	
	$disptitle="Update";
}
if($disptitle=="")
{
	$disptitle="Add";
}
		
?>
<script type="text/javascript">
function member_val()
{
var Firstname = document.frm_member.Firstname.value;
var Lastname = document.frm_member.Lastname.value;
var Username = document.frm_member.Username.value;
var Password = document.frm_member.Password.value;
var memaddress = document.frm_member.memaddress.value;
var City = document.frm_member.City.value;
var Email = document.frm_member.Email.value;
var pincode = document.frm_member.pincode.value;
var State = document.frm_member.State.value;
var Country = document.frm_member.Country.value;
var contactnumber = document.frm_member.contactnumber.value;
if(Firstname=="")
{
alert("Please Enter Your  Firstname");
document.frm_member.Firstname.focus();
return false;
}
if(Lastname=="")
{
alert("Please Enter Your Lastname");
document.frm_member.Lastname.focus();
return false;
}
if(Email=="")
{
alert("Please Enter Your Email ");
document.frm_member.Email.focus();
return false;
}
if(Email!="")
{
 var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   if(reg.test(Email) == false) {
      alert('Invalid Email Address');
      return false;}
	  }
if(Username=="")
{
alert("Please Enter Your Username");
document.frm_member.Username.focus();
return false;
}
if(Password=="")
{
alert("Please Enter Your Password ");
document.frm_member.Password.focus();
return false;
}
if(memaddress=="")
{
alert("Please Enter Your Address");
document.frm_member.memaddress.focus();
return false;
}

if(City=="")
{
alert("Please Enter Your City");
document.frm_member.City.focus();
return false;
}
if(pincode=="")
{
alert("Please Enter Your Pincode ");
document.frm_member.pincode.focus();
return false;
}
if(pincode.length !=5)
{
alert("Pincode Must Be 5 Characters");
document.frm_member.pincode.focus();
return false;
}
if(State=="")
{
alert("Please Enter Your State ");
document.frm_member.State.focus();
return false;
}
if(Country=="Choose")
{
alert("Please Select Your Country");
document.frm_member.Country.focus();
return false;
}
if(contactnumber=="")
{
alert("Please Enter Your Contactnumber ");
document.frm_member.contactnumber.focus();
return false;
}
if(contactnumber.length !=10)
{
alert("Contact Number Must Be 10 Characters");
document.frm_member.contactnumber.focus();
return false;
}
return true;
}



</script>


<script src="../multifile_compressed.js"></script>

	<div id="page-wrapper">
		<div id="main-wrapper">
			<div id="main-content">
				
				
				<div class="clearfix"></div>
				<div class="title title-spacing">
			<a name="addcat"></a>
			<h2><?php echo $disptitle;?> User </h2>
					
				</div>
				<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">
					<div class="portlet-header ui-widget-header"><?php echo $disptitle;?> User </div>
					<?php if($flag=="error") {?><div class="response-msg error ui-corner-all">	<span>User name already Exists!</span>		</div> <?php }?>
				    <?php if($_GET['log']=="succ"){?>	<div class="response-msg success ui-corner-all">
									<span>Your Details are Successfully Updated!</span>
									
								</div><?php } ?>
					<div class="portlet-content">
						<form action="" method="post" enctype="multipart/form-data" class="forms"  name="frm_member" onSubmit="return member_val();" >
							<ul>
						<li>
									<label  class="desc">First Name</label>
									<div>
									  <input type="text" tabindex="1" maxlength="255" value="<?php echo $Firstname;?>" class="field text small" name="Firstname" />
									</div>
							  </li>
							  <li>
									<label  class="desc">Last Name</label>
									<div>
									  <input type="text" tabindex="1" maxlength="255" value="<?php echo $Lastname;?>" class="field text small" name="Lastname" />
									</div>
							  </li>
							  <li>
									<label  class="desc">Email Address</label>
									<div>
									  <input type="text" tabindex="1" maxlength="255" value="<?php echo $Email;?>" class="field text small" name="Email" />
									</div>
							  </li>
							  
							  
							  <li>
									<label  class="desc">User Name</label>
									<div>
									  <input type="text" tabindex="1" maxlength="255" value="<?php echo $Username;?>" class="field text small" name="Username" />
									</div>
							  </li>

							  
							  <li>
									<label  class="desc">Password</label>
									<div>
									  <input type="password" tabindex="1" maxlength="255" value="<?php echo $Password;?>" class="field text small" name="Password" />
									</div>
							  </li>
							  
							  					  
							   
					
							  
							  <li>
							  <label class="desc">Address</label>
							  <div>
							  <textarea name="memaddress" rows="6"  cols="50" tabindex="1"><?php echo $memaddress;?></textarea></div></li>
							  
							  <li>
									<label  class="desc">City</label>
									<div>
									  <input type="text" tabindex="1" maxlength="255" value="<?php echo $City;?>" class="field text small" name="City"  />
									</div>
							  </li>
							  
							   
							    <li>
									<label  class="desc">Pincode</label>
									<div>
									  <input type="text" tabindex="1" maxlength="255" value="<?php echo substr($pincode,0,4);?>" class="field text small" name="pincode" />
									</div>
							  </li>
							  
							  
							    <li>
									<label  class="desc">State</label>
									<div>
									  <input type="text" maxlength="255" value="<?php echo $State;?>" class="field text small" name="State" tabindex="1" />
									</div>
							  </li>
							  
							  <li>
									<label  class="desc">Country</label>
									<div>
									
									<select name="Country" id="Country"  style="width:26%" tabindex="1">
                                <?php foreach($countryarray as $countryarrayid => $countryarrayname){
				if($countryarrayid==$varCountry){
							 ?>
                                <option value="<?php echo $countryarrayid; ?>" selected="selected"><?php echo $countryarrayname; ?></option>
                                <?php } else { ?>
                                <option value="<?php echo $countryarrayid; ?>"><?php echo $countryarrayname; ?></option>
                                <?php  } } ?>
                              </select>
							  
								
									</div>
							  </li>
							

										  <li>
									<label  class="desc">Contact Number</label>
									<div>
									  <input type="text" tabindex="1" maxlength="255" value="<?php echo substr($contactnumber,0,9);?>" class="field text small" name="contactnumber" />
									</div>
							  </li>						
							
								<li class="buttons">
								  <input type="submit" value="<?php echo $disptitle;?>" class="btn ui-state-default ui-corner-all" name="submit" />
								  <input name="cid" type="hidden" id="cid"  value="<?php echo $cid;?>"/>
								</li>
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





