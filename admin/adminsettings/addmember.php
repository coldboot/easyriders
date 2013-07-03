<?php



 include('header.php');



   $path="../../deimage1/";





$memberid=$_REQUEST['memberid'];

if($_REQUEST['memberid'] !="")

{

        $memberid=$_REQUEST['memberid'];

}



if(isset($_POST['Add']) || isset($_POST['Update']))
{
	$memberid = $_POST['memberid'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$biography=$_POST['biography'];
	$ridingtime=$_POST['ridingtime'];
	$ridename=$_POST['ridename'];
	$oftenrides=$_POST['oftenrides'];
	$biketype=$_POST['biketype'];


    // Check if image provided
    $productimage=$_FILES['image'];
    if($productimage['name'] != "")
    {
        // Check if file was uploaded ok
        if( ! is_uploaded_file($_FILES['image']['tmp_name']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK)
        {
            exit('File not uploaded. Possibly too large.');
        }

        // Create image from file
        switch(strtolower($_FILES['image']['type']))
        {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($_FILES['image']['tmp_name']);
                break;
            case 'image/png':
                $image = imagecreatefrompng($_FILES['image']['tmp_name']);
                break;
            case 'image/gif':
                $image = imagecreatefromgif($_FILES['image']['tmp_name']);
                break;
            default:
                exit('Unsupported type: '.$_FILES['image']['type']);
        }

        // Target dimensions
        $max_width = 140;
        $max_height = 150;

        // Get current dimensions
        $old_width  = imagesx($image);
        $old_height = imagesy($image);

        // Calculate the scaling we need to do to fit the image inside our frame
        $scale      = min($max_width/$old_width, $max_height/$old_height);

        // Get the new dimensions
        $new_width  = ceil($scale*$old_width);
        $new_height = ceil($scale*$old_height);

        // Create new empty image
        $new = imagecreatetruecolor($new_width, $new_height);

        // Resize old image into new
        imagecopyresampled($new, $image,
            0, 0, 0, 0,
            $new_width, $new_height, $old_width, $old_height);

        // Make up a new image name
        $tmpname=$productimage['tmp_name'];
        $size=$productimage['size'];
        $rand=rand(0,100000);
        $imagename=$rand."_".$productimage['name'];
        $tmpname=$path.$imagename;

        // Catch the imagedata
        ob_start();
        imagejpeg($new, $tmpname, 90);
        $data = ob_get_clean();


        // Destroy resources
        imagedestroy($image);
        imagedestroy($new);

    }
    else
    {
        $imagename="images.jpeg";
    }
}

$num_cat == 0;
if($memberid != "")
{
	$sel_cat1="SELECT * FROM ".MEMBER." WHERE `intmemberid`='$memberid'";
	$res_cat1=mysql_query($sel_cat1);
	$fetch_cat1=mysql_fetch_array($res_cat1);
	$num_user = (int) mysql_num_rows($res_cat1);
}

if(isset($_POST['Add']))
{
    if($num_cat == 0)
    {
		$timenow = date('Y-m-d H:i:s');
		$ins_user="INSERT INTO ".MEMBER.
				 "(`varFirstname`,`varLastname`,`varEmail`,`varPhone`,`varStatus`,`productimage`,`varbiography`,`varridingtime`,`varRidename`,`varoftenrides`,`varbiketype`,`varUsername`,`varPassword`,`cpassword`,`activeid`,`varRegoDate`,`varActivationDate`) VALUES
				  ('$firstname'  ,'$lastname'  ,'$email'  ,'$phone'  ,'Active'   ,'$imagename'  ,'$biography'  ,'$ridingtime'  ,'$ridename'  ,'$oftenrides'  ,'$biketype'  ,'$username'  ,'$password'  ,'$cpassword','yes'    ,'$timenow'   ,'$timenow')";

        $res = mysql_query($ins_user) or die(mysql_error());
		if (!$res) {
			$message  = 'Invalid query: ' . mysql_error() . '\n';
			$message .= 'Whole query: ' . $upd_user;
			die($message);
		}

        $flag="success";

        echo '<script type="text/javascript">window.location.href="viewmember.php?rflag=success&rtype=add";</script>';

    }
    else
    {
        $flag= "error";
    }
}

if(isset($_POST['Update']))
{
    if($num_cat == 0)
    {
		if($imagename!="")
		{
			$updateimg = "`productimage`='$imagename',";
		}
		else
		{
			$updateimg = "";
		}

		$upd_user="UPDATE ".MEMBER." SET
          `varFirstname`='$firstname',
          `varLastname`='$lastname',
          `varEmail`='$email',
          `varPhone`='$phone',
          `varStatus`='Active',
          `varUsername`='$username',
          `varPassword`='$password',
          `cpassword`='$cpassword',
          `varbiography`='$biography',
          `varridingtime`='$ridingtime',
          `varRidename`='$ridename',
          `varoftenrides`='$oftenrides',
		  $updateimg
          `varbiketype`='$biketype'
           WHERE  `intmemberid`='$memberid'";

		$res = mysql_query($upd_user);
		if (!$res) {
			$message  = 'Invalid query: ' . mysql_error() . '\n';
			$message .= 'Whole query: ' . $upd_user;
			die($message);
		}

		$flag="update";

		echo '<script type="text/javascript">window.location.href="viewmember.php?rflag=success&rtype=update&page='.$_GET['page'].'";</script>';
	}
 }

 if($memberid != "")
 {
	$firstname=$fetch_cat1['varFirstname'];
	$lastname=$fetch_cat1['varLastname'];
	$email=$fetch_cat1['varEmail'];
	$phone=$fetch_cat1['varPhone'];
	$username=$fetch_cat1['varUsername'];
	$password=$fetch_cat1['varPassword'];
	$cpassword=$fetch_cat1['cpassword'];
	$productimage=$fetch_cat1['productimage'];
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
          <h2><?php echo $disptitle;?>  Member</h2>
        </div>
        <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">
          <div class="portlet-header ui-widget-header"><?php echo $disptitle;?>Member</div><?php if($_GET['log']=="succ"){?>
          <div class="response-msg success ui-corner-all">
            <span>Your Details are Successfully Updated!</span>
          </div><?php } ?><?php if($flag == "error"){ ?>
          <div class="response-msg error ui-corner-all">
          <span>Error message</span> your User Id is already exist!</div><?php } ?>
          <div class="portlet-content">
            <script>

function imposeMaxLength(fld,len)

{

        if(fld.value.length &gt; len) { alert(&quot;You Reached Maximum Character Limit&quot;); fld.value =
fld.value.substr(0,len-1); }

}
</script>
            <form action="" method="post" class="forms" enctype="multipart/form-data" name="frm_member"
            onsubmit="return validation();">
              <ul>
                <li>
                  <label class="desc">
                  <span class="red">*</span> FirstName</label>
                  <div>
                  <input type="text" tabindex="1" value="<?php echo $fetch_cat1['varFirstname'];?>" style="width:50%;"
                  class="field text small" name="firstname" onkeypress="imposeMaxLength(this,25);" />
                  <br />(Maximum 25 Characters)</div>
                </li>
                <li>
                  <label class="desc">
                  <span class="red">*</span> LastName</label>
                  <div>
                  <input type="text" tabindex="1" value="<?php echo $fetch_cat1['varLastname'];?>" style="width:50%;"
                  class="field text small" name="lastname" onkeypress="imposeMaxLength(this,25);" />
                  <br />(Maximum 25 Characters)</div>
                </li>
                <li>
                  <label class="desc"> Ride Name</label>
                  <div>
                  <input type="text" tabindex="1" value="<?php echo $fetch_cat1['varRidename'];?>" style="width:50%;"
                  class="field text small" name="ridename" onkeypress="imposeMaxLength(this,25);" />
                  <br />(Maximum 25 Characters)</div>
                </li>
                <li>
                  <label class="desc">
                  <span class="red">*</span> Email</label>
                  <div>
                  <input type="text" tabindex="1" value="<?php echo $fetch_cat1['varEmail'];?>" style="width:50%;"
                  class="field text small" name="email" onkeypress="imposeMaxLength(this,50);" />
                  <br />(Maximum 50 Characters)</div>
                </li>
                <li>
                  <label class="desc">
                  <span class="red">*</span> User Name</label>
                  <div>
                  <input type="text" tabindex="1" value="<?php echo $fetch_cat1['varUsername'];?>" style="width:50%;"
                  class="field text small" name="username" onkeypress="imposeMaxLength(this,25);" />
                  <br />(Maximum 25 Characters)</div>
                </li>
                <li>
                  <label class="desc">
                  <span class="red">*</span> Password</label>
                  <div>
                  <input type="text" tabindex="1" value="<?php echo $fetch_cat1['varPassword'];?>" style="width:50%;"
                  class="field text small" name="password" onkeypress="imposeMaxLength(this,25);" />
                  <br />(Maximum 25 Characters)</div>
                </li>
                <li>
                  <label class="desc">
                  <span class="red">*</span> Confirm Password</label>
                  <div>
                  <input type="text" tabindex="1" value="<?php echo $fetch_cat1['cpassword'];?>" style="width:50%;"
                  class="field text small" name="cpassword" onkeypress="imposeMaxLength(this,25);" />
                  <br />(Maximum 25 Characters)</div>
                </li>
                <li>
                  <label class="desc">
                  <span class="red">*</span> Mobile Number</label>
                  <div>
                    <input type="text" tabindex="1" style="width:50%;" value="<?php echo $fetch_cat1['varPhone'];?>"
                    class="field text small" name="phone" onkeypress="imposeMaxLength(this,20);" />
                    <br />
                  </div>
                </li>
                <li>
                  <label class="desc">
                  <span class="red">*</span> How Long Riding(Years)</label>
                  <div>
                  <input type="text" tabindex="1" value="<?php echo $fetch_cat1['varridingtime'];?>" style="width:50%;"
                  class="field text small" name="ridingtime" onkeypress="imposeMaxLength(this,25);" /> 
                  <br /></div>
                </li>
                <li>
                  <label class="desc">
                  <span class="red">*</span> How Often Rides Per Week</label>
                  <div>
                  <input type="text" tabindex="1" value="<?php echo $fetch_cat1['varoftenrides'];?>" style="width:50%;"
                  class="field text small" name="oftenrides" onkeypress="imposeMaxLength(this,25);" /> 
                  <br /></div>
                </li>
                <li>
                  <label class="desc">
                  <span class="red">*</span> Type of Bike</label>
                  <div>
                  <input type="text" tabindex="1" value="<?php echo $fetch_cat1['varbiketype'];?>" style="width:50%;"
                  class="field text small" name="biketype" onkeypress="imposeMaxLength(this,25);" />
                  <br />(Maximum 25 Characters)</div>
                </li>
                <li>
                <label class="desc">
                <span class="red">*</span> Upload Profile Photo (150 x 140)</label> <?php if($memberid!="") {

                                                                        $productimage=$path.$productimage;

                                                                        list($width,$height)=getimagesize($productimage);
                                                                        if($width>=140)  $width="140px";
                                                                        if($height>=150) $height="150px";



                                                                        ?>
                <div>
                  <img src="%3C?php%20echo%20$productimage;?%3E" border="0" width="<?php echo $width;?>"
                  height="<?php echo $height;?>" align="absmiddle" />
                  <br />
                </div>
                <div>
                  <?php echo str_replace($path,"",$productimage);?>
                  <br />
                  <br />
                </div><?php }?>
                <div>
                  <input type="file" tabindex="1" maxlength="255" value="" class="field text small" name="image" />
                </div></li>
                <li>
                  <label class="desc">
                  <span class="red">*</span> Biography</label>
                  <div>
                  <textarea name="biography" cols="50" rows="5" onkeypress="imposeMaxLength(this,230);">
                    <?php echo $fetch_cat1['varbiography']; ?>
                  </textarea>
                  <br />(Maximum 230 Characters)</div>
                </li>
                <li class="buttons">
                <input name="<?php echo $disptitle;?>" class="btn ui-state-default ui-corner-all" type="submit"
                value="<?php echo $disptitle;?>" /> 
                <input name="memberid" type="hidden" id="memberid" value="<?php echo $memberid;?>" /></li>
              </ul>
              <div class="red">* Indicates Required Information</div>
            </form>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
    </div><?php include('sidebar.php'); ?>
  </div>
  <div class="clearfix"></div><?php include('footer.php'); ?>
  <script type="text/javascript" language="javascript">

                function validation()

                 {





                 if (document.frm_member.firstname.value=='')

                 {

                         alert (&quot;Please Enter Your FirstName&quot;);

                         document.frm_member.firstname.focus();

                         return false;

                 }



                         if (document.frm_member.lastname.value=='')

                 {

                         alert (&quot;Please Enter Your Lastname&quot;);

                         document.frm_member.lastname.focus();

                         return false;

                 }









          if (validateEmail(document.frm_member.email.value,1,1)==false)

          {

                                 document.frm_member.email.focus();

                                 return false;

                 }




 if (document.frm_member.username.value=='')

                 {

                         alert (&quot;Please Enter Your Username&quot;);

                         document.frm_member.username.focus();

                         return false;

                 }

 if (document.frm_member.password.value=='')

                 {

                         alert (&quot;Please Enter Password&quot;);

                         document.frm_member.password.focus();

                         return false;

                 }

 if (document.frm_member.cpassword.value=='')

                 {

                         alert (&quot;Please Enter Confirm Password&quot;);

                         document.frm_member.cpassword.focus();

                         return false;

                 }


   if (document.frm_member.password.value!=document.frm_member.cpassword.value)
                 {
                         alert (&quot;Confirm Password should be same as Password&quot;);
                         document.frm_member.cpassword.focus();
                         return false;
                 }


                   if (document.frm_member.phone.value=='')

                 {

                         alert (&quot;Please Enter Mobile number&quot;);

                         document.frm_member.phone.focus();

                         return false;

                 }



                         if (isNaN(document.frm_member.phone.value))

                 {

                         alert (&quot;Mobile no Must Be Numeric&quot;);

                         document.frm_member.phone.focus();

                         return false;

                 }







                   if (document.frm_member.oftenrides.value=='')

                 {

                         alert (&quot;Please Enter OftenRides&quot;);

                         document.frm_member.oftenrides.focus();

                         return false;

                 }





                  if (isNaN(document.frm_member.oftenrides.value))

                 {

                         alert (&quot;Often Rides Must Be Numeric&quot;);

                         document.frm_member.oftenrides.focus();

                         return false;

                 }



         if (document.frm_member.biketype.value=='')

         {

                 alert (&quot;Please Enter Your BikeType&quot;);

                 document.frm_member.biketype.focus();

                 return false;

        }





        &lt;?php

        if($memberid=='') { ?&gt;

                 if (document.frm_member.productimage.value=='')

         {

                 alert (&quot;Please Upload Image&quot;);

                 document.frm_member.productimage.focus();

                 return false;

        }







                 &lt;?php } ?&gt;

         if (document.frm_member.biography.value=='')

         {

                 alert (&quot;Please Enter Biography&quot;);

                 document.frm_member.biography.focus();

                 return false;

        }





                 return true;





}



</script></body>
</html>
