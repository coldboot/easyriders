<?php
   include("include/dbconnect.php");
	include("include/constants.php");
	?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Easy Riders-Links</title>
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
                  <tr>
				  
				   <?php 
		$sel_img=mysql_query("select * from tbl_cycling_adminprofile");
		$fet_img=mysql_fetch_array($sel_img);
		
		
		?>
				  
				  
					<td class="head_big"><span style="font-size: 20px; font-weight:bold;"><big><?php echo $fet_img['linkspage'];?></big></span></td>
					
					
						
				  
				  
	
				  
				  
<!--                    <td class="head_big">Links</td>
-->                  </tr>
                  
                                    <tr>
                                      <td class="body_style">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td class="body_style"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        
                                        <tr>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td>
										  
										  <?php 
										  
										     $sel_link="select * from tbl_cycling_link order by catid";
										   $res_link=mysql_query($sel_link);
										   while($fetch_link=mysql_fetch_array($res_link))
										   { ?>
				
										  <ul class="leftlistnew">
                                  <li> <span style="padding-left:45px; color:#666666; font-weight:bold;">Link Name : <?php echo $fetch_link['linkname']; ?><br /></span>
								 <span style="padding-left:45px; color:#666666; font-weight:bold;">Link URL :  <a href="<?php echo $fetch_link['linkurl']; ?>" style="text-decoration:none;"><?php echo $fetch_link['linkurl']; ?></a><br /></span>
								  
								  
								  <span style="padding-left:45px; color:#666666; font-weight:bold;">Link Description : <?php echo $fetch_link['linkdesc']; ?></span><br /><br />
								  </li></ul>
								 
										  <?php } ?>
										  </td>
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
      </tr>
     
    </table></td>
  </tr>
  <tr>
    <td><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
