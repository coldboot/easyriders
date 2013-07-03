<?php

 include("include/dbconnect.php");
	include("include/constants.php");
	
	
if(isset($_POST['submit_x']))
{


$firstname=$_POST['firstname'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $ride=$_POST['ride'];
 $comments=$_POST['comments']; 
 
 	$content='<table width="480" height="100" border="0">
  <tr>
    <td style="font:"Courier New", Courier, monospace; color:#990000; font-size: 24px; font-weight:bolder;" valign="top" ><center>
      <h2>Contact Us Mail From EasyRiders</h2>
    </center></td>
  </tr>
   
  <tr><td height="5">&nbsp;</td></tr>
  
  <tr><td align="center"><strong>Contact Details</strong></td></tr>
  <tr><td height="5">&nbsp;</td></tr>
 <tr><td><table width="80%" align="center">
 <tr>
   <td width="45%" align="right" style="color:#660033; font-weight:bold;">Name</td>
   <td>&nbsp;</td><td width="45%" align="left" style="color:#660033; font-weight:bold;"> '."$firstname".'</td>
 </tr>
 
 <tr><td colspan="3">&nbsp;</td></tr>
 
 <tr>
   <td width="45%" align="right" style="color:#660033; font-weight:bold;">Email Address</td>
   <td>&nbsp;</td><td width="45%" align="left" style="color:#660033; font-weight:bold;"> '."$email".'</td>
 </tr>
 
 <tr><td colspan="3">&nbsp;</td></tr>

 <tr>
   <td width="45%" align="right" style="color:#660033; font-weight:bold;">Phone Number </td>
   <td>&nbsp;</td><td width="45%" align="left" style="color:#660033; font-weight:bold;"> '."$phone".'</td>
 </tr>
 
 <tr><td colspan="3">&nbsp;</td></tr>
   
 <tr>
   <td width="45%" align="right" style="color:#660033; font-weight:bold;">How often Ride </td>
   <td>&nbsp;</td><td width="45%" align="left" style="color:#660033; font-weight:bold;"> '."$ride".'</td>
 </tr>
 
 <tr><td colspan="3">&nbsp;</td></tr>
  <tr>
   <td width="45%" align="right" style="color:#660033; font-weight:bold;">Comments </td>
   <td>&nbsp;</td><td width="45%" align="left" style="color:#660033; font-weight:bold;"> '."$comments".'</td>
 </tr>
 
 <tr><td colspan="3">&nbsp;</td></tr>
 
 
 </table>
 </td></tr>
  <tr>
    <td>&nbsp;</td></tr></table>';
	
	
	   $message= '<table cellspacing="1" cellpadding="1" border="0" width="100%">
              <tr bgcolor="#eeeeee">
              <td style="font-family:Verdana, Arial; font-size:11px; color:#333333;">'."$content".'</td>
              </tr>
              </table>';
			  
			
  $sel_adm=mysql_query("select * from tbl_cycling_adminprofile");
 $fet_adm=mysql_fetch_array($sel_adm);
				 
  $email11=$fet_adm['varEmail']; 

	
	
	$subject = "Contact  Mail From EasyRiders";
	
	$headers = "From: ".$email."\r\n";

	$headers .= "Reply-To: ".$email11."\r\n";

	$headers .= "MIME-Version: 1.0\r\n";
	
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	mail($email11,$subject,$message,$headers);

echo '<script type="text/javascript">
window.location.href="contact.php?log=msg";
</script>';	
		
}
		?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Easy Riders-Contact Us</title>
<link href="images/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="/favicon new.ico" type="image/x-icon">
<link rel="icon" href="/favicon new.ico" type="image/x-icon">
<script src="images/galleryscript.js" type="text/javascript"></script>

  <link id='theme' rel='stylesheet' href='/humane-themes/bold-dark.css'/>
      <script src='/humane.js'></script>


</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
        <td><?php include("header.php"); ?></td>

  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="images/midpage_top.png" width="998" height="20" /></td>
          </tr>
          <tr>
            <td class="page_mid"><table width="990" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="240" valign="top"><?php include("sidebar.php"); ?></td>
                <td width="10">&nbsp;</td>
                <td width="700" valign="top"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
				 	   <?php 
		$sel_img=mysql_query("select * from tbl_cycling_adminprofile");
		$fet_img=mysql_fetch_array($sel_img);
		
		
		?>
				  
				  
					<td class="head_big"><span style="font-size: 20px; font-weight:bold;"><big><?php echo $fet_img['contactpage'];?></big></span></td>
					
					
					
					 
					
					
					
<!--                    <td class="head_big">Contact Us</td>
-->                  </tr>
                                  <td width="10">&nbsp;</td>

				  
				  
				  	   <?php
						  $log=$_GET['log'];
						  if($log=="msg")
						  {
						  ?>
						  <tr><td style="color:#000000; font-weight:bold; font-size:20px; padding-left:100px;" colspan="7" align="">Thank you for your message. We will contact you shortly.</td></tr>
						   <?php } ?>
                                    <tr>
                                      <td class="body_style">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="body_style"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        
                                        <tr>
                                          <td>
										  
										  
										   <form name="contact" method="post" action="" enctype="multipart/form-data" onsubmit="return vali();">
										  <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
                                            <tr>
                                              <td width="8"><img src="images/side_1.png" width="8" height="8" /></td>
                                              <td class="side_top"></td>
                                              <td width="8"><img src="images/side_2.png" width="8" height="8" /></td>
                                            </tr>
                                            <tr>
                                              <td width="8" class="side_left"></td>
                                              <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td>
								

													
													<table width="100%" border="0" align="left" cellpadding="5" cellspacing="0">
                                                      <tr>
                                                        <td align="right" class="body_style"><strong>Enter your Name&nbsp;<span style="color:#FF0000; font-weight:bold;">*</span></strong></td>
                                                        <td align="right" class="body_style"><strong>:</strong></td>
                                                        <td><input name="firstname" type="text" class="text_filed" id="textfield" /></td>
                                                      </tr>
                                                      <tr>
                                                        <td align="right" class="body_style"><strong>E-mail address&nbsp;<span style="color:#FF0000; font-weight:bold;">*</span></strong></td>
                                                        <td align="right" class="body_style"><strong>:</strong></td>
                                                        <td><input name="email" type="text" class="text_filed" id="textfield2" /></td>
                                                      </tr>
                                                      <tr>
                                                        <td align="right" class="body_style"><strong>Phone Number</strong></td>
                                                        <td align="right" class="body_style"><strong>:</strong></td>
                                                        <td><input name="phone" type="text" class="text_filed" id="textfield3" /></td>
                                                      </tr>
                                                      <tr>
                                                        <td align="right" class="body_style"><strong>How often do you ride </strong></td>
                                                        <td align="right" class="body_style"><strong>:</strong></td>
                                                        <td><select name="ride" class="text_list" id="select">
														<option value="">Choose</option>
                                                            <option value="New Rider">New Rider</option>
                                                            <option value="Casual Commuter">Casual Commuter</option>
                                                            <option value="Regular Commuter">Regular Commuter</option>
                                                            <option value="Weekend Warrior">Weekend Warrior</option>
                                                            <option value="Fanatic">Fanatic</option>
                                                          </select>  
														  
</td>
                                                      </tr>
                                                      <tr>
                                                        <td align="right" valign="top" class="body_style"><strong>Comments</strong></td>
                                                        <td align="right" valign="top" class="body_style"><strong>:</strong></td>
                                                        <td><textarea name="comments" cols="45" rows="5" class="text_area" id="textarea"></textarea></td>
                                                      </tr>
                                                      <tr>
                                                        <td align="right" valign="top" class="body_style">&nbsp;</td>
                                                        <td align="right" valign="top" class="body_style">&nbsp;</td>
                                                        <td><table border="0" cellspacing="0" cellpadding="3">
                                                          <tr>
                                                            <td>
															
															
															 <input type="image" src="images/submit.png" width="69" height="29" border="0"  value="submit" name="submit" /> 
															
															
															</td>
                                                            
															
															
																
 						
                                                          </tr>
                                                        </table></td>
                                                      </tr>
                                                    </table>
													
												</td>
                                                  </tr>
                                                  <tr>
                                                    <td align="center">&nbsp;</td>
                                                  </tr>
                                              </table>	</td>
                                              <td width="8" class="side_right"></td>
                                            </tr>
                                            <tr>
                                              <td width="8"><img src="images/side_3.png" width="8" height="8" /></td>
                                              <td class="side_bottom"></td>
                                              <td width="8"><img src="images/side_4.png" width="8" height="8" /></td>
                                            </tr>
                                          </table></form></td>
                                        </tr>
                                        <tr>
                                          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                              <td width="23%">&nbsp;</td>
                                              <td width="77%">&nbsp;</td>
                                            </tr>
                                          </table></td>
                                        </tr>
                                        <tr>
                                          <td align="center" class="head_big">&nbsp;</td>
                                        </tr>
                                        
                                        
                                        
                                        
                                      </table></td>
                          </tr>
                  <tr>
                    <td align="center"></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                  </tr>
                  <tr>
                    <td align="center"></td>
                  </tr>
                  
                  

                </table></td>
              </tr>
              
            </table></td>
          </tr>
          <tr>
            <td><img src="images/midpage_bottom.png" width="998" height="20" /></td>
          </tr>
        </table></td>
      </tr><strong></strong>
     
    </table></td>
  </tr>
  <tr>
    <td><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>

<script type="text/javascript" language="javascript">
		function vali()
		 {
		  	
		
		 if (document.contact.firstname.value=='')
		 { 
			 alert ("Please Enter Your Name");
			 document.contact.firstname.focus();
			 return false;
		 }
		 
		  if (document.contact.email.value=='')
		 { 
			 alert ("Please Enter Your Email");
			 document.contact.email.focus();
			 return false;
		 }
		 
		 
   var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
          if(!filter.test(document.contact.email.value))
          {
	   	 alert ("Please Enter Valid Email Id");
		 document.contact.email.focus();
			 return false;
		 }
		 return true;
		 }
		 </script>
